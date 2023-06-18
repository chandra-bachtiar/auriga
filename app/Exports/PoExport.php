<?php

namespace App\Exports;

use App\Models\po;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Sheet;
use Illuminate\Contracts\View\View;


class PoExport implements FromView,WithColumnWidths,ShouldAutoSize,WithStyles,WithDrawings,WithEvents
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
        $drawing->setCoordinates('J1');
        $drawing->setOffsetX(-27);
        $drawing->setOffsetY(8);
        $drawing->setWidth(50);
        $drawing->setHeight(40);

        return [$drawing];
    }

    public function styles(Worksheet $sheet)
    {
        $columnHeader1    = 'A2:J2';
        $columnHeader2    = 'F3:J3';
        $columnItemNumber = 'B4:B200';
        $columnSkuDCH     = 'C4:C200';
        $columnExclude    = 'F4:F200';
        $columnInclude    = 'G4:G200';
        $columnValue      = 'J4:J200';
        $columnNumber     = 'A';
        $columnKop        = 'A1';
        $lastColumn = $sheet->getHighestColumn();
        $range = 'A2:' . $lastColumn . $sheet->getHighestRow();
        $sheet->getStyle($columnHeader1)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('b1a0c7');
        $sheet->getStyle($columnHeader2)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('b1a0c7');
        $sheet->getStyle($columnHeader1)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnHeader2)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnKop)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getStyle($columnItemNumber)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnSkuDCH)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnExclude)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnInclude)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnValue)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT)->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($columnNumber)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        
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
        $sheet->getStyle($columnKop)->getFont()->setBold(true);
        $sheet->getStyle($columnKop)->getFont()->setSize(15);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(45);
            },
        ];
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
        return view('purchaseorder.excel.template_Excel_PO',['data'=>$this->emailData]);
    }
}
