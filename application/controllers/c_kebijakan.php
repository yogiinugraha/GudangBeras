<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_kebijakan extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('akses') != 'pegawai')
		{
		redirect('c_login');
		}
		$this->load->model('m_kebijakan');
    }
	
	function index($nav){
		$data['nav']=$nav;
		$data['judul']=$this->m_kebijakan->kebijakan($nav)->row();
		$this->load->view('pegawai/garansi',$data);
		}

}?>