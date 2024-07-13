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
            ->addColumn('category', function ($data) {
                return $data->parent->name;
            })
            ->addColumn('action', 'admin.programs.datatables_actions');
    }

    public function query(Program $model, Request $request)
    {
        return $model->with(['parent'])
            ->where('parent_id', '!=', null)
            ->latest()
            ->select(
                'id',
                'name',
                'parent_id'
            );
    }

    protected function getColumns()
    {
        return [
            'sr#' => ['title' => 'sr#', 'data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false],
            'name' => ['title' => 'Program Name', 'data' => 'name', 'searchable' => true],
            'category',
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
