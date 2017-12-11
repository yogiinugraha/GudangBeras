<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_produk extends CI_Controller
{
    function __construct()
	{
        parent::__construct();
		if($this->session->userdata('validated') == NULL)
		{
		redirect('c_login');
		}
		$this->load->model('m_produk');
    }

	public function index($offset=0)
	{
		$data['judul']='Daftar - daftar beras B3';
		$url=$this->uri->segment(2);
		$keyword=$this->input->post('keyword');
		$data['barang']=$this->m_produk->barang($offset,$url,$keyword)->result();
		$this->load->view('pegawai/produk.php',$data);
	}
	
	function detail($kd="")
	{
		$data['judul']="Detail Beras ($kd)";
		$data['barang']=$this->m_produk->detail($kd);
			$this->load->view('pegawai/detailproduk.php',$data);
	}
	function pemesanan_customer()
	{
		$data['judul']="Pilih Barang";
		$data['barang']=$this->m_produk->barangbiasa();
		$data['num']=count($this->m_produk->barangbiasa());
			$this->load->view('pegawai/pemesanan_customer.php',$data);
	}
	function data_pesanan($no=""){
		if($no != NULL){
			$data['barang']=$this->m_produk->pesanan($no)->result();
			$data['judul']="Daftar Pesanan ".$data['barang'][0]->nama_customer;
			$this->load->view('pegawai/detail_pesanan.php',$data);
			}
		else{
			$keyword=$this->input->post('keyword');
			if($keyword == NULL){
			$data['barang']=$this->m_produk->pesanan()->result();
			}
			else{
				$data['barang']=$this->cari->semua('v_pesanan',$keyword)->result();
				}
			$data['judul']="Daftar Pesanan";
			$this->load->view('pegawai/pesanan.php',$data);
			}
		
		}
		
	function konfirmasi_pesanan($no=""){
		if($this->input->post('submit')){
			$this->m_produk->p_pesan();
			}
		
		if($no != NULL){
			$data['barang']=$this->m_produk->konfirmasi_pesanan($no)->result();
			$data['judul']="Konfirmasi Pesanan ".$data['barang'][0]->nama_customer;
			$this->load->view('pegawai/konfirmasi_pesanan.php',$data);
			}
		else{
			$keyword=$this->input->post('keyword');
			if($keyword == NULL){
				$data['barang']=$this->m_produk->konfirmasi_pesanan()->result();
			}
			else{
				$data['barang']=$this->cari->semua('v_pesanan',$keyword)->result();
				}
			$data['judul']="Konfirmasi Pesanan";
			
			$this->load->view('pegawai/k_pesanan.php',$data);
			}
		
		}
	
	function tambah($kd)
	{
		$data['judul']="Hasil Beras ($kd)";
		$data['barang']=$this->m_produk->semua($kd);
			$this->load->view('pegawai/hasilbarang.php',$data);
		}
		
	function p_tambah($page="")
	{
		$data['judul']="Tambah Beras";
		$data["supplier"]=$this->m_produk->sup();
		$data['kd_sup_otomatis']=$this->m_produk->sup_baru();
		$data['kd_harga_otomatis']=$this->m_produk->harga_baru();
		$data['kd_barang_otomatis']=$this->m_produk->barang_baru();

		/* Jenis */
		$data['kd1']=$this->input->post("kd1");
		$data['kd2']=$this->input->post("kd2");
		$data['nama_tambah']=$this->input->post("nama_tambah");
		$data['ket_tambah']=$this->input->post("ket_tambah");
		/* Supplier */
		$data['kd_supplier1']=$this->input->post("kd_supplier1");
		$data['kd_supplier2']=$this->input->post("kd_supplier2");
		$data['nama_supplier']=$this->input->post("nama_supplier");
		$data['alamat_supplier']=$this->input->post("alamat_supplier");
		$data['tlp_supplier']=$this->input->post("tlp_supplier");
		$data['email_supplier']=$this->input->post("email_supplier");
		/* harga */
		$data['kd_harga']=$this->input->post("kd_harga");
		$data['harga1']=$this->input->post("harga1");
		if($page == 2){
			$this->load->view('pegawai/option_tambah_sup.php',$data);
		}
		if($page == 3){
			$this->load->view('pegawai/option_tambah_harga.php',$data);
		}
		if($page == 4){
			$this->load->view('pegawai/option_tambah_barang.php',$data);
		}
		if($page == 'proses'){
		$kd_barang=$this->input->post('kd');
		$this->m_produk->tambah();	
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/tambah/'.$kd_barang.'">';
		}

	}

	function p_beli_banyak()
	{
		$jum=$this->input->post('jum');
		$this->m_produk->p_beli_banyak($jum);
		}
			

		function berhasil_beli($kd="")
	{
		$data['judul']="Kofirmasi Pembelian";
		$data['pelanggan']=$this->m_produk->konfirmasi($kd);
		$data['hasil']=$this->m_produk->jumlah($kd);
		$data['data']=$this->m_produk->berhasil_beli($kd);
			$this->load->view('header.php');
			$this->load->view('konten.php');
			$this->load->view('berhasil_beli.php',$data);
			$this->load->view('pesan.php');
			$this->load->view('footer.php');
		}


	
	function beli($kd="")
	{
		if($this->input->post('submit')){
		$this->m_produk->p_beli();
		}
		else {
		$data['judul']="Formulir Transaksi ($kd)";
		$data['barang']=$this->m_produk->detail($kd);
		if($data['barang']->stok-20 <= 0){
		$data['stok']=0;}
		else{$data['stok']=$data['barang']->stok-20;}
		$data['pelanggan']=$this->m_produk->pelanggan();
		$data['keluar']=$this->m_produk->keluar_baru();
			$this->load->view('pegawai/beli.php',$data);
		}
	}
	
	function option($offset=0)
	{
		$url=$this->uri->segment(2);
		$keyword=$this->input->post('keyword');
		if($this->input->post('ubah')){
		redirect('c_produk/optionedit');
		}
		else {
		$data['judul']="Pilihan Menu Barang.";
		$data['barang']=$this->m_produk->barang($offset,$url,$keyword)->result();
		$data['jenis']=$this->m_produk->jenis();
			$this->load->view('pegawai/option.php',$data);
		}
	}
	
	function option_harga($kd="",$offset=0)
	{
		if($this->input->post('ubah')){
		$this->m_produk->hargaubah();
		echo "<script>alert('Data Berhasil Dirubah')</script>";
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/option">';
		}
		else {
		$data['judul']="Pilihan Menu Barang.";
		$data['barang']=$this->m_produk->detail($kd);
		$data['harga']=$this->m_produk->hargacari($kd);
		$data['pelanggan']=$this->m_produk->pelanggan();
			$this->load->view('pegawai/option_harga.php',$data);
		}
	}
	function optionedit($kd)
	{
		if($this->input->post('submit')){
		$this->m_produk->p_ubah($kd);
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/option">';
		}
		else{
		$data['judul']="Editing Barang.";
		$data['barang']=$this->m_produk->barangcari($kd);
		$data['data']=$this->m_produk->jenis();
			$this->load->view('pegawai/option_edit.php',$data);
		}
	}

	function optiontambah()
	{
		$data['nama_tambah']=$this->input->post("nama_tambah");
		$data['ket_tambah']=$this->input->post("ket_tambah");
		$data['judul']="Tambah Barang.";
		$data['jenis']=$this->m_produk->jenis_baru();
		$data['jenis1']=$this->m_produk->jenis();
			$this->load->view('pegawai/option_tambah.php',$data);
	}
		
	
	function beli_banyak()
	{
		$data['judul']="Pembelian Banyak.";
		
		if(!$this->input->post('hitung')){	
			$data['barang']=$this->m_produk->barangbiasa2();
			$data['num']=$this->m_produk->barangbiasa3()->num_rows();
			$data['pelanggan']=$this->m_produk->pelanggan();
			$this->load->view('pegawai/banyak.php',$data);
		}
		else{
			if($this->input->post('jum') == NULL){
		echo '<script>alert("Belum memilih barang !!");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/beli_banyak">';
				}
			else{
			$data['barang']=$this->m_produk->banyak_cek()->result();
			$data['keluar']=$this->m_produk->keluar_baru();
			$data['jum']=$this->m_produk->banyak_cek()->num_rows();
			$data['pelanggan']=$this->m_produk->pelanggan2();
			$this->load->view('pegawai/f_beli_banyak.php',$data);}
		}

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
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/">';
			}
		elseif($msg == "gagal_stok")
		{
			if($ket == 'konfirmasi')
			{
		echo '<script>alert("Stok Tidak Mencukupi Bro");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/konfirmasi/'.$kd_keluar.'">';
			}
			else
			{
		echo '<script>alert("Stok Tidak Mencukupi");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/beli/'.$kd.'">';
			}
			}	
	} 
	
	
	
}?>