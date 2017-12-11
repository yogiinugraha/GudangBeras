    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<form action="<?php echo base_url();?>index.php/c_produk/p_beli_banyak" method="post">
<div class="grad" style="overflow:auto; height:410px;">
<h2>Pembelian Banyak</h2>
<table width="" border="0">
  <tr>
    <td><strong> Kode Keluar</strong></td>
    <td>: <?php echo $keluar;?><input type="hidden" value="<?php echo $keluar;?>" />
</td>
  </tr>
  <tr>
    <td><strong> Nama Pembeli </strong></td>
    <td>: <select name="pembeli">
<?php foreach($pelanggan as $pel){?>
<option value="<?php echo $pel->kd;?>"><?php echo "($pel->kd) $pel->nama_customer";?></option>
<?php }?>
</select></td>
  </tr>
</table>

  <br />
 
<?php $no=1; foreach($barang as $row){?><table width="500" border="0">
  <tr>
    <td><strong><?php echo $no;?></strong>.</td>
    <td><strong>Nama Barang</strong></td>
    <td><strong>: (<?php echo $row->kd_barang;?>) <?php echo $row->nama_barang;?>
      <input name="kd<?php echo $no;?>" type="hidden" value="<?php echo $row->kd_barang;?>" />
    </strong></td>
    </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td><strong>Stok || Harga</strong></td>
    <td><strong>: <?php 
	if($row->stok-20 <= 0){
	echo 0;
	}
	else{echo $row->stok-20;}
	?> Kg
      <input name="stok<?php echo $no;?>" type="hidden" value="<?php echo $row->stok;?>"/>
    || Rp <?php echo $row->harga;?>; / Karung</strong></td>
    </tr>
  <tr>
    <td><strong>Masukan Jumlah Ambil</strong></td>
    <td><strong>: <input name="jml<?php echo $no;?>" type="text" /> Karung</strong></td>
    </tr>
</table><input name="jum" type="hidden" value="<?php echo $no;?>"/>
<hr width="500" align="left" /><?php $no++;} ?>
</div>
<div class="grad2" align="center"><a href="<?php echo base_url();?>index.php/c_produk/beli_banyak">
<input class="kembali" type="button" value="Kembali" style="color:green;"></a>
 <input name="submit" type="submit" value="Simpan" class="simpan"></td>
</div>
</form>