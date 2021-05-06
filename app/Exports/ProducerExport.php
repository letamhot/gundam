<?php

namespace App\Exports;

use App\Models\Producer;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProducerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Producer::all();
    }
}
