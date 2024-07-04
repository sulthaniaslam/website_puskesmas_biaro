<?php

namespace App\Exports;

// use Illuminate\Contracts\View\View;
// use Illuminate\Support\Facades\Http;
// use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

// class SkmExport implements FromCollection
// class SKMExport implements FromView
class SKMExport implements FromArray, WithHeadings, WithColumnFormatting

{
    /**
     * @return \Illuminate\Support\Collection
     */

    // public function collection()
    // {
    //     $response = Http::get('https://aku.com/api/ajaxCountSurveyor');
    //     $response->json();
    //     $Data = $response->json();

    //     return $Data;
    // }


    // public function view(): View
    // {
    //     $response = Http::get('https://rangkiang.agamkab.go.id/api/ikm/ajaxCountSurveyor?kode_instansi=PS-1');
    //     $response->json();
    //     $Data = $response->json();
    //     $allData = $Data['allData'];
    //     return view('backend.laporan.exel', [
    //         'allData' => $allData
    //     ]);
    // }


    protected $formSa;

    public function __construct(array $formSa)
    {
        $this->formSa = $formSa;
    }

    public function array(): array
    {
        return $this->formSa;
    }

    public function headings(): array
    {
        return ["Master Status FU", "Master Input Tanggal(Waktu FU Terakhir, Tanggal Next Follow)", "Master Media Follow UP", "Biaya Actual Service"];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
