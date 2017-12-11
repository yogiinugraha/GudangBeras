    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
        <h2><?php echo $judul; ?></h2></div>
      <table width="200" border="0" style="float:left; margin-right:30px;">
  <tr align="center">
    <td><div class="grad">Foto Barang</div></td>
  </tr>
  <tr>
    <td align="center"><img src="<?php echo base_url();?>assets/images/<?php echo $barang->foto;?>" class="cover" style="margin:0px; padding:0px"/></td>
  </tr>
</table>
<form method="post" action="<?php echo base_url();?>index.php/c_produk/option_harga">
      <table width="450" border="0" class="tabel1">
        <tr>
          <th colspan="2" align="center" width="40"><div class="grad">Perubahan Harga</div></th>
        </tr>
        <tr>
          <td>Kode Barang<div style="float:right;">:</div></td>
          <td><input name="kd" type="hidden" value="<?php echo $barang->kd_barang;?>" readonly="readonly" />
          <input name="harga2" type="hidden" value="<?php echo $barang->harga;?>" readonly="readonly" />            <strong><?php echo $barang->kd_barang;?></strong></td>
        </tr>
        <tr>
          <td>Nama Beras<div style="float:right;">:</div></td>
          <td><strong><?php echo $barang->nama_barang;?></strong></td>
        </tr>
        <tr>
          <td>Harga di Supplier
            <div style="float:right;">:</div></td>
          <td><strong>Rp <input name="harga1" type="text" value="<?php echo $harga->harga;?>" size="9" /> / Karung
          </strong></td>
        </tr>
        <tr>
          <td>Ambil Laba
          <div style="float:right;">:</div></td>
          <td><strong>20 %</strong></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Harga Jual</h3></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Rp <?php echo $barang->harga." / ".$barang->satuan;?>;</h3></td>
        </tr>
        <tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_produk/option/<?php echo $barang->kd_barang;?>"><input class="kembali" type="button" value="Kembali"></a></td>
          <td><input name="ubah" type="submit" value="Ubah" class="simpan"></td>
        </tr>
      </table></form>
<br />
<br />
