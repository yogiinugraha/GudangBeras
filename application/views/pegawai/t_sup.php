    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0" class="tabel2">
      <tr>
        <th width="5%">No</th>
        <th>Nama Barang</th>
        <th>Total Permintaan</th>
        <th>Detail</th>
      </tr>
      <?php 
		  
		  $no=1;
  foreach($data as $row){
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}
	  ?>
      <tr <?php echo $warna;?>>
        <td><?php echo $no;?></td>
        <td><?php echo $row->nama_barang;?></td>
        <td align="center"><?php echo $row->total." Karung";?></td>
        <td align="center"><a href="<?php echo base_url();?>index.php/c_transaksi/supplier/0/<?php echo $row->kd_barang;?>/"> <img src="<?php echo base_url();?>assets/images/detail.png" alt="" width="20" height="20" class="zoom" /></a></td>
        <?php $no++;} ?>
      </tr>
    </table>
  </center>
  <br />
  <table width="" border="0">
  <tr>
    <td><img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20"/></td>
    <td><strong><strong>=></strong></strong></td>
    <td valign="top">Melihat data secara keseluruhan.</td>
    </tr>
</table>
