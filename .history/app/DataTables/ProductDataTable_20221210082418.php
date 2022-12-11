<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->editColumn('updated_at', function (Product $product) {
                return formatModelDate($product, 'updated_at');
            })
            ->editColumn('image', function (Product $product) {
                return getMediaColumnResource($product, 'images');
            })
            ->escapeColumns('image')
            ->editColumn('productvariants', function (Product $product) {
                return getVariants($product);
            })
            ->addColumn('action', 'layouts.components.datatables_actions')
            ->rawColumns(array_merge($columns, ['action']));
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model): QueryBuilder
    {
        return $model::with('productvariants')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax('', null, ['model_name' => 'product'])
            ->addAction(['title' => trans('Actions'), 'width' => '80px', 'printable' => false, 'responsivePriority' => '100'])
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
        // 'name', 'price', 'quantity'

        $columns = [
            [
                'data' => 'name',
                'title' => 'Name',

            ],
            [
                'data' => 'image',
                'title' => 'Image',
                'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false,
            ],
            [
                'data' => 'quantity',
                'title' => 'Quantity',
                'searchable' => true,

            ],
            [
                'data' => 'price',
                'title' => 'Price',
                'searchable' => true,

            ],
            [
                'data' => 'productvariants',
                'title' => 'Variants',
                'searchable' => true,

            ],
            [
                'data' => 'updated_at',
                'title' => 'Updated on',
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
        return 'Product_' . date('YmdHis');
    }
}
