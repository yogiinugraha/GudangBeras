<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class C_excel extends CI_Controller
{
	    function __construct()
	{
        parent::__construct();
		$this->load->model('m_excel');
	    $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
    }
	
		function stok($pdf=""){
			$data['judul']="stokbarang";
			$data['judulpdf']=$pdf;
			$data['data']=$this->m_excel->stok_barang();
			if($pdf == NULL){
			$this->load->view('source/stok_excel.php',$data);
			}
			else{
			$this->load->view('source/pdf', $data);
				}
		}
		
		function keluar(){
			$data['judul']="penjualanbarang";
			$data['data']=$this->m_excel->keluar_barang();
			$data['total']=$this->m_excel->total_beli();
			$data['hasil']=$this->m_excel->total_laba();
			$this->load->view('source/keluar_excel.php',$data);

		}
		function minta(){
			$data['judul']="penjualanbarang";
			$data['data']=$this->m_excel->minta_barang();
			$data['total']=$this->m_excel->total_beli();
			$data['hasil']=$this->m_excel->total_pengeluaran();
			$this->load->view('source/minta_excel.php',$data);

		}
		function berhasil_beli($kd=""){
		$data['judulpdf']="struk";
		$data['pelanggan']=$this->m_excel->konfirmasi($kd);
		$data['hasil']=$this->m_excel->jumlah($kd);
		$data['data']=$this->m_excel->berhasil_beli($kd);
			$this->load->view('source/berhasil.php',$data);

		}
		function berhasil_berlangganan($kd=""){
		$data['judulpdf']="struk";
		$data['pelanggan']=$this->m_excel->pelanggan($kd);
			$this->load->view('source/berhasil_berlangganan.php',$data);

		}

}?>
