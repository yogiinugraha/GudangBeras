    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0">
  <tr>
    <td><a href="<?php echo base_url();?>index.php/c_supplier/tambah_sup">
    <input type="button" name="button" class="tambah" value="Tambah" style="float:left;" /></a>
    <a href="<?php echo base_url();?>index.php/c_supplier/refresh/index"><input name="" type="button" value="Refresh" class="refresh" /></a></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_supplier/index" method="post">
Cari Barang : <input name="keyword" type="text" size="50" /> <input class="cari" type="submit" value="Cari" />
</form></td>
  </tr>
</table><br />  <table width="100%" border="0" class="tabel2">
  <tr>
    <th>Kode Supplier</th>
    <th>Nama Penyuplai</th>
    <th>Jenis Barang suplai</th>
    <th colspan="2">Action</th>
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
    <td><?php echo $row->kd_supplier;?></td>
    <td><?php echo $row->nama_supplier;?></td>
    <td><?php echo $row->nama_jenis;?></td>
    <td><a href="<?php echo base_url();?>index.php/c_supplier/detail/<?php echo $row->kd_supplier;?>">
    <img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20" class="zoom" />
    </a></td>
    <td><a href="<?php echo base_url();?>index.php/c_supplier/ubah/<?php echo $row->kd_supplier;?>">
    <img src="<?php echo base_url();?>assets/images/edit.png" width="20" height="20" class="zoom" />
    </a></td>
   <?php $no++;} ?>
  </tr>
</table>
  </center>
  <table width="" border="0">
  <tr>
    <td><img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20"/></td>
    <td><strong><strong>=></strong></strong></td>
    <td valign="top">Melihat data secara keseluruhan.</td>
    <td><img src="<?php echo base_url();?>assets/images/edit.png" width="20" height="20"/></td>
    <td><strong>=></strong></td>
    <td valign="top">Melakukan perubahan data dan penghapusan data.</td>
  </tr>
</table>
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>

