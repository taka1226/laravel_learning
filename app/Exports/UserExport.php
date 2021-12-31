<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $columns;
    public function __construct($columns)
    {
        $this->columns = $columns;
    }
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return $this->columns;
    }

    public function map($row): array
    {
        $columns_to_row = [
            'id' => $row->id,
            'name' => $row->name,
            'email' => $row->email
        ];

        $rows = array_map(fn($value): string => $columns_to_row[$value], $this->columns);
        return $rows;
    }
}
