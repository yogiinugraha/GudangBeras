<?php 
class M_excel extends CI_Model
{
		function stok_barang()
		{
		    return $this->db->query("SELECT * FROM barang ORDER BY kd_barang")->result();  
        }  
		function keluar_barang()
		{
			$bulan1=$this->input->post("bulan1");
			$bulan2=$this->input->post("bulan2");
		    return $this->db->query("SELECT *,MONTH(tgl_keluar) as bulan FROM konfirmasi WHERE tgl_keluar BETWEEN '$bulan1' AND '$bulan2'")->result();  
        }  
		function total_beli()
		{
			$bulan1=$this->input->post("bulan1");
			$bulan2=$this->input->post("bulan2");
		    return $this->db->query("SELECT SUM(jml_keluar) as total FROM konfirmasi WHERE tgl_keluar BETWEEN '$bulan1' AND '$bulan2'")->row();  
        }  
		function total_laba()
		{
			$bulan1=$this->input->post("bulan1");
			$bulan2=$this->input->post("bulan2");
		    return $this->db->query("SELECT SUM(laba) as jml FROM konfirmasi WHERE tgl_keluar BETWEEN '$bulan1' AND '$bulan2'")->row();  
        }  
		function total_pengeluaran()
		{
			$bulan1=$this->input->post("bulan1");
			$bulan2=$this->input->post("bulan2");
		    return $this->db->query("SELECT SUM(pengeluaran) as jml FROM r_minta WHERE tgl_permintaan BETWEEN '$bulan1' AND '$bulan2'")->row();  
        }  
		function minta_barang()
		{
			$bulan1=$this->input->post("bulan1");
			$bulan2=$this->input->post("bulan2");
		    return $this->db->query("SELECT * FROM r_minta WHERE tgl_permintaan BETWEEN '$bulan1' AND '$bulan2'")->result();  
        }  
		function keluarnama($bulan,$offset)
		{
			$b=$this->bulan->bulan_angka($bulan);
		    $string_query = "SELECT *,MONTH(tgl_keluar) as bulan FROM konfirmasi WHERE MONTH(tgl_keluar)='$b' ORDER BY nama_customer";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_kepala/detail/'.$bulan.'/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '20';  
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
		    $string_query = "SELECT * FROM keluar ORDER BY tahun";  
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
		    $string_query = "SELECT bulan,nama_barang,SUM(jml_keluar) AS total,tahun FROM r_produk WHERE bulan=11 GROUP BY nama_barang
UNION
SELECT bulan,nama_barang,SUM(jml_keluar) AS total,tahun FROM r_produk WHERE bulan=12 GROUP BY nama_barang
UNION
SELECT bulan,nama_barang,SUM(jml_keluar) AS total,tahun FROM r_produk WHERE bulan=1 GROUP BY nama_barang";  
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
		    $string_query = "SELECT bulan,SUM(jml_minta) AS total,SUM(pengeluaran) pengeluaran FROM r_minta GROUP BY bulan ORDER BY tahun";  
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
	
			function pelanggan($kd)
		{
			$this->db->where("kd",$kd);
			$hasil=$this->db->get("t_pelanggan");
			return $hasil->row();
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
			$hasil=$this->db->query("SELECT a.laba-SUM(b.pengeluaran) as keuntungan, a.bulan FROM keluar a,r_minta b WHERE a.bulan=b.bulan AND b.bulan=11
UNION
SELECT a.laba-SUM(b.pengeluaran) as keuntungan, a.bulan FROM keluar a,r_minta b WHERE a.bulan=b.bulan AND b.bulan=12
UNION
SELECT a.laba-SUM(b.pengeluaran) as keuntungan, a.bulan FROM keluar a,r_minta b WHERE a.bulan=b.bulan AND b.bulan=1
");
			return $hasil->result();
		}
		
		function berhasil_beli($kd){
			$this->db->where("kd_keluar",$kd);
			return $this->db->get("konfirmasi")->result();
			
			}
			
			function konfirmasi($kd)
		{
			$hasil=$this->db->query("SELECT *,MONTH(tgl_keluar) as bulan,harga*jml_keluar as duit FROM konfirmasi WHERE kd_keluar='$kd'");
			return $hasil->row();
		}
		
		function jumlah($kd){
			return $this->db->query("SELECT SUM(jml_keluar) as jumlah_beli,SUM(laba) as total_bayar FROM konfirmasi WHERE kd_keluar='$kd'")->row();
			
			}



}?>