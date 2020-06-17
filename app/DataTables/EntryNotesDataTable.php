<?php

namespace App\DataTables;

use App\Models\EntryNotes;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class EntryNotesDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('uuid_supplier', function($entry_notes){
                return $entry_notes->supplier->name_supplier;
            })
            ->addColumn('id_user', function($entry_notes){
                return $entry_notes->user->name;
            })
            ->addColumn('status_entry_note', function($entry_notes){
                return $entry_notes->status_entry_note == 'L' ? '<span class="badge badge-success">Lunas</span>' : '<span class="badge badge-warning">Hutang</span>';
            })
            ->addColumn('date_entry_note', function($entry_notes){
                return $entry_notes->date_entry_note;
            })
            ->addColumn('created_at', function($entry_notes){
                return $entry_notes->created_at->format('d-m-yy');
            })
            ->addColumn('updated_at', function($entry_notes){
                return $entry_notes->updated_at->format('d-m-yy h:i:s');
            })
            ->addColumn('action', function ($entry_notes) {
                return
                    "<div class='row justify-content-between'>
                        <a href='/admin/entry-note/$entry_notes->uuid_entry_note' class='btn btn-primary btn-sm mx-1'><i class='fas fa-eye'></i></a>
                        <a href='/admin/entry-note/$entry_notes->uuid_entry_note/edit' class='btn btn-success btn-sm' onclick='editForm()'><i class='fas fa-edit'></i></a>
                        <a href='#' class='btn btn-danger btn-sm' onclick=deleteEntryNote('$entry_notes->uuid_entry_note')><i class='fas fa-trash'></i></a>
                    </div>";
            })
            ->rawColumns(['status_entry_note', 'action']);
    }

    public function query(EntryNotes $model)
    {
        if (($this->uuid_supplier ?? '') == '')
        {
            return $this->applyScopes($model::query()->orderByDesc('date_entry_note'));
        }
        else
        {
            $uuid_supplier = $this->uuid_supplier;
            return $this->applyScopes($model::query()->where('uuid_supplier','=',$uuid_supplier)->orderByDesc('date_entry_note'));
        }
        
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('entry_notes_table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->autoWidth(true)
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->action('
                            if (document.getElementById("uuid_supplier_value")) 
                            {
                                window.location.href = "../entry-note/create/" + (document.getElementById("uuid_supplier_value").innerHTML)
                            }
                            else
                            {
                                window.location.href = "entry-note/create/"
                            }
                        '),
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
                ->addClass('text-center align-middle'),
            Column::computed('no_entry_note')
                ->title('No Nota')
                ->addClass('text-center align-middle'),
            Column::computed('date_entry_note')
                ->title('Tanggal Nota')
                ->addClass('text-center align-middle'),
            Column::make('total_entry_note')
                ->title('Total')
                ->addClass('text-right align-middle'),
            Column::computed('status_entry_note')
                ->title('Pembayaran')
                ->addClass('text-center align-middle'),
            Column::computed('uuid_supplier')
                ->title('Supplier')
                ->addClass('text-center align-middle'),
            Column::make('id_user')
                ->title('User')
                ->addClass('text-center align-middle'),
            Column::computed('updated_at')
                ->title('diperbarui')
                ->addClass('text-center align-middle'),
            
        ];
    }

    protected function filename()
    {
        return 'EntryNotes_DNA_' . date('YmdHis');
    }
}
