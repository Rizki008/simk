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
}

/* End of file M_akun.php */
