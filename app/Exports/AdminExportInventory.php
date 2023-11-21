<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class AdminExportInventory implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'ID',
            'Tipe',
            'Nama',
            'Status',
            'Kondisi',
            'Deskripsi',
            'Lokasi',
            'Jumlah',
            'Nama PIC',
            'No. Telepon PIC',
        ];
    }
    public function collection()
    {   
        return Inventory::
            join('types', 'inventories.type_id', '=', 'types.id')
            ->select(
                'inventories.id as id', 
                'types.nama_jenis as tipe',
                'inventories.nama as nama', 
                'inventories.status as status', 
                'inventories.kondisi as kondisi', 
                'inventories.deskripsi as deskripsi', 
                'inventories.lokasi as lokasi', 
                'inventories.stok as jumlah', 
                'inventories.nama_pic as nama_pic', 
                'inventories.telp_pic as telp_pic', 
                )
            ->get();
    }   
}
