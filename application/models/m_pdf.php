<?php 
class M_pdf extends CI_Model
{
	function stok(){
	return $this->db->query("SELECT * FROM barang ORDER BY kd_barang")->result();
	}
}?>