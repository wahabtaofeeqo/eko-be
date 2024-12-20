<?php

namespace App\Imports;

use App\Models\Family;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FamiliesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(isset($row['name']) && $row['name']) {
            return new Family([
                'fullname' => $row['name'],
                'rooms' => $row['room_type'],
                'building' => $row['building'],
                'check_in' => $row['check_in'],
                'check_out' => $row['check_out'],
                'package_type' => $row['package_type'],
                'family_size' => $row['family_size'] ?? 0,
            ]);
        }
    }
}
