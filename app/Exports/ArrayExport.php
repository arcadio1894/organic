<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ArrayExport implements FromArray, WithCustomStartCell
{
    protected $users;

    public function __construct( array $users )
    {
        $this->users = $users;
    }

    /*public function array(): array
    {
        return [
            [1,2,3],
            [4,5,6]
        ];
    }*/

    public function array(): array
    {
        return $this->users;
    }

    public function startCell(): string
    {
        // TODO: Implement startCell() method.
        return 'C3';
    }
}
