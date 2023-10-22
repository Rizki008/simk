<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{


	// List all your items
	public function transaksi()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status', 'transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	public function transaksiedit($id_transaksi)
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

	public function transaksidetail($bulan, $tahun)
	{
		return $this->db->query("SELECT *,MONTHNAME(tgl_transaksi) AS bulan, YEAR(tgl_transaksi) AS tahun FROM `transaksi` LEFT JOIN `akun` ON `akun`.`no_reff` = `transaksi`.`no_reff` WHERE status='transaksi' AND MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}
	public function akun($bulan, $tahun)
	{
		return $this->db->query("SELECT * FROM `transaksi` LEFT JOIN akun ON akun.no_reff=transaksi.no_reff WHERE MONTHNAME(tgl_transaksi)='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
	}


	// SIMPANANA
	// List all your items
	public function pokok()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status', 'pokok');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	public function wajib()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status', 'wajib');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	public function sukarela()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status', 'sukarela');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
}

/* End of file M_transaksi.php */
