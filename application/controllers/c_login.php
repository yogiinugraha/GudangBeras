<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_login extends CI_Controller
{
	    function __construct()
	{
        parent::__construct();
		$this->load->model('m_login');
    }

		function index()
	{
	if($this->session->userdata('validated') != NULL)
		{
		redirect(base_url().'index.php/c_home');
		}
	else
		{
		$this->load->view('login.php');
		}
	}
	
		function form_login()
	{
	if($this->session->userdata('validated') == NULL)
		{
		redirect('c_login');
		}
	}
	
		public function login()
	{
        $result = $this->m_login->validated();

        if(! $result)
		{
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }
		else
		{
			if($this->session->userdata('akses')=='admin')
			{
				echo "<script>alert('Login Berhasil');</script>";
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_admin/">';
				}
			elseif($this->session->userdata('akses')=='pegawai')
			{
				echo "<script>alert('Login Berhasil');</script>";
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_login/">';
			}
			elseif($this->session->userdata('akses')=='kepala')
			{
				echo "<script>alert('Login Berhasil');</script>";
				echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_kepala/">';
			}
        }        
	}
	   
	   public function logout()
	   {
        $this->session->sess_destroy();
				echo "<script>alert('Logout Berhasil');</script>";
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_login/">';
	}

}?>
