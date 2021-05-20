<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') or exit('No direct script access allowed');

class Exportexcel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCetak', 'cetak');
    }
    public function cetaktkbyid($id)
    {
        $data = $this->cetak->getTkbyid($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'TUJUAN KEGIATAN');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA :');
        $sheet->setCellValue('A4', $data[0]['name']);

        $sheet->setCellValue('A5', 'NO');
        $sheet->setCellValue('B5', 'PROGRAM');
        $sheet->setCellValue('C5', 'OUTCOME PROGRAM');
        $sheet->setCellValue('D5', 'KEGIATAN');
        $sheet->setCellValue('E5', 'OUTPUT KEGIATAN');
        $sheet->setCellValue('F5', 'TUJUAN KEGIATAN');
        $no = 1;
        $x = 6;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['program']);
            $sheet->setCellValue('C' . $x, $d['outcome']);
            $sheet->setCellValue('D' . $x, $d['kegiatan']);
            $sheet->setCellValue('E' . $x, $d['output']);
            $sheet->setCellValue('F' . $x, $d['tujuan']);
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
        $sheet->getStyle('A5:F' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_tujuan_kegiatan_' . $data[0]['name'];

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetaktkbykodeunor($kodeunor)
    {
        $data = $this->cetak->getTkbykodeunor($kodeunor);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'TUJUAN KEGIATAN');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA :');
        $sheet->setCellValue('A4', $data[0]['name']);

        $sheet->setCellValue('A5', 'NO');
        $sheet->setCellValue('B5', 'PROGRAM');
        $sheet->setCellValue('C5', 'OUTCOME PROGRAM');
        $sheet->setCellValue('D5', 'KEGIATAN');
        $sheet->setCellValue('E5', 'OUTPUT KEGIATAN');
        $sheet->setCellValue('F5', 'TUJUAN KEGIATAN');
        $no = 1;
        $x = 6;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['program']);
            $sheet->setCellValue('C' . $x, $d['outcome']);
            $sheet->setCellValue('D' . $x, $d['kegiatan']);
            $sheet->setCellValue('E' . $x, $d['output']);
            $sheet->setCellValue('F' . $x, $d['tujuan']);
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
        $sheet->getStyle('A5:F' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_tujuan_kegiatan_' . $data[0]['name'];

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetaktkall()
    {
        $data = $this->cetak->getTkall();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'TUJUAN KEGIATAN');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA :');

        $sheet->setCellValue('A5', 'NO');
        $sheet->setCellValue('B5', 'OPD');
        $sheet->setCellValue('C5', 'PROGRAM');
        $sheet->setCellValue('D5', 'OUTCOME PROGRAM');
        $sheet->setCellValue('E5', 'KEGIATAN');
        $sheet->setCellValue('F5', 'OUTPUT KEGIATAN');
        $sheet->setCellValue('G5', 'TUJUAN KEGIATAN');
        $no = 1;
        $x = 6;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['name']);
            $sheet->setCellValue('C' . $x, $d['program']);
            $sheet->setCellValue('D' . $x, $d['outcome']);
            $sheet->setCellValue('E' . $x, $d['kegiatan']);
            $sheet->setCellValue('F' . $x, $d['output']);
            $sheet->setCellValue('G' . $x, $d['tujuan']);
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
        $sheet->getStyle('A5:G' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_tujuan_kegiatan_' . $data[0]['name'];

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
