    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0">
  <tr>
    <td>
    <a href="<?php echo base_url();?>index.php/c_produk/refresh/data_pesanan"><input name="" type="button" value="Refresh" class="refresh" /></a></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_produk/data_pesanan" method="post">
Cari Something : <input name="keyword" type="text" size="50" /> <input class="cari" type="submit" value="Cari" />
</form></td>
  </tr>
</table><br />
  <table width="100%" border="0" class="tabel2">
  <tr>
    <th>No Pesanan</th>
    <th>Pembeli</th>
    <th>Waktu Pemesanan</th>
    <th>Jumlah pesanan</th>
    <th>Penanggung Jawab</th>
    <th>Aksi</th>
    </tr>
  <?php $no=1;
  foreach($barang as $row){
	   $query=mysql_query("SELECT COUNT(no_pesanan) FROM t_detail_pesanan WHERE no_pesanan='$row->no_pesanan'");
	   $jumlah=mysql_fetch_array($query);
	  ?>
  <tr>
    <td width="100" align="center"><?php echo $row->no_pesanan;?></td>
    <td><?php echo $row->nama_customer;?></td>
    <td><?php echo $row->tgl_pesan;?></td>
    <td><?php echo $jumlah[0];?> Barang</td>
    <td><?php echo $row->nip;?></td>
    <td><a href="<?php echo base_url();?>index.php/c_produk/data_pesanan/<?php echo $row->no_pesanan;?>"><img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20" /></a></td>
    <?php $no++;} ?>
  </tr>
</table>
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>

