<?php

function kodePelangganOtomatis() {
    $ci = get_instance();
    $query = "SELECT max(kd_pengguna) as maxKode FROM pengguna";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 3, 3);
    $noUrut++;
    $char = "BJG";
    $kodeBaru = $char.sprintf("%03s", $noUrut);
    return $kodeBaru;
}

function kodeSupplierOtomatis() {
    $ci = get_instance();
    $query = "SELECT max(kd_suplier) as maxKode FROM suplier";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 3, 3);
    $noUrut++;
    $char = "SPL";
    $kodeBaru = $char.sprintf("%03s", $noUrut);
    return $kodeBaru;
}

function kodeKategoriOtomatis()
{
    $ci = get_instance();
    $query = "SELECT max(kd_kategori) as maxKode FROM kategori";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 3, 3);
    $noUrut++;
    $char = "KAT";
    $kodeBaru = $char.sprintf("%03s", $noUrut);
    return $kodeBaru;
}

function kodeBarangOtomatis()
{
    $ci = get_instance();
    $query = "SELECT max(kd_barang) as maxKode FROM barang";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 3, 3);
    $noUrut++;
    $char = "BRG";
    $kodeBaru = $char.sprintf("%03s", $noUrut);
    return $kodeBaru;
}

function kodeBarangMasukOtomatis()
{
    $ci = get_instance();
    $query = "SELECT max(kd_bm) as maxKode FROM barang_masuk";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 4, 3);
    $noUrut++;
    $char = "BRGM";
    $kodeBaru = $char.sprintf("%03s", $noUrut);
    return $kodeBaru;
}

function kodeBarangKeluarOtomatis()
{
    $ci = get_instance();
    $query = "SELECT max(kd_bk) as maxKode FROM barang_keluar";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 4, 3);
    $noUrut++;
    $char = "BRGK";
    $kodeBaru = $char.sprintf("%03s", $noUrut);
    return $kodeBaru;
}