<?php

namespace App\DataTables;

use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomersDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return
                    "<div class='row justify-content-between'>
                        <a href='customer/$user->id_supplier' class='btn btn-primary btn-sm mx-1'><i class='fas fa-eye'></i></a>
                        <a href='#' class='btn btn-success btn-sm' onclick='editForm(".$user->id_supplier.")'><i class='fas fa-edit'></i></a>
                        <a href='#' class='btn btn-danger btn-sm' onclick='deleteSupplier(".$user->id_supplier.")'><i class='fas fa-trash'></i></a>
                    </div>";
            });
    }

    public function query(Customer $model)
    {
        return $this->applyScopes($model::query()->orderByDesc('created_at'));
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('customer_table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->autoWidth(false)
                    ->dom('Bfrtip')
                    ->orderBy(1, "desc")
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reload')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')
                    ->title("No")
                    ->addClass("text-center align-middle"),
            Column::make('nm_customer')
                    ->title("Nama")
                    ->addClass("text-center align-middle"),
            Column::make('address_customer')
                    ->title("Alamat")
                    ->addClass("text-center align-middle"),
            Column::make('phone_customer')
                    ->title("No Hp")
                    ->addClass("text-center align-middle"),
            Column::make('remember_token')
                    ->title("Token")
                    ->addClass("text-center align-middle"),
            Column::make('created_at')
                    ->title("Terdaftar pada")
                    ->addClass("text-center align-middle"),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Customers_DNA_' . date('YmdHis');
    }
}
