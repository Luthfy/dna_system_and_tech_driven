<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('id_category', function($category){
                return strtoupper($category->id_category);
            })
            ->addColumn('id_user', function($category){
                return $category->user->name;
            })
            ->addColumn('created_at', function($category){
                return $category->created_at->format('yy-m-d');
            })
            ->addColumn('updated_at', function($category){
                return $category->updated_at->format('yy-m-d h:i:s');
            })
            ->addColumn('action', function($category){
                return "";
            });
    }

    public function query(Category $model)
    {
        return $this->applyScopes($model::query());
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('categories-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('pdf'),
                        Button::make('excel'),
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
                  ->addClass('text-center align-middle'),
            Column::computed('id_category')
                ->title('ID')
                ->addClass('text-center align-middle'),
            Column::computed('name_category')
                ->title('Kategori')
                ->addClass('text-center align-middle'),
            Column::computed('id_user')
                ->title('User')
                ->addClass('text-center align-middle'),
            Column::make('created_at')
                ->title('ditambahkan')
                ->addClass('text-center align-middle'),
            Column::make('updated_at')
                ->title('diperbarui')
                ->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Categories_' . date('YmdHis');
    }
}
