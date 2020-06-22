<?php

namespace App\DataTables;

use App\Models\Item;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ItemsDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn();
    }

    public function query(Item $model)
    {
        if (($this->uuid_entry_note ?? '') == '')
        {
            $items = new Item;
            return $this->applyScopes(
                $items->get_item_with_stock()->where('is_sold_out', 0)
            );
        }
        else
        {
            $uuid_entry_note = $this->uuid_entry_note;
            return $this->applyScopes($model::query()->where('uuid_entry_note is null'));
        };
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('items-stock-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('excel'),
                        Button::make('print'),
                        Button::make('reload')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No')
                ->addClass('text-center'),
            Column::make('nm_item_inventory')
                ->title('Nama Barang'),
            Column::make('selling_price_item_inventory')
                ->title('Harga Barang')
                ->addClass('text-center'),
            Column::make('stock')
                ->title('Sisa Stok')
                ->searchable(false)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Items_DNA_' . date('YmdHis');
    }
}
