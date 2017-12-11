   <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>/assets/grafik/FusionCharts.js"></script>
	
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.js"></script>
	<script>
			$(document).ready(function() {
    $("#tombol").click(function(){
		$("#line").dialog({modal:true,width:700,height:350});
	});
		
		$("#tombol").click(function(){
			$("#line").show(500);
			});
    });
				$(document).ready(function() {
    $("#buka").click(function(){
		$("#dialog").dialog({modal:true,width:700,height:100});
	});
		
	    $("#dialog1").dialog({modal:true});
		$("#buka").click(function(){
			$(".m").show(500);
			});
		$(".tutup").click(function(){
			$(".m").hide(500);
			});
		
    });

	</script>        <h2><?php echo $judul;?></h2>
        <table border="0">
  <tr align="center">
    <td><a href="#" id="buka"><img src="<?php echo base_url();?>assets/images/excel.png" width="35" height="33" class="zoom" /></a></td>
    <td><a href="<?php echo base_url();?>index.php/c_pdf/stok"><img src="<?php echo base_url();?>assets/images/pdf.png" width="35" height="33" /></a></td>
    <td><a href="#" id="tombol"><img src="<?php echo base_url();?>assets/images/b.png" width="35" height="35" class="zoom" /></a></td>
  </tr>
  <tr valign="top">
    <td><div class="news_box" style="font-size:12px">Cetak Ke Excel</div></td>
    <td><div class="news_box" style="font-size:12px">Cetak Ke Pdf</div></td>
    <td><div class="news_box" style="font-size:12px">Tampilkan Grafik</div></td>
  </tr>
</table>
      <center>
        <div id="line" align="center" title="Laporan Pemesanan Barang ke Supplier Tiap Bulan" style="display:none;"> <?php
   $strXML = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Kg ' formatNumberScale='0' basefontsize='15'>";
foreach($data as $row){
	$row->bulan=$this->bulan->angka_bulan($row->bulan);
         $strXML .= "<set name='".$row->bulan."' value='".$row->total."' color='AFD8F8'/>";
		}
   $strXML .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_column3D.swf", "", $strXML, "FactorySum", 600, 250);
?>
</div>
        <table width="100%" border="0" class="tabel2">
          <tr>
            <th width="10%">No.</th>
            <th>Bulan</th>
            <th>Total Permintaan</th>
            <th>Pengeluaran</th>
            <th>Detail</th>
          </tr>
          <?php 
		  
		  $no=1;
  foreach($data as $row){
	if($row->bulan == 11)
	{
		$row->bulan="November";
		}
	elseif($row->bulan == 12)
	{
		$row->bulan="Desember";
		}
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}
	  ?>
          <tr <?php echo $warna;?>>
            <td><?php echo $no;?></td>
            <td><?php echo $row->bulan;?></td>
            <td><?php echo $row->total;?> Karung</td>
            <td>Rp <?php echo $row->pengeluaran;?> ;</td>
            <td align="center"><a href="<?php echo base_url();?>index.php/c_kepala/detailminta/<?php echo $row->bulan;?>"> <img src="<?php echo base_url();?>assets/images/detail.png" alt="" width="20" height="20" class="zoom" /> </a></td>
            <?php $no++;} ?>
          </tr>
          <tr>
            <td style="border:none;">&nbsp;</td>
            <td style="border:none;">&nbsp;</td>
            <td bgcolor="#e4e4e4" align="center"><strong>Total Terima</strong></td>
            <td bgcolor="#e4e4e4" align="center"><strong>Total </strong></td>
            <td style="border:none;">&nbsp;</td>
          </tr>
          <tr>
            <td style="border:none;">&nbsp;</td>
            <td style="border:none;">&nbsp;</td>
            <td>: <font color="red"><?php echo $hasil->total;?></font> Karung</td>
            <td>: Rp <font color="red"><?php echo $hasil->jml;?>;</font></td>
            <td style="border:none;"></td>
          </tr>
        </table>
        <br />
        <br />
<br />
<hr width="90%" size="3" color="#CCCCCC" />
    </center>
      <div id="dialog" title="Laporan Penjualan Barang per bulannya" style="font-weight:bolder; display:none; text-align:center; width:900px;">
<form action="<?php echo base_url();?>index.php/c_excel/minta" method="post">
<table border="0" align="center">
  <tr>
    <td>Pilih Tanggal : 
      <input name="bulan1" type="text" /> S/d. <input name="bulan2" type="text" /></td>
    <td><input name="" type="submit" value="Kirim" class="ton" /></td>
  </tr>
</table>
</form>
</div>
