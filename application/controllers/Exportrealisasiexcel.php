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
    //---- end cetak realisasi bidang


    //cetak realisasi opd
    public function cetak_realisasi_opd($id)
    {
        // $id_user = $this->session->userdata('id');
        $realisasi_kegiatan = $this->cetak->get_realisasi_kegiatan_opd($id);
        $realisasi_risiko = $this->cetak->get_realisasi_risiko_opd($id);
        $realisasi_rtp = $this->cetak->get_realisasi_rtp_opd($id);

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
        $a = 7;

        foreach ($realisasi_kegiatan as $rk) {

            # code...
            $sheet->setCellValue('A' . $a, $no++);
            $sheet->setCellValue('B' . $a, $rk['outcome']);
            $sheet->setCellValue('C' . $a, $rk['output']);
            $sheet->setCellValue('D' . $a, $rk['tujuan']);
            $sheet->setCellValue('E' . $a, $rk['realisasi_output_kegiatan']);
            $sheet->setCellValue('F' . $a, $rk['realisasi_tujuan_kegiatan']);
            $a++;
        }


        //sheet baru REALISASI RISIKO
        $spreadsheet->createSheet(1);
        $sheet1 = $spreadsheet->getSheet(1)->setTitle('Realisasi RISIKO');
        $sheet1->setCellValue('A1', 'REALISASI RESIKO');
        $sheet1->setCellValue('A3', $this->session->name);
        $sheet1->mergeCells('A5:A6');
        $sheet1->setCellValue('A5', 'NO');
        $sheet1->mergeCells('B5:B6');
        $sheet1->setCellValue('B5', 'NAMA BIDANG');
        $sheet1->mergeCells('C5:C6');
        $sheet1->setCellValue('C5', 'KEGIATAN');
        $sheet1->mergeCells('D5:F5');
        $sheet1->setCellValue('D5', 'IDENTIFIKASI RISIKO');
        $sheet1->mergeCells('G5:I5');
        $sheet1->setCellValue('G5', 'REALISASI RISIKO');

        $sheet1->setCellValue('D6', 'RISIKO');
        $sheet1->setCellValue('E6', 'SEBAB');
        $sheet1->setCellValue('F6', 'DAMPAK/AKIBAT');
        $sheet1->setCellValue('G6', 'RISIKO');
        $sheet1->setCellValue('H6', 'SEBAB');
        $sheet1->setCellValue('I6', 'DAMPAK/AKIBAT');


        $no = 1;
        $b = 7;

        foreach ($realisasi_risiko as $rr) {

            # code...
            $sheet1->setCellValue('A' . $b, $no++);
            $sheet1->setCellValue('B' . $b, $rr['name']);
            $sheet1->setCellValue('C' . $b, $rr['kegiatan']);
            $sheet1->setCellValue('D' . $b, $rr['resiko']);
            $sheet1->setCellValue('E' . $b, $rr['sebab']);
            $sheet1->setCellValue('F' . $b, $rr['dampak']);
            $sheet1->setCellValue('G' . $b, $rr['realisasi_resiko']);
            $sheet1->setCellValue('H' . $b, $rr['realisasi_sebab']);
            $sheet1->setCellValue('I' . $b, $rr['realisasi_dampak']);
            $b++;
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
        $sheet2->setCellValue('B5', 'BIDANG');
        $sheet2->mergeCells('C5:C6');
        $sheet2->setCellValue('B5', 'RISIKO');
        $sheet2->mergeCells('D5:F5');
        $sheet2->setCellValue('D5', 'RENCANA TINDAK PENGENDALIAN (RTP)');
        $sheet2->mergeCells('G5:I5');
        $sheet2->setCellValue('G5', 'REALISASI RTP');

        $sheet2->setCellValue('D6', 'URAIAN');
        $sheet2->setCellValue('E6', 'TARGET_WAKTU');
        $sheet2->setCellValue('F6', 'PJ');
        $sheet2->setCellValue('G6', 'URAIAN');
        $sheet2->setCellValue('H6', 'TARGET_WAKTU');
        $sheet2->setCellValue('I6', 'PJ');


        $no = 1;
        $c = 7;

        foreach ($realisasi_rtp as $rrtp) {

            # code...
            $sheet2->setCellValue('A' . $c, $no++);
            $sheet2->setCellValue('B' . $c, $rrtp['name']);
            $sheet2->setCellValue('C' . $c, $rrtp['resiko']);
            $sheet2->setCellValue('D' . $c, $rrtp['uraian_rtp']);
            $sheet2->setCellValue('E' . $c, $rrtp['target_waktu']);
            $sheet2->setCellValue('F' . $c, $rrtp['pj']);
            $sheet2->setCellValue('G' . $c, $rrtp['realisasi_uraian']);
            $sheet2->setCellValue('H' . $c, $rrtp['realisasi_target_waktu']);
            $sheet2->setCellValue('I' . $c, $rrtp['realisasi_pj']);
            $c++;
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
        $x = $a - 1;
        $y = $b - 1;
        $z = $c - 1;
        $sheet->getStyle('A5:F' . $x)->applyFromArray($styleArray);
        $sheet1->getStyle('A5:I' . $y)->applyFromArray($styleArray);
        $sheet2->getStyle('A5:I' . $z)->applyFromArray($styleArray);

        //-----end border

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_realisasi_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    //-- end cetak realisasi OPD

    //cetak realisasi All (khusus asda dan inspektorat)
    public function cetak_realisasi_all()
    {
        // $id_user = $this->session->userdata('id');
        $realisasi_kegiatan = $this->cetak->get_realisasi_kegiatan_all();
        $realisasi_risiko = $this->cetak->get_realisasi_risiko_all();
        $realisasi_rtp = $this->cetak->get_realisasi_rtp_all();

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
        $sheet->mergeCells('B5:B6');
        $sheet->setCellValue('B5', 'NAMA OPD');
        $sheet->mergeCells('C5:E5');
        $sheet->setCellValue('C5', 'TARGET/RENCANA');
        $sheet->mergeCells('F5:G5');
        $sheet->setCellValue('F5', 'REALISASI');
        $sheet->setCellValue('C6', 'OUTCOME PROGRAM');
        $sheet->setCellValue('D6', 'OUTPUT KEGIATAN');
        $sheet->setCellValue('E6', 'TUJUAN KEGIATAN');
        $sheet->setCellValue('F6', 'OUTPUT KEGIATAN');
        $sheet->setCellValue('G6', 'TUJUAN KEGIATAN');

        $no = 1;
        $a = 7;

        foreach ($realisasi_kegiatan as $rk) {

            # code...
            $sheet->setCellValue('A' . $a, $no++);
            $sheet->setCellValue('B' . $a, $rk['name']);
            $sheet->setCellValue('C' . $a, $rk['outcome']);
            $sheet->setCellValue('D' . $a, $rk['output']);
            $sheet->setCellValue('E' . $a, $rk['tujuan']);
            $sheet->setCellValue('F' . $a, $rk['realisasi_output_kegiatan']);
            $sheet->setCellValue('G' . $a, $rk['realisasi_tujuan_kegiatan']);
            $a++;
        }


        //sheet baru REALISASI RISIKO
        $spreadsheet->createSheet(1);
        $sheet1 = $spreadsheet->getSheet(1)->setTitle('Realisasi RISIKO');
        $sheet1->setCellValue('A1', 'REALISASI RESIKO');
        $sheet1->setCellValue('A3', $this->session->name);
        $sheet1->mergeCells('A5:A6');
        $sheet1->setCellValue('A5', 'NO');
        $sheet1->mergeCells('B5:B6');
        $sheet1->setCellValue('B5', 'NAMA OPD');
        $sheet1->mergeCells('C5:C6');
        $sheet1->setCellValue('C5', 'KEGIATAN');
        $sheet1->mergeCells('D5:F5');
        $sheet1->setCellValue('D5', 'IDENTIFIKASI RISIKO');
        $sheet1->mergeCells('G5:I5');
        $sheet1->setCellValue('G5', 'REALISASI RISIKO');

        $sheet1->setCellValue('D6', 'RISIKO');
        $sheet1->setCellValue('E6', 'SEBAB');
        $sheet1->setCellValue('F6', 'DAMPAK/AKIBAT');
        $sheet1->setCellValue('G6', 'RISIKO');
        $sheet1->setCellValue('H6', 'SEBAB');
        $sheet1->setCellValue('I6', 'DAMPAK/AKIBAT');


        $no = 1;
        $b = 7;

        foreach ($realisasi_risiko as $rr) {

            # code...
            $sheet1->setCellValue('A' . $b, $no++);
            $sheet1->setCellValue('B' . $b, $rr['name']);
            $sheet1->setCellValue('C' . $b, $rr['kegiatan']);
            $sheet1->setCellValue('D' . $b, $rr['resiko']);
            $sheet1->setCellValue('E' . $b, $rr['sebab']);
            $sheet1->setCellValue('F' . $b, $rr['dampak']);
            $sheet1->setCellValue('G' . $b, $rr['realisasi_resiko']);
            $sheet1->setCellValue('H' . $b, $rr['realisasi_sebab']);
            $sheet1->setCellValue('I' . $b, $rr['realisasi_dampak']);
            $b++;
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
        $sheet2->setCellValue('B5', 'NAMA OPD');
        $sheet2->mergeCells('C5:C6');
        $sheet2->setCellValue('B5', 'RISIKO');
        $sheet2->mergeCells('D5:F5');
        $sheet2->setCellValue('D5', 'RENCANA TINDAK PENGENDALIAN (RTP)');
        $sheet2->mergeCells('G5:I5');
        $sheet2->setCellValue('G5', 'REALISASI RTP');

        $sheet2->setCellValue('D6', 'URAIAN');
        $sheet2->setCellValue('E6', 'TARGET_WAKTU');
        $sheet2->setCellValue('F6', 'PJ');
        $sheet2->setCellValue('G6', 'URAIAN');
        $sheet2->setCellValue('H6', 'TARGET_WAKTU');
        $sheet2->setCellValue('I6', 'PJ');


        $no = 1;
        $c = 7;

        foreach ($realisasi_rtp as $rrtp) {

            # code...
            $sheet2->setCellValue('A' . $c, $no++);
            $sheet2->setCellValue('B' . $c, $rrtp['name']);
            $sheet2->setCellValue('C' . $c, $rrtp['resiko']);
            $sheet2->setCellValue('D' . $c, $rrtp['uraian_rtp']);
            $sheet2->setCellValue('E' . $c, $rrtp['target_waktu']);
            $sheet2->setCellValue('F' . $c, $rrtp['pj']);
            $sheet2->setCellValue('G' . $c, $rrtp['realisasi_uraian']);
            $sheet2->setCellValue('H' . $c, $rrtp['realisasi_target_waktu']);
            $sheet2->setCellValue('I' . $c, $rrtp['realisasi_pj']);
            $c++;
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
        $x = $a - 1;
        $y = $b - 1;
        $z = $c - 1;
        $sheet->getStyle('A5:F' . $x)->applyFromArray($styleArray);
        $sheet1->getStyle('A5:I' . $y)->applyFromArray($styleArray);
        $sheet2->getStyle('A5:I' . $z)->applyFromArray($styleArray);

        //-----end border

        $writer = new Xlsx($spreadsheet);
        $filename = 'report_realisasi_' . $this->session->name;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    //-- end cetak realisasi OPD
}
