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
      <table width="400" border="0" class="tabel1">
        <tr>
          <th colspan="2" align="center" width="40"><div class="grad">PERINCIAN TRANSAKSI</div></th>
        </tr>
        <tr>
          <td>Kode Keluar<div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->kd_keluar;?></strong></td>
        </tr>
        <tr>
          <td>Nama Barang<div style="float:right;">:</div></td>
          <td><strong>(<?php echo $pelanggan->kd_barang;?>) <?php echo $pelanggan->nama_barang;?></strong></td>
        </tr>
        <tr>
          <td>Pembeli<div style="float:right;">:</div></td>
          <td><?php if ($pelanggan->kd == "UNKNOW"){
			  $pembeli="<strong>Bukan Langgan</strong>";
		  }
		  else{
			  $pembeli="<strong>(".$pelanggan->kd.") ".$pelanggan->nama_customer."</strong>";
		  } echo $pembeli;?></td>
        </tr>
        <tr>
          <td>Jumlah Pembelian<div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->jml_keluar;?> Kg</strong></td>
        </tr>
        <tr>
          <td>Tanggal Transaksi
          <div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->tgl_keluar;?></strong></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><h3>Harga<br /> Rp <?php echo $pelanggan->duit;?> ;
          </h3></td>
        </tr>
        <tr>
          <td align="right">
            <a href="<?php echo base_url();?>index.php/c_transaksi/detailcustomer/<?php echo $pelanggan->kd;?>/<?php echo $this->bulan->angka_bulan($pelanggan->bulan);?>">
            <input name="input" type="button" value="Kembali" class="kembali" style="color:green;" />
            </a></td>
          <td><a href="<?php echo base_url();?>index.php/c_transaksi/konfirmasi/<?php echo $pelanggan->kd_keluar;?>">
            <input name="ubah" type="submit" value="Ubah" class="edit" />
          </a></td>
        </tr>
      </table>
      <br />
