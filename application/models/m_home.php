<?php 
class M_home extends CI_Model
{
	function stok(){
		$hari=$this->db->query("SELECT LAST_DAY(CURDATE()) AS akhir,curdate() as ini,MONTH(curdate()) as bulan,YEAR(curdate()) as thn FROM t_barang GROUP BY akhir")->row();
		$barang=$this->db->get('t_barang')->result();
		if($hari->akhir == $hari->ini){
		foreach($barang as $row){
			$data=array(
				'kd_barang'=>$row->kd_barang,
				'bulan'=>$hari->bulan,
				'tahun'=>$hari->thn,
				'stok'=>$row->stok,
				'status'=>'Y',
				'satuan'=>"Karung"
			);
			$this->db->insert('t_stok',$data);
				}			
			echo '<script>alert("Stok Sudah dicek");</script>';
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_home/index">';

			}
		else{
			echo '<script>alert("Tidak ada yang bisa di cek");</script>';
			echo '<meta http-equiv="refresh" content="0 url='.base_url().'index.php/c_home/index">';
			}
		}
			function pesan()
		{
		$user=$this->input->post('username');
		$password=$this->input->post('password');
		$perihal=$this->input->post('perihal');
		$isi=$this->input->post('isi');
        $this->db->where('username', $user);
        $this->db->where('password', md5($password));
		$akses=$this->db->get("t_user");//cek user
		$tgl=$this->db->query("SELECT CURDATE() as tgl")->row();
		if($akses->num_rows == 0)
		{
			log_message('error', 'Data Tidak Ditemukan.');
			echo "<script>alert('Username atau Password salah !!'); javascript:history.go(-1);</script>";
			}
		else
		{
			$data=array(
						'username'=>$user,
						'perihal'=>$perihal,
						'isi'=>$isi,
						'tgl'=>$tgl->tgl,
						'status'=>"belum"
			);
			$this->db->insert('t_pesan',$data);
			echo "<script>alert('Pesan Terkirim!!'); javascript:history.go(-1);</script>";
			}
		}
		
		function cek(){
		$hari=$this->db->query("SELECT LAST_DAY(CURDATE()) AS akhir,curdate() as ini,MONTH(curdate()) as bulan,YEAR(curdate()) as thn FROM t_barang GROUP BY akhir")->row();
		if($hari->akhir == $hari->ini){
			$query=$this->db->query("SELECT * FROM t_stok WHERE bulan=$hari->bulan AND tahun=$hari->thn AND status='Y'");
			if($query->num_rows() >= 1){
				return $data="kosong";
				}
			else{
				return $data="ada";
				}
			}
		
		else{
				return $data="kosong";
				}
}
}?>