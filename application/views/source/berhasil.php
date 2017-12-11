<?php

/**
     * APLICATION INFO  : PDF Report with FPDF 1.6
     * DATE CREATED     : 21 April 2012
	 * DEVELOPED BY     : Anton Sofyan, A.Md
          
     * CONTACT    
     *   - Email        : antonsofyan@yahoo.com
     *   - Blog         : http://antonsofyan.stikeskuningan.ac.id/
     *   - Facebook     : http://facebook.com/antonsofyan     
     *   - Office       : Gedung Lantai 2 UPT Laboratorium Komputer
                          Sekolah Tinggi Ilmu Kesehatan Kuningan (STIKKU)
     *   - Address      : Jalan Lingkar Kadugede No. 02 Kabupaten Kuningan - Propinsi Jawa Barat
     
     * POWERED BY       : CodeIgniter 2.1 & FPDF 1.6	 
	 */

/* setting zona waktu */ 
date_default_timezone_set('Asia/Jakarta');

/* konstruktor halaman pdf sbb :    
   P  = Orientasinya "Potrait"
   cm = ukuran halaman dalam satuan centimeter
   A4 = Format Halaman
   
   jika ingin mensetting sendiri format halamannya, gunakan array(width, height)  
   contoh : $this->fpdf->FPDF("P","cm", array(20, 20));  
*/

$this->fpdf->FPDF("P","cm",array(7,15));

// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
$this->fpdf->SetMargins(0.5,0.5,0.5);


/* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
   di footer, nanti kita akan membuat page number dengan format : number page / total page
*/
$this->fpdf->AliasNbPages();

// AddPage merupakan fungsi untuk membuat halaman baru
$this->fpdf->AddPage();

// Setting Font : String Family, String Style, Font size 
$this->fpdf->SetFont('Times','B',12);

/* Kita akan membuat header dari halaman pdf yang kita buat 
   -------------- Header Halaman dimulai dari baris ini -----------------------------
*/
$this->fpdf->Cell(6,0,'PD. Bang Beur Beras',0,0,'C');

// fungsi Ln untuk membuat baris baru
$this->fpdf->Ln();
$this->fpdf->Cell(19,0.7,$judulpdf,0,0,'C');

$this->fpdf->Ln();
/* Setting ulang Font : String Family, String Style, Font size
   kenapa disetting ulang ???
   jika tidak disetting ulang, ukuran font akan mengikuti settingan sebelumnya.
   tetapi karena kita menginginkan settingan untuk penulisan alamatnya berbeda,
   maka kita harus mensetting ulang Font nya.
   jika diatas settingannya : helvetica, 'B', '12'
   khusus untuk penulisan alamat, kita setting : helvetica, '', 10
   yang artinya string stylenya normal / tidak Bold dan ukurannya 10 
*/
$this->fpdf->SetFont('helvetica','',6);
$this->fpdf->Cell(6,-0.6,'Jl. Terusan Pasir Koja No. 56 Bandung - Jawa Barat 40221',0,0,'C');
 
$this->fpdf->Ln();
$this->fpdf->Cell(6,1,'homepage : www.bangbeur.com  email : faisalfebri67@yahoo.co.id',0,0,'C');
$this->fpdf->Ln();
$this->fpdf->Cell(6,-0.5,'Telp : 089-648686709 Fax : 0232-875123',0,0,'C');

/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(0.5,1.5,6.5,1.5);
$this->fpdf->Line(1,3.3,6,3.3);

/* -------------- Header Halaman selesai ------------------------------------------------*/

$this->fpdf->Ln(1);
$this->fpdf->SetFont('Times','B',10);
$this->fpdf->Cell(0,-1.3,"Transaksi Pembelian",0,0,'C');


/* setting header table */
if ($pelanggan->kd == "UNKNOW"){
			  $pembeli="Bukan Langgan";
		  }
		  else{
			  $pembeli="(".$pelanggan->kd.") ".$pelanggan->nama_customer."";
		  }
$this->fpdf->Ln(0);
$this->fpdf->SetFont('Times','B',6.5);
$this->fpdf->Cell(1.5  ,0, 'Kode Beli',0 , 'LR', 'L');
$this->fpdf->Cell(1  ,0, ' : '.$pelanggan->kd_keluar,0, 'LR', 'L');
$this->fpdf->Cell(2  ,0, 'Tgl Beli',0, 'LR', 'R');
$this->fpdf->Cell(1.5  ,0, ' : '.$pelanggan->tgl_keluar,0, 'LR', 'R');

/* generate hasil query disini */
    $this->fpdf->Ln(0.4);
    $this->fpdf->SetFont('Times','B',6.5);
$this->fpdf->Cell(1.5  ,0, 'Nama Pembeli',0 , 'LR', 'L');
$this->fpdf->Cell(1  ,0, ' : '.$pembeli,0, 'LR', 'L');
$this->fpdf->Cell(2  ,0, '',0, 'LR', 'R');
$this->fpdf->Cell(1.5  ,0, '',0, 'LR', 'R');

$this->fpdf->Ln(0.4);
$this->fpdf->SetFont('Times','B',6.5);
$this->fpdf->Cell(0.5  ,0.3, 'No.',1 , 'LR', 'L');
$this->fpdf->Cell(3  ,0.3, ' Nama Barang',1, 'LR', 'C');
$this->fpdf->Cell(1  ,0.3, 'Jml Beli',1, 'LR', 'C');
$this->fpdf->Cell(1.5  ,0.3, 'Harga',1, 'LR', 'C');
$no=1;
  foreach($data as $row){
$this->fpdf->Ln(0.33);
$this->fpdf->SetFont('Times','',6.5);
$this->fpdf->Cell(0.5  ,0.3,$no,0 , 'LR', 'L');
$this->fpdf->Cell(3  ,0.3,$row->nama_barang,0, 'LR', 'C');
$this->fpdf->Cell(1  ,0.3, $row->jml_keluar.' Krg',0, 'LR', 'C');
$this->fpdf->Cell(1.5  ,0.3, 'Rp '. $row->laba,0, 'LR', 'C');
  $no++;}

$this->fpdf->Ln(0.33);
$this->fpdf->SetFont('Times','B',6.5);
$this->fpdf->Cell(0.5  ,0.3, '',0 , 'LR', 'L');
$this->fpdf->Cell(3  ,0.3, ' Total',0, 'LR', 'C');
$this->fpdf->Cell(1  ,0.3, $hasil->jumlah_beli.' Krg',0, 'LR', 'C');
$this->fpdf->Cell(1.5  ,0.3, 'Rp '. $hasil->total_bayar.';',0, 'LR', 'C');

$this->fpdf->Ln(0.8);
$this->fpdf->SetFont('Times','B',6.5);
$this->fpdf->Cell(5.5  ,0.3, 'Tanda Tangan',0, 'LR', 'R');
$this->fpdf->Ln(1);
$this->fpdf->SetFont('Times','B',6.5);
$this->fpdf->Cell(5.6  ,0.3, 'Pegawai Gudang',0, 'LR', 'R');

$this->fpdf->Ln(0.7);
$this->fpdf->SetFont('Times','B',7);
$this->fpdf->Cell(6  ,0.5, 'PD. Bang Beur Beras || Aplikasi Inventori Beras V.01 ',1 , 'LR', 'C');

/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output($judulpdf.".pdf","I");
?>