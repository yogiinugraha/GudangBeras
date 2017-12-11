<?php 
class M_kepala extends CI_Model
{
	function jumlah(){
		return $this->db->query("SELECT COUNT(*) as jumlah FROM t_permintaan WHERE konfirmasi ='belum' ");
		}
	function konfirmasi(){
		return $this->db->query("SELECT * FROM permintaan WHERE konfirmasi ='belum' ");
		}
	function p_konfirmasi($no,$kd){
		$data=array('konfirmasi'=>'sudah');
		$this->db->where('no_permintaan',$no);
		$this->db->where('kd_barang',$kd);
		$this->db->update('t_permintaan',$data);
		}
	
		function customer($offset)
		{
		    $string_query = "SELECT * FROM konfirmasi ORDER BY kd_keluar";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_transaksi/customer/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
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
		
		function stok_barang($bulan,$offset)
		{
			if($bulan != 0)
			{
				$where="SELECT t_stok.*,barang.nama_barang FROM t_stok,barang WHERE t_stok.bulan='$bulan' AND t_stok.kd_barang=barang.kd_barang ORDER BY barang.kd_barang";
				}
			else{$where="SELECT * FROM barang  ORDER BY barang.kd_barang";}
			
            return $this->db->query($where);  
        }  
		function keluarnama($bulan,$offset)
		{
			$b=$this->bulan->bulan_angka($bulan);
		    $string_query = "SELECT *,MONTH(tgl_keluar) as bulan FROM konfirmasi WHERE MONTH(tgl_keluar)='$b' ORDER BY nama_customer";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/detail/'.$bulan.'/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
            $num= $config['per_page'];
			$config['next_link']= 'NEXT';
			$config['prev_link']= 'BACK';  
			$config['uri_segment']=4;
            $offset= $this->uri->segment(4);  
            $offset= ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
              
			if(empty($offset))  
            {  
                $offset=0;  
            } 
			$this->pagination->initialize($config);
            return $this->db->query($string_query." limit $offset,$num");  
        }  
		function k($bulan,$offset,$nama)
		{
			$b=$this->bulan->bulan_angka($bulan);
		    $string_query = "SELECT *,MONTH(tgl_keluar) as bulan FROM konfirmasi WHERE MONTH(tgl_keluar)='$b' AND kd='$nama' ORDER BY nama_customer";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/detail/'.$bulan.'/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
            $num= $config['per_page'];
			$config['next_link']= 'NEXT';
			$config['prev_link']= 'BACK';  
			$config['uri_segment']=4;
            $offset= $this->uri->segment(4);  
            $offset= ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
              
			if(empty($offset))  
            {  
                $offset=0;  
            } 
			$this->pagination->initialize($config);
            return $this->db->query($string_query." limit $offset,$num");  
        }  
		function mintanama($bulan,$offset)
		{
			$b=$this->bulan->bulan_angka($bulan);
		    $string_query = "SELECT * FROM r_minta WHERE bulan='$b' ORDER BY nama_barang";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/detailminta/'.$bulan.'/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
            $num= $config['per_page'];
			$config['next_link']= 'NEXT';
			$config['prev_link']= 'BACK';  
            $offset= $this->uri->segment(4);  
            $offset= ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;  
              
			if(empty($offset))  
            {  
                $offset=0;  
            } 
			$this->pagination->initialize($config);
            return $this->db->query($string_query." limit $offset,$num");  
        }  
		function keluar($offset)
		{
		    $string_query = "SELECT * FROM keluar ORDER BY bulan";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/keluar/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
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
		
		function produk($offset)
		{
			$no=2;
			$q="SELECT bulan,nama_barang,SUM(jml_keluar) AS total,tahun FROM r_produk WHERE bulan=1 GROUP BY nama_barang";
			while($no <= 12){
				$q=$q." UNION
SELECT bulan,nama_barang,SUM(jml_keluar) AS total,tahun FROM r_produk WHERE bulan='$no' GROUP BY nama_barang";
			$no++;}
			
		    $string_query = $q;  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/produk/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '20';  
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
		
		function minta($offset)
		{
		    $string_query = "SELECT bulan,SUM(jml_minta) AS total,SUM(pengeluaran) pengeluaran FROM r_minta GROUP BY bulan ORDER BY bulan";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/minta/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
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
					
			function detailsup($kd_sup)
		{
			$this->db->where('kd_supplier',$kd_sup);
			$hasil=$this->db->get("sup");
			return $hasil->row();
		}

			
		function sup($offset)
		{
		    $string_query = "SELECT * FROM sup ORDER BY kd_supplier";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/sup/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
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
		function batal($kd_keluar,$kd,$stok,$jml)
		{
			$hasil=$stok+$jml;
			$data=array('stok'=>$hasil);
			$this->db->where('kd_barang',$kd);
			$this->db->update('t_barang',$data);

			$this->db->delete('t_keluar',array('kd_keluar'=>$kd_keluar));
			echo "<script>alert('Transaksi Telah di Batalkan');
			javascript:history.go(-)
			</script>
			";
			}
	
			function pelanggan()
		{
			$hasil=$this->db->get("t_barang");
			return $hasil->result();
		}
			function cus()
		{
			$hasil=$this->db->get("t_pelanggan");
			return $hasil->result();
		}
			function hasil($bulan)
		{
			$b=$this->bulan->bulan_angka($bulan);
			$hasil=$this->db->query("SELECT SUM(jml_keluar) AS total,MONTH(tgl_keluar) as bulan, SUM(laba) AS jml FROM konfirmasi WHERE  MONTH(tgl_keluar)='$b'");
			return $hasil;
		}
		function hasil1($bulan)
		{
			$b=$this->bulan->bulan_angka($bulan);
			$hasil=$this->db->query("SELECT SUM(jml_minta) AS total, SUM(pengeluaran) AS jml FROM r_minta WHERE  MONTH(tgl_permintaan)='$b'");
			return $hasil;
		}
			function hasilsemua()
		{
			$hasil=$this->db->query("SELECT SUM(jml_keluar) AS total, SUM(laba) AS jml FROM konfirmasi");
			return $hasil;
		}
			function hasilsemua2()
		{
			$hasil=$this->db->query("SELECT SUM(jml_minta) AS total, SUM(pengeluaran) AS jml FROM r_minta");
			return $hasil;
		}
		
			function stok()
		{
			$kd=$this->input->post('kd');
			$this->db->where('kd_barang',$kd);
			$hasil=$this->db->get("barang");
			return $hasil->row();
		}
					function supplier()
		{
			$hasil=$this->db->get("t_jenis");
			return $hasil->result();
		}
		
		function keuntungan()
		{
			$no=2;
			$q="SELECT a.laba-SUM(b.pengeluaran) as keuntungan, a.bulan FROM keluar a,r_minta b WHERE a.bulan=b.bulan AND b.bulan=1";
			while($no <= 12){
				$q=$q." UNION
SELECT a.laba-SUM(b.pengeluaran) as keuntungan, a.bulan FROM keluar a,r_minta b WHERE a.bulan=b.bulan AND b.bulan='$no'";
				$no++;}
			$hasil=$this->db->query($q);
			return $hasil->result();
		}


}?>