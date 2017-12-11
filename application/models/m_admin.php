<?php 
class M_admin extends CI_Model
{
			function tambah()
		{
			$user=$this->input->post('username');
			$pass=$this->input->post('password');
			$nip=$this->input->post('nip');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$tlp=$this->input->post('tlp');
			$foto=basename($_FILES['foto']['name']);
			
		$hasil=array('username'=>$user,
					'password'=>md5($pass),
					'akses'=>'pegawai'
		);	
		$this->db->insert('t_user',$hasil);
		$data=array('nip'=>$nip,
					'nama_pegawai'=>$nama,
					'alamat'=>$alamat,
					'tlp'=>$tlp,
					'gambar'=>$foto,
					'username'=>$user);
		$this->db->insert('t_pegawai',$data);
		}

			function tambahuser()
		{
			$user=$this->input->post('username');
			$pass=$this->input->post('password');
			$akses=$this->input->post('akses');
			
		$hasil=array('username'=>$user,
					'password'=>md5($pass),
					'akses'=>$akses
		);	
		$this->db->insert('t_user',$hasil);
		}

			function editpass()
		{
			$user=$this->input->post('username');
			$this->db->where('username',$user);
			$tampil=$this->db->get('t_user')->row();
			if(!$tampil)
			{
			echo '<script>alert("Username Tidak Terdaftar");</script>';
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_admin/editpass">'; //ada tidaknya username
				}
			else{
			$pass1=md5($this->input->post('password1'));
			$pass2=md5($this->input->post('password2'));
				if($pass1 != $pass2){
			echo '<script>alert("Password Tidak Sama");</script>';
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_admin/editpass">'; //sama tidaknya password
				}
				else{
				$t=$this->db->query("SELECT * FROM t_user WHERE username='$user' AND password='$pass1'")->row();
				if(!$t)
				{
			echo '<script>alert("Username atau Password Salah");</script>';
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_admin/editpass">'; // ada tidaknya password
				}
				else{
				$pass3=$this->input->post('password3');
					$hasil=array(
					'password'=>md5($pass3)
				);	
				$this->db->where('username',$user);
				$this->db->update('t_user',$hasil);
		echo '<script>alert("OPERASI Berhasil");</script>';
				}
			}
		}
		}
		
			function pegawai($offset)
		{
		    $string_query = "SELECT * FROM t_pegawai ORDER BY nip";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_admin/daftar/';  
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
		
			function hapus($nip)
		{
			$hasil=$this->db->delete("t_pegawai",array('nip'=>$nip));
			return $hasil;
		}

			function hapususer($username)
		{
			$hasil=$this->db->delete("t_user",array('username'=>$username));
			return $hasil;
		}
		
			function pegawaicari($nip)
		{
				$this->db->where('nip',$nip);
				$hasil=$this->db->get("t_pegawai");
				return $hasil->row();
				}
		
			function ubah()
		{
			$nip=$this->input->post('nip');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$tlp=$this->input->post('tlp');
			$foto=basename($_FILES['foto']['name']);
			
		$data=array(
					'nama_pegawai'=>$nama,
					'alamat'=>$alamat,
					'tlp'=>$tlp,
					'gambar'=>$foto);
		$this->db->where('nip',$nip);
		$this->db->update('t_pegawai',$data);
		echo '<script>alert("OPERASI Berhasil");</script>';
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_admin/edit/'.$nip.'">';
	}
		
			function user($offset)
		{
		    $string_query = "SELECT * FROM t_user ORDER BY username";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_admin/user/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
            $num= $config['per_page'];
			$config['next_link']= 'NEXT';
			$config['uri_segment']=3;
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
			
			function pesan($offset)
		{
					    $string_query = "SELECT *,left(isi,50) as pesan FROM t_pesan ORDER BY tgl DESC";  
            $query = $this->db->query($string_query);              
            $config['base_url']= base_url().'index.php/c_admin/user/';  
            $config['total_rows']= $query->num_rows();  
            $config['per_page']= '10';  
            $num= $config['per_page'];
			$config['next_link']= 'NEXT';
			$config['uri_segment']=3;
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
			function pesancari($no)
			{
				$data=array(
						'status'=>'dibaca'	
				);
				$this->db->where("no",$no);
				$this->db->update("t_pesan",$data);
				return $this->db->query("SELECT * FROM t_pesan WHERE no='$no'");
				}
}?>