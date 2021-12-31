<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Person;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Validation\Validator;

class PeopleImport implements ToCollection,  WithStartRow
{
    /**
    * @param Collection $collection
    */

    public static $startRow = 2;

    public function collection(Collection $collection)
    {
        // Validator::make($collection->toArray(), [
        //     '*.0' => "required|string", //name
        //     '*.1' => 'required|unique:users', //email
        //     '*.2' => 'required|min:0|max:90'
        // ])->validate();

        foreach ($collection as $row){
            Person::create([
                'name' => $row[0],
                'mail' => $row[1],
                'age' => $row[2]
            ]);
        }
    }

    public function startRow(): int
    {
        return self::$startRow;
    }
}
