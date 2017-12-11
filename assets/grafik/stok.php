<link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>/assets/grafik/FusionCharts.js"></script>
	
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.js"></script>
	<script>
			$(document).ready(function() {
    $("#buka").click(function(){
		$("#line").dialog({modal:true,width:700,height:350});
	});
		
		$("#buka").click(function(){
			$("#line").show(500);
			});
		$(".tutup").click(function(){
			$("#line").hide(500);
			});
    });
	function change(){
		data=$("#change").val();
		        window.location.href="<?php echo base_url();?>index.php/c_kepala/stok/"+data;

		
		}
	</script>
        <h2><?php echo $judul;?></h2></div>
<table border="0" width="100%">
  <tr align="center">
    <td width="8%"><a href="<?php echo base_url();?>index.php/c_excel/stok"><img src="<?php echo base_url();?>assets/images/excel.png" width="35" height="33" class="zoom" /></a></td>
    <td width="8%"><a href="<?php echo base_url();?>index.php/c_excel/stok/Laporan_Stok" target="_blank"><img src="<?php echo base_url();?>assets/images/pdf.png" width="35" height="33" class="zoom" /></a></td>
    <td width="8%"><a href="#" id="buka"><img src="<?php echo base_url();?>assets/images/b.png" width="35" height="35" class="zoom" /></a></td>
    <td width="8%"><a href="<?php echo base_url();?>index.php/c_kepala/refresh/stok"><img src="<?php echo base_url();?>assets/pic/segar.png" width="35" height="35" class="zoom" /></a></td>
    <td align="center">
    Tampilkan Berdasarkan Bulan : <select name="bulan" onchange="change()" id="change">
    <option value="0">~ Pilih Bulan ~</option>
    <option value="0">~ Sekarang ~</option>
    <?php $n=1; while($n < 12){ $bulan=$this->bulan->angka_bulan($n);
	echo "<option value='".$n."'>".$bulan."</option>";
	$n++;}?>
    </select></td>
  </tr>
  <tr valign="top" align="center">
    <td><div class="news_box" style="font-size:12px">Cetak Ke Excel</div></td>
    <td><div class="news_box" style="font-size:12px">Cetak Ke Pdf</div></td>
    <td><div class="news_box" style="font-size:12px">Tampilkan Grafik</div></td>
    <td><div class="news_box" style="font-size:12px">Refresh</div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<div id="line" align="center" style="display:none;" title="Grafik Sisa Stok Sekarang"><?php
   $strXML = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Krg ' formatNumberScale='0' basefontsize='13'>";
$n=1;
foreach($data as $row){
	$warna=$this->warna->color($n);
         $strXML .= "<set name='".$row->nama_barang."' value='".$row->stok."' color='".$warna."'/>";
		$n++;
		}
   $strXML .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_pie2D.swf", "", $strXML, "FactorySum", 600, 250);
?></div>
</center><br />
  <table width="100%" border="0" class="tabel2">
    <tr>
      <th width="10%">No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th align="center">Sisa Stok</th>
      </tr>
    <?php $no=1;
  foreach($data as $row){
	  ?>
    <tr>
      <td align="center"><?php echo $no;?>.</td>
      <td><?php echo $row->kd_barang;?></td>
      <td><?php echo $row->nama_barang;?></td>
      <td align="center"><?php echo $row->stok;?> Karung</td>
      <?php $no++;} ?>
    </tr>
  </table>
  <br />
 <div align="center"><a href="<?php echo base_url();?>index.php/c_kepala/laporan"> 
 <input type="submit" name="button" id="button" value="Kembali" class="kembali" />
 </a></div>

