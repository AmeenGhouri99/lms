<?php

namespace App\DataTables;

use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ProgramDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addIndexColumn()
            ->addColumn('parent_program_name', function ($data) {
                return $data->parent ? $data->parent->name : "Parent Program";
            })
            ->addColumn('action', 'admin.programs.datatables_actions')
            ->rawColumns(['action']);
    }

    public function query(Program $model, Request $request)
    {
        // Check if the request has a 'parent' parameter
        if ($request->has('parent')) {
            // If 'parent' is in the request, return only parent programs
            return $model->whereNull('parent_id')
                ->latest()
                ->select('id', 'name', 'parent_id');
        }

        // Otherwise, return programs where parent_id is not null
        return $model->whereNotNull('parent_id')
            ->with(['parent'])
            ->latest()
            ->select('id', 'name', 'parent_id');
    }

    protected function getColumns()
    {
        return [
            'sr#' => ['title' => 'sr#', 'data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false],
            'name' => ['title' => 'Program Name', 'data' => 'name', 'searchable' => true],
            'parent_program_name',
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
                // 'dom' => '<"d-flex justify-content-between"<"dt-buttons pt-1"B><"dataTables_filter"f>>rtip',
                'buttons' => ['csv', 'excel'],
                'pageLength' => 50,
                'order' => [[0, 'desc']],
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
            ]);
    }
}
