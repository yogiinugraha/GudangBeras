    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
       <h2><?php echo $judul; ?></h2>    
<table width="100%" border="0">
  <tr>
    <td><input name="" type="button" value="Refresh" class="refresh" onclick="javascript:history.go(-1)" /></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_transaksi/detailcustomer/<?php echo $kd;?>/<?php echo $bulan;?>" method="post">
  Pencarian Transaksi : 
      <input placeholder="Masukan Kode Keluar.." name="keyword" type="text" size="50" /> 
  <input class="cari" type="submit"  value="Cari" />
</form></td>
  </tr>
</table><br />  <table width="100%" border="0" class="tabel2">
  <tr>
    <th>Kode Keluar</th>
    <th>Nama Barang</th>
    <th>Pembeli</th>
    <th>Tanggal Beli</th>
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
    <td><?php echo $row->kd_keluar;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><?php echo $row->nama_customer;?></td>
    <td><?php echo $row->tgl_keluar;?></td>
    <td><a href="<?php echo base_url();?>index.php/c_transaksi/detail/<?php echo $row->kd_keluar;?>">
    <img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20" class="zoom" />
    </a></td>
    
   <?php $no++;} ?>
  </tr>
</table><div class="pagination"><?php echo $this->pagination->create_links();?></div>
  
  <table width="" border="0">
  <tr>
    <td><img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20"/></td>
    <td><strong><strong>=></strong></strong></td>
    <td valign="top">Melihat data secara keseluruhan.</td>
    </tr>
</table>
  <div class="grad2" align="center"> <a href="<?php echo base_url();?>index.php/c_transaksi/customer">
    <input value="Kembali" type="button" class="kembali" />
  </a> </div>
 
