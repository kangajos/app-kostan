<?php

class Mregister extends CI_Model
{
	private $table = "user";

	public function register($params = array())
	{
		$this->db->insert($this->table, $params);
		return $this->db->affected_rows();
	}

	public function cek($where= array())
	{
		return $this->db->where($where)->get($this->table)->row();
	}
}
