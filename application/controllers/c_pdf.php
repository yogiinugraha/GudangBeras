<?php session_start();
class C_pdf extends CI_Controller {
	
	function stok()
	{
	    // Load library FPDF 
	    $this->load->library('fpdf');
        
        // Load Database
        $this->load->database();
        
        /* buat konstanta dengan nama FPDF_FONTPATH, kemudian kita isi value-nya
           dengan alamat penyimpanan FONTS yang sudah kita definisikan sebelumnya.
           perhatikan baris $config['fonts_path']= 'system/fonts/'; 
           didalam file application/config/config.php
        */            
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        // Load model "karyawan_model"
        $this->load->model('m_pdf');
        
        /* Kita akses function get_all didalam karyawan_model
           function get_all merupakan fungsi yang dibuat untuk mengambil
           seluruh data karyawan didalam database.
        */
        $data['hasil'] = $this->m_pdf->stok();
        
        // Load view "pdf_report" untuk menampilkan hasilnya        
		$this->load->view('source/pdf', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>