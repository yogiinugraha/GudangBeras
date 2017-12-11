<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_supplier extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('validated') == NULL)
		{
		redirect('c_login');
		}
		$this->load->model('m_supplier');
    }
	
	function index($offset=0)
	{
		$data['judul']="Data Mitra Kerja (Penyuplai Barang)";
		$keyword=$this->input->post('keyword');
		$data['data']=$this->m_supplier->sup($keyword,$offset)->result();
			$this->load->view('pegawai/supplier.php',$data);
	}
	function customer($offset=0)
	{
		$data['judul']="Data Mitra Kerja (Penyuplai Barang)";
		$keyword=$this->input->post('keyword');
		$data['data']=$this->m_supplier->customer($keyword,$offset)->result();
			$this->load->view('pegawai/cus.php',$data);
	}
	
	function terima($offset=0)
	{
		$data['judul']="Data Mitra Kerja (Penyuplai Barang)";
		$keyword=$this->input->post('keyword');
		$data['data']=$this->m_supplier->terima($offset,$keyword)->result();
			$this->load->view('pegawai/terima.php',$data);
	}
	
		function ubah($kd_sup="")
	{
		if($this->input->post('ubah')){
		$this->m_supplier->p_ubah();
		redirect('c_supplier/pesan/berhasil/'.$kd_sup);
		}
		else {
		$data['judul']="Editing Data Supplier ($kd_sup)";
		$data['pelanggan']=$this->m_supplier->detail($kd_sup);
		$data['sup']=$this->m_supplier->supplier();
			$this->load->view('pegawai/ubahsup.php',$data);
		}
	}
		function tambah()
	{
		if($this->input->post('tambah')){
			 if($hasil->num_rows <= 9)
			{
			$tampil=$this->db->query("SELECT RIGHT(kd,'1') AS hasil FROM t_pelanggan WHERE kd != 'UNKNOW' ORDER BY kd DESC LIMIT 1")->row();
			$n=$tampil->hasil + 1;
			$kd='C00'.$n;
			}
			elseif($hasil->num_rows > 9)
			{
			$tampil=$this->db->query("SELECT RIGHT(kd,'2') AS hasil FROM t_pelanggan ORDER BY kd DESC LIMIT 1")->row();
			$n=$tampil->hasil + 1;
			$kd='C0'.$n;
			}
		$this->m_supplier->p_tambah($kd);
		echo '<script>alert("OPERASI BERHASIL");</script>';
		echo "<script>window.open('".base_url()."index.php/c_excel/berhasil_berlangganan/".$kd."')</script>";
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_supplier/customer">';
		}
		else {
		$data['judul']="Berlangganan";
			$this->load->view('pegawai/tambah_pelanggan.php',$data);
		}
	}
		function tambah_sup()
	{
		if($this->input->post('tambah')){
		$this->m_supplier->p_tambah_supplier();
		echo '<script>alert("OPERASI BERHASIL");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_supplier/">';
		}
		else {
		$data['judul']="Berlangganan";
		$data['data']=$this->m_supplier->supplier();
			$this->load->view('pegawai/tambah_supplier.php',$data);
		}
	}
	
		public function welcome()
	{
		$data['judul']='Menu Supplier Pegawai';
			$this->load->view('header.php');
			$this->load->view('konten.php');
			$this->load->view('w_sup.php',$data);
			$this->load->view('pesan.php');
			$this->load->view('footer.php');
	}
	
		function detail($kd_sup="")
	{
		$data['judul']="Detail Supplier ($kd_sup)";
		$data['pelanggan']=$this->m_supplier->detail($kd_sup);
			$this->load->view('pegawai/detailsup.php',$data);
	}
		function detailterima($no="",$kd="")
	{
		$data['judul']="Detail Penerimaan Barang.";
		$data['pelanggan']=$this->m_supplier->detailterima($no,$kd);
			$this->load->view('pegawai/detail_terima.php',$data);
	}
		function batal($kd_keluar="",$kd="",$stok="",$jml="")
	{
		$this->m_supplier->batal($kd_keluar,$kd,$stok,$jml);	
	}
	function refresh($link){
		$url=$this->uri->segment(1)."/".$link;
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/'.$url.'">';
		}
	function pesan($msg,$kd="",$ket="",$kd_keluar="")
	{
		if($msg == "berhasil")
		{			
		echo '<script>alert("OPERASI BERHASIL");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_supplier/ubah/'.$kd.'">';
			}
		elseif($msg == "gagal_stok")
		{
			if($ket == 'konfirmasi')
			{
		echo '<script>alert("Stok Tidak Mencukupi Bro");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_supplier/konfirmasi/'.$kd_keluar.'">';
			}
			}	
	} 

	
	
}?>