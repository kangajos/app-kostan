<?php

class MpostIklan extends CI_Model{
	private $table = "kostan";

	public function getAll()
	{
		$user_level = $this->session->userdata('level');
		$user_id = $this->session->userdata('user_id');
		if ($user_level == 2){
			$this->db->where("user_id",$user_id);
		}

		return $this->db->get($this->table)->result();
	}
	public function post_iklan_kostan($params)
	{
		$this->db->insert($this->table,$params);
		return $this->db->affected_rows();
	}

	public function edit_post_iklan_kostan($where=array())
	{
		return $this->db->get_where($this->table, $where)->row();
	}

	public function update_kost($params = array(), $where = array())
	{
		$this->db->where($where)->update($this->table, $params);
		return $this->db->affected_rows();
	}
}
