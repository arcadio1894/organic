<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportableExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        $header = ['ID', 'Nombre', 'Email'];
        $content = [];
        $users = User::all();
        foreach ( $users as $user )
        {
            array_push($content, [$user->id, $user->name, $user->email]);
        }
        return new Collection([
            $header,
            $content
        ]);
    }
}
