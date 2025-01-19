<?php

namespace App\DataTables;

use App\Models\Admission;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class AdmissionDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addIndexColumn()
            ->addColumn('student_name', function ($data) {
                return $data->user->personalInformation->candidate_name;
            })
            ->addColumn('cnic', function ($data) {
                return $data->user->personalInformation->candidate_cnic;
            })
            ->addColumn('father_name', function ($data) {
                return $data->user->personalInformation->father_name;
            })
            ->editColumn('hafiz_e_quran', function ($data) {
                return $data->user->personalInformation->hafiz_e_quran;
            })
            ->addColumn('matric_marks', function ($data) {
                foreach ($data->user->qualification as $qualification) {
                    if ($qualification->qualification == 'matriculation') {
                        return $qualification->obtained_marks . '/' . $qualification->total_marks;
                    }
                }
                return ''; // Default behavior if no qualification matches
            })
            ->addColumn('matric_%age', function ($data) {
                foreach ($data->user->qualification as $qualification) {
                    if ($qualification->qualification == 'matriculation' || $qualification->qualification == 'matriculation') {
                        return number_format($qualification->obtained_marks / $qualification->total_marks * 100, 1) . '%';
                    }
                }
                return ''; // Default behavior if no qualification matches
            })
            ->addColumn('inter_marks', function ($data) {
                foreach ($data->user->qualification as $qualification) {
                    if (
                        $qualification->qualification == 'fa_simple' || $qualification->qualification == 'fsc_pre_medical' ||
                        $qualification->qualification == 'fsc_pre_engineering' ||  $qualification->qualification == 'dae_chemical' || $qualification->qualification == 'dae_mechanical' || $qualification->qualification == 'dae_electrical' || $qualification->qualification == 'fa_with_math_or_it' ||
                        $qualification->qualification == 'dae_civil' ||
                        $qualification->qualification == 'i_com'
                    ) {
                        return $qualification->obtained_marks . '/' . $qualification->total_marks;
                    }
                }
                return ''; // Default behavior if no qualification matches
            })
            ->addColumn('inter_%age', function ($data) {
                foreach ($data->user->qualification as $qualification) {
                    if (
                        $qualification->qualification == 'fa_simple' || $qualification->qualification == 'fsc_pre_medical' ||
                        $qualification->qualification == 'fsc_pre_engineering' ||  $qualification->qualification == 'dae_chemical' || $qualification->qualification == 'dae_mechanical' || $qualification->qualification == 'dae_electrical' || $qualification->qualification == 'fa_with_math_or_it' ||
                        $qualification->qualification == 'dae_civil' ||
                        $qualification->qualification == 'i_com'
                    ) {
                        return number_format($qualification->obtained_marks / $qualification->total_marks * 100, 1) . '%';
                    }
                }
                return ''; // Default behavior if no qualification matches
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
    }

    public function query(Admission $model, Request $request)
    {
        return $model->with(['program', 'user.personalInformation', 'user.qualification', 'program.program.parent'])
            ->where('is_undertaking_accept', 1)
            ->latest()
            ->select([
                'id',
                'admission_date',
                'admission_term',
                'user_id',
                'admission_fee',
                'admission_amount',
                'status'
            ]);
    }

    protected function getColumns()
    {
        return [
            'sr#' => ['title' => 'sr#', 'data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false],
            'student_name' => ['searchable' => true],
            'cnic' => ['searchable' => true],
            'father_name' => ['searchable' => true],
            'hafiz_e_quran' => ['searchable' => true, 'name' => 'user.personalInformation.hafiz_e_quran'],
            'matric_marks' => ['searchable' => true],
            'matric_%age' => ['searchable' => true],
            'inter_marks' => ['searchable' => true],
            'inter_%age' => ['searchable' => true],
            'programs' => ['searchable' => true],
            'status' => ['title' => 'status', 'data' => 'status', 'searchable' => true],
        ];
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '90px', 'printable' => false, 'title' => 'action'])
            ->serverSide(true)
            ->parameters([
                'bSort' => false,
                'dom' => '<"d-flex justify-content-between"<"dt-buttons pt-1"B><"dataTables_filter"f>>rtip',
                'buttons' => ['csv', 'excel'],
                'pageLength' => 50,
                'order' => [[0, 'desc']],
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
            ]);
    }
}
