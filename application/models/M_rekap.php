<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_rekap extends CI_Model
{
	public function bulantahun()
	{
		return $this->db->query("SELECT *, DATE_FORMAT(tgl_transaksi,'%M') AS bulan, YEAR(tgl_transaksi) AS tahun from transaksi GROUP BY bulan,tahun")->result();
	}
	public function pokokdetail($bulan, $tahun)
	{
		return $this->db->query("SELECT transaksi.no_anggota,transaksi.saldo,transaksi.status,transaksi.jenis_saldo, MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` WHERE status='pokok' AND  MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function wajibdetail($bulan, $tahun)
	{
		return $this->db->query("SELECT transaksi.no_anggota,transaksi.saldo,transaksi.status,transaksi.jenis_saldo, MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` WHERE status='wajib' AND  MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function sukareladetail($bulan, $tahun)
	{
		return $this->db->query("SELECT transaksi.no_anggota,transaksi.saldo,transaksi.status,transaksi.jenis_saldo, MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` WHERE status='sukarela' AND  MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
}

/* End of file M_laporan.php */
