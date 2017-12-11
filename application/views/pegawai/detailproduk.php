    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
       <h2><?php echo $judul; ?></h2>    
      <table width="200" border="0" style="float:left; margin-right:30px;">
  <tr align="center" valign="top">
    <td class="grad">Foto Barang</td>
  </tr>
  <tr>
    <td align="center"><img src="<?php echo base_url();?>assets/images/<?php echo $barang->foto;?>" class="cover" /></td>
  </tr>
</table>
      <table width="400" border="0" class="tabel1">
        <tr>
          <th colspan="2" align="center" width="30%"><div class="grad"><?php echo $barang->nama_barang;?></div></th>
        </tr>
        <tr>
          <td>Kode Barang<div style="float:right;">:</div></td>
          <td><?php echo $barang->kd_barang;?></td>
        </tr>
        <tr>
          <td>Merek<div style="float:right;">:</div></td>
          <td><?php echo $barang->nama_jenis;?></td>
        </tr>
        <tr>
          <td>Jumlah Stok
            <div style="float:right;">:</div></td>
          <td><font color="red"><?php echo $barang->stok;?> <?php echo $barang->satuan;?></font></td>
        </tr>
        <tr valign="top">
          <td>Keterangan<div style="float:right;">:</div></td>
          <td><?php echo $barang->ket;?></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Harga</h3></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Rp <?php echo $barang->harga;?>; / <?php echo $barang->satuan;?></h3></td>
        </tr>
        <tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_produk/index"><input class="kembali" type="button" value="Kembali" /></a></td>
          <td><a href="<?php echo base_url();?>index.php/c_produk/beli/<?php echo $barang->kd_barang;?>"><input class="beli" type="button" value="Beli" /></a></td>
        </tr>
      </table><br /><br /><br />
<br /> 
*Untuk membeli barang dalam jumlah banyak, <a href="#">Klik Disini</a>
<br />
<br />

        </center>
