<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') or exit('No direct script access allowed');

class Exportrealisasiexcel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCetak', 'cetak');
    }

    public function cetak_realisasi_bidang($id)
    {
        // $id_user = $this->session->userdata('id');
        $realisasi_kegiatan = $this->db->get_where('tb_tujuan_kegiatan', ['kode_unor' => $id])->result_array();
        $realisasi_risiko = $this->cetak->get_realisasi_risiko($id);
        $realisasi_rtp = $this->cetak->get_realisasi_rtp($id);

        // var_dump($realisasi_kegiatan);
        // var_dump($realisasi_risiko);
        // var_dump($realisasi_rtp);
        // die;

        $spreadsheet = new Spreadsheet();
        $spreadsheet->createSheet(0);
        $sheet = $spreadsheet->getSheet(0)->setTitle('Realisasi Program');
        $spreadsheet->setActiveSheetIndex(0);

        $sheet->setCellValue('A1', 'REALISASI TUJUAN KEGIATAN');
        $sheet->setCellValue('A3', $this->session->name);
        $sheet->mergeCells('A5:A6');
        $sheet->setCellValue('A5', 'NO');
        $sheet->mergeCells('B5:D5');
        $sheet->setCellValue('B5', 'TARGET/RENCANA');
        $sheet->mergeCells('E5:F5');
        $sheet->setCellValue('E5', 'REALISASI');
        $sheet->setCellValue('B6', 'OUTCOME PROGRAM');
        $sheet->setCellValue('C6', 'OUTPUT KEGIATAN');
        $sheet->setCellValue('D6', 'TUJUAN KEGIATAN');
        $sheet->setCellValue('E6', 'OUTPUT KEGIATAN');
        $sheet->setCellValue('F6', 'TUJUAN KEGIATAN');

        $no = 1;
        $x = 7;

        foreach ($realisasi_kegiatan as $rk) {

            # code...
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $rk['outcome']);
            $sheet->setCellValue('C' . $x, $rk['output']);
            $sheet->setCellValue('D' . $x, $rk['tujuan']);
            $sheet->setCellValue('E' . $x, $rk['realisasi_output_kegiatan']);
            $sheet->setCellValue('F' . $x, $rk['realisasi_tujuan_kegiatan']);
            $x++;
        }


        //sheet baru REALISASI RISIKO
        $spreadsheet->createSheet(1);
        $sheet1 = $spreadsheet->getSheet(1)->setTitle('Realisasi RISIKO');
        $sheet1->setCellValue('A1', 'REALISASI RESIKO');
        $sheet1->setCellValue('A3', $this->session->name);
        $sheet1->mergeCells('A5:A6');
        $sheet1->setCellValue('A5', 'NO');
        $sheet1->mergeCells('B5:B6');
        $sheet1->setCellValue('B5', 'KEGIATAN');
        $sheet1->mergeCells('C5:E5');
        $sheet1->setCellValue('C5', 'IDENTIFIKASI RISIKO');
        $sheet1->mergeCells('F5:H5');
        $sheet1->setCellValue('F5', 'REALISASI RISIKO');

        $sheet1->setCellValue('C6', 'RISIKO');
        $sheet1->setCellValue('D6', 'SEBAB');
        $sheet1->setCellValue('E6', 'DAMPAK/AKIBAT');
        $sheet1->setCellValue('F6', 'RISIKO');
        $sheet1->setCellValue('G6', 'SEBAB');
        $sheet1->setCellValue('H6', 'DAMPAK/AKIBAT');


        $no = 1;
        $x = 7;

        foreach ($realisasi_risiko as $rr) {

            # code...
            $sheet1->setCellValue('A' . $x, $no++);
            $sheet1->setCellValue('B' . $x, $rr['kegiatan']);
            $sheet1->setCellValue('C' . $x, $rr['resiko']);
            $sheet1->setCellValue('D' . $x, $rr['sebab']);
            $sheet1->setCellValue('E' . $x, $rr['dampak']);
            $sheet1->setCellValue('F' . $x, $rr['realisasi_resiko']);
            $sheet1->setCellValue('G' . $x, $rr['realisasi_sebab']);
            $sheet1->setCellValue('H' . $x, $rr['realisasi_dampak']);
            $x++;
        }

        //-----


        //sheet baru REALISASI RTP
        $spreadsheet->createSheet(2);
        $sheet2 = $spreadsheet->getSheet(2)->setTitle('Realisasi RTP');
        $sheet2->setCellValue('A1', 'REALISASI RTP');
        $sheet2->setCellValue('A3', $this->session->name);
        $sheet2->mergeCells('A5:A6');
        $sheet2->setCellValue('A5', 'NO');
        $sheet2->mergeCells('B5:B6');
        $sheet2->setCellValue('B5', 'RISIKO');
        $sheet2->mergeCells('C5:E5');
        $sheet2->setCellValue('C5', 'RENCANA TINDAK PENGENDALIAN (RTP)');
        $sheet2->mergeCells('F5:H5');
        $sheet2->setCellValue('F5', 'REALISASI RTP');

        $sheet2->setCellValue('C6', 'URAIAN');
        $sheet2->setCellValue('D6', 'TARGET_WAKTU');
        $sheet2->setCellValue('E6', 'PJ');
        $sheet2->setCellValue('F6', 'URAIAN');
        $sheet2->setCellValue('G6', 'TARGET_WAKTU');
        $sheet2->setCellValue('H6', 'PJ');


        $no = 1;
        $x = 7;

        foreach ($realisasi_rtp as $rrtp) {

            # code...
            $sheet2->setCellValue('A' . $x, $no++);
            $sheet2->setCellValue('B' . $x, $rrtp['resiko']);
            $sheet2->setCellValue('C' . $x, $rrtp['uraian_rtp']);
            $sheet2->setCellValue('D' . $x, $rrtp['target_waktu']);
            $sheet2->setCellValue('E' . $x, $rrtp['pj']);
            $sheet2->setCellValue('F' . $x, $rrtp['realisasi_uraian']);
            $sheet2->setCellValue('G' . $x, $rrtp['realisasi_target_waktu']);
            $sheet2->setCellValue('H' . $x, $rrtp['realisasi_pj']);
            $x++;
        }

        //-----




        //untuk border
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $y = $x - 1;
        $sheet->getStyle('A5:F' . $y)->applyFromArray($styleArray);
        $sheet1->getStyle('A5:H' . $y)->applyFromArray($styleArray);
        $sheet2->getStyle('A5:H' . $y)->applyFromArray($styleArray);

        //-----end border

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_realisasi_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    //tambah komen
}
