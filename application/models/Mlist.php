<?php

class Mlist extends CI_Model
{
	private $table = "kostan";

	public function getList()
	{
		if ($this->session->userdata("alamat") != "" && $this->session->userdata("latitude") != "" && $this->session->userdata("longitude")) {
			return $this->db->from("score")->join("kostan","kostan.kostan_id=score.kostan_id")->order_by("score.distance","ASC")->get()->result();
		} else {
			return $this->db->order_by("kostan_id", "DESC")->get($this->table)->result();
		}
	}
}
