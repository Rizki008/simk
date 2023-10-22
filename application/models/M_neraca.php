<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_neraca extends CI_Model
{

	public function hasil_lancar($dari, $sampai)
	{
		return $this->db->query("SELECT akun.no_reff,nama_reff,jenis_saldo,saldo,keterangan FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '1-1%' AND tgl_transaksi BETWEEN '$dari' AND '$sampai' group by no_reff,nama_reff")->result();
		// return $this->db->query("SELECT (sum(debet)-sum(kredit)) as hasil,akun.no_reff,nama_reff FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '1-1%' AND tgl_transaksi BETWEEN '$dari' AND '$sampai' group by no_reff,nama_reff")->result();
	}
	public function hasil_tetap($dari, $sampai)
	{
		return $this->db->query("SELECT akun.no_reff,nama_reff,jenis_saldo,saldo,keterangan FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '1-2%' AND tgl_transaksi BETWEEN '$dari' AND '$sampai' group by no_reff,nama_reff")->result();
		// return $this->db->query("SELECT (sum(debet)-sum(kredit)) as hasil,akun.no_reff,nama_reff FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '1-2%' AND tgl_transaksi BETWEEN '$dari' AND '$sampai' group by no_reff,nama_reff")->result();
	}
	public function hasil_pasiva($dari, $sampai)
	{
		return $this->db->query("SELECT akun.no_reff,nama_reff,jenis_saldo,saldo,keterangan FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '2%' AND tgl_transaksi BETWEEN '$dari' AND '$sampai' group by no_reff,nama_reff")->result();
		// return $this->db->query("SELECT (sum(debet)-sum(kredit)) as hasil,akun.no_reff,nama_reff FROM transaksi LEFT JOIN akun ON transaksi.no_reff=akun.no_reff WHERE akun.no_reff like '2%' AND tgl_transaksi BETWEEN '$dari' AND '$sampai' group by no_reff,nama_reff")->result();
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

	public function hasil_arus_kas($dari, $sampai)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE (tgl_transaksi BETWEEN '$dari' AND '$sampai')")->result();
	}
	public function hasil_arus_kas2($id_index, $dari, $sampai)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE id_index='$id_index' AND (tgl_transaksi BETWEEN '$dari' AND '$sampai')")->result();
	}


	// KEUANGAN
	public function hasil_keuangan($sampai)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE YEAR(tgl_transaksi)='$sampai' AND status='transaksi' AND no_reff !='4-111' AND no_reff !='4-112' AND no_reff !='4-113'")->result();
	}
	public function hasil_beban($sampai)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE YEAR(tgl_transaksi)='$sampai' AND status='transaksi' AND jenis_saldo='debit' AND no_reff !='4-111' AND no_reff !='4-112' AND no_reff !='4-113'")->result();
	}
	public function hasil_pendapatan($sampai)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE YEAR(tgl_transaksi)='$sampai' AND status='transaksi' AND jenis_saldo='kredit' AND no_reff !='4-111' AND no_reff !='4-112' AND no_reff !='4-113'")->result();
	}


	// SHU 
	// KEUANGAN
	public function hasil_shu($sampai)
	{
		return $this->db->query("SELECT * FROM transaksi WHERE YEAR(tgl_transaksi)='$sampai' AND no_reff IN ('4-111','4-112','4-113')")->result();
	}
}

/* End of file M_transaksi.php */
