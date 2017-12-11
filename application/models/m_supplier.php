<?php 
class M_supplier extends CI_Model
{
	
		function sup($keyword,$offset)
		{
					   		if($keyword != NULL){
				$keyword="where nama_supplier LIKE '%$keyword%'";
				}
			else{
				$keyword="";
				}

		    $string_query = "SELECT * FROM sup $keyword ORDER BY kd_supplier";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_supplier/index/';  
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
		
		function customer($keyword,$offset)
		{
		   		if($keyword != NULL){
				$keyword="AND nama_customer LIKE '%$keyword%'";
				}
			else{
				$keyword="";
				}
 $string_query = "SELECT * FROM t_pelanggan WHERE kd != 'UNKNOW' $keyword ORDER BY kd";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_supplier/customer/';  
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
		
		function terima($offset,$keyword)
		{			
		if($keyword != NULL){
				$keyword="WHERE nama_barang LIKE '%$keyword%'";
				}
			else{
				$keyword="";
				}

		    $string_query = "SELECT * FROM terima $keyword ORDER BY no_permintaan";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_supplier/terima/';  
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
		
			function detail($kd_sup)
		{
			$this->db->where('kd_supplier',$kd_sup);
			$hasil=$this->db->get("sup");
			return $hasil->row();
		}
			function detailterima($no,$kd)
		{
			$this->db->where('no_permintaan',$no);
			$this->db->where('kd_barang',$kd);
			$hasil=$this->db->get("terima");
			return $hasil->row();
		}
			
			function konfirmasi($kd_keluar)
		{
			$this->db->where('kd_keluar',$kd_keluar);
			$hasil=$this->db->get("konfirmasi");
			return $hasil->row();
		}
			function p_ubah()
		{
			$kd=$this->input->post('kd');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$tlp=$this->input->post('tlp');
			$email=$this->input->post('email');
			$kd_jenis=$this->input->post('jenis');
			
		$data=array('nama_supplier'=>$nama,
					'alamat_supplier'=>$alamat,
					'tlp'=>$tlp,
					'email'=>$email,
					'email'=>$email,
					'kd_jenis'=>$kd_jenis);
		$this->db->where('kd_supplier',$kd);
		$this->db->update('t_supplier',$data);
				redirect('c_supplier/pesan/berhasil/'.$kd);
		}
			function p_tambah($kd)
		{
			$hasil=$this->db->get('t_pelanggan');
			$ktp=$this->input->post('ktp');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$tlp=$this->input->post('tlp');
			$email=$this->input->post('email');
			
		$data=array('ktp'=>$ktp,
					'kd'=>$kd,
					'nama_customer'=>$nama,
					'alamat'=>$alamat,
					'tlp'=>$tlp,
					'email'=>$email,
					'bayar'=>'50000'
					);
		$this->db->insert('t_pelanggan',$data);
		}
			
			function p_tambah_supplier()
		{
			$hasil=$this->db->get('t_supplier');
			if($hasil->num_rows <= 9)
			{
			$tampil=$this->db->query("SELECT RIGHT(kd_supplier,'1') AS hasil FROM t_supplier ORDER BY kd_supplier DESC LIMIT 1")->row();
			$n=$tampil->hasil + 1;
			$kd='A00'.$n;
			}
			elseif($hasil->num_rows > 9)
			{
			$tampil=$this->db->query("SELECT RIGHT(kd_supplier,'2') AS hasil FROM t_supplier ORDER BY kd_supplier DESC LIMIT 1")->row();
			$n=$tampil->hasil + 1;
			$kd='A0'.$n;
			}
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$tlp=$this->input->post('tlp');
			$email=$this->input->post('email');
			$kd_jenis=$this->input->post('kd');
			
		$data=array('kd_supplier'=>$kd,
					'nama_supplier'=>$nama,
					'alamat_supplier'=>$alamat,
					'tlp'=>$tlp,
					'email'=>$email,
					'kd_jenis'=>$kd_jenis);
		$this->db->insert('t_supplier',$data);
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
	
			function supplier()
		{
			$hasil=$this->db->get("t_jenis");
			return $hasil->result();
		}

}?>