    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="" border="0">
  <tr>
    <td><strong>Nomor Pesanan</strong> </td>
    <td>: <strong><?php echo $barang[0]->no_pesanan;?></strong></td>
  </tr>
  <tr>
    <td><strong>Pembeli</strong> </td>
    <td>: <strong><?php echo $barang[0]->nama_customer;?></strong></td>
  </tr>
  <tr>
    <td><strong>Tanggal Pemesanan</strong> </td>
    <td>: <strong><?php echo $barang[0]->tgl_pesan;?></strong></td>
  </tr>
</table><br />
  <table width="100%" border="0" class="tabel2">
  <tr>
    <th>No.</th>
    <th>Nama Barang</th>
    <th>Jumlah Pesan</th>
    <th>Tanggal Diterima</th>
    <th>Status</th>
    </tr>
  <?php $no=1;
  foreach($barang as $row){
	   $query=mysql_query("SELECT COUNT(no_pesanan) FROM t_detail_pesanan WHERE no_pesanan='$row->no_pesanan'");
	   $jumlah=mysql_fetch_array($query);
	  ?>
  <tr>
    <td width="5%" align="center"><?php echo $no;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><strong><?php echo $row->jml;?></strong> Karung</td>
    <td><?php 
		if($row->tgl_kirim != NULL){
	echo $row->tgl_kirim;}
    	else{echo "<strong>-</strong>";}?>
    </td>
    <td><?php echo $row->kirim;?> diterima</td>
    <?php $no++;} ?>
  </tr>
</table>
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>

<div class="grad2" align="center"><a href="<?php echo base_url();?>index.php/c_produk/data_pesanan">
<input class="kembali" type="button" value="Kembali" /></a>
</div>