<?php

namespace App\Controllers;

use App\Models\model_nomor_surat\NomorsuratModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Nomor_surat extends BaseController
{
    protected $nomorsuratmodel;
    public function __construct()
    {
        $this->nomorsuratmodel = new NomorsuratModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Nomor Surat | APLIKASI BPRMGR',
            'nomor_surat' => $this->nomorsuratmodel->getAllnomorsurat()
        ];

        echo view('/nomor_surat/index', $data);
    }

    public function penomoran()
    {
        $data = [
            'title' => 'Nomor Surat | APLIKASI BPRMGR',
            'tanggal_sekarang' => $this->tanggal->toLocalizedString('dd MMMM yyyy'),
            'validation' => \Config\Services::validation()
        ];

        echo view('/nomor_surat/penomoran', $data);
    }

    public function addnomor()
    {
        // ===== Validasi ======= 
        if (!$this->validate([
            'perihal_surat' => [
                'rules' => 'required|is_unique[tabel_nomor_surat.perihal_surat]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah ada!'
                ]
            ],
            'tujuan_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        // =======================

        $count_last_row = $this->nomorsuratmodel->getLastcountsurat();
        $tahun_last_row = $this->nomorsuratmodel->getLasttahunsurat();
        $tahun_sekarang = date('y');
        $bulan_sekarang = sprintf("%02d", date('n'));
        $count = $count_last_row + 1;
        $count_sekarang = sprintf("%03d", $count);

        if ($tahun_last_row != $tahun_sekarang) {
            $count_sekarang = sprintf("%03d", 1);
        }

        $nomor_baru = $count_sekarang . "/EXT/MGR/" . $bulan_sekarang  . $tahun_sekarang;

        $this->nomorsuratmodel->save([
            'id' => "",
            'count' => $count_sekarang,
            'nomor_surat' => $nomor_baru,
            'tahun' => $tahun_sekarang,
            'perihal_surat' => $this->request->getVar('perihal_surat'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'id_pegawai' => $this->request->getVar('id_pegawai'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'department_pegawai' => $this->request->getVar('department_pegawai'),
            'tanggal_dibuat' => $this->request->getVar('tanggal'),
            'konfirmasi' => 1
        ]);

        return redirect()->to('/nomor_surat/nomor_baru');
    }

    public function edit_digunakan($id)
    {
        $data = $this->nomorsuratmodel->getNomorsurat($id);
        $nomor = $data['nomor_surat'];
        $this->nomorsuratmodel->save([
            'id' => $id,
            'konfirmasi' => 1
        ]);
        session()->setFlashdata('pesan_edit', "Status penomoran berhasil diubah, Nomor Surat $nomor digunakan");
        return redirect()->to('/nomor_surat');
    }

    public function edit_tidak_digunakan($id)
    {
        $data = $this->nomorsuratmodel->getNomorsurat($id);
        $nomor = $data['nomor_surat'];
        // dd($nomor);
        $this->nomorsuratmodel->save([
            'id' => $id,
            'konfirmasi' => 0
        ]);
        session()->setFlashdata('pesan_edit', "Status penomoran berhasil diubah, Nomor Surat $nomor tidak digunakan");
        return redirect()->to('/nomor_surat');
    }

    public function nomor_baru()
    {
        $data = [
            'title' => 'Nomor Surat | APLIKASI BPRMGR',
            'nomor_baru' => $this->nomorsuratmodel->getLastnomorsurat(),
            'surat_baru' => $this->nomorsuratmodel->getLastsurat(),
            'tanggal_sekarang' => $this->tanggal->toLocalizedString('dd MMMM yyyy')
        ];

        echo view('/nomor_surat/nomor_baru', $data);
    }

    public function cetak_surat()
    {
        $data = [
            'title' => 'Nomor Surat | APLIKASI BPRMGR',
            'nomor_baru' => $this->nomorsuratmodel->getLastnomorsurat(),
            'surat_baru' => $this->nomorsuratmodel->getLastsurat(),
            'tanggal_sekarang' => $this->tanggal->toLocalizedString('dd MMMM yyyy')
        ];

        echo view('/nomor_surat/cetak_surat', $data);
    }

    public function cetak_spengantar()
    {
        $cetak_surat_pengantar = new \PhpOffice\PhpWord\TemplateProcessor('template_surat/surat_pengantar.docx');
        $cetak_surat_pengantar->setValues([
            'nomor_surat_pengantar' => $this->request->getVar('nomor_surat_pengantar'),
            'perihal_surat' => $this->request->getVar('perihal_surat_pengantar'),
            'tempat_tanggal_pengantar' => $this->request->getVar('tempat_tanggal_pengantar'),
            'lampiran_pengantar' => $this->request->getVar('lampiran_pengantar'),
            'kpdyth_pengantar' => $this->request->getVar('yth_pengantar'),
            'di_pengantar' => $this->request->getVar('di_pengantar'),
            'isi_surat_pengantar' => $this->request->getVar('isi_surat_pengantar'),
            'tembusan_pengantar' => $this->request->getVar('tembusan_pengantar')
        ]);
        header("Content-Disposition: attachment; filename=Surat Pengantar.doc");
        $cetak_surat_pengantar->saveAs('php://output');
    }

    public function cetak_slaporannihil()
    {
        $cetak_surat_lapnihil = new \PhpOffice\PhpWord\TemplateProcessor('template_surat/surat_lapnihil_dttot.docx');
        $cetak_surat_lapnihil->setValues([
            'nomor_surat_lapnihil' => $this->request->getVar('nomor_surat_lapnihil'),
            'perihal_surat_lapnihil' => $this->request->getVar('perihal_surat_lapnihil'),
            'tempat_tanggal_lapnihil' => $this->request->getVar('tempat_tanggal_lapnihil'),
            'lampiran_lapnihil' => $this->request->getVar('lampiran_lapnihil'),
            'yth_lapnihil' => $this->request->getVar('yth_lapnihil'),
            'di_lapnihil' => $this->request->getVar('di_lapnihil'),
            'nosur_kepolisian' => $this->request->getVar('nosur_kepolisian'),
            'tgl_nosur_kepolisian' => $this->request->getVar('tgl_nosur_kepolisian'),
            'nomor_dttot' => $this->request->getVar('nomor_dttot'),
            'tglwaktu_dttot' => $this->request->getVar('tglwaktu_dttot'),
            'tembusan_lapnihil' => $this->request->getVar('tembusan_lapnihil'),
        ]);
        header("Content-Disposition: attachment; filename=Surat Laporan Nihil DTTOT.doc");
        $cetak_surat_lapnihil->saveAs('php://output');
    }

    public function cetak_slapprofil()
    {
        $cetak_surat_lapnihil = new \PhpOffice\PhpWord\TemplateProcessor('template_surat/surat_lapprofilrisiko.docx');
        $cetak_surat_lapnihil->setValues([
            'nomor_surat_lapnihil' => $this->request->getVar('nomor_surat_lapnihil'),
            'perihal_surat_lapnihil' => $this->request->getVar('perihal_surat_lapnihil'),
            'tempat_tanggal_lapnihil' => $this->request->getVar('tempat_tanggal_lapnihil'),
            'lampiran_lapnihil' => $this->request->getVar('lampiran_lapnihil'),
            'yth_lapnihil' => $this->request->getVar('yth_lapnihil'),
            'di_lapnihil' => $this->request->getVar('di_lapnihil'),
            'nosur_kepolisian' => $this->request->getVar('nosur_kepolisian'),
            'tgl_nosur_kepolisian' => $this->request->getVar('tgl_nosur_kepolisian'),
            'nomor_dttot' => $this->request->getVar('nomor_dttot'),
            'tglwaktu_dttot' => $this->request->getVar('tglwaktu_dttot'),
            'tembusan_lapnihil' => $this->request->getVar('tembusan_lapnihil'),
        ]);
        header("Content-Disposition: attachment; filename=Surat Laporan Nihil DTTOT.doc");
        $cetak_surat_lapnihil->saveAs('php://output');
    }

    public function export_penggunaan_surat()
    {
        $data_nomor_surat = $this->nomorsuratmodel->getAllnomorsurat();
        $export_nomor_surat = new Spreadsheet;
        // Buat custom header pada file excel
        $export_nomor_surat->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Data Penggunaan Nomor Surat PT. BPR Majesty Golden Raya')
            ->setCellValue('A3', 'No')
            ->setCellValue('B3', 'Nomor Surat')
            ->setCellValue('C3', 'Perihal Surat')
            ->setCellValue('D3', 'Tujuan Surat')
            ->setCellValue('E3', 'Nama Pegawai')
            ->setCellValue('F3', 'Tanggal Dibuat');

        $kolom = 4;
        $nomor = 1;
        foreach ($data_nomor_surat as $data) {
            $export_nomor_surat->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $data['nomor_surat'])
                ->setCellValue('C' . $kolom, $data['perihal_surat'])
                ->setCellValue('D' . $kolom, $data['tujuan_surat'])
                ->setCellValue('E' . $kolom, $data['nama_pegawai'])
                ->setCellValue('F' . $kolom, $data['tanggal_dibuat']);
            $kolom++;
            $nomor++;
        }
        // Style tabel Excel
        $export_nomor_surat->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $export_nomor_surat->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $export_nomor_surat->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $export_nomor_surat->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $export_nomor_surat->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $export_nomor_surat->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $export_nomor_surat->getActiveSheet()->getStyle('C:E')->getAlignment()->setWrapText(true);
        $export_nomor_surat->getActiveSheet()->getStyle('A:F')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $export_nomor_surat->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $export_nomor_surat->getActiveSheet()->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $export_nomor_surat->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $export_nomor_surat->getActiveSheet()->mergeCells('A1:F1');
        $export_nomor_surat->getActiveSheet()->getStyle('A:F')->getAlignment()->setWrapText(true);

        // Proses Export ke file excel
        $writer = new Xlsx($export_nomor_surat);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Penggunaan Nomor Surat.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function testword()
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Hello World !');

        $writer = new Word2007($phpWord);

        $filename = 'simple';

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '.docx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
