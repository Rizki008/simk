<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

	public function akun()
	{
		$this->db->select('*');
		$this->db->from('akun');
		return $this->db->get()->result();
	}

	public function bulantahun()
	{
		return $this->db->query("SELECT *, DATE_FORMAT(tgl_transaksi,'%M') AS bulan, YEAR(tgl_transaksi) AS tahun from transaksi GROUP BY bulan,tahun")->result();
	}
	public function akuns($bulan, $tahun)
	{
		return $this->db->query("SELECT * FROM `transaksi` LEFT JOIN akun ON akun.no_reff=transaksi.no_reff WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "' GROUP BY transaksi.no_reff")->result();
	}
	public function jurnaldetail($no_reff, $bulan, $tahun)
	{
		return $this->db->query("SELECT transaksi.id_transaksi,transaksi.tgl_transaksi,akun.nama_reff,transaksi.no_reff,transaksi.jenis_saldo,transaksi.saldo,transaksi.tgl_input,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE transaksi.no_reff='" . $no_reff . "' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function jurnaldetailsaldo($no_reff, $bulan, $tahun)
	{
		return $this->db->query("SELECT transaksi.jenis_saldo,transaksi.saldo,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE transaksi.no_reff='" . $no_reff . "' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function jurnaldetailsatu($bulan, $tahun)
	{
		return $this->db->query("SELECT *,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function hasildebit($bulan, $tahun)
	{
		return $this->db->query("SELECT *,SUM(saldo) as total FROM `transaksi` WHERE jenis_saldo='debit' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function hasilkredit($bulan, $tahun)
	{
		return $this->db->query("SELECT *,SUM(saldo) as total FROM `transaksi` WHERE jenis_saldo='kredit' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
}

/* End of file M_laporan.php */
