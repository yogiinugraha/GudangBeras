    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
       <h2><?php echo $judul; ?></h2>    
<table width="100%" border="0">
  <tr>
    <td>
    <a href="<?php echo base_url();?>index.php/c_produk/refresh/option"><input name="" type="button" value="Refresh" class="refresh" /></a></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_produk/option" method="post">
Cari Barang : <input name="keyword" type="text" size="50" /> <input class="cari" type="submit" value="Cari" />
</form></td>
  </tr>
</table>
  <center><br />
    <table border="0" class="tabel2">
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Asal</th>
        <th>Harga Jual</th>
        <th>Jenis Barang</th>
        <th colspan="3">Aksi</th>
      </tr>
      <?php $no=1; foreach($barang as $hasil){
		   $harga_asal=$hasil->harga/1.2;
		   ?>
      <tr>
        <td><?php echo $hasil->kd_barang;?></td>
        <td><?php echo $hasil->nama_barang;?></td>
        <td>Rp <?php echo $harga_asal;?> / <?php echo $hasil->satuan;?></td>
        <td>Rp <?php echo $hasil->harga;?> / <?php echo $hasil->satuan;?></td>
        <td><?php echo $hasil->nama_jenis;?></td>
        <td><a href="<?php echo base_url();?>index.php/c_produk/optionedit/<?php echo $hasil->kd_barang;?>">
        <img src="<?php echo base_url();?>assets/pic/edit.png" width="20" height="20" />
        </a></td>
        <td><a href="<?php echo base_url();?>index.php/c_produk/option_harga/<?php echo $hasil->kd_barang;?>">
        <img src="<?php echo base_url();?>assets/pic/dolar.png" width="20" height="20" />
        </a></td>
      </tr>
      <?php $no++;}?>
    </table>
  <br />
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>
  <p><strong>*</strong>Menu ini berfungsi untuk mengirim data kepada supplier dalam <strong>penambahan stok beras</strong>.
   <br />
*Untuk menambah stok beras, masukan nama beras yang akan ditambah stoknya.<br />
<strong>*</strong>Jika ingin <strong>menambahkan stok barang baru</strong>, maka masukan nama barang baru tersebut.</p>

