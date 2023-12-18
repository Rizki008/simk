<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __contsruct()
	{
		$this->load->model('m_auth');
	}
	public function index()
	{
		$data = array(
			'title' => 'Login',
			// 'isi' => 'frontend/v_home'
		);
		$this->load->view('frontend/v_home', $data, FALSE);
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'is_unique' => '%s Username Sudah Terdaptar'
		));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'min_length' => '%s Password Minimal 8',
			// 'regex_match' => '%s Password Harus Gabungan Huruf Besar, Angka Dan Hurup Kecil'
		));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
			'required' => '%s Mohon Untuk Diisi !!!',
			'matches' => '%s Password Tidak Sama !!!'
		));
		if ($this->form_validation->run() ==  FALSE) {
			$data = array(
				'title' => 'Register',
				'isi'  => 'frontend/v_register'
			);
			$this->load->view('frontend/v_register', $data, FALSE);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_user' => $this->input->post('level_user'),
			);
			$this->m_auth->register($data);
			$this->session->set_flashdata('pesan', 'Register Berhasi, Silahkan Untuk Login');
			redirect('home');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->user_login->login($username, $password);
		}
	}

	public function logout()
	{
		$this->user_login->logout();
	}
}
