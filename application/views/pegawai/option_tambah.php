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
<table width="400" border="0">
        <tr>
          <td colspan="2" align="center"><h2>#Step 1 : Pilih Jenis Beras</h2></td>
        </tr>
        </tr>
          <td><img src="<?php echo base_url();?>assets/pic/tombol_tambah.png" onclick="hadi()" class="zoom" /></td>
          <td><img src="<?php echo base_url();?>assets/pic/tombol_ada.png" onclick="hadi1()" class="zoom"/></td>
        </tr>
      </table>
</form>

	<form action="<?php echo base_url();?>index.php/c_produk/p_tambah/2" method="post">
<table border="0" align="center" id="tbl1" style="display:none;">
  <tr>
    <td>Pilih Jenis Barang </td>
    <td>: <select name="kd1">
    <option value="kosong" disabled="disabled" >--Pilih Jenis Barang--</option>
    <?php foreach($jenis1 as $row){
    echo "<option value='$row->kd_jenis'>($row->kd_jenis) $row->nama_jenis</option>";}?>
    </select></td>
    <td><input name="kirim" type="submit" value="Next" class="next" /></td>
  </tr>
</table>
</form>
<div id="tbl2">
<form action="<?php echo base_url();?>index.php/c_produk/p_tambah/2" method="post">
<table border="0" align="center">
  <tr valign="top">
    <td><strong>Kode Jenis</strong></td>
    <td>: <input type="text" name="kd2" size="5" required="required" value="<?php echo $jenis;?>" /></td>
  </tr>
  <tr valign="top">
    <td><strong>Nama Jenis</strong></td>
    <td>: <input type="text" name="nama_tambah" required="required" value="<?php echo $nama_tambah;?>" placeholder="Rojolele Super.."  size="24"/></td>
  </tr>
  <tr valign="top">
    <td><strong>Keterangan Barang</strong></td>
    <td><div style="float:left; margin-right:5px;">:</div> <textarea required="required" rows="5" cols="20" name="ket_tambah" placeholder="Keterangan beras disini.." ><?php echo $ket_tambah;?></textarea></td>
  </tr>
  <tr align="center">
    <td colspan="2">
   <input name="kirim" type="submit" value="Next" class="next" /></td>
  </tr>
</table></form>
</div></td>
    <td align="center">
		<table width="500" border="0">
	  <tr>
		<td><strong>Catatan :</strong></td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td><strong>1. Tambah Baru</strong></td>
		<td> =&gt; Menambah Jenis Barang yang Baru.</td>
	  </tr>
	  <tr>
		<td><strong style="float:left;">2. Yang Sudah Ada</strong></td>
		<td>=&gt; Memilih Kode Jenis Yang Sudah Ada.</td>
	  </tr>
	  <tr>
		<td colspan="2">Halaman Ini diperuntukan memilih jenis beras, pilih yang sudah ada atau tambah baru.</td>
	  </tr>
		</table>
	</td>
  </tr>
</table>
</div><div class="grad2"><table align="center"><tr align="center">
    <td colspan="2">
   <a href="<?php echo base_url();?>index.php/c_produk/index">
   <input name="input" type="button" value="Kembali" class="kembali" style="color:green;" />
   </a>
   </td>
  </tr>
</table></div>
