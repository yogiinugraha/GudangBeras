<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_pemesanan extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('validated') == NULL)
		{
		redirect('c_login');
		}
		$this->load->model('m_pemesanan');
    }

	public function index($offset=0)
	{
		$url=$this->uri->segment(2);
		$keyword=$this->input->post('keyword');
		$data['judul']='Penambahan Stok Barang';
		$data['data']=$this->m_pemesanan->barang($offset,$url,$keyword)->result();
		$data['num']=$this->m_pemesanan->barang($offset,$url,$keyword)->num_rows();
			$this->load->view('pegawai/pemesanan.php',$data);
	}
	
	public function formulir($kd="")
	{
		if($this->input->post('submit'))
		{
			$this->m_pemesanan->p_minta();
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_pemesanan/">';

			}
		else
		{
		$data['judul']='Penambahan Stok Barang';
		$data['barang']=$this->m_pemesanan->barangcari($kd);
			$this->load->view('pegawai/f_pemesanan.php',$data);
		}
	}
	public function banyak()
	{
		if($this->input->post('submit'))
		{
		$this->m_pemesanan->p_banyak();
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_pemesanan/">';

			}
		else
		{
		$data['judul']='Penambahan Stok Barang';
		$data['barang']=$this->m_pemesanan->banyak()->result();
		$data['jum']=$this->m_pemesanan->banyak()->num_rows();
		$data['nomor']=$this->m_pemesanan->no();
			$this->load->view('pegawai/f_pemesanan_banyak.php',$data);
		}
	}
	public function pemesanan_customer()
	{
		if($this->input->post('submit'))
		{
		$this->m_pemesanan->p_pemesanan();
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/pemesanan_customer">';

			}
		else
		{
		$data['judul']='Penambahan Stok Barang';
		$data['barang']=$this->m_pemesanan->banyak()->result();
		$data['pelanggan']=$this->m_pemesanan->pelanggan();
		$data['jum']=$this->m_pemesanan->banyak()->num_rows();
		$data['nomor']=$this->m_pemesanan->no2();
			$this->load->view('pegawai/f_pemesanan_customer.php',$data);
		}
	}
	function refresh($link){
		$url=$this->uri->segment(1)."/".$link;
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/'.$url.'">';
		}

}?>