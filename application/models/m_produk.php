<?php 
class M_produk extends CI_Model
{

	function pemesanan_customer(){
		return $this->db->query("SELECT * FROM barang WHERE stok BETWEEN 0 AND 20");
		}	
	function pesanan($no=""){
		if($no == NULL){
			$query="SELECT * FROM v_pesanan GROUP BY no_pesanan";
			}
		else{
			$query="SELECT * FROM v_pesanan	WHERE no_pesanan='$no'";
			}
		return $this->db->query("$query");
		}
	function konfirmasi_pesanan($no=""){
		if($no == NULL){
			$query="SELECT * FROM v_pesanan WHERE kirim='belum' GROUP BY no_pesanan";
			}
		else{
			$query="SELECT * FROM v_pesanan	WHERE kirim='belum' AND no_pesanan='$no'";
			}
		return $this->db->query("$query");
		}
	function p_pesan(){
		$no_pesanan=$this->input->post('no_pesanan');
		$jum=$this->input->post('jum');
		$tgl=$this->db->query("SELECT now() as tgl FROM t_barang GROUP BY tgl")->row();
		$no=1;
		while($no <= $jum){
			$query=$this->db->query("SELECT * FROM t_detail_pesanan WHERE no_pesanan='$no_pesanan'")->result();
			foreach($query as $q){
			$quer=$this->db->query("SELECT * FROM t_barang WHERE kd_barang='".$this->input->post('kd_barang'.$no)."'")->row();
				if($q->jml >= $quer->stok){
					$cek="END";
					$no=$jum;
					}
				else{
					$cek="START";
					}
				}	
			$no++;}
		if($cek=="END"){
			echo "<script>alert('Belum Bisa Konfirmasi Karena Stok Masih Kurang');</script>";
			}
		elseif($cek=="START"){
			$data=array('tgl_kirim'=>$tgl->tgl);
			$this->db->where('no_pesanan',$no_pesanan);
			$this->db->update('t_detail_pesanan',$data);
			$dati=array('kirim'=>'kirim');
			$this->db->where('no_pesanan',$no_pesanan);
			$this->db->update('t_pesanan',$dati);
			$tampil=$this->db->query("SELECT RIGHT(kd_keluar,'2') AS hasil FROM t_keluar ORDER BY kd_keluar DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K0'.$n;
			} 
			$n=1;
			while($n <= $jum){
				$select=$this->db->query("SELECT b.harga-a.harga AS laba,b.stok FROM t_harga a,t_barang b 
							WHERE a.kd_barang=b.kd_barang AND a.kd_barang='".$this->input->post('kd_barang'.$n)."'")->row();
			$da=array('kd_keluar'=>$kd_keluar,
						'kd_barang'=>$this->input->post('kd_barang'.$n),
						'kd_customer'=>$this->input->post('kd_cust'),
						'tgl_keluar'=>$tgl->tgl,
						'jml_keluar'=>$this->input->post('jml'.$n),
						'laba'=>$select->laba
						);
			$this->db->insert('t_keluar',$da);
			$d=array('stok'=>$select->stok-$this->input->post('jml'.$n));
			$this->db->where('kd_barang',$this->input->post('kd_barang'.$n));
			$this->db->update('t_barang',$d);
			$n++;}
			echo "<script>alert('Konfirmasi Berhasil');</script>";
				echo "<script>window.open('".base_url()."index.php/c_excel/berhasil_beli/".$kd_keluar."')</script>";
			}
		}
		
		function barang($offset,$url,$keyword)
		{
			if($keyword != NULL){
				$keyword="WHERE nama_barang LIKE '%$keyword%'";
				}
			else{
				$keyword="";
				}
		    $string_query = "SELECT * FROM barang $keyword ORDER BY kd_barang";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_produk/'.$url."/";  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '6';  
            $num= $config['per_page'];
			$config['next_link']= 'NEXT';
			$config['prev_link']= 'BACK';  
            $offset= $this->uri->segment(3);  
            $offset= ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
              
			if(empty($offset))  
            {  
                $offset=0;  
            } 
			$this->pagination->initialize($config);
            return $this->db->query($string_query." limit $offset,$num");  
        }  
		
			function detail($kd)
		{
			$this->db->where('kd_barang',$kd);
			$hasil=$this->db->get("barang");
			return $hasil->row();
		}
			function jenis()
		{
			$hasil=$this->db->get("t_jenis");
			return $hasil->result();
		}
			function barangcari($kd)
		{
			$this->db->where('kd_barang',$kd);
			$hasil=$this->db->get("t_barang");
			return $hasil->row();
		}
			function barangbiasa()
		{
			$hasil=$this->db->get("barang");
			return $hasil->result();
		}
			function barangbiasa2()
		{
			$hasil=$this->db->query("SELECT * FROM barang WHERE stok != 20 AND stok > 0");
			return $hasil->result();
		}
			function barangbiasa3()
		{
			$hasil=$this->db->query("SELECT * FROM barang WHERE stok != 20");
			return $hasil;
		}
			function banyak_cek()
		{
			$where="";
			foreach($this->input->post('jum') as $row){
			$where=$where."SELECT * FROM t_barang  WHERE kd_barang='$row' UNION ";
			}
			$where=substr($where,0,-6);
			return $this->db->query("$where");
		}

			function sup()
		{
			$hasil=$this->db->get("t_supplier");
			return $hasil->result();
		}
			
			function beli($kd)
		{
			$this->db->where('kd_barang',$kd);
			$hasil=$this->db->get("barang");
			return $hasil->row();
		}
			
			function p_beli()
		{
			$kd=$this->input->post('kd');
			$nama=$this->input->post('nama');
			$pembeli=$this->input->post('pembeli');
			$jml=$this->input->post('jml');
			$satuan=$this->input->post('satuan');
			$harga=$this->input->post('harga');
			$stok=$this->input->post('stok');
			$stok2=$this->input->post('stok2');
			$tampil=$this->db->query("SELECT RIGHT(kd_keluar,'2') AS hasil FROM t_keluar ORDER BY kd_keluar DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K0'.$n;
			}
			$laba=$harga*$jml;
		if($pembeli == 1)
		{
			$pembeli='UNKNOW';
			}
			$hasil=$stok - $jml;
			if($stok2 >= $jml AND $stok2 >0)
			{
			$this->db->query("INSERT INTO `t_keluar` (`kd_keluar`, `kd_barang`, `kd_customer`, `tgl_keluar`, `jml_keluar`, `laba`) VALUES ('$kd_keluar', '$kd', '$pembeli', CURDATE(), '$jml', '$laba');");
		$data=array('stok'=>$hasil);
		$this->db->where('kd_barang',$kd);
		$this->db->update('t_barang',$data);
		if($hasil <=25)
		{
			echo "<script>alert('DANGER stok hampir habis, segera isi ulang.')</script>";
		}
				echo "<script>window.open('".base_url()."index.php/c_excel/berhasil_beli/".$kd_keluar."')</script>";
				echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/pesan/berhasil/">';
			}
			else
			{
			redirect('/c_produk/pesan/gagal_stok/'.$kd);
				}
		}
			
			function p_beli_banyak($jum)
	{			$tampil=$this->db->query("SELECT RIGHT(kd_keluar,'2') AS hasil FROM t_keluar ORDER BY kd_keluar DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K0'.$n;
			}
			$x=0;
			$c=0;
			$n=1;
			while($n <= $jum){
			$kd=$this->input->post('kd'.$n);
			$q=$this->db->query("SELECT * FROM t_barang WHERE kd_barang='$kd'")->row();
			$satuan="Karung";
			$st=$q->stok-20;
			$j=$this->input->post('jml'.$n);
			if($st < $j)
			{
				$c=0;	
			echo "<script>alert('Proses ke ".$n." gagal karena stok tidak mencukupi')</script>";
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/option/">';
			$n=$n+$jum;
			$x=1;
				}
				
				$n++;
			}
			if($x != 1){
			$no=1;
			while($no <= $jum){
			$kd=$this->input->post('kd'.$no);
			$pembeli=$this->input->post('pembeli');
			$satuan="Karung";
			$jml=$this->input->post('jml'.$no);
			$q=$this->db->query("SELECT * FROM t_barang WHERE kd_barang='$kd'")->row();
			$satuan=$q->satuan;
			$nama=$q->nama_barang;
			$harga=$q->harga;
			$stok=$q->stok-20;
			$s=$q->stok;
			$laba=$harga*$jml;
		if($pembeli == 1)
		{
			$pembeli='UNKNOW';
			}
			$hasil=$s - $jml;
			if($stok >= $jml)
			{
			$this->db->query("INSERT INTO `t_keluar` (`kd_keluar`, `kd_barang`, `kd_customer`, `tgl_keluar`, `jml_keluar`, `laba`) VALUES ('$kd_keluar', '$kd', '$pembeli', CURDATE(), '$jml', '$laba');");
		$data=array('stok'=>$hasil);
		$this->db->where('kd_barang',$kd);
		$this->db->update('t_barang',$data);
		}
		else{
			$c=1;
			echo "<script>alert('Proses ke ".$no." gagal karena stok tidak mencukupi')</script>";
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/option/">';
			}
		$no++;
		} if($c !=1){
				echo "<script>alert('Operasi Berhasil.')</script>";
				echo "<script>window.open('".base_url()."index.php/c_excel/berhasil_beli/".$kd_keluar."')</script>";
				echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_produk/option/">';
		}}
		}
					function p_konfirmasi($kd_keluar,$kd,$asal)
		{
			$stok=$this->input->post('stok');
			$jml=$this->input->post('jml');
			$satuan=$this->input->post('satuan');
			$harga=$this->input->post('harga');
			$tampil=$this->db->get('t_keluar');
			$laba=$harga*$jml;
			$balik=$stok+$asal; // <- stok awal
		if($tampil->num_rows() < 10) 
		{	
			$n=$tampil->num_rows() + 1;
			$kd_keluar='K00'.$n;
		}
		elseif($tampil->num_rows() >= 10 AND $tampil->num_rows() < 100) 
		{	
			$n=$tampil->num_rows() + 1;
			$kd_keluar='K0'.$n;
		}
		if($satuan == 2)
		{
			$jml=$jml*25;
			$laba=$harga*$jml;
			}
			$hasil=$balik - $jml;
			if($balik >= $jml)
			{
		$dato=array('jml_keluar'=>$jml,'laba'=>$laba);
		$this->db->where('kd_keluar',$kd_keluar);
		$this->db->update('t_keluar',$dato);
		$data=array('stok'=>$hasil);
		$this->db->where('kd_barang',$kd);
		$this->db->update('t_barang',$data);
				redirect('c_produk/konfirmasi/'.$kd_keluar);
			}
			else
			{
			redirect('/c_produk/pesan/gagal_stok/'.$kd.'/konfirmasi/'.$kd_keluar);
				}
		}
			
			function p_ubah($kd)
		{
			$nama=$this->input->post('nama');
			$jenis=$this->input->post('jenis');
			$foto=$this->input->post('foto');

		$data=array('nama_barang'=>$nama,
					'kd_jenis'=>$jenis,
					);
		$this->db->where('kd_barang',$kd);
		$this->db->update('t_barang',$data);
		}
			
			function tambah()
		{
					/* Jenis */
		if($this->input->post("kd1") == NULL){
		$kd_jenis=$this->input->post("kd2");
		$nama_jenis=$this->input->post("nama_tambah");
		$ket=$this->input->post("ket_tambah");
		$data=array(
					'kd_jenis'=>$kd_jenis,
					'nama_jenis'=>$nama_jenis,
					'ket'=>$ket
		);
		$this->db->insert("t_jenis",$data);
		}
			else{
		$kd_jenis=$this->input->post("kd1");
			}
		
		/* Supplier */
				if($this->input->post("kd_supplier1") == NULL){
		$kd_supplier=$this->input->post("kd_supplier2");
		$nama_supplier=$this->input->post("nama_supplier");
		$alamat_supplier=$this->input->post("alamat_supplier");
		$tlp_supplier=$this->input->post("tlp_supplier");
		$email_supplier=$this->input->post("email_supplier");
		$data2=array(
					'kd_supplier'=>$kd_supplier,
					'nama_supplier'=>$nama_supplier,
					'alamat_supplier'=>$alamat_supplier,
					'tlp'=>$tlp_supplier,
					'email'=>$email_supplier,
					'kd_jenis'=>$kd_jenis
		);
		$this->db->insert("t_supplier",$data2);
				}
				else{
		$kd_supplier=$this->input->post("kd_supplier1");
					}
		/* harga */
		$kd_harga=$this->input->post("kd_harga");
		$kd_barang=$this->input->post('kd');
		$harga1=$this->input->post("harga1");
		$data3=array('kd_barang'=>$kd_barang,
					'kd_harga'=>$kd_harga,
					'satuan'=>"Karung",
					'harga'=>$harga1
					);
			$this->db->insert('t_harga',$data3);
		/* barang */
			$nama_barang=$this->input->post('nama_barang');
			$harga2=$harga1;
			$harga=$harga2 * 20 / 100;
			$foto=basename($_FILES['foto']['name']);
		$data4=array('kd_barang'=>$kd_barang,
					'kd_jenis'=>$kd_jenis,
					'nama_barang'=>$nama_barang,
					'satuan'=>"Karung",
					'harga'=>$harga2+$harga,
					'stok'=>0,
					'kd_supplier'=>$kd_supplier,
					'foto'=>$foto
					);
			$this->db->insert('t_barang',$data4);
		
		}
		function jenis_baru()
		{
			$tampil=$this->db->query("SELECT RIGHT(kd_jenis,'2') AS hasil FROM t_jenis ORDER BY kd_jenis DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='J00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='J0'.$n;
			}
			return $kd_keluar; 
			}
		function keluar_baru()
		{
			$tampil=$this->db->query("SELECT RIGHT(kd_keluar,'2') AS hasil FROM t_keluar ORDER BY kd_keluar DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='K0'.$n;
			}
			return $kd_keluar; 
			}
		function sup_baru()
		{
			$tampil=$this->db->query("SELECT RIGHT(kd_supplier,'2') AS hasil FROM t_supplier ORDER BY kd_supplier DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='A00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='A0'.$n;
			}
			return $kd_keluar; 
			}
		function harga_baru()
		{
			$tampil=$this->db->query("SELECT RIGHT(kd_harga,'2') AS hasil FROM t_harga ORDER BY kd_harga DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='H00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='H0'.$n;
			}
			return $kd_keluar; 
			}

		function barang_baru()
		{
			$tampil=$this->db->query("SELECT RIGHT(kd_barang,'2') AS hasil FROM t_barang ORDER BY kd_barang DESC LIMIT 1")->row();
			if($tampil->hasil < 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='B00'.$n;
			}
			elseif($tampil->hasil >= 9)
			{
			$n=$tampil->hasil + 1;
			$kd_keluar='B0'.$n;
			}
			return $kd_keluar; 
			}
	
			function pelanggan()
		{
			$hasil=$this->db->query("SELECT * FROM t_pelanggan WHERE kd != 'UNKNOW'");
			return $hasil->result();
		}
			function pelanggan2()
		{
			$hasil=$this->db->query("SELECT * FROM t_pelanggan");
			return $hasil->result();
		}
			function semua($kd)
		{
			$hasil=$this->db->query("SELECT a.*,b.harga AS harga2,b.kd_harga,c.*,d.* FROM t_barang a,t_harga b,t_jenis c,t_supplier d WHERE a.kd_barang = b.kd_barang AND a.kd_jenis=c.kd_jenis AND c.kd_jenis=d.kd_jenis AND a.kd_barang='$kd'");
			return $hasil->row();
		}
		
			function hargacari($kd)
		{
			$hasil=$this->db->query("SELECT harga('$kd') as harga");
			return $hasil->row();
		}
			function hargaubah()
		{
		$kd=$this->input->post('kd');
		$harga=$this->input->post('harga1');
		$this->db->query("CALL harga('$kd','$harga')");
		}
		
		function berhasil_beli($kd){
			$this->db->where("kd_keluar",$kd);
			return $this->db->get("konfirmasi")->result();
			
			}
		
		function jumlah($kd){
			return $this->db->query("SELECT SUM(jml_keluar) as jumlah_beli,SUM(laba) as total_bayar FROM konfirmasi WHERE kd_keluar='$kd'")->row();
			
			}
			function konfirmasi($kd)
		{
			$hasil=$this->db->query("SELECT *,MONTH(tgl_keluar) as bulan,harga*jml_keluar as duit FROM konfirmasi WHERE kd_keluar='$kd'");
			return $hasil->row();
		}

}?>