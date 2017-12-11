    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0" class="tabel2">
  <tr>
    <th width="5%">No.</th>
    <th>Nomor Permintaan</th>
    <th>Nama Barang</th>
    <th>Nama Supplier</th>
    <th>Jumlah Minta</th>
    <th colspan="3">Action</th>
  </tr>
  <?php
   $no=1;
  foreach($data as $row){
	 

	  ?>
  <tr>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $row->no_permintaan;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><?php echo $row->nama_supplier;?></td>
    <td align="center"><?php echo $row->jml_minta;?> Karung</td>
    <td><a href="<?php echo base_url();?>index.php/c_transaksi/detailsupplier/<?php echo $row->no_permintaan;?>/<?php echo $row->kd_barang;?>" target="frame2"> <img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20" class="zoom" /> </a></td>
    <td><a href="<?php echo base_url();?>index.php/c_transaksi/delete/<?php echo $row->no_permintaan;?>/<?php echo $row->kd_barang;?>/<?php echo $row->jml_minta;?>" onclick="return confirm('Anda yakin akan membatalkan Transaksi ?')"> <img src="<?php echo base_url();?>assets/images/del.png" width="20" height="20" class="zoom" /> </a></td>
    <td><a href="<?php echo base_url();?>index.php/c_kepala/konfirmasi/<?php echo $row->no_permintaan;?>/<?php echo $row->kd_barang;?>" onclick="return confirm('Anda Yakin Akan Konfirmasi?')"><img src="<?php echo base_url();?>assets/images/ok.png" width="20" height="20" class="zoom" /></a></td>
    <?php $no++;} ?>
  </tr>
</table>
<iframe name="frame2" scrolling="auto" width="100%" height="70%" frameborder="0"></iframe>
