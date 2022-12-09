<?php

namespace App\DataTables;

use App\Models\VariantGroup;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VariantGroupsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        //  (new EloquentDataTable($query))
        $columns = array_column($this->getColumns(), 'data');
        $dataTable = datatables()->eloquent($query);
        return $dataTable
            ->editColumn('created_at', function ($variantgroup) {
                return formatModelDate($variantgroup, 'created_at');
            })
            // ->addColumn('action', 'variantgroups.action')
            // ->setRowId('id')
            ->addColumn('action', 'layouts.components.datatables_actions')
            ->rawColumns(array_merge($columns, ['action']));
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\VariantGroup $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(VariantGroup $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('variantgroups-table')
            ->columns($this->getColumns())
            ->minifiedAjax('', null, ['model_name' => 'variantgroup'])
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        // return [
        //     Column::computed('action')
        //           ->exportable(false)
        //           ->printable(false)
        //           ->width(60)
        //           ->addClass('text-center'),
        //     Column::make('id'),
        //     Column::make('add your columns'),
        //     Column::make('created_at'),
        //     Column::make('updated_at'),
        // ];

        $columns = [
            [
                'data' => 'variant_group_name',
                'title' => 'Variant Group Name',

            ],
            [
                'data' => 'description',
                'title' => 'Description',
                'searchable' => false,

            ],
            [
                'data' => 'created_at',
                'title' => 'Created on',
                'searchable' => false,
            ]
        ];

        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'VariantGroups_' . date('YmdHis');
    }
}
