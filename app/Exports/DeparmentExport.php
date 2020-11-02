<?php

namespace App\Exports;

use App\Department;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class DeparmentExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('exports.departments', [
            'departments' => Department::all()
        ]);
    }
}
