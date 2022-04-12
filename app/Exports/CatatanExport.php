<?php

namespace App\Exports;

use App\Models\Catatan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CatatanExport implements FromQuery, ShouldAutoSize, WithStyles, WithColumnWidths, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Catatan::query()->whereBelongsTo(auth()->user());
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Jam',
            'Nama Tempat',
            'Alamat',
            'Suhu Tubuh',
            'Deskripsi'
        ];
    }

    public function map($catatan): array
    {
        return [
            $catatan->tanggal_perjalanan,
            $catatan->jam_perjalanan,
            $catatan->nama_tempat,
            $catatan->alamat,
            $catatan->suhu_tubuh,
            $catatan->deskripsi,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'F' => 100
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('80b5df');
        $sheet->getStyle('A1:F1')->getFont()->getColor()->setARGB('ffffff');
        $sheet->getStyle('F')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A:E')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A:E')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }
}
