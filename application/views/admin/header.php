<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplikasi Inventory Beras</title>
<link href="<?php echo base_url();?>assets/images/z.png" rel="shortcut icon" />
<link href="<?php echo base_url();?>assets/css/cssku.css" rel="stylesheet" type="text/css" />
    <SCRIPT LANGUAGE="Javascript" SRC="<?php echo base_url();?>/assets/grafik/FusionCharts.js"></SCRIPT>
	<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.js"></script>
	<script>
		$(document).ready(function(){
				$("#pilih").change(function(){
		var kode=$('#pilih').val();
		var bulan=$('#bulan').val();
		if(kode == 'kosong')
		{
			return alert("Ga bisa Kosong !");
			}
		else if(kode == 'semua')
		{
        window.location.href="<?php echo base_url();?>index.php/c_kepala/detail/"+bulan;
			}
		else{
        window.location.href="<?php echo base_url();?>index.php/c_kepala/detail/"+bulan+"/0/"+kode;
			}
					});
	
	$( "#akordion" ).accordion();
		});
		
		function cek(){
		var pass1=$('#pass1').val();
		var pass2=$('#pass2').val();
			if(pass1 == pass2)
			{
			$( "#ya" ).show(500);
			$( "#tidak" ).hide("fast");
				}
			else
			{
			$( "#tidak" ).show(500);
			$( "#ya" ).hide("fast");
				}}
		
	function go(){
	var nip = prompt("Masukan NIP");		
if(nip == null){
	}
	else{
	return window.location.href="<?php echo base_url();?>index.php/c_admin/edit/"+nip;	
	}
	}
	
	function pesan(kode){
$.get("<?php echo base_url();?>index.php/c_admin/pesan/"+kode,null,function(data){
	$("#tbl").show("bounce", {
    times: 5
}, 1000);
	$("#m").html(data);
	});
$.get("<?php echo base_url();?>index.php/c_admin/p/",null,function(date){
	$("#p").html(date);
	});	
		}
	</script>
</head>
<body>
<div id="templatemo_site_title_bar_wrapper">
	<div id="templatemo_site_title_bar">
    	<div id="site_title">
            <h1><a href="#">Beras Bang Beur<span>Aplikasi Inventori Beras</span></a></h1>
        </div>
        
        <ul id="templatemo_menu">
            <li><a href="<?php echo base_url();?>index.php/c_admin" class="current"><span></span>Home</a></li>
            <li><a href="<?php echo base_url();?>index.php/c_admin/pegawai"><span></span>Pegawai</a></li>
			<li><a href="<?php echo base_url();?>index.php/c_admin/menu"><span></span>User</a></li>    
            <li><a href="<?php echo base_url();?>index.php/c_admin/pesan"><span></span>Pesan</a></li>
            <li><a href="<?php echo base_url();?>index.php/c_login/logout" onclick="return confirm('Anda yakin akan logout ?')"><span></span>Logout</a></li>        
        </ul>
        
        <div id="search_box">
            <form action="#" method="get">
                <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
            </form>
       </div>
       
	</div> <!-- end of templatemo_site_title_bar -->        
       
</div> <!-- end of templatemo_site_title_bar_wrapper --><!-- end of templatemo_banner_wrapper_outter -->
<div id="dikit">
</div>