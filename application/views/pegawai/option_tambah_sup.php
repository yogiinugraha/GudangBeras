    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.js"></script>
<script>
		function hadi(){
		$("#tbl1").hide("slide", {
    direction: "down"
}, "fast");
		$("#tbl2").show("slide", {
    direction: "left"
}, 500);
		}
		
		function hadi1(){
		$("#tbl1").show("slide", {
    direction: "left"
}, 500);
		$("#tbl2").hide("slide", {
    direction: "down"
}, "fast");
		}

</script>
<div class="grad">      
<table width="100%" height="65%" border="0">
  <tr valign="top">
    <td>
	<form action="<?php echo base_url();?>index.php/c_produk/optionedit/" method="post" enctype="multipart/form-data">
<table width="400" border="0" align="center">
        <tr>
          <td colspan="2" align="center"><h2>#Step 2 : Pilih Penyuplai Beras</h2></td>
        </tr>
        </tr>
          <td><img src="<?php echo base_url();?>assets/pic/tombol_tambah.png" onclick="hadi()" class="zoom" /></td>
          <td><img src="<?php echo base_url();?>assets/pic/tombol_ada.png" onclick="hadi1()" class="zoom"/></td>
        </tr>
      </table>
</form>

<form action="<?php echo base_url();?>index.php/c_produk/p_tambah/3" method="post">
<input type="hidden" name="kd1" value="<?php echo $kd1;?>" />
<input type="hidden" name="nama_tambah" value="<?php echo $nama_tambah;?>" />
<input type="hidden" name="ket_tambah" value="<?php echo $ket_tambah;?>" />
<input type="hidden" name="kd2" value="<?php echo $kd2;?>" />
<table border="0" align="center" id="tbl1" style="display:none;">
  <tr>
    <td>Pilih Penyuplai Barang </td>
    <td>: <select name="kd_supplier1">
    <option value="kosong" disabled="disabled">--Pilih penyuplai Barang--</option>
    <?php foreach($supplier as $row){
    echo "<option value='$row->kd_supplier'>($row->kd_supplier) $row->nama_supplier</option>";}?>
    </select></td>
    <td><input name="kirim" type="submit" value="Next" class="next" /></td>
  </tr>
</table>
</form>
<div id="tbl2">
<form action="<?php echo base_url();?>index.php/c_produk/p_tambah/3" method="post">
<input type="hidden" name="kd1" value="<?php echo $kd1;?>" />
<input type="hidden" name="nama_tambah" value="<?php echo $nama_tambah;?>" />
<input type="hidden" name="ket_tambah" value="<?php echo $ket_tambah;?>" />
<input type="hidden" name="kd2" value="<?php echo $kd2;?>" />
<table border="0" align="center">
  <tr valign="top">
    <td>Kode Supllier</td>
    <td>: <input type="text" name="kd_supplier2" size="5" required="required" value="<?php echo $kd_sup_otomatis;?>" /></td>
  </tr>
          <td>Nama Supplier</td>
          <td>: <strong><input name="nama_supplier" type="text" placeholder="Nama Supplier.." value="<?php echo $nama_supplier;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>: <strong><input name="alamat_supplier" type="text" placeholder="Alamat Supllier.." value="<?php echo $alamat_supplier;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Nomor Telphone
          </td>
          <td>: <strong><input name="tlp_supplier" type="text" placeholder="Nomor Telphone.." value="<?php echo $tlp_supplier;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>: <strong><input name="email_supplier" type="text" placeholder="Email Supplier.." value="<?php echo $email_supplier;?>" required> <font color="red">*</font></strong></td>
        </tr>
        
        <tr>
          <td align="right"></td>
          <td>
            <input name="tambah" type="submit" value="Tambah" class="tambah"></td>
        </tr>
</table></form>
</div></td>
      <td align="center"><table width="500" border="0">
        <tr>
          <td><strong>Catatan :</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>1. Tambah Baru</strong></td>
          <td> =&gt; Menambah Supplier yang Baru.</td>
        </tr>
        <tr>
          <td><strong style="float:left;">2. Yang Sudah Ada</strong></td>
          <td>=&gt; Memilih Supplier Yang Sudah Terdaftar.</td>
        </tr>
        <tr>
          <td colspan="2">Halaman Ini diperuntukan memilih supplier yang akan menyuplai barang, pilih yang sudah ada atau tambah baru.</td>
        </tr>
      </table></td>
  </tr>
</table>
</div><div class="grad2">
<table align="center"><tr align="center" valign="top">
    <td> <form action="<?php echo base_url();?>index.php/c_produk/optiontambah" method="post">
      <input type="hidden" name="kd1" value="<?php echo $kd1;?>" />
      <input type="hidden" name="nama_tambah" value="<?php echo $nama_tambah;?>" />
      <input type="hidden" name="ket_tambah" value="<?php echo $ket_tambah;?>" />
      <input type="hidden" name="kd2" value="<?php echo $kd2;?>" />
      <center><input name="tambah" type="submit" value="kembali" class="kembali">
</center>
</form></td>
  </tr>
</table></form></div>
