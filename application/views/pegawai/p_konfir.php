    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<form action="<?php echo base_url();?>index.php/c_transaksi/supplier" method="post" target="frame">
<div class="grad">
<table width="450" border="0" class="">
  <tr>
    <th colspan="2" align="center" width="40"><h3>Konfirmasi Barang Datang</h3></th>
  </tr>
  <tr>
    <td>NIP
      <div style="float:right;">:</div></td>
    <td><strong><input name="nip" type="text" value="<?php echo $hadi->nip;?>" readonly="readonly" size="13"  /></strong></td>
  </tr><tr>
    <td>Penanggung Jawab
      <div style="float:right;">:</div></td>
    <td><strong><input name="" type="text" value="<?php echo $hadi->nama_pegawai;?>" readonly="readonly" size="25"  /></strong></td>
  </tr>
  <tr>
    <td>Tanggal Masuk
      <div style="float:right;">:</div></td>
    <td><input type="text" name="tgl" class="input" value="<?php echo $hadi->tgl;?>" readonly="readonly" size="10" /></td>
  </tr>
  <tr>
    <td>Kode Barang
      <div style="float:right;">:</div></td>
    <td><input type="text" name="kd" class="input" value="<?php echo $pelanggan->kd_barang;?>" readonly="readonly" size="8" /></td>
  </tr>
  <tr>
    <td>Jumlah Ambil
      <div style="float:right;">:</div></td>
    <td><strong><input type="text" value="<?php echo $pelanggan->jml_minta;?>" size="4" readonly="readonly" > 
    Karung</strong></td>
  </tr>
  <tr>
    <td>Pembayaran
      <div style="float:right;">:</div></td>
    <td>
      <?php 
		  $jadi=$pelanggan->harga*$pelanggan->jml_minta;?>
<input type="text" value="<?php echo $pelanggan->harga;?>" size="5" readonly/> X <input type="text" value="<?php echo $pelanggan->jml_minta;?>"size="3" readonly/> = <input type="text" value="Rp <?php echo $jadi;?> " size="15" readonly/></td>
  </tr>
  <tr>
    <td>Nomor Permintaan
      <div style="float:right;">:</div></td>
    <td><input type="text" name="no_permintaan" value="<?php echo $pelanggan->no_permintaan;?>" readonly size="2"/></td>
  </tr>
  <tr>
    <td>Nomor Faktur
      <div style="float:right;">:</div></td>
    <td><input type="text" name="no_faktur" placeholder="Input No Faktur.." required="required" size="19"/></td>
  </tr>
</table></div>
<div class="grad2" align="center"><input name="confirm" type="submit" value="Confirm" class="simpan" /></div>
</form>