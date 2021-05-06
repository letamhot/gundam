<?php

namespace App\Imports;

use App\Models\Producer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProducerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producer([
            'name' => $row[0],
            'slug' => $row[1],
            'address' => $row[2],
            'phone' => $row[3],
            'taxCode' => $row[4],
            'image' => $row[5],
        ]);
    }
}
