<?php

namespace App\DataTables;

use App\Helpers\Constant;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Html\Elements\Button;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->editColumn('status', function ($data) {
                $status_btn = '';
                if ($data->status === 1) {
                    $status_btn = '<span class="alert alert-success">Active</span>';
                } else {
                    $status_btn = '<span class="alert alert-danger">Inactive</span>';
                }
                return $status_btn;
            })
            ->addColumn('action', 'admin.users.datatables_actions')
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProjectBlock $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model, Request $request)
    {
        // Your Yajra DataTable query here
        return $model->where('role_id', Constant::USER_ROLE_ID)->latest()->newQuery()->select([
            'id',
            'full_name',
            'father_name',
            'email',
            'cnic',
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
            'full_name' => ['title' => 'full name', 'data' => 'full_name'],
            'father_name' => ['title' => 'father name', 'data' => 'father_name'],
            'cnic' => ['title' => 'cnic', 'data' => 'cnic'],
            'email' => ['title' => 'email', 'data' => 'email'],
            'status',
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
