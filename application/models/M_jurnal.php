<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_jurnal extends CI_Model
{


	// List all your items
	public function jurnal()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	public function jurnaledit($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('akun', 'akun.no_reff = transaksi.no_reff', 'left');
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get()->row();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('transaksi', $data);
	}

	//Update one item
	public function update($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('transaksi', $data);
	}

	public function bulantahun()
	{
		return $this->db->query("SELECT *, DATE_FORMAT(tgl_transaksi,'%M') AS bulan, YEAR(tgl_transaksi) AS tahun from transaksi GROUP BY bulan,tahun")->result();
	}

	public function jurnaldetail($bulan, $tahun)
	{
		return $this->db->query("SELECT *,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function hasildebit($bulan, $tahun)
	{
		return $this->db->query("SELECT *,SUM(debet) as total FROM `transaksi` WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
		// return $this->db->query("SELECT *,SUM(saldo) as total FROM `transaksi` WHERE jenis_saldo='debit' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function hasilkredit($bulan, $tahun)
	{
		return $this->db->query("SELECT *,SUM(kredit) as total FROM `transaksi` WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
		// return $this->db->query("SELECT *,SUM(saldo) as total FROM `transaksi` WHERE jenis_saldo='kredit' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function akun($bulan, $tahun)
	{
		return $this->db->query("SELECT * FROM `transaksi` LEFT JOIN akun ON akun.no_reff=transaksi.no_reff WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}

	// BUKU BESAR 
	public function bulantahunbuku($bulan, $tahun)
	{
		return $this->db->query("SELECT *, DATE_FORMAT(tgl_transaksi,'%M') AS bulan, YEAR(tgl_transaksi) AS tahun from transaksi LEFT JOIN akun ON akun.no_reff=transaksi.no_reff WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "' GROUP BY transaksi.no_reff")->result();
	}
	public function jurnaldetailbuku($no_reff, $bulan, $tahun)
	{
		return $this->db->query("SELECT *,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE transaksi.no_reff='" . $no_reff . "' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
}

/* End of file M_transaksi.php */
