<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_akun extends CI_Model
{


	// List all your items
	public function akun()
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->order_by('no_reff', 'desc');
		return $this->db->get()->result();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('akun', $data);
	}

	//Update one item
	public function update($data)
	{
		$this->db->where('id_akun', $data['id_akun']);
		$this->db->update('akun', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_akun', $data['id_akun']);
		$this->db->delete('akun', $data);
	}

	// ANGGOTA
	// List all your items
	public function anggota()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->order_by('id_anggota', 'desc');
		return $this->db->get()->result();
	}

	// Add a new item
	public function add_anggota($data)
	{
		$this->db->insert('anggota', $data);
	}

	//Update one item
	public function update_anggota($data)
	{
		$this->db->where('id_anggota', $data['id_anggota']);
		$this->db->update(
			'anggota',
			$data
		);
	}

	//Delete one item
	public function delete_anggota($data)
	{
		$this->db->where('id_anggota', $data['id_anggota']);
		$this->db->delete(
			'anggota',
			$data
		);
	}
}

/* End of file M_akun.php */
