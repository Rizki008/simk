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

	// LABAR RUGI 
	public function bulan()
	{
		return $this->db->query("SELECT *,YEAR(tgl_transaksi) AS tahun from transaksi GROUP BY tahun")->result();
	}
	public function akuns_laba($tahun)
	{
		return $this->db->query("SELECT * FROM `transaksi` LEFT JOIN akun ON akun.no_reff=transaksi.no_reff WHERE YEAR(tgl_transaksi)='" . $tahun . "' GROUP BY transaksi.no_reff")->result();
	}
	public function jurnaldetail_laba($no_reff, $tahun)
	{
		return $this->db->query("SELECT transaksi.id_transaksi,transaksi.tgl_transaksi,akun.nama_reff,transaksi.no_reff,transaksi.jenis_saldo,transaksi.saldo,transaksi.tgl_input, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE transaksi.no_reff='" . $no_reff . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function jurnaldetailsaldo_laba($no_reff, $tahun)
	{
		return $this->db->query("SELECT transaksi.jenis_saldo,transaksi.saldo, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE transaksi.no_reff='" . $no_reff . "' AND  YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function jurnaldetailsatupendapatan_laba($tahun)
	{
		return $this->db->query("SELECT *, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE YEAR(tgl_transaksi)='" . $tahun . "' AND status='transaksi' AND jenis_saldo='kredit' AND transaksi.no_reff !='4-111' AND transaksi.no_reff !='4-112' AND transaksi.no_reff !='4-113'")->result();
	}
	public function jurnaldetailsatubeban_laba($tahun)
	{
		return $this->db->query("SELECT *, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE YEAR(tgl_transaksi)='" . $tahun . "' AND status='transaksi' AND jenis_saldo='debit' AND transaksi.no_reff !='4-111' AND transaksi.no_reff !='4-112' AND transaksi.no_reff !='4-113'")->result();
	}
	public function jurnaldetailsatukeuangan_laba($tahun)
	{
		return $this->db->query("SELECT *, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE YEAR(tgl_transaksi)='" . $tahun . "' AND status='transaksi' AND transaksi.no_reff !='4-111' AND transaksi.no_reff !='4-112' AND transaksi.no_reff !='4-113'")->result();
	}
	public function hasildebit_laba($tahun)
	{
		return $this->db->query("SELECT *,SUM(saldo) as total FROM `transaksi` WHERE jenis_saldo='debit' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function hasilkredit_laba($tahun)
	{
		return $this->db->query("SELECT *,SUM(saldo) as total FROM `transaksi` WHERE jenis_saldo='kredit' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}


	// NERACA
	public function hasil_lancar($bulan, $tahun)
	{
		return $this->db->query("SELECT akun.no_reff,nama_reff,jenis_saldo,saldo,keterangan FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '1-1%' AND tgl_transaksi BETWEEN '$bulan' AND '$tahun' group by no_reff,nama_reff")->result();
	}
	public function hasil_tetap($bulan, $tahun)
	{
		return $this->db->query("SELECT akun.no_reff,nama_reff,jenis_saldo,saldo,keterangan FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '1-2%' AND tgl_transaksi BETWEEN '$bulan' AND '$tahun' group by no_reff,nama_reff")->result();
	}
	public function hasil_pasiva($bulan, $tahun)
	{
		return $this->db->query("SELECT akun.no_reff,nama_reff,jenis_saldo,saldo,keterangan FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '2%' AND tgl_transaksi BETWEEN '$bulan' AND '$tahun' group by no_reff,nama_reff")->result();
	}
	public function jurnaldetail_neraca($no_reff, $bulan, $tahun)
	{
		return $this->db->query("SELECT transaksi.id_transaksi,transaksi.tgl_transaksi,akun.nama_reff,transaksi.no_reff,transaksi.jenis_saldo,transaksi.saldo,transaksi.tgl_input,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE transaksi.no_reff='" . $no_reff . "' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function jurnaldetailsaldo_neraca($no_reff, $bulan, $tahun)
	{
		return $this->db->query("SELECT transaksi.jenis_saldo,transaksi.saldo,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE transaksi.no_reff='" . $no_reff . "' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}

	// ARUS KAS
	public function keterangan()
	{
		return $this->db->query('SELECT * FROM `index` WHERE id_index !=1 order by keterangan asc;')->result();
	}
	public function keterangan_hasil($id_index)
	{
		return $this->db->query("SELECT * FROM `index` WHERE id_index='$id_index' order by keterangan asc;")->result();
	}
	public function hasil_arus_kas2($id_index, $dari, $sampai)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE id_index='$id_index' AND (tgl_transaksi BETWEEN '$dari' AND '$sampai')")->result();
	}

	// SHU 
	public function hasil_shu($tahun)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE YEAR(tgl_transaksi)='$tahun' AND no_reff IN ('4-111','4-112','4-113')")->result();
	}
}

/* End of file M_laporan.php */
