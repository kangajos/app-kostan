<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Mlist","list");
	}

	public function index()
    {
    	$data['list_kost'] = $this->list->getList();
        $data['title'] = 'List';
        
        $this->load->view('templates/header', $data);
        $this->load->view('list/index');
        $this->load->view('templates/footer');
    }

}
