<?php

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Mregister", "register");
	}

	public function index()
	{
		$data['title'] = 'Register';

		$this->load->view('templates/header', $data);
		$this->load->view('auth/register');
		$this->load->view('templates/footer');
	}

	public function post_register()
	{
		$nama = $this->input->post("nama");
		$email = $this->input->post("email");
		$password = md5($this->input->post("password"));
		$password2 = md5($this->input->post("password2"));
		$params = array("nama" => $nama, "username" => $email, "password" => $password, "created_at" => date("Y-m-d H:i:s"), "level" => 2);
		$where = array("username" => $email);
		$cek = $this->register->cek($where);
		if ($password == $password2){
			if (empty($cek)) {
				$insert = $this->register->register($params);
				if ($insert > 0){
					$this->session->set_flashdata("msg", "Selamat!, Anda berhasil register. Silahkan login.");
					redirect("auth/login");
				}else{
					$this->session->set_flashdata("msg", "Oops!, Anda gagal register. Silahkan ulangi.");
				}
			}else{
				$this->session->set_flashdata("msg", "Oops!, Email yang Anda gunakan sudah terdaftar.");
			}
		}else{
			$this->session->set_flashdata("msg", "Oops!, Konfirmasi password salah, silahkan ulangi.");
		}
		redirect("auth/register");
	}
}
