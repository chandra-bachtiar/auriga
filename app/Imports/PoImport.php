<?php

namespace App\Imports;

use App\Models\po;
use Maatwebsite\Excel\Concerns\ToModel;

class PoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new po([
            'id_po'     => $row[0],
            'id_bu'    => $row[1],
            'no_order' => $row[2],
            'customer_name' => $row[3],
            'address' => $row[4],
            'phone' => $row[5],
            'sales' => $row[6],
            'approval' => $row[7],
            'date' => $row[8],
            'order_type' => $row[9],
            'remarks' => $row[10],
            'grand_total' => $row[11]
        ]);
    }
}
