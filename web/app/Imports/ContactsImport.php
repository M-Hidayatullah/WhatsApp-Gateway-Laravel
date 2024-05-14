<?php

namespace App\Imports;

use App\Models\ListContact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class ContactsImport implements ToModel, WithUpserts, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function uniqueBy()
    {
        return 'number';
    }

    public function model(array $row)
    {
        return new ListContact([
            'name' => $row[0],
            'number' => $row[1]
        ]);
    }

    public function rules(): array
    {
        return [
            '1' => 'starts_with:62'
        ];
    }

    public function customValidationMessages()
    {
        return [
            '1' => 'Terdapat number yang tidak berawalan dari 62 silahkan periksa kembali!'
        ];
    }
}
