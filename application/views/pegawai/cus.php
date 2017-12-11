    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0">
  <tr>
    <td><a href="<?php echo base_url();?>index.php/c_supplier/tambah"><input name="" type="button" value="Tambah" class="tambah" /></a>
    <a href="<?php echo base_url();?>index.php/c_supplier/refresh/customer"><input name="" type="button" value="Refresh" class="refresh" /></a></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_supplier/customer" method="post">
Cari Pelanggan : <input name="keyword" type="text" size="50" /> <input class="cari" type="submit" value="Cari" />
</form></td>
  </tr>
</table><br />
  <table width="100%" border="0" class="tabel2">
  <tr>
    <th>Kode pelanggan</th>
    <th>Nomor KTP</th>
    <th>Nama Pelanggan</th>
    <th>Alamat</th>
    <th>Telphone</th>
    <th>Email</th>
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
    <td width="100" align="center"><?php echo $row->kd;?></td>
    <td><?php echo $row->ktp;?></td>
    <td><?php echo $row->nama_customer;?></td>
    <td><?php echo $row->alamat;?></td>
    <td><?php echo $row->tlp;?></td>
    <td><?php echo $row->email;?></td>
    <?php $no++;} ?>
  </tr>
</table>
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>

