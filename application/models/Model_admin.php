<?php 
if (! defined('BASEPATH')) exit('no direct script access allowed');

	class Model_admin extends CI_Model 
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

		public function select_general_join($param1,$param2)
		{
			$sql = $this->db->query("select * from $param1 order by $param2");
			return $sql;
		}

		public function select_general_join_where($param1,$param2,$param3,$param4)
		{
			$sql = $this->db->query("select * from $param1 where $param2='$param3' order by $param4");
			return $sql;
		}
		public function select_general_join_between($param1,$param2,$param3,$param4,$param5,$param6,$param7)
		{
			$sql = $this->db->query("select * from $param1 where $param2='$param3' and $param4 between '$param5' and '$param6' order by $param7");
			return $sql;
		}

		public function remove_general($param1,$param2,$param3,$param4,$param5)
		{
			$sql = $this->db->query("update $param1 set $param2='$param3' where $param4='$param5'");
			return $sql;
		}

	}
?>