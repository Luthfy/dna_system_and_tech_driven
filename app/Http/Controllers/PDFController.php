<?php

namespace App\Http\Controllers;

use App\Models\ExitNote;
use App\Models\DetailExitNote;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generate_exit_note($id)
    {
        $exitNote = ExitNote::findOrFail($id);

        $data = [
            'title'     => $exitNote->date_exit_note." ".$exitNote->uuid_exit_note,
            'exit_note' => $exitNote,
            'detail'    => DetailExitNote::select()->where('uuid_exit_note', $id)->get()
        ];

        $pdf = PDF::loadView('pdf.exit_note', $data);

        return $pdf->stream('NOTA KELUAR '.$exitNote->date_exit_note.' '.$exitNote->uuid_exit_note.'.pdf');
    }
}
