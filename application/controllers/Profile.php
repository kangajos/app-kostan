<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function index() 
    {
        $data['title'] = 'Profile';
        
        $this->load->view('templates/header', $data);
        $this->load->view('profile/index');
        $this->load->view('templates/footer');
    }

}