<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_transaksi extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('validated') == NULL)
		{
		redirect('c_login');
		}
		$this->load->model('m_transaksi');
    }

	public function index()
	{
		$data['judul']='Menu Transaksi Pegawai';
			$this->load->view('header.php');
			$this->load->view('konten.php');
			$this->load->view('transaksi.php',$data);
			$this->load->view('pesan.php');
			$this->load->view('footer.php');
	}
	
	function customer($offset=0)
	{
		if($this->input->post('ok'))
		{
			redirect('c_transaksi/detailcustomer');
		}
		else
		{
		$data['judul']="Data Transaksi Customer";
		$keyword=$this->input->post('keyword');
		$data['data']=$this->m_transaksi->keluar($keyword,$offset)->result();
			$this->load->view('pegawai/customer.php',$data);
		}
	}
	function detailcustomer($kd="",$bulan="",$offset=0)
	{
		$data['judul']="Data Penjualan Pada Bulan $bulan";
		$data['kd']=$kd;
		$data['bulan']=$bulan;
		$keyword=$this->input->post('keyword');
		$data['data']=$this->m_transaksi->customer($kd,$bulan,$offset,$keyword)->result();
			$this->load->view('pegawai/detailcustomer.php',$data);
	}
	
		function konfirmasi($kd_keluar="",$kd="",$asal="")
	{
		if($this->input->post('ubah')){
		$this->m_transaksi->p_konfirmasi($kd_keluar,$kd,$asal);
		redirect('c_transaksi/pesan/berhasil/'.$kd_keluar);
		}
		else {
		$data['judul']="Konfirmasi Barang ($kd_keluar)";
		$data['pelanggan']=$this->m_transaksi->konfirmasi($kd_keluar);
			$this->load->view('pegawai/konfirmasi.php',$data);
		}
	}
	
		function detail($kd_keluar="")
	{
		$data['judul']="Detail Barang ($kd_keluar)";
		$data['pelanggan']=$this->m_transaksi->konfirmasi($kd_keluar);
			$this->load->view('pegawai/detail.php',$data);
	}
		function detailsupplier($no="",$kd="")
	{
		$data['judul']="Detail Pembelian Barang";
		$data['pelanggan']=$this->m_transaksi->det_sup($no,$kd);
			$this->load->view('pegawai/det_sup.php',$data);
	}
	
		function supplier($offset=0,$kd_barang="")
	{
		if($this->input->post('confirm'))
		{
			$this->m_transaksi->confirm();

			}
		$data['data']=$this->m_transaksi->permintaan($offset,$kd_barang)->result();
		$data['hadi']=$this->m_transaksi->hadi()->row();
		if($kd_barang != NULL)
		{
		$data['judul']="Transaksi Dengan Supplier";
			$this->load->view('pegawai/t_sup_det.php',$data);
		}
		
		else
		{
		$data['judul']="Data Transaksi Supplier";
		
			$this->load->view('pegawai/t_sup.php',$data);
		}
	}

	function p_konfir($no="",$kd="")
	{
		$data['hadi']=$this->m_transaksi->hadi()->row();
		$data['pelanggan']=$this->m_transaksi->det_sup($no,$kd);
			$this->load->view('pegawai/p_konfir.php',$data);
	}

	function batal($kd_keluar,$kd,$stok,$jml)
	{
		$this->m_transaksi->batal($kd_keluar,$kd,$stok,$jml);
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_transaksi/customer">';
		}

	function delete($no,$kd,$jml)
	{			
			$this->db->delete('t_permintaan',array('no_permintaan'=>$no,'kd_barang'=>$kd,'jml_minta'=>$jml));
			$this->db->delete('t_terima',array('no_permintaan'=>$no,'kd_barang'=>$kd,'jml_terima'=>$jml));
			echo '<script>alert("Penghapusan Berhasil");</script>';
			echo '<script>javascript:history.go(-1);</script>';
	}
	function refresh($link){
		$url=$this->uri->segment(1)."/".$link;
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/'.$url.'">';
		}

	function pesan($msg,$kd="",$ket="",$kd_keluar="")
	{
		if($msg == "berhasil")
		{			
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_transaksi/detail/'.$kd_keluar.'">';
			}
		elseif($msg == "gagal_stok")
		{
			if($ket == 'konfirmasi')
			{
		echo '<script>alert("Stok Tidak Mencukupi Bro");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_transaksi/konfirmasi/'.$kd_keluar.'">';
			}
			}	
	} 

	
	
}?>