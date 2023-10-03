<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
	public function totalakun()
	{
		return $this->db->get('akun')->num_rows();
	}
	public function totaldebit()
	{
		return $this->db->query("SELECT*, SUM(saldo) AS total FROM transaksi WHERE jenis_saldo='debit'")->result();
	}
	public function totalkredit()
	{
		return $this->db->query("SELECT*, SUM(saldo) AS totals FROM transaksi WHERE jenis_saldo='kredit'")->result();
	}
}
