<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cari {
    var $instan;
    function __construct(){
        $CI =& get_instance();
        $this->instan = $CI;
    }
    function semua($tabel,$keyword){
		$hasil=$this->instan->db->query("SHOW columns FROM $tabel")->result();
		$where="";
		foreach($hasil as $row){
			$where=$where." $row->Field LIKE '%$keyword%' OR ";
			}
		$where=substr($where,0,-3);
	$hasil=$this->instan->db->query("SELECT * FROM $tabel WHERE $where");
	return $hasil;
    }
	
     
}
 
