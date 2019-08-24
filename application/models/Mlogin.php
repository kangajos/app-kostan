<?php
class Mlogin extends CI_Model{

	private $table = "user";

	public function cek($where = array())
	{
		return $this->db->where($where)->get($this->table)->row();
	}
}
