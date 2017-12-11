<?php 
class M_login extends CI_Model
{
    public function validated(){
        // mengambil data inputan
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Kondisi Where
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        // Sintak
        $query = $this->db->get('t_user');
        // Cek Hasil
        if($query->num_rows == 1)
        {
            // jika data ditemukan
            $row = $query->row();
            $data = array(
					'username' => $row->username,
					'akses' => $row->akses,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validated
        // then return false.
       else{
		   echo "<script>alert('Username atau password Salah');</script>";
		echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_login/">';
		   }
    }
}?>