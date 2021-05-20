<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') or exit('No direct script access allowed');

class Exportexcelrtp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCetak', 'cetak');
    }

    public function cetakrtpbyid($id)
    {
        $data = $this->cetak->getRtpbyid($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'KOMPILASI RTP');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA :');
        $sheet->setCellValue('A4', $this->session->name);

        $sheet->setCellValue('A5', 'NO');
        $sheet->setCellValue('B5', 'BIDANG');
        $sheet->setCellValue('C5', 'PROGRAM');
        $sheet->setCellValue('D5', 'KEGIATAN');
        $sheet->setCellValue('E5', 'RESIKO');
        $sheet->setCellValue('F5', 'URAIAN RTP');
        $sheet->setCellValue('G5', 'TARGET WAKTU RTP');
        $sheet->setCellValue('H5', 'PJ RTP');
        $sheet->setCellValue('I5', 'KETERANGAN');
        $no = 1;
        $x = 6;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['name']);
            $sheet->setCellValue('C' . $x, $d['program']);
            $sheet->setCellValue('D' . $x, $d['kegiatan']);
            $sheet->setCellValue('E' . $x, $d['resiko']);
            $sheet->setCellValue('F' . $x, $d['uraian_pengendalian']);
            $sheet->setCellValue('G' . $x, $d['target_waktu']);
            $sheet->setCellValue('H' . $x, $d['pj']);
            $sheet->setCellValue('I' . $x, $d['keterangan']);
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
        $sheet->getStyle('A5:I' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_RTP_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetakrtpbykodeunor($kodeunor)
    {
        $data = $this->cetak->getRtpbykodeunor($kodeunor);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'KOMPILASI RTP');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA :');
        $sheet->setCellValue('A4', $this->session->name);

        $sheet->setCellValue('A5', 'NO');
        $sheet->setCellValue('B5', 'PROGRAM');
        $sheet->setCellValue('C5', 'KEGIATAN');
        $sheet->setCellValue('D5', 'RESIKO');
        $sheet->setCellValue('E5', 'URAIAN RTP');
        $sheet->setCellValue('F5', 'TARGET WAKTU RTP');
        $sheet->setCellValue('G5', 'PJ RTP');
        $sheet->setCellValue('H5', 'KETERANGAN');
        $no = 1;
        $x = 6;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['program']);
            $sheet->setCellValue('C' . $x, $d['kegiatan']);
            $sheet->setCellValue('D' . $x, $d['resiko']);
            $sheet->setCellValue('E' . $x, $d['uraian_pengendalian']);
            $sheet->setCellValue('F' . $x, $d['target_waktu']);
            $sheet->setCellValue('G' . $x, $d['pj']);
            $sheet->setCellValue('H' . $x, $d['keterangan']);
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
        $sheet->getStyle('A5:H' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_RTP_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function cetakrtpall()
    {
        $data = $this->cetak->getRtpall();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'KOMPILASI RTP');
        $sheet->setCellValue('A3', 'PEMERINTAH KOTA :');
        $sheet->setCellValue('A4', $this->session->name);

        $sheet->setCellValue('A5', 'NO');
        $sheet->setCellValue('B5', 'PERANGKAT DAERAH');
        $sheet->setCellValue('C5', 'PROGRAM');
        $sheet->setCellValue('D5', 'KEGIATAN');
        $sheet->setCellValue('E5', 'RESIKO');
        $sheet->setCellValue('F5', 'URAIAN RTP');
        $sheet->setCellValue('G5', 'TARGET WAKTU RTP');
        $sheet->setCellValue('H5', 'PJ RTP');
        $sheet->setCellValue('I5', 'KETERANGAN');
        $no = 1;
        $x = 6;

        foreach ($data as $d) {
            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $d['name']);
            $sheet->setCellValue('C' . $x, $d['program']);
            $sheet->setCellValue('D' . $x, $d['kegiatan']);
            $sheet->setCellValue('E' . $x, $d['resiko']);
            $sheet->setCellValue('F' . $x, $d['uraian_pengendalian']);
            $sheet->setCellValue('G' . $x, $d['target_waktu']);
            $sheet->setCellValue('H' . $x, $d['pj']);
            $sheet->setCellValue('I' . $x, $d['keterangan']);
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
        $sheet->getStyle('A5:I' . $y)->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_RTP_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
