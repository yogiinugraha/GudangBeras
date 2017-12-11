<script>
$(document).ready(function() {
	$("#form_ajax").submit(function() {
    var post_data=$(this).serialize();
    var form_action=$(this).attr("action");
    var form_method=$(this).attr("method");
	$.ajax({
		type:form_method,
		url:form_action,
		cache:false,
		data:post_data,
		dataType:"json"
		success: function(data){
			$("#pesan").html(data);
			alert("Data Berhasil Dikonfirmasi!");
			window.location.href="<?php echo base_url();?>index.php/c_produk/konfirmasi_pesanan";
			},
		error: function(){
			alert("Data Belum Bisa Dikonfirmasi!");
			}
		});
		return false;
	});
});
</script>

    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<div id='pesan'></div>
<form id="form_ajax" name="form" method="post" action="<?php echo base_url();?>index.php/c_produk/konfirmasi_pesanan">
<table width="" border="0">
  <tr>
    <td><strong>Nomor Pesanan</strong> </td>
    <td>: <strong><?php echo $barang[0]->no_pesanan;?></strong>
       	<input name="no_pesanan" type="hidden" value="<?php echo $barang[0]->no_pesanan;?>" />
    </td>
  </tr>
  <tr>
    <td><strong>Pembeli</strong> </td>
    <td>: <strong><?php echo $barang[0]->nama_customer;?>
        	<input name="kd_cust" type="hidden" value="<?php echo $barang[0]->kd_cust;?>" />
    </strong></td>
  </tr>
  <tr>
    <td><strong>Tanggal Pemesanan</strong> </td>
    <td>: <strong><?php echo $barang[0]->tgl_pesan;?></strong></td>
  </tr>
</table><br />
  <table width="100%" border="0" class="tabel2">
  <tr>
    <th>No.</th>
    <th>Nama Barang</th>
    <th>Jumlah Tersedia</th>
    <th>Jumlah Pesan</th>
    <th>Status</th>
    </tr><input name="jum" type="hidden" value="<?php echo count($barang);?>">
  <?php  $no=1;
  foreach($barang as $row){
	   $query=mysql_query("SELECT COUNT(no_pesanan) FROM t_detail_pesanan WHERE no_pesanan='$row->no_pesanan'");
	   $jumlah=mysql_fetch_array($query);
	   
	  ?>
  <tr>
    <td width="5%" align="center"><?php echo $no;?></td>
    <td><?php echo $row->nama_barang;?>
    	<input name="kd_barang<?php echo $no;?>" type="hidden" value="<?php echo $row->kd_barang;?>" />
    </td>
    <td><font color="#0000FF"><strong><?php echo $row->stok;?></strong></font> Karung</td>
    <td><strong><?php echo $row->jml;?></strong> Karung</td>
    <td><?php 
	$hasil=$row->jml-$row->stok;
		if($hasil >= 0){
	echo "Kurang <font color='red'>".$hasil."</font> Karung";}
    	else{echo $hasil="<font color='green'>Pas</font>";}?>
         <input name="jml<?php echo $no;?>" type="hidden" value="<?php echo $row->jml;?>" />
    </td>
    <?php $no++;} ?>
  </tr>
</table>
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>

<div class="grad2" align="center"><a href="<?php echo base_url();?>index.php/c_produk/konfirmasi_pesanan">
<input class="kembali" type="button" value="Kembali" /></a><input name="submit" class="simpan" type="submit" value="Confirm" />
</div></form>