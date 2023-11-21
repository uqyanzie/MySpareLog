<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Email',
            'Username',
            'Name',
            'Role',
            'No. Telepon',
            'Divisi',
            'Cabang',
            'Status'
        ];
    }
    public function collection()
    {
        return User::select('email', 'username', 'name', 'role', 'phone', 'divisi', 'cabang', 'status')->get();
    }
}
