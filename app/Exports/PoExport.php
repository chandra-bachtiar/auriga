<?php

namespace App\Exports;

use App\Models\po;
use Maatwebsite\Excel\Concerns\FromCollection;

class PoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return po::join('po_details','po_details.id_po','=','pos.id_po')->get();
    }
}
