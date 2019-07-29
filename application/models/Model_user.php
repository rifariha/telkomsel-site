<?php 
if (! defined('BASEPATH')) exit('no direct script access allowed');

	class Model_user extends CI_Model 
	{
		public function select_general($param1)
		{
			$sql = $this->db->query("select * from $param1");
			return $sql;
		}

		public function select_general_where($param1,$param2)
		{
			$sql = $this->db->query("select * from $param1 where $param2");
			return $sql;
		}

		public function delete_general($param1,$param2,$param3)
		{
			$sql = $this->db->query("delete from $param1 where $param2='$param3'");
			return $sql;
		}

		public function search_code($param1,$param2,$param3,$param4)
		{
			$sql = $this->db->query("select max($param2) as $param3 from $param1 where $param2 like '%".$param4."%'");
			return $sql;
		}

		public function count_code($param1,$param2,$param3,$param4)
		{
			$sql = $this->db->query("select count($param2) as $param3 from $param1 where $param2 like '%".$param4."%'");
			return $sql;
		}

		public function cek_pwd($param)
		{
			$sql = $this->db->query("select * from tb_user where username='$param'");
			return $sql;
		}



	}
?>