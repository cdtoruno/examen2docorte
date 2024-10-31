<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //


    public function export(){
        return Excel::newExport(new ParticipantExport, 'participants.xlsx');
    }

    public function import (Request $request){
        $request -> validate([
            'file' => 'required|mimes:xlsx'
        ]);

        Excel::import(new ParticipantImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Productos Importados Correctamente');
    }
}

