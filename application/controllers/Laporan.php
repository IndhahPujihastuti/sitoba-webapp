<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Laporan extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Laporan Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukJoin()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/nav_laporan', $data);
        $this->load->view('laporan/laporan_barangmasuk_all', $data);
        $this->load->view('layout/footer');
    }
    public function barangmasuk()
    {
        $data['title'] = 'Laporan Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukLengkap()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/nav_laporan', $data);
        $this->load->view('laporan/laporan_barang_masuk', $data);
        $this->load->view('layout/footer');
    }

    public function barang_masuk()
    {
        $data['title'] = 'Laporan Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukBelum()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/nav_laporan', $data);
        $this->load->view('laporan/laporan_barang_masuk', $data);
        $this->load->view('layout/footer');
    }

    public function cetak_laporan_barangmasuk()
    {
        $data['title'] = 'Laporan Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukJoin()->result_array();

        $this->load->view('laporan/print_barang_masuk', $data);
    }

    public function export_excel_barangmasuk()
    {
        $data = array('title' => 'Laporan Data Barang Masuk', 'laporanbarangmasuk' => $this->ModelSitoba->getBarangMasukJoin()->result_array());
        
        //$data['title'] = 'Laporan Barang Masuk';
        //$data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukJoin()->result_array();

        $this->load->view('laporan/excel_barangmasuk', $data);
    }

    public function barangkeluar()
    {
        $data['title'] = 'Laporan Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangkeluar'] = $this->ModelSitoba->getBarangKeluarJoin()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/nav_barang_keluar', $data);
        $this->load->view('laporan/laporan_barangkeluar_all', $data);
        $this->load->view('layout/footer');
    }

    public function barangkeluar_lengkap()
    {
        $data['title'] = 'Laporan Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangkeluar'] = $this->ModelSitoba->getBarangKeluarLengkap()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/nav_barang_keluar', $data);
        $this->load->view('laporan/laporan_barang_keluar', $data);
        $this->load->view('layout/footer');
    }

    public function barangkeluar_belum()
    {
        $data['title'] = 'Laporan Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangkeluar'] = $this->ModelSitoba->getBarangKeluarBelum()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/nav_barang_keluar', $data);
        $this->load->view('laporan/laporan_barang_keluar', $data);
        $this->load->view('layout/footer');
    }

    public function cetak_laporan_barangkeluar()
    {
        $data['title'] = 'Laporan Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangkeluar'] = $this->ModelSitoba->getBarangKeluarJoin()->result_array();

        $this->load->view('laporan/print_barang_keluar', $data);
    }

    public function export_pdf_barangmasuk()
    {
        $data['title'] = 'Laporan Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukJoin()->result_array();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot."/sitoba/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/print_barang_masuk', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';

        $html = $this->output->get_output();
        
        $dompdf->set_paper($paper_size, $orientation);

        //convert to pdf
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("Laporan Barang Masuk-Barokah Jaya Group.pdf", array('Attachment' => 0));
        
    }

    public function export_pdf_periode()
    {
        $data['title'] = 'Laporan Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $tgl1 = $this->input->post('tgl_a');
        $tgl2 = $this->input->post('tgl_b');

        $data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukPeriode($tgl1, $tgl2)->result_array();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot."/sitoba/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/print_barang_masuk', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';

        $html = $this->output->get_output();
        
        $dompdf->set_paper($paper_size, $orientation);

        //convert to pdf
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("Laporan Barang Masuk-Barokah Jaya Group.pdf", array('Attachment' => 0));
        
    }

    public function export_pdf_barangkeluar()
    {
        $data['title'] = 'Laporan Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporanbarangkeluar'] = $this->ModelSitoba->getBarangKeluarJoin()->result_array();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot."/sitoba/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/print_barang_keluar', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';

        $html = $this->output->get_output();
        
        $dompdf->set_paper($paper_size, $orientation);

        //convert to pdf
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("Laporan Barang Keluar-Barokah Jaya Group.pdf", array('Attachment' => 0));
        
    }

    public function export_pdf_periode_barangkeluar()
    {
        $data['title'] = 'Laporan Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $tgl1 = $this->input->post('tgl_a');
        $tgl2 = $this->input->post('tgl_b');

        $data['laporanbarangkeluar'] = $this->ModelSitoba->getBarangKeluarPeriode($tgl1, $tgl2)->result_array();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot."/sitoba/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/print_barang_keluar', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';

        $html = $this->output->get_output();
        
        $dompdf->set_paper($paper_size, $orientation);

        //convert to pdf
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("Laporan Barang Keluar-Barokah Jaya Group.pdf", array('Attachment' => 0));
        
    }

    public function exportExcel()
    {
        $data = array('title' => 'Laporan Data Barang Masuk', 'laporanbarangmasuk' => $this->ModelSitoba->getBarangMasukJoin()->result_array());
        
        //$data['title'] = 'Laporan Barang Masuk';
        //$data['laporanbarangmasuk'] = $this->ModelSitoba->getBarangMasukJoin()->result_array();

        $this->load->view('laporan/excel_barangmasuk', $data);
    }
}
