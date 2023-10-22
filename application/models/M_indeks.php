<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_indeks extends CI_Model
{


	// List all your items
	public function indeks()
	{
		$this->db->select('*');
		$this->db->from('index');
		$this->db->order_by('id_index', 'asc');
		return $this->db->get()->result();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('index', $data);
	}

	//Update one item
	public function update($data)
	{
		$this->db->where('id_index', $data['id_index']);
		$this->db->update('index', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_index', $data['id_index']);
		$this->db->delete('index', $data);
	}
}

/* End of file M_akun.php */
