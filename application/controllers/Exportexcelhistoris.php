<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') or exit('No direct script access allowed');

class Exportexcelhistoris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCetak', 'cetak');
    }

    public function cetakhistorisbyid($id)
    {
        $data = $this->cetak->gethistorisbyid($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'DATA HISTORIS RESIKO');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA MANADO');
        $sheet->setCellValue('A4', $this->session->name);

        $sheet->setCellValue('A5', 'NO');
        $sheet->mergeCells('B5:G5');
        $sheet->mergeCells('H5:J5');
        $sheet->setCellValue('B5', 'URAIAN TEMUAN/PERMASALAHAN/KETERJADIAN RISIKO');
        $sheet->setCellValue('H5', 'URAIAN RISIKO');
        $sheet->setCellValue('B6', 'KONDISI');
        $sheet->setCellValue('C6', 'SEBAB');
        $sheet->setCellValue('D6', 'AKIBAT');
        $sheet->setCellValue('E6', 'SARAN');
        $sheet->setCellValue('F6', 'SUMBER DATA');
        $sheet->setCellValue('G6', 'TINDAK LANJUT');
        $sheet->setCellValue('H6', 'RESIKO');
        $sheet->setCellValue('I6', 'SEBAB');
        $sheet->setCellValue('J6', 'DAMPAK');
        $no = 1;
        $x = 7;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['kondisi']);
            $sheet->setCellValue('C' . $x, $d['sebab_uraian']);
            $sheet->setCellValue('D' . $x, $d['akibat']);
            $sheet->setCellValue('E' . $x, $d['saran']);
            $sheet->setCellValue('F' . $x, $d['sumber_data']);
            if ($d['tindak_lanjut'] == 1) {
                # code...
                $sheet->setCellValue('G' . $x, 'Sudah');
            } else {
                $sheet->setCellValue('G' . $x, 'Belum');
            }
            $sheet->setCellValue('H' . $x, $d['pernyataan_resiko']);
            $sheet->setCellValue('I' . $x, $d['sebab']);
            $sheet->setCellValue('J' . $x, $d['dampak']);
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
        $sheet->getStyle('A5:J' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_historis_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetakhistorisall()
    {
        $data = $this->cetak->gethistorisall();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'DATA KOMPILASI HISTORIS RESIKO');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA MANADO');

        $sheet->mergeCells('A5:A6');
        $sheet->setCellValue('A5', 'NO');
        $sheet->mergeCells('B5:B6');
        $sheet->setCellValue('B5', 'OPD');
        $sheet->mergeCells('C5:H5');
        $sheet->mergeCells('I5:K5');
        $sheet->setCellValue('C5', 'URAIAN TEMUAN/PERMASALAHAN/KETERJADIAN RISIKO');
        $sheet->setCellValue('I5', 'URAIAN RISIKO');
        $sheet->setCellValue('C6', 'KONDISI');
        $sheet->setCellValue('D6', 'SEBAB');
        $sheet->setCellValue('E6', 'AKIBAT');
        $sheet->setCellValue('F6', 'SARAN');
        $sheet->setCellValue('G6', 'SUMBER DATA');
        $sheet->setCellValue('H6', 'TINDAK LANJUT');
        $sheet->setCellValue('I6', 'RESIKO');
        $sheet->setCellValue('J6', 'SEBAB');
        $sheet->setCellValue('K6', 'DAMPAK');
        $no = 1;
        $x = 7;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['name']);
            $sheet->setCellValue('C' . $x, $d['kondisi']);
            $sheet->setCellValue('D' . $x, $d['sebab_uraian']);
            $sheet->setCellValue('E' . $x, $d['akibat']);
            $sheet->setCellValue('F' . $x, $d['saran']);
            $sheet->setCellValue('G' . $x, $d['sumber_data']);
            if ($d['tindak_lanjut'] == 1) {
                # code...
                $sheet->setCellValue('H' . $x, 'Sudah');
            } else {
                $sheet->setCellValue('H' . $x, 'Belum');
            }
            $sheet->setCellValue('I' . $x, $d['pernyataan_resiko']);
            $sheet->setCellValue('J' . $x, $d['sebab']);
            $sheet->setCellValue('K' . $x, $d['dampak']);
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
        $sheet->getStyle('A5:K' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_historis_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        //tambah komen
    }
}
