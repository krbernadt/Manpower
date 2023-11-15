<?php
class Mdata extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	//testing function
	public function get_person()
	{
		$sql = "SELECT * from tb_person order by global_id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_ex_data()
	{
		$sql = "SELECT * from tb_ex_att";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	//external function
	public function get_news_admin()
	{
		$sql = "SELECT news_id, title_news FROM tb_news order by news_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_news_admin_edit($news_id)
	{
		$sql = "SELECT * FROM tb_news where news_id='$news_id' order by news_id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function newsHome($limit, $offset)
	{
		$sql = "SELECT * FROM tb_news order by news_id desc LIMIT $limit OFFSET $offset";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function read_news($link)
	{
		$sql = "SELECT * FROM tb_news where link_news='$link' limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_generate_link($token)
	{
		$sql = "SELECT * FROM tb_share where usr_ref='$token' order by shareId desc limit 1";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	function val_data($id_scan)
	{
		$query = $this->db->query("SELECT * FROM tb_ex_att where _id_scan='$id_scan'");
		if ($query->num_rows() > 0) {
			return 1; // true
		} else {
			return 2; // false
		}
	}

	function temp()
	{
		$sql = "CREATE TEMPORARY TABLE tb_temp(id_scan text,emp_nik text,qrToken text,emp_name text,emp_dept text,status text,date_rec date,time_rec time)";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}
}
