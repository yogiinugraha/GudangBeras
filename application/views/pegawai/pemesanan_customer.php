<script language="JavaScript">
function checkUncheckAll(byk_data) {
 // mengambil id checkbox master
 var cek = eval("document.forms['list_cek'].cekMaster");

 // jika cekMaster tercentang
 if (cek.checked == true)
 {
  // lakukan looping sebanyak data cekAnak
  for (var j = 1; j <= byk_data; j++) {

   // mengeset var checkbox anak
   var box = eval("document.forms['list_cek'].cekAnak" + j);
   // jika checkboxnya tidak terdefinisi, maka lanjutkan
   // tidak ada error yang terjadi (error handling)
   if (box == undefined) {
    continue;
   // selain itu, jika cekAnak tidak tercentang, maka ubah jadi tercentang
   } else {
    if (box.checked == false) box.checked = true;
   }

  }
 // jika checkMaster tidak tercentang
 } else if (cek.checked == false)
 {
  // lakukan looping sebanyak data cekAnak
  for (var j = 1; j <= byk_data; j++) {

   // mengeset var checkbox anak
   var box = eval("document.forms['list_cek'].cekAnak" + j);

   // jika checkboxnya tidak terdefinisi, maka lanjutkan
   // tidak ada error yang terjadi (error handling)
   if (box == undefined) {
    continue;
   // selain itu, jika cekAnak tercentang, maka ubah jadi tidak tercentang
   } else {
    if (box.checked == true) box.checked = false;
   }

  }
 }
}
</script>
    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">

<form name='list_cek' action="<?php echo base_url();?>index.php/c_pemesanan/pemesanan_customer" method="post">
<table border="0" class="tabel2">
  <tr align="center" valign="top">
    <th><input type="checkbox" id='cekMaster' name='cekMaster' onclick="checkUncheckAll(<?php echo $num;?>)"/></th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Sisa Stok</th>
    </tr>
  <?php
  $no=1;
   foreach($barang as $hasil){
	    ?>
  <tr>
    <td><input type="checkbox"  id='cekAnak<?php echo $no;?>' name='cek[]' value="<?php echo $hasil->kd_barang;?>"/></td>
    <td><?php echo $hasil->kd_barang;?></td>
    <td><?php echo $hasil->nama_barang;?></td>
    <td><?php echo $hasil->stok." ".$hasil->satuan;?></td>
    </tr>
  <?php $no++;}?>
</table>
<img src="<?php echo base_url();?>assets/pic/garis.png" width="177" height="25" style="margin-left:27px;" />
<input type="submit" name="button" id="button" value="Pesan Barang" />
</form>
<div class="pagination"><?php echo $this->pagination->create_links();?></div>

  </center><br />
<p><strong>*</strong>Menu ini berfungsi untuk mengirim data kepada supplier dalam <strong>penambahan stok beras</strong>.
<br />*Untuk menambah stok beras, masukan nama beras yang akan ditambah stoknya.<br />
  <strong>*</strong>Jika ingin <strong>menambahkan stok barang baru</strong>, maka masukan nama barang baru tersebut.</p>

