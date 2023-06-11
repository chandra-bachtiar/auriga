<?php

namespace Database\Seeders;

use App\Models\BussinessUnit;
use App\Models\product;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business_unit = [
            [
                'agency_code' => 'A85',
                'business_unit' => 'DERMACOOL',
                'brand_name' => 'DERMACOOL',
                'company' => 'PT DCH AURIGA INDONESIA'
            ],
            [
                'agency_code' => 'F30',
                'business_unit' => 'GOOD PHARMA',
                'brand_name' => 'SUU BALM',
                'company' => 'PT DCH AURIGA INDONESIA'
            ],
            [
                'agency_code' => '328',
                'business_unit' => 'JAMIESON',
                'brand_name' => 'JAMIESON',
                'company' => 'PT MITRA PHARMA INDONESIA'
            ],
            [
                'agency_code' => 'C45',
                'business_unit' => 'KARCHER',
                'brand_name' => 'KARCHER',
                'company' => 'PT DCH AURIGA INDONESIA'
            ],
            [
                'agency_code' => 'C91',
                'business_unit' => 'KATADYN',
                'brand_name' => 'KATADYN',
                'company' => 'PT DCH AURIGA INDONESIA'
            ],
            [
                'agency_code' => 'E89',
                'business_unit' => 'LIFESTYLES',
                'brand_name' => 'SURETEX',
                'company' => 'PT MITRA PHARMA INDONESIA'
            ],
            [
                'agency_code' => '203',
                'business_unit' => 'STRATPHARMA',
                'brand_name' => 'STRATPHARMA',
                'company' => 'PT MITRA PHARMA INDONESIA'
            ],
            [
                'agency_code' => 'C92',
                'business_unit' => 'SWISSPRO',
                'brand_name' => 'SWISSPRO',
                'company' => 'PT DCH AURIGA INDONESIA'
            ],
            [
                'agency_code' => '701',
                'business_unit' => 'UNILEVER',
                'brand_name' => 'UNILEVER',
                'company' => 'PT DCH AURIGA INDONESIA'
            ],

        ];

        foreach ($business_unit as $bu) {
            BussinessUnit::create($bu);
        }

        $product = [
            [
                'business_unit_id' => 1,
                'item_number' => 'SA850000301',
                'sku_dch' => 'DA800301DER',
                'item_name' => 'DERMACOOL SPORTS MASK ADULT M',
                'uom' => 1,
                'cbm' => 0.0000875,
                'kgs' => 0.84,
                'price' => 40000
            ],
            [
                'business_unit_id' => 1,
                'item_number' => 'SA850000302',
                'sku_dch' => 'DA850302DER',
                'item_name' => 'DERMACOOL SPORTS MASK CHILD S',
                'uom' => 1,
                'cbm' => 0.0000875,
                'kgs' => 0.84,
                'price' => 20000
            ],
            [
                'business_unit_id' => 1,
                'item_number' => 'SA850000323',
                'sku_dch' => 'DA850323DER',
                'item_name' => 'DERMACOOL SPORTS MAKS CHILD S',
                'uom' => 1,
                'cbm' => 0.0000875,
                'kgs' => 0.84,
                'price' => 25000
            ],
            [
                'business_unit_id' => 1,
                'item_number' => 'SA850000324',
                'sku_dch' => 'DA850324DER',
                'item_name' => 'DERMACOOL SPORTS MAKS ADULT M',
                'uom' => 1,
                'cbm' => 0.0000875,
                'kgs' => 0.84,
                'price' => 45000
            ],
            [
                'business_unit_id' => 2,
                'item_number' => '101103377',
                'sku_dch' => '101103377',
                'item_name' => 'SUU BALM CREAM 75ML',
                'uom' => 48,
                'cbm' => 0.0003375,
                'kgs' => 1,
                'price' => 120000
            ],
            [
                'business_unit_id' => 2,
                'item_number' => '101103378',
                'sku_dch' => '101103378',
                'item_name' => 'SUU BALM CREAM 350ML',
                'uom' => 24,
                'cbm' => 0.00100625,
                'kgs' => 1,
                'price' => 270000
            ],
        ];

        foreach ($product as $p) {
            product::create($p);
        }

        
    }
}
