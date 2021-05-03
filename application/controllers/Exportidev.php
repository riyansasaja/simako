<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') or exit('No direct script access allowed');

class Exportidev extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCetak', 'cetak');
    }

    public function cetakidevbyid($id)
    {
        $data = $this->cetak->getidevbyid($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'IDENTIFIKASI & ANALIS RISIKO');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA MANADO');
        $sheet->setCellValue('A4', $this->session->name);

        $sheet->setCellValue('A6', 'NO');
        $sheet->setCellValue('B6', 'PROGRAM');
        $sheet->setCellValue('C6', 'KEGIATAN/SUBKEGIATAN');
        $sheet->setCellValue('D6', 'BIDANG');
        $sheet->mergeCells('E6:G6');
        $sheet->setCellValue('E6', 'IDENTIFIKASI RISIKO');
        $sheet->setCellValue('E7', 'RISIKO');
        $sheet->setCellValue('F7', 'SEBAB');
        $sheet->setCellValue('G7', 'DAMPAK/AKIBAT');
        $sheet->mergeCells('H6:J6');
        $sheet->setCellValue('H7', 'SKOR KEMUNGKINAN');
        $sheet->setCellValue('I7', 'SKOR DAMPAK');
        $sheet->setCellValue('J7', 'SKOR RISIKO');

        $no = 1;
        $x = 8;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['program']);
            $sheet->setCellValue('C' . $x, $d['kegiatan']);
            $sheet->setCellValue('D' . $x, $d['name']);
            $sheet->setCellValue('E' . $x, $d['resiko']);
            $sheet->setCellValue('F' . $x, $d['sebab']);
            $sheet->setCellValue('G' . $x, $d['dampak']);
            $sheet->setCellValue('H' . $x, $d['n_kemungkinan']);
            $sheet->setCellValue('I' . $x, $d['n_dampak']);
            $sheet->setCellValue('J' . $x, $d['n_resiko']);
            $x++;
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $y = $x - 1;
        $sheet->getStyle('A6:J' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_historis_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetakidevbyunor($id)
    {
        $data = $this->cetak->getidevbyunor($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'IDENTIFIKASI & ANALIS RISIKO');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA MANADO');
        $sheet->setCellValue('A4', $this->session->name);

        $sheet->setCellValue('A6', 'NO');
        $sheet->setCellValue('B6', 'PROGRAM');
        $sheet->setCellValue('C6', 'KEGIATAN/SUBKEGIATAN');
        $sheet->mergeCells('D6:F6');
        $sheet->setCellValue('D6', 'IDENTIFIKASI RISIKO');
        $sheet->setCellValue('D7', 'RISIKO');
        $sheet->setCellValue('E7', 'SEBAB');
        $sheet->setCellValue('F7', 'DAMPAK/AKIBAT');
        $sheet->mergeCells('G6:I6');
        $sheet->setCellValue('G7', 'SKOR KEMUNGKINAN');
        $sheet->setCellValue('H7', 'SKOR DAMPAK');
        $sheet->setCellValue('I7', 'SKOR RISIKO');

        $no = 1;
        $x = 8;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['program']);
            $sheet->setCellValue('C' . $x, $d['kegiatan']);
            $sheet->setCellValue('D' . $x, $d['resiko']);
            $sheet->setCellValue('E' . $x, $d['sebab']);
            $sheet->setCellValue('F' . $x, $d['dampak']);
            $sheet->setCellValue('G' . $x, $d['n_kemungkinan']);
            $sheet->setCellValue('H' . $x, $d['n_dampak']);
            $sheet->setCellValue('I' . $x, $d['n_resiko']);
            $x++;
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $y = $x - 1;
        $sheet->getStyle('A6:I' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_historis_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
