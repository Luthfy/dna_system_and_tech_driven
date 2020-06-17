<?php

namespace App\DataTables;

use App\Models\Supplier;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuppliersDataTable extends DataTable
{
    public function dataTable($query)
    {
        
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('user', function($supplier){
                return $supplier->user->name;
            })
            ->addColumn('created_at', function($supplier){
                return $supplier->created_at->format('d-m-yy');
            })
            ->addColumn('updated_at', function($supplier){
                return $supplier->updated_at->format('d-m-yy h:i:s');
            })
            ->addColumn('action', function ($supplier) {
                return
                    "<div class='row justify-content-between'>
                        <a href='supplier/$supplier->uuid_supplier' class='btn btn-primary btn-sm'><i class='fas fa-eye'></i></a>
                        <a href='supplier/$supplier->uuid_supplier/edit' class='btn btn-success btn-sm'><i class='fas fa-edit'></i></a>
                        <a href='#' class='btn btn-danger btn-sm' onclick=deleteSupplier('$supplier->uuid_supplier')><i class='fas fa-trash'></i></a>
                    </div>";
            });
    }

    public function query(Supplier $model)
    {
        return $this->applyScopes(Supplier::select(
            'uuid_supplier',
            'name_supplier',
            'address_supplier',
            'phone_supplier',
            'uuid_user',
            'created_at',
            'updated_at'
        )->with('user')->orderByDesc('updated_at'));
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->setTableId('supplier_table')
            ->autoWidth(false)
            ->minifiedAjax()
            ->orders([[1]])
            ->dom('Bfrtip')
            ->buttons(
                Button::make('create'),
                Button::make('excel'),
                Button::make('print'),
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
                ->orderable(false)
                ->addClass('text-center'),
            Column::make('name_supplier')
                ->title('Nama Supplier')
                ->addClass('align-middle'),
            Column::make('address_supplier')
                ->title('Alamat Supplier')
                ->addClass('align-middle'),
            Column::make('phone_supplier')
                ->title('Kontak')
                ->addClass('text-center align-middle'),
            Column::computed('user')
                ->addClass('text-center align-middle'),
            Column::computed('created_at')
                ->title('didaftarkan')
                ->addClass('text-center align-middle'),
            Column::computed('updated_at')
                ->title('diperbarui')
                ->addClass('text-center align-middle'),
        ];
    }

    protected function filename()
    {
        return 'Suppliers_DNA_' . date('YmdHis');
    }
}
