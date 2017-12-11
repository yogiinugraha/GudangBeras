    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<table width="100%" border="0">
  <tr valign="top">
    <td><table width="450" border="0" class="tabel1">
      <tr>
        <th colspan="2" align="center"><div class="grad">Data Barang</div></th>
      </tr>
      <tr>
        <td width="40%"><strong>Kode Barang</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->kd_barang;?></td>
        </tr>
      <tr>
        <td><strong>Kode Jenis</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->kd_jenis;?></td>
      </tr>
      <tr>
        <td><strong>Nama Barang</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->nama_barang;?></td>
      </tr>
      <tr>
        <td><strong>Jenis Barang</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->nama_jenis;?></td>
      </tr>
      <tr>
        <td><strong>Stok</strong>
          <div style="float:right;">:</div></td>
        <td><font color="red"><?php echo $barang->stok;?> <?php echo $barang->satuan;?></font></td>
      </tr>
      <tr>
        <td><strong>Kode Supplier</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->kd_supplier;?></td>
      </tr>
      <tr>
        <td><strong>Nama Supplier</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->nama_supplier;?></td>
      </tr>
      <tr>
        <td><strong>Alamat Supplier</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->alamat_supplier;?></td>
      </tr>
      <tr>
        <td><strong>Tlp Supplier</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->tlp;?></td>
      </tr>
      <tr>
        <td><strong>Email Supplier</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->email;?></td>
      </tr>
      <tr valign="top">
        <td><strong>Keterangan</strong>
          <div style="float:right;">:</div></td>
        <td><?php echo $barang->ket;?></td>
      </tr>
    </table></td>
    <td><table width="300" border="0"  class="tabel1" style="float:left; margin-right:30px;">
        <tr align="center" valign="top">
          <th colspan="2"><div class="grad">Harga Beras</div></th>
        </tr>
        <tr class="tabel1">
          <td><strong>Kode Harga</strong>
            <div style="float:right;">:</div></td>
          <td><?php echo $barang->kd_harga;?></td>
        </tr>
        <tr class="tabel1">
          <td><strong>Harga Supplier</strong>
            <div style="float:right;">:</div></td>
          <td><font color="RED"><?php echo $barang->harga2;?> <strong>Rupiah / Karung</strong></font></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Harga</h3></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Rp <?php echo $barang->harga;?>; / <?php echo $barang->satuan;?></h3></td>
        </tr>
    </table>
      <table width="200" border="0" style="float:left; margin-right:30px;">
        <tr align="center" valign="top">
          <td class="grad">Foto Barang</td>
        </tr>
        <tr>
          <td align="center"><img src="<?php echo base_url();?>assets/images/<?php echo $barang->foto;?>" class="cover" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<div class="grad2" align="center"><a href="<?php echo base_url();?>index.php/c_produk/option"><input class="kembali" type="button" value="Kembali" /></a></div>