    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
      <table width="200" border="0" style="float:left; margin-right:15px;">
  <tr align="center">
    <td><div class="grad">Foto Barang</div></td>
  </tr>
  <tr>
    <td align="center"><img src="<?php echo base_url();?>assets/images/<?php echo $pelanggan->foto;?>" class="cover"/></td>
  </tr>
</table> 
      <table width="450" border="0" class="tabel1">
        <tr>
          <th colspan="2" align="center" width="40"><div class="grad">PERINCIAN TRANSAKSI</div></th>
        </tr>
        <tr>
          <td>No Permintaan
            <div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->no_permintaan;?></strong></td>
        </tr>
        <tr>
          <td>Nama Barang<div style="float:right;">:</div></td>
          <td><strong>(<?php echo $pelanggan->kd_barang;?>) <?php echo $pelanggan->nama_barang;?></strong></td>
        </tr>
        <tr>
          <td>Nama Pemasok
          <div style="float:right;">:</div></td>
          <td><strong>(<?php echo $pelanggan->kd_supplier;?>) <?php echo $pelanggan->nama_supplier;?></strong></td>
        </tr>
        <tr>
          <td>Sisa Stok<div style="float:right;">:</div></td>
          <td><strong><font color="#FF0000"><?php echo $pelanggan->stok." Karung";?></font></strong></td>
        </tr>
        <tr>
          <td>Tanggal Permintaan
            <div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->tgl_permintaan;?></strong></td>
        </tr>
        <tr>
          <td>Jumlah Pembelian<div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->jml_minta." Karung";?></strong></td>
        </tr>
        <tr>
          <td>Status
            <div style="float:right;">:</div></td>
          <td><strong><font color='red'><?php echo $pelanggan->konfirmasi;?></font> dikonfirmasi oleh Kepala</strong></td>
        </tr>
        <tr>
          <td>Pembayaran
            <div style="float:right;">:</div></td>
          <td><strong><?php 
		  $pelanggan->harga=$pelanggan->harga/25;
		  $jadi=$pelanggan->harga*$pelanggan->jml_minta;
		  echo $pelanggan->harga." x ".$pelanggan->jml_minta." = Rp <font color='blue'>".$jadi."</font>";?>;</strong></td>
        </tr>
      </table>
      <br />
