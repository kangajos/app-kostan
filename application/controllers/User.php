<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index()
	{
		$data['user'] = $this->db->where('level !=', "1")->order_by("user_id")->get("user")->result();
		$data['title'] = 'User';

		$this->load->view('templates/header', $data);
		$this->load->view('user/index');
		$this->load->view('templates/footer');
	}

	public function block_user($id = null)
	{
    	$this->db->where("user_id",$id)->update("user", array("is_active"=>0));
    	$this->session->set_flashdata("msg", "Satu user berhasil di Block");
    	redirect("user");
	}

	public function un_block_user($id = null)
	{
		$this->db->where("user_id",$id)->update("user", array("is_active"=>1));
		$this->session->set_flashdata("msg", "Satu user berhasil di Un Block");
		redirect("user");
	}
}
