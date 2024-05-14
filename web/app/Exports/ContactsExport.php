<?php

namespace App\Exports;

use App\Models\ListContact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ContactsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'name',
            'nim',
            'progdi',
            'number'
            
        ];
    }
    public function collection()
    {
        return ListContact::all();
    }
    public function map($row): array
    {
        return [
            $row->name,
            $row->nim,
            $row->progdi,
            $row->number,
        ];
    }
}
