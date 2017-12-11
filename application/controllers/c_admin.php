<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_admin extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('akses') != 'admin')
		{
		redirect('c_login');
		}
		$this->load->model('m_admin');
		$this->load->view('charts/chart.php');
    }

	public function index()
	{
		$data['judul']='SELAMAT DATANG ADMIN GUDANG';
			$this->load->view('admin/header.php');
			
			$this->load->view('admin/home.php',$data);
			$this->load->view('admin/footer.php');
	}
	public function pegawai()
	{
		$data['judul']='MENU PEGAWAI';
			$this->load->view('admin/header.php');
			$this->load->view('admin/pegawai.php',$data);
			$this->load->view('admin/footer.php');
		}
	
	public function menu()
	{
		$data['judul']='MENU USER ADMIN';
			$this->load->view('admin/header.php');
			$this->load->view('admin/menu.php',$data);
			$this->load->view('admin/footer.php');
		}
			
	function tambah()
	{
		if($this->input->post('submit'))
		{
		$this->m_admin->tambah();
		echo '<script>alert("OPERASI Berhasil");</script>';
			}
		$data['judul']='Tambah Pegawai';
			$this->load->view('admin/header.php');
			$this->load->view('admin/tambah.php',$data);
			$this->load->view('admin/footer.php');
	}
	
	function tambahuser()
	{
		if($this->input->post('submit'))
		{
		$this->m_admin->tambahuser();
		echo '<script>alert("OPERASI Berhasil");</script>';
			}
		$data['judul']='Tambah User';
			$this->load->view('admin/header.php');
			$this->load->view('admin/tambahuser.php',$data);
			$this->load->view('admin/footer.php');
	}
	
	
	function daftar($offset=0)
	{
		$data['judul']='Laporan Penjualan Barang';
		$data['data']=$this->m_admin->pegawai($offset)->result();
			$this->load->view('admin/header.php');	
			$this->load->view('admin/daftar.php',$data);
			$this->load->view('admin/footer.php');
	}

	function editpass()
	{
		if($this->input->post('submit'))
		{
		$this->m_admin->editpass();
			}
		$data['judul']='Tambah User';
			$this->load->view('admin/header.php');
			$this->load->view('admin/editpass.php',$data);
			$this->load->view('admin/footer.php');
	}
	
	
	function user($offset=0)
	{
		$data['judul']='Laporan Penjualan Barang';
		$data['data']=$this->m_admin->user($offset)->result();
			$this->load->view('admin/header.php');	
			$this->load->view('admin/user.php',$data);
			$this->load->view('admin/footer.php');
	}
	
	function delete($nip="")
	{
		$data['judul']='Daftar Pegawai';
		$data['data']=$this->m_admin->hapus($nip);
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_admin/daftar/">';
	}
	
	function deleteuser($username="")
	{
		$data['judul']='Daftar Pegawai';
		$data['data']=$this->m_admin->hapususer($username);
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_admin/user/">';
	}

	function pesan($no="",$offset="0")
	{	
	if($no == NULL){
		$data['judul']='Pesan Untuk Admin';
		$data['data']=$this->m_admin->pesan($offset)->result();
			$this->load->view('admin/header.php');	
			$this->load->view('admin/pesan.php',$data);
			$this->load->view('admin/footer.php');
		}
	else{
	$data=$this->m_admin->pesancari($no)->row();
	echo "<strong>Pengirim</strong> : ".$data->username."<br />
		<strong>Judul</strong> : ".$data->perihal."<br />
        <strong>Tanggal</strong> : ".$data->tgl."<br />
        <hr />        
        <strong>Isi</strong> : ".$data->isi."";
	}
	}
	
	function p($offset="0"){
		$data['data']=$this->m_admin->pesan($offset)->result();
	$this->load->view('admin/tabel.php',$data);
	}
	function edit($nip="",$offset=0)
	{
		if($this->input->post('ubah')){			
			$this->m_admin->ubah();
	}
		else{
			$this->db->where("nip",$nip);
			$hasil=$this->db->get("t_pegawai");
			if($hasil->num_rows == 0)
			{
				echo "<script>alert('NIP tidak terdaftar'); javascript:history.go(-1);</script>";
				}
			else{
		
		$data['judul']='Proses Ubah Data Pegawai';
		$data['hasil']=$this->m_admin->pegawai($offset)->result();
		$data['data']=$this->m_admin->pegawaicari($nip);
			$this->load->view('admin/header.php');		
			$this->load->view('admin/ubah.php',$data);
			$this->load->view('admin/footer.php');

		}}
	}
	
	function detailminta($bulan="",$offset=0)
	{
		$data['judul']='Laporan Pengambilan Barang';
		$data['data']=$this->m_admin->mintanama($bulan,$offset)->result();
		$data['hasil']=$this->m_admin->hasil1($bulan)->row();
			$this->load->view('admin/header.php');
			
			$this->load->view('admin/detailminta.php',$data);
			$this->load->view('admin/footer.php');
	}
	
	function sup($offset=0)
	{
		$data['judul']="Data Mitra Kerja (Penyuplai Barang)";
		$data['data']=$this->m_admin->sup($offset)->result();
			$this->load->view('admin/header.php');
			
			$this->load->view('admin/supplier.php',$data);
			$this->load->view('admin/footer.php');
	}
	
	
		function detailsup($kd_sup="")
	{
		$data['judul']="Detail Supplier ($kd_sup)";
		$data['pelanggan']=$this->m_admin->detailsup($kd_sup);
			$this->load->view('admin/header.php');
			
			$this->load->view('admin/detailsup.php',$data);
			$this->load->view('admin/footer.php');
	}
	
			function batal($kd_keluar="",$kd="",$stok="",$jml="")
	{
		$this->m_admin->batal($kd_keluar,$kd,$stok,$jml);
		redirect('c_transaksi/customer');	
	}
	
	
		public function grafik($offset="0")
	{
		$data['judul']='Daftar Grafik Kepala Gudang';
		$data['keluar']=$this->m_admin->keluar($offset)->result();
		$data['minta']=$this->m_admin->minta($offset)->result();
		$data['stok']=$this->m_admin->stok_barang($offset)->result();
		$data['hasil']=$this->m_admin->keuntungan($offset);
			$this->load->view('admin/header.php');
			
			$this->load->view('admin/grafik.php',$data);
			$this->load->view('admin/footer.php');
		}

	
	function pesann($msg,$kd="",$ket="",$kd_keluar="")
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