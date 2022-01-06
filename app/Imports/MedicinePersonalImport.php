<?php

namespace App\Imports;

use App\Models\MedicinePersonal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Concerns\WithStartRow;
//use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class MedicinePersonalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicinePersonal([
            'user' => $row['user'],
            'client' => $row['client'],
            'client_type' => $row['client_type'],
            'date' => $row['date'],
            'duration' => $row['duration'],
            'type_of_call' => $row['type_of_call'],
            'external_call_score' => $row['external_call_score']
        ]);
    }

//    public function startRow(): int
//    {
//        // TODO: Implement startRow() method.
//        return 2;
//    }
//
//    public function getCsvSettings(): array
//    {
//        // TODO: Implement getCsvSettings() method.
//        return [
//            'delimiter' => ';'
//        ];
//    }
}
