    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
       <h2><?php echo $judul; ?></h2>    
      <table width="200" border="0" style="float:left; margin-right:30px;">
  <tr align="center">
    <td><div class="grad">Foto Barang</div></td>
  </tr>
  <tr>
    <td align="center"><img src="<?php echo base_url();?>assets/images/<?php echo $barang->foto;?>" class="cover"/></td>
  </tr>
</table>
<form method="post" action="<?php echo base_url();?>index.php/c_produk/beli">
      <table width="420" border="0" class="tabel1">
        <tr>
          <th colspan="2" align="center" width="40%"><div class="grad">FORM TRANSAKSI</div></th>
        </tr>
        <tr>
          <td>Kode Barang<div style="float:right;">:</div></td>
          <td><input name="" type="hidden" value="<?php echo $keluar;?>" id="berhasil" /><input name="kd" type="hidden" value="<?php echo $barang->kd_barang;?>" readonly><strong><?php echo $barang->kd_barang;?></strong></td>
        </tr>
        <tr>
          <td>Nama Beras<div style="float:right;">:</div></td>
          <td><input name="nama" type="hidden" value="<?php echo $barang->nama_barang;?>" readonly><strong><?php echo $barang->nama_barang;?></strong></td>
        </tr>
        <tr>
          <td>Stok Barang<div style="float:right;">:</div></td>
          <td><strong><?php echo $barang->stok." ".$barang->satuan;?> 
            <input name="stok" type="hidden" value="<?php echo $barang->stok;?>" readonly>
          </strong></td>
        </tr>
        <tr>
          <td>Yang Bisa dijual
            <div style="float:right;">:</div></td>
          <td><strong><font color="#ba0808"><?php echo $stok." ".$barang->satuan;?></font>
            <input name="stok2" type="hidden" value="<?php echo $stok;?>" readonly>
          </strong></td>
        </tr>
        <tr>
          <td>Nama Pembeli<div style="float:right;">:</div></td>
          <td><select name="pembeli"><option value="1">~ Bukan Langgan ~</option>';
	<?php foreach($pelanggan as $data)
	{
		echo '<option value="'.$data->kd.'">('.$data->kd.') '.$data->nama_customer.'</option>';
		}
	?></select> <font color="#FF0000">*</font><font color="#FF0000" size="2">isi bila perlu</font></td>
        </tr>
        <tr valign="top">
          <td>Jumlah Beli
            <div style="float:right;">:</div></td>
          <td><input name="jml" type="text" placeholder="Nomilnal..." required > <select name="satuan"><option value="1">Karung</option></select></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Harga</h3></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Rp <?php echo $barang->harga;?>; / <?php echo $barang->satuan;?><strong>
            <input name="harga" type="hidden" value="<?php echo $barang->harga;?>" readonly="readonly" />
          </strong></h3></td>
        </tr>
        <tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_produk/detail/<?php echo $barang->kd_barang;?>"><input class="kembali" type="button" value="Kembali"></a></td>
          <td><input name="submit" type="submit" value="Beli" class="beli"></td>
        </tr>
      </table></form>
<br /><br />     *Untuk membeli barang dalam jumlah banyak, <a href="#">Klik Disini</a>

        </center>
