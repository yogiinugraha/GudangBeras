<?php 
class M_kebijakan extends CI_Model
{
	function kebijakan($nav){
		$this->db->select($nav);
		return $this->db->get("t_kebijakan");
		}
	
}?>