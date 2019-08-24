<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Home';

		$this->load->view('templates/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}

	public function search()
	{
		$this->load->model("Mhaversine", "haversine");

		$tipe_kost = $this->input->post("tipe_kost");
		$tipe_bayar = $this->input->post("tipe_bayar");
		$harga_kost = $this->input->post("harga");
		$fasilitas_kost = $this->input->post("fasilitas");
		$latitude = $this->input->post("latitude");
		$longitude = $this->input->post("longitude");
		$alamat = $this->input->post("alamat");
		if ($this->input->post("alamat")){
			$data_session = array("alamat" => $alamat, "latitude" => $latitude, "longitude" =>$longitude);
			$this->session->set_userdata($data_session);
		}

		$this->db->empty_table('score');
		$where = array("tipe_kost" => $tipe_kost, "tipe_bayar_kost" => $tipe_bayar, "harga_kost" => $harga_kost, "fasilitas_kost" => $fasilitas_kost);

		$results = $this->haversine->getKostan($where);
		$flag = false;
		foreach ($results as $value) {
			$this->haversine->getDistanceBetween($latitude, $longitude, $value->latitude, $value->longitude, "km", $value->kostan_id);
			$flag = true;
		}

		if ($flag == true){
			$this->session->set_flashdata("msg","Hasil percari kamu");
		}
		redirect("lists");
	}

}
