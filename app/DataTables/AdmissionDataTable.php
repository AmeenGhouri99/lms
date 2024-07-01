<?php

namespace App\DataTables;

use App\Helpers\Constant;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Html\Elements\Button;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class AdmissionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addIndexColumn()
            ->addColumn('candidate_name', function ($data) {
                return $data->user->personalInformation->candidate_name;
            })
            ->addColumn('candidate_cnic', function ($data) {
                return $data->user->personalInformation->candidate_cnic;
            })
            ->addColumn('father_name', function ($data) {
                return $data->user->personalInformation->father_name;
            })
            ->addColumn('programs', function ($data) {
                $all_applied_program = "";
                $total_programs = count($data->program);
                foreach ($data->program as $key => $applied_programs) {
                    $all_applied_program .= $applied_programs->program->name;
                    if ($key !== $total_programs - 1) {
                        $all_applied_program .= '/';
                    }
                }
                return $all_applied_program;
            })
            ->addColumn('category', function ($data) {
                foreach ($data->program as $key => $applied_programs) {
                    return $applied_programs->program->parent->name;
                }
            })
            ->addColumn('action', 'admin.admission.datatables_actions');
        // ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProjectBlock $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admission $model, Request $request)
    {
        // Your Yajra DataTable query here
        return $model->with([
            'program', 'user', 'admissionFee'
        ])->where('is_undertaking_accept', 1)->latest()->newQuery()->select([
            'id',
            'admission_date',
            'session',
            'user_id',
            'admission_fee',
            'admission_amount',
            'status'

        ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '90px', 'printable' => false, 'title' => 'action'])
            ->parameters([
                'bSort' => false,
                'dom' => '<"d-flex justify-content-between"<"dt-buttons pt-1"B><"dataTables_filter"f>>rtip', // Custom layout for search and buttons
                'buttons' => [
                    // [
                    //     'extend' => 'print',
                    //     'exportOptions' => [
                    //         'columns' => ':visible:not(.not-printable)' // Exclude columns with class 'not-printable'
                    //     ]
                    // ],
                    'csv',
                    'excel',
                    // 'pdf',
                ],
                'pageLength' => 50,
                'order' => [[0, 'desc']],
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'sr#' => ['title' => 'sr#', 'data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false],
            'candidate_name',
            'candidate_cnic',
            'father_name',
            'admission_date' => ['title' => 'admission date', 'data' => 'admission_date'],
            'session' => ['title' => 'Session', 'data' => 'session'],
            'category',
            'programs',
            'status' => ['title' => 'status', 'data' => 'status'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    // protected function filename()
    // {
    //     return 'project_blocks_datatable_' . time();
    // }
}
