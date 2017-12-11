<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bingkai {
    var $instan;
    function __construct(){
        $CI =& get_instance();
        $this->instan = $CI;
    }
    function pegawai($tempat,$data=""){
	$this->instan->load->view('pegawai/header.php');
	$this->instan->load->view('pegawai/menu.php',$data);
	$this->instan->load->view($tempat,$data);
	$this->instan->load->view('pegawai/footer.php');
    }
    function kepala($tempat,$data="",$notif=""){
		$data['notif']=$notif;
	$this->instan->load->view('kepala/header_kepala.php');
	$this->instan->load->view('kepala/menu.php',$data);
	$this->instan->load->view($tempat,$data);
	$this->instan->load->view('kepala/footer.php');
    }
	
     
}
 
