    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0">
  <tr>
    <td>
    <a href="<?php echo base_url();?>index.php/c_supplier/refresh/terima"><input name="" type="button" value="Refresh" class="refresh" /></a></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_supplier/terima" method="post">
Cari Barang : <input name="keyword" type="text" size="50" /> <input class="cari" type="submit" value="Cari" />
</form></td>
  </tr>
</table><br />
<table width="100%" border="0" class="tabel2">
  <tr>
    <th>Nomor Penerimaan</th>
    <th>Nama Barang</th>
    <th>keterangan</th>
    <th>Tanggal Terima</th>
    <th>Action</th>
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
    <td align="center"><?php echo $row->no_permintaan;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><?php echo $row->status;?></td>
    <td><?php echo $row->tgl_terima;?></td>
    <td align="center"><a href="<?php echo base_url();?>index.php/c_supplier/detailterima/<?php echo $row->no_permintaan;?>/<?php echo $row->kd_barang;?>">
    <img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20" class="zoom" />
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
    </tr>
</table>
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>

