<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSitoba extends CI_Model
{

    //manajemen user
    public function getUser()
    {
        return $this->db->get('pengguna');
    }

    public function userWhere($where)
    {
        return $this->db->get_where('pengguna', $where);
    }

    public function editUser($data = null, $where = null)
    {
        $this->db->update('pengguna', $data, $where);
    }

    public function deleteUser($where = null)
    {
        $this->db->delete('pengguna', $where);
    }

    //manajemen supplier
    public function getSupplier()
    {
        return $this->db->get('suplier');
    }

    public function createSupplier($data = null)
    {
        $this->db->insert('suplier', $data);
    }

    public function supplierWhere($where)
    {
        return $this->db->get_where('suplier', $where);
    }

    public function editSupplier($data = null, $where = null)
    {
        $this->db->update('suplier', $data, $where);
    }

    public function deleteSupplier($where = null)
    {
        $this->db->delete('suplier', $where);
    }

    public function joinSupplierBarang($where)
    {
        $this->db->select('barang.kd_barang, suplier.kd_suplier, suplier.nm_suplier');
        $this->db->from('barang');
        $this->db->join('suplier', 'suplier.kd_suplier = barang.nm_suplier');
        $this->db->where($where);
        return $this->db->get();
    }

    //manajemen data barang
    public function getBarang()
    {
        return $this->db->get('barang');
    }

    public function getBarangLimit()
    {
        $this->db->select('barang.kd_barang, barang.nama_brg, barang.stok, barang.satuan');
        $this->db->from('barang');
        $this->db->where('stok <= ', 10);

        return $this->db->get();
    }

    public function getBarangJoin()
    {
        $this->db->select('barang.kd_barang, barang.nama_brg, barang.harga, barang.satuan, barang.stok, barang.tgl_input, barang.nm_penginput, kategori.nm_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.kd_kategori = barang.kategori');
        //$this->db->join('suplier', 'suplier.kd_suplier = barang.nm_suplier');
        
        return $this->db->get();
    }

    public function createBarang($data = null)
    {
        $this->db->insert('barang', $data);
    }

    public function deleteBarang($where = null)
    {
        $this->db->delete('barang', $where);
    }

    public function barangWhere($where)
    {
        return $this->db->get_where('barang', $where);
    }

    public function editBarang($data = null, $where = null) 
    {
        $this->db->update('barang', $data, $where);
    }

    //manajemen data kategori barang
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function createCategory($data = null)
    {
        $this->db->insert('kategori', $data);
    }

    public function categoryWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function editCategory($data = null, $where = null)
    {
        $this->db->update('kategori', $data, $where);
    }

    public function deleteCategory($where = null)
    {
        $this->db->delete('kategori', $where);
    }

    public function joinKategoriBarang($where)
    {
        $this->db->select('barang.kd_barang, kategori.kd_kategori, kategori.nm_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.kd_kategori = barang.kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    //manajemen transaksi barang masuk
    public function getBarangMasukJoin()
    {
        $this->db->select('barang_masuk.kd_bm, barang_masuk.jml_kurang, barang_masuk.jml, barang_masuk.tgl_masuk, barang_masuk.status_brg, barang.nama_brg, barang.harga, barang.satuan, barang_masuk.nm_penerima, suplier.nm_suplier');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.kd_barang = barang_masuk.barang');
        $this->db->join('suplier', 'suplier.kd_suplier = barang_masuk.suplier');
        //$this->db->where('barang_masuk.status_brg', 'Lengkap');

        return $this->db->get();
    }

    public function getBarangMasukPeriode($tgl1, $tgl2)
    {
        $periode = $this->db->query("SELECT barang_masuk.kd_bm, barang_masuk.jml_kurang, barang_masuk.jml, barang_masuk.tgl_masuk, barang_masuk.status_brg, barang.nama_brg, barang.harga, barang.satuan, barang_masuk.nm_penerima, suplier.nm_suplier FROM barang_masuk INNER JOIN barang ON barang.kd_barang = barang_masuk.barang INNER JOIN suplier ON suplier.kd_suplier = barang_masuk.suplier WHERE barang_masuk.tgl_masuk BETWEEN '$tgl1' AND '$tgl2' ");
    
        return $periode;
    }

    public function BarangMasuk()
    {
        $this->db->select('barang_masuk.kd_bm, barang_masuk.jml, barang_masuk.tgl_masuk, barang_masuk.status_pay, barang_masuk.status_brg, barang.nama_brg, barang.harga, barang_masuk.nm_penerima');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.kd_barang = barang_masuk.barang');
        //$this->db->join('suplier', 'suplier.kd_suplier = barang_masuk.suplier');

        return $this->db->get();
    }

    public function getBarangMasukLengkap()
    {
        $this->db->select('barang_masuk.kd_bm, barang_masuk.jml, barang_masuk.jml_kurang, barang_masuk.tgl_masuk, barang_masuk.status_brg, barang_masuk.status_brg, barang.nama_brg, barang.harga, barang.satuan, barang_masuk.nm_penerima, suplier.nm_suplier');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.kd_barang = barang_masuk.barang');
        $this->db->join('suplier', 'suplier.kd_suplier = barang_masuk.suplier');
        $this->db->where('status_brg', 'Lengkap');

        return $this->db->get();
    }

    public function getBarangMasukBelum()
    {
        $this->db->select('barang_masuk.kd_bm, barang_masuk.jml, barang_masuk.jml_kurang, barang_masuk.tgl_masuk, barang_masuk.status_brg, barang_masuk.status_brg, barang.nama_brg, barang.harga, barang.satuan, barang_masuk.nm_penerima, suplier.nm_suplier');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.kd_barang = barang_masuk.barang');
        $this->db->join('suplier', 'suplier.kd_suplier = barang_masuk.suplier');
        $this->db->where('status_brg', 'Kurang Lengkap');

        return $this->db->get();
    }

    public function getBarangMasuk()
    {
        return $this->db->get('barang_masuk');
    }

    public function createBarangMasuk($data = null)
    {
        $this->db->insert('barang_masuk', $data);
    }

    function getBarangMasukByKode($barang) {
        $hsl = $this->db->query("SELECT * FROM barang_masuk WHERE barang='$barang'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'barang' => $data->barang,
                    'harga' => $data->harga,
                    'suplier' => $data->suplier,
                );
            }
        }
        return $hasil;
    }

    public function editBarangMasuk($data = null, $where = null) 
    {
        $this->db->update('barang_masuk', $data, $where);
    }

    public function deleteBarangMasuk($where = null)
    {
        $this->db->delete('barang_masuk', $where);
    }

    public function barangmasukWhere($where)
    {
        return $this->db->get_where('barang_masuk', $where);
    }

    public function joinSuplierBarangMasuk($where)
    {
        $this->db->select('barang_masuk.kd_bm, suplier.kd_suplier, suplier.nm_suplier');
        $this->db->from('barang_masuk');
        $this->db->join('suplier', 'suplier.kd_suplier = barang_masuk.suplier');
        $this->db->where($where);
        return $this->db->get();
    }

    public function joinBarangMasuk($where)
    {
        $this->db->select('barang_masuk.kd_bm, barang.kd_barang, barang.nama_brg');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.kd_barang = barang_masuk.barang');
        $this->db->where($where);
        return $this->db->get();
    }

    //manajemen transaksi barang keluar
    public function getBarangKeluarJoin()
    {
        $this->db->select('barang_keluar.kd_bk, barang_keluar.jml, barang_keluar.tgl_pengiriman, barang_keluar.tgl_keluar, barang_keluar.tujuan, barang_keluar.penginput, barang_keluar.status_krm, barang.nama_brg, barang.satuan, barang.harga, barang.satuan');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang.kd_barang = barang_keluar.barang');

        return $this->db->get();
    }

    public function getBarangKeluarPeriode($tgl1, $tgl2)
    {
        $periode_brgkeluar = $this->db->query("SELECT barang_keluar.kd_bk, barang_keluar.jml, barang_keluar.tgl_pengiriman, barang_keluar.tgl_keluar, barang_keluar.tujuan, barang_keluar.penginput, barang_keluar.status_krm, barang.nama_brg, barang.satuan, barang.harga, barang.satuan FROM barang_keluar INNER JOIN barang ON barang.kd_barang = barang_keluar.barang  WHERE barang_keluar.tgl_keluar BETWEEN '$tgl1' AND '$tgl2' ");
    
        return $periode_brgkeluar;
    }

    public function getBarangKeluarLimit()
    {
        $this->db->select('barang_keluar.kd_bk, barang_keluar.jml, barang_keluar.tgl_pengiriman, barang_keluar.tgl_keluar, barang_keluar.tujuan, barang_keluar.penginput, barang_keluar.status_krm, barang.nama_brg, barang.satuan, barang.harga, barang.satuan');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang.kd_barang = barang_keluar.barang');
        $this->db->where('barang_keluar.status_krm', 'Belum Dikirim');

        return $this->db->get();
    }

    public function getBarangKeluarLengkap()
    {
        $this->db->select('barang_keluar.kd_bk, barang_keluar.jml, barang_keluar.tgl_keluar, barang_keluar.tgl_pengiriman, barang_keluar.tujuan, barang_keluar.penginput, barang_keluar.status_krm, barang.nama_brg, barang.harga, barang.satuan');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang.kd_barang = barang_keluar.barang');
        $this->db->where('status_krm', 'Sudah Dikirim');

        return $this->db->get();
    }

    public function getBarangKeluarBelum()
    {
        $this->db->select('barang_keluar.kd_bk, barang_keluar.jml, barang_keluar.tgl_keluar, barang_keluar.tgl_pengiriman, barang_keluar.tujuan, barang_keluar.penginput, barang_keluar.status_krm, barang.nama_brg, barang.harga, barang.satuan');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang.kd_barang = barang_keluar.barang');
        $this->db->where('status_krm', 'Belum Dikirim');

        return $this->db->get();
    }

    public function createBarangKeluar($data = null)
    {
        $this->db->insert('barang_keluar', $data);
    }

    public function deleteBarangKeluar($where = null)
    {
        $this->db->delete('barang_keluar', $where);
    }

    public function barangkeluarWhere($where)
    {
        return $this->db->get_where('barang_keluar', $where);
    }

    public function barangkeluarWhr($where)
    {
        $this->db->select('barang_keluar.kd_bk, barang_keluar.jml, barang_keluar.tgl_pengiriman, barang_keluar.tgl_keluar, barang_keluar.tujuan, barang_keluar.penginput, barang_keluar.status_krm, barang.nama_brg, barang.satuan, barang.harga, barang.satuan');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang.kd_barang = barang_keluar.barang');
        $this->db->where($where);

        return $this->db->get();
    }

    public function joinBarangKeluar($where)
    {
        $this->db->select('barang_keluar.kd_bk, barang.kd_barang, barang.nama_brg');
        $this->db->from('barang_keluar');
        $this->db->join('barang', 'barang.kd_barang = barang_keluar.barang');
        $this->db->where($where);
        return $this->db->get();
    }

    public function editBarangKeluar($data = null, $where = null) 
    {
        $this->db->update('barang_keluar', $data, $where);
    }

    //manajemen dashboard
    public function stok_barang($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang');
        return $this->db->get()->row($field);
    }

    public function total_barang_masuk($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang_masuk');
        return $this->db->get()->row($field);
    }

    public function total_barang_masuk_kurang($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang_masuk');
        return $this->db->get()->row($field);
    }

    public function total_barang_keluar($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang_keluar');
        return $this->db->get()->row($field);
    }

    public function total_barang_masuk_lengkap($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang_masuk');
        $this->db->where('status_brg', 'Lengkap');
        return $this->db->get()->row($field);
    }

    public function total_barang_masuk_belum($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang_masuk');
        $this->db->where('status_brg', 'Kurang Lengkap');
        return $this->db->get()->row($field);
    }

    public function total_barang_keluar_lengkap($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang_keluar');
        $this->db->where('status_krm', 'Sudah Dikirim');
        return $this->db->get()->row($field);
    }

    public function total_barang_keluar_belum($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
        $this->db->where($where);
    }
        $this->db->from('barang_keluar');
        $this->db->where('status_krm', 'Belum Dikirim');
        return $this->db->get()->row($field);
    }

}