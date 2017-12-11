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
	<table width="400" border="0" align="center">
        <tr>
          <td colspan="2" align="center"><h2>#Step 3 : Tentukan Harga Beras</h2></td>
        </tr>
      </table>
	<div id="tbl2">
	  <form action="<?php echo base_url();?>index.php/c_produk/p_tambah/4" method="post">
	    <input type="hidden" name="kd1" value="<?php echo $kd1;?>" />
        <input type="hidden" name="nama_tambah" value="<?php echo $nama_tambah;?>" />
        <input type="hidden" name="ket_tambah" value="<?php echo $ket_tambah;?>" />
        <input type="hidden" name="kd2" value="<?php echo $kd2;?>" />
        <input type="hidden" name="kd_supplier1" value="<?php echo $kd_supplier1;?>" />
        <input type="hidden" name="kd_supplier2" value="<?php echo $kd_supplier2;?>" />
        <input type="hidden" name="nama_supplier" value="<?php echo $nama_supplier;?>" />
        <input type="hidden" name="alamat_supplier" value="<?php echo $alamat_supplier;?>" />
        <input type="hidden" name="tlp_supplier" value="<?php echo $tlp_supplier;?>" />
        <input type="hidden" name="email_supplier" value="<?php echo $email_supplier;?>" />
        <table border="0" width="400">
	      <tr valign="top">
	        <td>Kode harga</td>
	        <td>:
	          <input type="text" name="kd_harga" size="5" required="required" value="<?php echo $kd_harga_otomatis;?>" /></td>
	        </tr>
	      <tr>
	        <td>Harga</td>
	        <td>: <strong>
	          <input name="harga1" size="7" type="text" placeholder="Harga.." value="<?php echo $harga1;?>" required="required" />
	          Rupiah / Karung<font color="red">*</font></strong></td>
	        </tr>
	      <tr>
	        <td align="right"></td>
	        <td><input name="tambah2" type="submit" value="Tambah" class="tambah" /></td>
	        </tr>
	      </table>
	    </form>
	  
	  </div>

    </td>
      <td align="center"><table width="500" border="0">
        <tr>
          <td><strong>Catatan :</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Halaman Ini diperuntukan menentukan harga beras di <strong>Supplier</strong>.</td>
        </tr>
      </table></td>
  </tr>
</table>
</div><div class="grad2">
<table align="center"><tr align="center" valign="top">
    <td><form action="<?php echo base_url();?>index.php/c_produk/p_tambah/2" method="post">
      <input type="hidden" name="kd3" value="<?php echo $kd1;?>" />
      <input type="hidden" name="nama_tambah2" value="<?php echo $nama_tambah;?>" />
      <input type="hidden" name="ket_tambah2" value="<?php echo $ket_tambah;?>" />
      <input type="hidden" name="kd3" value="<?php echo $kd2;?>" />
      <input type="hidden" name="kd_supplier1" value="<?php echo $kd_supplier1;?>" />
      <input type="hidden" name="kd_supplier2" value="<?php echo $kd_supplier2;?>" />
      <input type="hidden" name="nama_supplier" value="<?php echo $nama_supplier;?>" />
      <input type="hidden" name="alamat_supplier" value="<?php echo $alamat_supplier;?>" />
      <input type="hidden" name="tlp_supplier" value="<?php echo $tlp_supplier;?>" />
      <input type="hidden" name="email_supplier" value="<?php echo $email_supplier;?>" />
      <center><input name="tambah2" type="submit" value="Kembali" class="kembali" />
	      </center>
	    </form></td>
  </tr>
</table></form></div>
