    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0">
  <tr>
    <td><a href="<?php echo base_url();?>index.php/c_produk/optiontambah"><input name="" type="button" value="Tambah" class="tambah" /></a>
    <a href="<?php echo base_url();?>index.php/c_produk/refresh/index"><input name="" type="button" value="Refresh" class="refresh" /></a></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_produk/index" method="post">
Cari Barang : <input name="keyword" type="text" size="50" /> <input class="cari" type="submit" value="Cari" />
</form></td>
  </tr>
</table><br />


<?php foreach($barang as $row)
		{?>
        <table width="330" border="0" align="center" style=" float:left; border-bottom:2px #000 dashed; margin:0px 0px 5px 10px; position:relative;">
  <tr >
    <td width="80" rowspan="5" valign="top"><img src="<?php echo base_url();?>assets/images/<?php echo $row->foto;?>" width="80" height="107" class="cover" /></td>
    <td colspan="2" align="center"><div class="grad"><?php echo $row->nama_barang;?></div></td>
    </tr>
  <tr >
    <td width="94"><strong>Harga</strong><div style="float:right;">:</div></td>
    <td width="132">Rp <?php echo $row->harga;?> / <?php echo $row->satuan;?></td>
  </tr>
  <tr>
    <td><strong>Merek</strong><div style="float:right;">:</div></td>
    <td><?php echo $row->nama_jenis;?></td>
  </tr>
  <tr>
    <td><strong>Sisa Stok</strong>
      <div style="float:right;">:</div></td>
    <td>
	<?php if($row->stok <= 20){
		 echo "<strong><font color='#ba0808'>".$row->stok."</font></strong>";} 
		 else{
		 echo $row->stok;}
	 echo " ".$row->satuan;?></td>
  </tr>
  <tr>
    <td><a href="<?php echo base_url();?>index.php/c_produk/detail/<?php echo $row->kd_barang;?>"><input value="Lihat" type="button" class="lihat" /></a></td>
    <td><a href="<?php echo base_url();?>index.php/c_produk/beli/<?php echo $row->kd_barang;?>"><input value="Beli" type="button" class="beli" /></a></td>
  </tr>
</table>
<?php }
echo br(15);
?>

 <div class="pagination"><?php echo $this->pagination->create_links();?></div>
