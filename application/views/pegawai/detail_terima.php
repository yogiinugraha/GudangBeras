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
      <table width="500" border="0" class="tabel1">
        <tr>
          <th colspan="2" align="center"><div class="grad"><?php echo $pelanggan->nama_barang;?></div></th>
        </tr>
        <tr>
          <td width="200">No Faktur
            <div style="float:right;">:</div></td>
          <td><?php echo $pelanggan->no_faktur;?></td>
        </tr>
        <tr>
          <td>No Permintaan
          <div style="float:right;">:</div></td>
          <td><?php echo $pelanggan->no_permintaan;?></td>
        </tr>
        <tr>
          <td>Nama Barang
            <div style="float:right;">:</div></td>
          <td>(<?php echo $pelanggan->kd_barang;?>)<?php echo $pelanggan->nama_barang;?></td>
        </tr>
        <tr>
          <td>Jumlah terima
            <div style="float:right;">:</div></td>
          <td><?php 
		  $karung=$pelanggan->jml_terima/25;
		  echo $pelanggan->jml_terima." <strong>Karung</strong>";?></td>
        </tr>
        <tr>
          <td>Tanggal  terima
            <div style="float:right;">:</div></td>
          <td><?php echo $pelanggan->tgl_terima;?></td>
        </tr>
        <tr>
          <td>Stok<div style="float:right;">:</div></td>
          <td><?php 
		  $asal=$pelanggan->stok-$pelanggan->jml_terima;
		  echo $asal." Karung + ".$pelanggan->jml_terima." Karung = <strong><font color='blue'>".$pelanggan->stok." Karung";?></font></strong></td>
        </tr>
        <tr valign="top">
          <td>Penanggung Jawab
            <div style="float:right;">:</div></td>
          <td><?php echo $pelanggan->nama_pegawai;?></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Total Harga</h3></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Rp <?php echo $pelanggan->pengeluaran;?>; </h3></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><a href="<?php echo base_url();?>index.php/c_transaksi/supplier"><input value="Kembali" class="kembali" type="submit" /></a></td>
        </tr>
      </table>
