<?php 
class M_pemesanan extends CI_Model
{	
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
            $config['base_url']= base_url().'index.php/c_pemesanan/'.$url."/";  
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
	
	function barangcari($kd){
			return $this->db->query("SELECT a.kd_barang,a.nama_barang,a.stok,a.foto,b.kd_supplier,b.nama_supplier,c.harga FROM t_barang a,t_supplier b,t_harga c WHERE a.kd_jenis=b.kd_jenis AND a.kd_barang=c.kd_barang AND a.kd_barang='$kd'")->row();
	}
	
	function banyak(){
		$where=" ";
		foreach($this->input->post('cek') as $row){
		$where=$where."SELECT a.*,b.nama_supplier FROM t_barang a,t_supplier b WHERE a.kd_barang='$row' AND a.kd_supplier=b.kd_supplier UNION ";
		}
		$where=substr($where,0,-6);
		return $this->db->query("$where");
		}
	
	function p_banyak(){
		$n=1;
		$no=$this->input->post('no');
		$jum=$this->input->post('jum');
		$tgl=$this->db->query("SELECT curdate() as tgl")->row();
		while($n <= $jum){
		$data=array(
				'no_permintaan'=>$no,
				'tgl_permintaan'=>$tgl->tgl,
				'kd_supplier'=>$this->input->post('kd_supplier'.$n),
				'kd_barang'=>$this->input->post('kd_barang'.$n),
				'jml_minta'=>$this->input->post('jml'.$n),
				'status'=>'belum',
				'konfirmasi'=>'belum'
		);
		$this->db->insert('t_permintaan',$data);
		$dati=array(
				'no_permintaan'=>$no,
				'kd_barang'=>$this->input->post('kd_barang'.$n),
				'jml_terima'=>$this->input->post('jml'.$n),
		);
		$this->db->insert('t_terima',$dati);
		$n++;
		$no++;
		}
	}
	function p_minta(){
		$no=$this->input->post('no');
		$kd_barang=$this->input->post('kd_barang');
		$kd_supplier=$this->input->post('kd_supplier');
		$stok=$this->input->post('stok');
		$jml=$this->input->post('jml');
		$harga=$this->input->post('harga');
		$tgl=$this->db->query("SELECT curdate() as tgl")->row();
		$data=array(
				'no_permintaan'=>$no,
				'tgl_permintaan'=>$tgl->tgl,
				'kd_supplier'=>$kd_supplier,
				'kd_barang'=>$kd_barang,
				'jml_minta'=>$jml,
				'status'=>'belum',
				'konfirmasi'=>'belum'
		);
		$this->db->insert('t_permintaan',$data);
		$dati=array(
				'no_permintaan'=>$no,
				'kd_barang'=>$kd_barang,
				'jml_terima'=>$jml,
		);
		$this->db->insert('t_terima',$dati);
		
	}
	
	function no(){
		return $this->db->query("SELECT * FROM t_permintaan ORDER BY no_permintaan DESC LIMIT 1")->row();
		}
	function pelanggan(){
		return $this->db->query("SELECT * FROM t_pelanggan WHERE kd !='UNKNOW'")->result();
		}
	function no2(){
		$hasil=$this->db->query("SELECT * FROM t_pesanan ORDER BY no_pesanan DESC LIMIT 1")->row();
		if(count($hasil) == 0){
			return 0;
			}
		else{
			return $hasil;
			}
		}
	function p_pemesanan(){
		$q=$this->db->query("SELECT a.nip,curdate() as tgl FROM t_pegawai a,t_user b WHERE b.username='".$this->session->userdata('username')."'")->row();
		$no_pesanan=$this->input->post('no_pesanan');
		$kd_cust=$this->input->post('kd_cust');
		$today=$q->tgl;
		$nip=$q->nip;
			$data=array(
				'no_pesanan'=>$no_pesanan,
				'tgl_pesan'=>$today,
				'kd_cust'=>$kd_cust,
				'nip'=>$nip,
				'kirim'=>'belum'
			);
			$this->db->insert('t_pesanan',$data);
		$cek=1;
		$jum=$this->input->post('jum');
		while($cek <= $jum){
			$doto=array(
				'no_pesanan'=>$no_pesanan,
				'kd_barang'=>$this->input->post('kd_barang'.$cek),
				'jml'=>$this->input->post('jml'.$cek),
			);
			$this->db->insert('t_detail_pesanan',$doto);
			$cek++;}
		}
}?>