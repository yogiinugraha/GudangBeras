<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Inventori Beras - Kepala</title>
<link href="<?php echo base_url();?>assets/images/z.png" rel="shortcut icon" />
    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.js"></script>
    <script>
	function ganti_judul(judul){
	document.getElementById('isi_topik').innerHTML = judul;
	}
	
	$(function(){
		$( "#akor" ).accordion();	
		});
	
	</script>
</head>
<body>
<div id="header">
  <div class="head">
  	<img src="<?php echo base_url();?>assets/pic/header.jpg" width="350" height="100" />
  </div>
  <div class="sub_head">
    <h1>Aplikasi Inverntori Beras V0.1</h1>
	  <center><strong><em>Penjualan Beras - Stok Beras - Pengelolaan Data Beras</em></strong></center>
  </div>
</div>
