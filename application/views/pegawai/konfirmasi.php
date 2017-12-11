    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
      <table width="200" border="0" style="float:left; margin-right:30px;">
  <tr align="center">
    <td><div class="grad">Foto Barang</div></td>
  </tr>
  <tr>
    <td align="center"><img src="<?php echo base_url();?>assets/images/<?php echo $pelanggan->foto;?>" class="cover"/></td>
  </tr>
</table>
<form method="post" action="<?php echo base_url();?>index.php/c_transaksi/konfirmasi/<?php echo $pelanggan->kd_keluar."/".$pelanggan->kd_barang;?>/<?php echo $pelanggan->jml_keluar;?>">
      <table width="400" border="0" class="tabel1">
        <tr>
          <th colspan="3" align="center" width="40%"><div class="grad">PEMBATALAN ATAU PERUBAHAN</div></th>
        </tr>
        <tr>
          <td>Kode Barang<div style="float:right;">:</div></td>
          <td colspan="2"><input name="kd" type="hidden" value="<?php echo $pelanggan->kd_barang;?>" readonly><strong><?php echo $pelanggan->kd_barang;?></strong></td>
        </tr>
        <tr>
          <td>Nama Beras<div style="float:right;">:</div></td>
          <td colspan="2"><input name="nama" type="hidden" value="<?php echo $pelanggan->nama_barang;?>" readonly><strong><?php echo $pelanggan->nama_barang;?></strong></td>
        </tr>
        <tr>
          <td>Stok Barang<div style="float:right;">:</div></td>
          <td colspan="2"><strong><?php echo $pelanggan->stok." Karung";?>
            <input name="stok" type="hidden" value="<?php echo $pelanggan->stok;?>" readonly>
          </strong></td>
        </tr>
        <tr>
          <td>Nama Pembeli<div style="float:right;">:</div></td>
          <td colspan="2"><input name="nama2" type="hidden" value="<?php echo $pelanggan->nama_barang;?>" readonly>
          <strong><?php echo $pelanggan->nama_customer;?></strong></td>
        </tr>
        <tr valign="top">
          <td>Jumlah Beli
            <div style="float:right;">:</div></td>
          <td colspan="2"><input name="jml" type="text" placeholder="Nomilnal..." value="<?php echo $pelanggan->jml_keluar;?>" required> <select name="satuan"><<option value="1">Karung</option></select></td>
        </tr>
        <tr valign="top">
          <td colspan="3" align="center"><h3>Harga</h3></td>
        </tr>
        <tr valign="top">
          <td colspan="3" align="center"><h3>Rp <?php echo $pelanggan->harga;?>; / Karung<strong>
            <input name="harga" type="hidden" value="<?php echo $pelanggan->harga;?>" readonly />
          </strong></h3></td>
        </tr>
        <tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_transaksi/batal/<?php echo $pelanggan->kd_keluar;?>/<?php echo $pelanggan->kd_barang;?>/<?php echo $pelanggan->stok;?>/<?php echo $pelanggan->jml_keluar;?>"><input name="batal" type="button" value="Batal" onclick="return confirm('Anda yakin akan membatalkan Transaksi ?')" style="color:red;" class="hapus"></a></td>
          <td align="center"><input name="ubah" type="submit" value="Ubah" class="edit" /></td>
          <td><a href="<?php echo base_url();?>index.php/c_transaksi/detail/<?php echo $pelanggan->kd_keluar;?>"><input name="" type="button" value="Ini OK" style="color:green;" class="simpan"></a></td>
        </tr>
      </table></form>

<table width="100%" border="0">
  <tr>
    <td><strong><font color="black">*Ubah </font></strong></td>
    <td><strong>=></strong> Untuk mengubah data (Hanya <strong>jumlah  beli</strong> barang). </td>
  </tr>
  <tr>
    <td><strong><font color="red">*Batal </font></strong></td>
    <td><strong>=></strong> Untuk membatalkan pembelian. </td>
  </tr>
  <tr>
    <td><strong><font color="green">*Ini OK</font></strong></td>
    <td><strong>=></strong> Data tidak ada perubahan (Back To Menu). </td>
  </tr>
</table>
