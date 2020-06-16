<?php

namespace App\DataTables;

use App\Models\Item;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InventoryDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('is_sold_out', function($inventory){
                return ($inventory->is_sold_out == 1) ? '<span class="text-danger">terjual</span>' : '<span class="text-success">in-stock</span>' ;
            })
            
            ->addColumn('id_category', function($inventory){
                return $inventory->category->name_category;
            })
            ->addColumn('updated_at', function($inventory){
                return $inventory->updated_at->format('d-m-y H:i:s');
            })
            ->addColumn('action', function($inventory) {
                return "
                    <div class='row justify-content-between'>
                        <a href='/admin/inventory/$inventory->uuid_item_inventory' class='btn btn-primary btn-sm mx-1'><i class='fas fa-eye'></i></a>
                        <a href='#' class='btn btn-success btn-sm' onclick='editForm()'><i class='fas fa-edit'></i></a>
                        <a href='#' class='btn btn-danger btn-sm' onclick='deleteSupplier()'><i class='fas fa-trash'></i></a>
                    </div>
                ";
            })
            ->rawColumns(['is_sold_out', 'action']);
    }

    public function query(Item $model)
    {
        return $this->applyScopes(
            $model::orderBy('nm_item_inventory', 'asc')
                        ->orderBy('id_category', 'asc')
                        ->orderBy('is_sold_out', 'asc')
        );
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('inventory-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->action('
                            if (document.getElementById("uuid_entry_note_value")) 
                            {
                                window.location.href = "../items/create/" + (document.getElementById("uuid_entry_note_value").innerHTML)
                            }
                            else
                            {
                                window.location.href = "items/create"
                            }'
                        ),
                        Button::make('excel'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
            Column::make('nm_item_inventory')
                ->title('Nama Barang'),
            Column::make('cap_price_item_inventory')
                ->title('Harga Beli')
                ->addClass('text-center'),
            Column::make('selling_price_item_inventory')
                ->title('Harga Jual')
                ->addClass('text-center'),
            Column::computed('is_sold_out')
                ->orderable(true)
                ->title('Terjual')
                ->addClass('text-center'),
            Column::computed('id_category')
                ->title('Kategori')
                ->addClass('text-center'),
            Column::computed('updated_at')
                ->title('diperbarui')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Inventory_' . date('YmdHis');
    }
}
