<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_iklan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("MpostIklan", "postiklan");
	}

	public function index($active = false)
	{
		$data['title'] = 'Posting iklan';
		$data['active'] = $active;
		$data['data_kost'] = $this->postiklan->getAll();

		$this->load->view('templates/header', $data);
		$this->load->view('posting/index');
		$this->load->view('templates/footer');
	}

	public function post_iklan_kostan()
	{
		$input = $this->input->post();
		$type_kost = $input["_tipe_kost"];
		$type_bayar = $input["_tipe_bayar"];
		$nama_kost = $input["_nama_kost"];
		$alamat_kost = $input["_alamat"];
		$latitude_kost = $input["_latitude"];
		$longitude_kost = $input["_longitude"];
		$no_telp = $input["_no_telp"];
		$harga_sewa = $input["_harga"];
		$deskripsi = $input["_deskripsi"];
		$fasilitas1 = isset($input["_fasilitas1"]) ? $input["_fasilitas1"] : "";
		$fasilitas2 = isset($input["_fasilitas2"]) ? $input["_fasilitas2"] : "";
		$fasilitas3 = isset($input["_fasilitas3"]) ? $input["_fasilitas3"] : "";
		$fasilitas4 = isset($input["_fasilitas4"]) ? $input["_fasilitas4"] : "";
		$fasilitas5 = isset($input["_fasilitas5"]) ? $input["_fasilitas5"] : "";

		$fasilitas = json_encode(array($fasilitas1, $fasilitas2, $fasilitas3, $fasilitas4, $fasilitas5));

		$params = array(
			'user_id' => $this->session->userdata('user_id'),
			'nama_kost' => $nama_kost,
			'alamat_kost' => $alamat_kost,
			'no_hp' => $no_telp,
			'type_kost' => $type_kost,
			'type_bayar_kost' => $type_bayar,
			'fasilitas_kost' => $fasilitas,
			'harga_kost' => $harga_sewa,
			'latitude' => $latitude_kost,
			'longitude' => $longitude_kost,
			'deskripsi_kost' => $deskripsi,
			'created_at' => date("Y-m-d H:i:s")
		);
		$insert = $this->postiklan->post_iklan_kostan($params);;
		if ($insert > 0) {
			$this->session->set_flashdata("msg", "Data kostan berhasil disimpan.");
		} else {
			$this->session->set_flashdata("msg", "Data kostan gagal disimpan.");
		}
		redirect("post_iklan/index/active");
	}

	public function edit($id = null)
	{
		$where = array("kostan_id" => $id);
		$data['value'] = $this->postiklan->edit_post_iklan_kostan($where);
		$this->load->view('templates/header', $data);
		$this->load->view("posting/edit_kostan", $data);
		$this->load->view('templates/footer');
	}

	public function delete($id = null)
	{
		$where = array("kostan_id" => $id);
		$data['value'] = $this->postiklan->edit_post_iklan_kostan($where);
		$this->load->view('templates/header', $data);
		$this->load->view("posting/delete_kostan", $data);
		$this->load->view('templates/footer');
	}

	public function delete_kost(){
		$id = $this->input->post("kost_id");
		$delete = $this->db->where("kostan_id", $id)->delete("kostan");
		if ($delete > 0) {
			$this->session->set_flashdata("msg", "Data kostan berhasil hapus.");
		} else {
			$this->session->set_flashdata("msg", "Data kostan gagal dihapus.");
		}
		redirect("post_iklan/index/active");
	}

	public function update_kost()
	{
		$input = $this->input->post();
		$kost_id = $input["kost_id"];
		$type_kost = $input["tipe_kost"];
		$type_bayar = $input["tipe_bayar"];
		$nama_kost = $input["nama_kost"];
		$alamat_kost = $input["alamat"];
		$latitude_kost = $input["latitude"];
		$longitude_kost = $input["longitude"];
		$no_telp = $input["no_telp"];
		$harga_sewa = $input["harga"];
		$deskripsi = $input["deskripsi"];
		$fasilitas1 = isset($input["fasilitas1"]) ? $input["fasilitas1"] : "";
		$fasilitas2 = isset($input["fasilitas2"]) ? $input["fasilitas2"] : "";
		$fasilitas3 = isset($input["fasilitas3"]) ? $input["fasilitas3"] : "";
		$fasilitas4 = isset($input["fasilitas4"]) ? $input["fasilitas4"] : "";
		$fasilitas5 = isset($input["fasilitas5"]) ? $input["fasilitas5"] : "";

		$fasilitas = json_encode(array($fasilitas1, $fasilitas2, $fasilitas3, $fasilitas4, $fasilitas5));


		$params = array(
			'nama_kost' => $nama_kost,
			'alamat_kost' => $alamat_kost,
			'no_hp' => $no_telp,
			'type_kost' => $type_kost,
			'type_bayar_kost' => $type_bayar,
			'fasilitas_kost' => $fasilitas,
			'harga_kost' => $harga_sewa,
			'latitude' => $latitude_kost,
			'longitude' => $longitude_kost,
			'deskripsi_kost' => $deskripsi
		);
		$where = array("kostan_id" => $kost_id);
		$update = $this->postiklan->update_kost($params, $where);

		if ($update > 0) {
			$this->session->set_flashdata("msg", "Data kostan berhasil diubah.");
		} else {
			$this->session->set_flashdata("msg", "Data kostan tidak ada perubahan.");
		}
		redirect("post_iklan/index/active");
	}
}
