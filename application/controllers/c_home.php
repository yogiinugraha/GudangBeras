<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_home extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('validated') == NULL)
		{
		redirect('c_login');
		}
		if($this->session->userdata('akses') == 'kepala')
		{
		redirect('c_kepala');
		}
			$this->load->model('m_home');
    }

	public function index()
	{
		$data['cek']=$this->m_home->cek();
		$this->bingkai->pegawai('pegawai/isi.php',$data);
	}
	
	public function home()
	{
		$this->load->view('pegawai/home.php');
	}

	public function pesan()
	{
		$this->load->view('pegawai/pesan.php');
	}
	
	function stok()
	{
		$this->m_home->stok();
		
		}
	public function p_pesan()
	{
			$this->m_home->pesan();
	}
}?>