    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0" class="tabel2">
  <tr>
    <th>Nomor Permintaan</th>
    <th>Nama Barang</th>
    <th>Nama Supplier</th>
    <th>Jumlah Minta</th>
    <th>Konfirmasi</th>
    <th colspan="2">Action</th>
  </tr>
  <?php
   $no=1;
   $style2='style="display:none;"';
  foreach($data as $row){
	 
	  if ($row->konfirmasi == 'belum')
	  {
		  $style='style="display:none;"';
		  $style2='';
		  }
	else{
		  $style2='style="display:none;"';
		  $style='';
		}
	  ?>
  <tr>
    <td align="center"><?php echo $row->no_permintaan;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><?php echo $row->nama_supplier;?></td>
    <td align="center"><?php echo $row->jml_minta;?> Karung</td>
    <td><?php echo $row->konfirmasi;?></td>
    <td><a href="<?php echo base_url();?>index.php/c_transaksi/detailsupplier/<?php echo $row->no_permintaan;?>/<?php echo $row->kd_barang;?>" target="frame2"> <img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20" class="zoom" /> </a></td>
    <td <?php echo $style;?>><a href="<?php echo base_url();?>index.php/c_transaksi/p_konfir/<?php echo $row->no_permintaan;?>/<?php echo $row->kd_barang;?>" target="frame2"><img src="<?php echo base_url();?>assets/images/ok.png" width="20" height="20" class="zoom" /></a></td>
    <?php $no++;} ?>
  </tr>
</table>
<div <?php echo $style2;?>>* Menunggu Konfirmasi Dari Kepala Gudang.</div>
<iframe name="frame2" scrolling="auto" width="100%" height="70%" frameborder="0"></iframe>
