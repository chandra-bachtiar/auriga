<?php

namespace App\Exports;

use App\Models\po;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PoExport implements FromView,WithColumnWidths,ShouldAutoSize,WithStyles,WithDrawings
{
    protected $emailData;

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 17,
            'C' => 17,
            'D' => 45,
            'E' => 7,
            'F' => 13,
            'G' => 13,
            'H' => 11,
            'I' => 9,
            'J' => 22
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Company Logo');
        $drawing->setPath(public_path('img/brand/HRM.png'));
        $drawing->setCoordinates('A1');
        $drawing->setOffsetX(100);
        $drawing->setOffsetY(5);
        $drawing->setWidth(60);
        $drawing->setHeight(50);

        return [$drawing];
    }

    public function styles(Worksheet $sheet)
    {
        $columnHeader1 = 'A1:J1';
        $columnHeader2 = 'F2:J2';
        $lastColumn = $sheet->getHighestColumn();
        $range = 'A1:' . $lastColumn . $sheet->getHighestRow();
        $sheet->getStyle($columnHeader1)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('b1a0c7');
        $sheet->getStyle($columnHeader2)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('b1a0c7');
        $sheet->getStyle($columnHeader1)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnHeader2)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($range)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);
        $sheet->getStyle($columnHeader1)->getFont()->setBold(true);
        $sheet->getStyle($columnHeader2)->getFont()->setBold(true);
        $sheet->getStyle($columnHeader1)->getFont()->setSize(12);
        $sheet->getStyle($columnHeader2)->getFont()->setSize(12);
    }

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('purchaseorder.excel.template_Excel_PO',['data'=>$this->emailData])->with('startCell', 'A5');
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class  => function(AfterSheet $event) {
    //             $cellRange = 'A1:J1'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(30);
    //         },
    //     ];
    // }
}
