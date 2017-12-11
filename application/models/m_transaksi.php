<?php 
class M_transaksi extends CI_Model
{
			function keluar($keyword,$offset)
		{
						if($keyword != NULL){
				$keyword="WHERE nama_customer LIKE '%$keyword%'";
				}
			else{
				$keyword="";
				}

		    $string_query = "SELECT * FROM v_keluar $keyword ORDER BY bulan DESC";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_transaksi/customer/';  
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
			function permintaan($offset,$kd_barang)
		{
			if($kd_barang == NULL){
		    $string_query = "SELECT * FROM minta ORDER BY nama_barang";  
			}
			else{
		    $string_query = "SELECT * FROM permintaan WHERE kd_barang='$kd_barang' ORDER BY nama_barang";  
				}
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_ktransaksi/supplier/';  
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

		function customer($kd,$bulan,$offset,$keyword)
		{
			$bulan_nama=$bulan;
			$bulan=$this->bulan->bulan_angka($bulan);
			if($keyword != NULL){
				$keyword="AND kd_keluar LIKE '%$keyword%'";
				}
			else{
				$keyword="";
				}
		    $string_query = "SELECT * FROM konfirmasi WHERE kd='$kd' AND MONTH(tgl_keluar)='$bulan' $keyword ORDER BY kd_keluar";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_transaksi/detailcustomer/'.$kd.'/'.$bulan_nama.'/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '6';  
            $config['uri_segment']= '5';  
            $num= $config['per_page'];
			$config['next_link']= 'NEXT';
			$config['prev_link']= 'BACK';  
            $offset= $this->uri->segment(5);  
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
			function det_sup($no,$kd)
		{
			$this->db->where('no_permintaan',$no);
			$this->db->where('kd_barang',$kd);
			$hasil=$this->db->get("permintaan");
			return $hasil->row();
		}
			function confirm()
		{
			$no_faktur=$this->input->post('no_faktur');
			$kd=$this->input->post('kd');
			$no_permintaan=$this->input->post('no_permintaan');
			$nip=$this->input->post('nip');
			$tgl=$this->input->post('tgl');
			$tampil=$this->db->query("SELECT jml_minta,harga,kd_barang,stok FROM permintaan WHERE no_permintaan='$no_permintaan' AND kd_barang='$kd'")->row();
			$harga=$tampil->jml_minta*$tampil->harga;
		$dato=array('stok'=>$tampil->jml_minta+$tampil->stok
					);
		$this->db->where('kd_barang',$tampil->kd_barang);
		$this->db->update('t_barang',$dato);
				$data=array('no_faktur'=>$no_faktur,
					'tgl_terima'=>$tgl,
					'pengeluaran'=>$harga,
					'nip'=>$nip,
					);
		$this->db->where('no_permintaan',$no_permintaan);
		$this->db->where('kd_barang',$kd);
		$this->db->update('t_terima',$data);
		$this->db->where('kd_barang',$kd);
		$this->db->where('no_permintaan',$no_permintaan);
		$this->db->update('t_permintaan',array('status'=>'terima'));
			echo '<script>alert("Konfirmasi Berhasil");</script>';
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_supplier/detailterima/'.$no_permintaan.'/'.$kd.'">';
}

			function konfirmasi($kd_keluar)
		{
			$hasil=$this->db->query("SELECT *,MONTH(tgl_keluar) as bulan,harga*jml_keluar as duit FROM konfirmasi WHERE kd_keluar='$kd_keluar'");
			return $hasil->row();
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
				redirect('c_transaksi/pesan/berhasil/0/0/'.$kd_keluar);
			}
			else
			{
			redirect('/c_produk/pesan/gagal_stok/'.$kd.'/konfirmasi/'.$kd_keluar);
				}
		}
		
		function batal($kd_keluar,$kd,$stok,$jml)
		{
			$hasil=$stok+$jml;
			$data=array('stok'=>$hasil);
			$this->db->where('kd_barang',$kd);
			$this->db->update('t_barang',$data);

			$this->db->delete('t_keluar',array('kd_keluar'=>$kd_keluar));
			echo "<script>alert('Transaksi Telah di Batalkan');</script>
			";
			}
	
			function pelanggan()
		{
			$hasil=$this->db->query("SELECT * FROM t_pelanggan WHERE kd != 'UNKNOW'");
			return $hasil->result();
		}
			function hadi()
		{
			$user=$this->session->userdata('username');
			$hasil=$this->db->query("SELECT curdate() as tgl, a.nip,a.nama_pegawai FROM t_pegawai a,t_user b WHERE a.username=b.username AND b.username='$user'");
			return $hasil;
		}

}?>