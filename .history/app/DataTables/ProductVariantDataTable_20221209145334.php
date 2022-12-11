<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProductVariantDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $columns = array_column($this->getColumns(), 'data');
        $dataTable = datatables()->eloquent($query);
        return $dataTable
            ->editColumn('created_at', function ($productvariant) {
                return formatModelDate($productvariant, 'created_at');
            })
            ->addColumn('variantgroup', function (ProductVariant $productvariant) {
                // return $productvariant;
                return getModelColumnValue($productvariant, 'variantgroup', 'variant_group_name');
            })
            ->addColumn('action', 'layouts.components.datatables_actions')
            ->rawColumns(array_merge($columns, ['action']));
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductVariant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        // return $model::with('variantgroup')->newQuery();
        return $model::query()->with('variantgroup');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('productvariant-table')
            ->columns($this->getColumns())
            ->minifiedAjax('', null, ['model_name' => 'productvariant'])
            ->addAction(['title' => 'Actions', 'width' => '80px', 'printable' => false, 'responsivePriority' => '100'])
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
        $columns = [
            [
                'data' => 'variant_name',
                'title' => 'Variant Name',

            ],
            [
                'data' => 'variantgroup',
                'title' => 'Variant Group',
                'searchable' => true,

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
        return 'ProductVariants_' . date('YmdHis');
    }
}
