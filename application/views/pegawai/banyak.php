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
       <h2><?php echo $judul; ?></h2>    
<form name='list_cek' action="<?php echo base_url();?>index.php/c_produk/beli_banyak" method="post">
<table border="0" class="tabel2">
  <tr align="center" valign="top">
    <th><input type="checkbox" id='cekMaster' name='cekMaster' onclick="checkUncheckAll(<?php echo $num;?>)"/></th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Jumlah Stok</th>
    <th>Harga</th>
  </tr>
  <?php
  $no=1; foreach($barang as $row){
 ?>
  <tr>
    <td><input type="checkbox"  id='cekAnak<?php echo $no;?>' name='jum[]' value="<?php echo $row->kd_barang;?>"/></td>
    <td><?php echo $row->kd_barang;?></td>
    <td><?php echo $row->nama_barang;?></td>
    <td><?php echo $row->stok." ".$row->satuan;?></td>
    <td><?php echo $row->harga." / ".$row->satuan;?></td>
  </tr>
  <?php $no++;}?>
</table>
<img src="<?php echo base_url();?>assets/pic/garis.png" width="177" height="25" style="margin-left:27px;" />
<input type="submit" name="hitung" id="button" value="Pembelian" />
</form>