<link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.js"></script>
	<script>
		$(document).ready(function(){
				$("#pilih").change(function(){
		var kode=$('#pilih').val();
		var bulan=$('#bulan').val();
		if(kode == 'kosong')
		{
			return alert("Ga bisa Kosong !");
			}
		else if(kode == 'semua')
		{
        window.location.href="<?php echo base_url();?>index.php/c_kepala/detail/"+bulan;
			}
		else{
        window.location.href="<?php echo base_url();?>index.php/c_kepala/detail/"+bulan+"/0/"+kode;
			}
					});
		});
	</script>
        <h2><?php echo $judul;?></h2>
        <table width="100%" border="0">
  <tr>
    <td><div class="pagination"><?php echo $this->pagination->create_links();?></div></td>
    <td align="right">Pencarian Berdasarkan Pelanggan : <select name="list" id="pilih"><option value="kosong">--Pencarian--</option>
          <?php foreach($cus as $row){	?>
          <option value="<?php echo $row->kd;?>"><?php echo $row->nama_customer;?></option>
          <?php }?>
          <option value="semua" style="color:#ba0808; text-align:center;">-Show All-</option>
        </select>
        <input type="hidden" id="bulan" value="<?php $bulan=$this->bulan->angka_bulan($hasil->bulan); echo $bulan;?>" /></td>
  </tr>
</table>

          
        <table width="100%" border="0" class="tabel2">
          <tr>
            <th>Barang</th>
            <th>Pembeli</th>
            <th>Jumlah Beli</th>
            <th>Tanggal Beli</th>
            <th>Pemasukan</th>
          </tr>
          <?php $no=1;
  foreach($data as $row){
	 
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}
	  ?>
          <tr <?php echo $warna;?>>
            <td><?php echo $row->nama_barang;?></td>
            <td><?php echo $row->nama_customer;?></td>
            <td align="center"><?php echo $row->jml_keluar;?> Karung</td>
            <td><?php echo $row->tgl_keluar;?></td>
            <td>Rp <?php echo $row->laba;?>;</td>
            <?php $no++;} ?>
          </tr>
          <tr>
            <td style="border:none;"></td>
            <td bgcolor="#e4e4e4"><strong>Total Beli</strong></td>
            <td align="center">: <font color="red"><?php echo $hasil->total;?></font> Karung</td>
            <td bgcolor="#e4e4e4"><strong>Total Laba</strong></td>
            <td align="center">: Rp <font color="red"><?php echo $hasil->jml;?>;</font></td>
          </tr>

        </table>
        <br /><center>
<a href="<?php echo base_url();?>index.php/c_kepala/keluar">
          <input name="input" type="button" class="kembali" value="Kembali" style="color:green;" />
        </a>
</center>