<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\FromCollection;

class UserssImport implements FromCollection
{

    public function collection()
    {

        return UserssImport::all();

    }
}
