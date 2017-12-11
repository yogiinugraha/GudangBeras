    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<form action="<?php echo base_url();?>index.php/c_pemesanan/pemesanan_customer" method="post">
<div class="grad" style="overflow:auto; height:410px;">
<h2>Isi Data Pemesanan</h2>
<span>
<strong>~ Nomor Pemesanan : <?php echo $nomor->no_pesanan+1;?> ~ || Nama Pembeli : 
<select name="kd_cust">
<?php foreach($pelanggan as $data){?>
<option value="<?php echo $data->kd;?>">(<?php echo $data->kd;?>) <?php echo $data->nama_customer;?></option><?php }?>
</select></strong></span>
<strong>
<input name="no_pesanan" type="hidden" value="<?php echo $nomor->no_pesanan+1;?>" />
<input name="jum" type="hidden" value="<?php echo $jum;?>" />
</strong>
<?php $no=1; foreach($barang as $row){?><table width="500" border="0">
  <tr>
    <td><strong><?php echo $no;?></strong>.</td>
    <td>Nama Barang</td>
    <td><strong>: (<?php echo $row->kd_barang;?>) <?php echo $row->nama_barang;?>
      <input name="kd_barang<?php echo $no;?>" type="hidden" value="<?php echo $row->kd_barang;?>" />
    </strong></td>
    </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td>Stok || Harga</td>
    <td><strong>: <?php echo $row->stok;?> Karung || Rp <?php echo $row->harga;?>;
    </strong></td>
    </tr>
  <tr>
    <td>Masukan Jumlah Ambil</td>
    <td><strong>: <input name="jml<?php echo $no;?>" type="text" /> Karung</strong></td>
    </tr>
</table>
<hr width="500" align="left" /><?php $no++;} ?>
</div>
<div class="grad2" align="center"><input class="kembali" type="button" value="Kembali" onclick="javascript:history.go(-1);" style="color:green;">
 <input name="submit" type="submit" value="Simpan" class="simpan"></td>
</div>
</form>