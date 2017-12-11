<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_kepala extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('akses') != 'kepala')
		{
		redirect('c_login');
		}
		$this->load->model('m_kepala');
		$this->load->view('charts/chart.php');
    }

	public function index()
	{
		$notif=$this->m_kepala->jumlah()->row();
		$data['judul']='SELAMAT DATANG KEPALA GUDANG';
		$this->bingkai->kepala('kepala/isi.php',$data,$notif->jumlah);
	}
	public function Home()
	{
		$data['judul']='SELAMAT DATANG KEPALA GUDANG';
		$this->load->view('kepala/home.php',$data);
	}
	function pemesanan(){
		$data['judul']='Daftar Konfirmasi Barang';
		$data['data']=$this->m_kepala->konfirmasi()->result();
			$this->load->view('kepala/konfirmasi.php',$data);
		}
	function konfirmasi($no,$kd){
		$this->m_kepala->p_konfirmasi($no,$kd);
		echo '<script>alert("Konfirmasi Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_kepala/pemesanan">';
		}
	public function laporan()
	{
		$data['judul']='MENU LAPORAN';
		$data['barang']=$this->m_kepala->pelanggan();
			$this->load->view('kepala/laporan.php',$data);
		}
	function stok($bulan="",$offset="0")
	{
		if($bulan == 0){
		$data['judul']='Laporan Stok Barang Bulan Sekarang';
		}
		else{
			$b=$this->bulan->angka_bulan($bulan);
		$data['judul']='Laporan Stok Barang Bulan '.$b;
		}
		$data['data']=$this->m_kepala->stok_barang($bulan,$offset)->result();
			$this->load->view('kepala/stok.php',$data);
	}
	
	function keluar($offset=0)
	{
		$data['hasil']=$this->m_kepala->hasilsemua()->row();
		$data['judul']='Laporan Penjualan Barang';
		$data['data']=$this->m_kepala->keluar($offset)->result();
			$this->load->view('kepala/keluar.php',$data);
	}
	
	function produk($offset=0)
	{
		$data['hasil']=$this->m_kepala->hasilsemua()->row();
		$data['judul']='Laporan Penjualan Barang';
		$data['data']=$this->m_kepala->produk($offset)->result();
			$this->load->view('kepala/produk.php',$data);
	}
	function line()
	{
			$this->load->view('kepala/line.php');
	}
	
	function minta($offset=0)
	{
		$data['hasil']=$this->m_kepala->hasilsemua2()->row();
		$data['judul']='Laporan Penjualan Barang';
		$data['data']=$this->m_kepala->minta($offset)->result();
			$this->load->view('kepala/minta.php',$data);
	}
	
	function detail($bulan="",$offset=0,$nama="")
	{
		if($nama == NULL){			
		$data['judul']='Laporan Penjualan Barang';
		$data['data']=$this->m_kepala->keluarnama($bulan,$offset)->result();
		$data['cus']=$this->m_kepala->cus();
		}
		elseif($nama != NULL){			
		$data['judul']='Laporan Penjualan Barang ('.$nama.')';
		$data['data']=$this->m_kepala->k($bulan,$offset,$nama)->result();
		$data['cus']=$this->m_kepala->cus();
		}
		$data['hasil']=$this->m_kepala->hasil($bulan)->row();
			$this->load->view('kepala/detail.php',$data);
	}
	
	function detailminta($bulan="",$offset=0)
	{
		$data['judul']='Laporan Pengambilan Barang';
		$data['data']=$this->m_kepala->mintanama($bulan,$offset)->result();
		$data['hasil']=$this->m_kepala->hasil1($bulan)->row();
			$this->load->view('kepala/detailminta.php',$data);
	}
	
	function sup($offset=0)
	{
		$data['judul']="Data Mitra Kerja (Penyuplai Barang)";
		$data['data']=$this->m_kepala->sup($offset)->result();
			$this->load->view('kepala/supplier.php',$data);
	}
	
	
		function detailsup($kd_sup="")
	{
		$data['judul']="Detail Supplier ($kd_sup)";
		$data['pelanggan']=$this->m_kepala->detailsup($kd_sup);
			$this->load->view('kepala/detailsup.php',$data);
	}
	
			function batal($kd_keluar="",$kd="",$stok="",$jml="")
	{
		$this->m_kepala->batal($kd_keluar,$kd,$stok,$jml);
		redirect('c_transaksi/customer');	
	}
	
	
		public function grafik($offset="0")
	{
		error_reporting(0);
		$data['judul']='Daftar Grafik Kepala Gudang';
		$data['keluar']=$this->m_kepala->keluar($offset)->result();
		$data['minta']=$this->m_kepala->minta($offset)->result();
		$data['stok']=$this->m_kepala->stok_barang($offset)->result();
		$data['hasil']=$this->m_kepala->keuntungan($offset);
			$this->load->view('kepala/grafik.php',$data);
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