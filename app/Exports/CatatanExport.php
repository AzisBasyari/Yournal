<?php

namespace App\Exports;

use App\Models\Catatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CatatanExport implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export', [
            'catatans' => Catatan::all(),
            "no" => 1
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'G' => 100          
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:G1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('80B5DF');
        $sheet->getStyle('A1:G1')->getFont()->getColor()->setARGB('ffffff');
        $sheet->getStyle('G')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A:F')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A:F')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }
}
