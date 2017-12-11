    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
	<SCRIPT LANGUAGE="Javascript" SRC="<?php echo base_url();?>/assets/grafik/FusionCharts.js"></SCRIPT>
	<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.js"></script>
	<script>
			$(document).ready(function() {
    $("#tombol").click(function(){
		$("#line").dialog({modal:true,width:750,height:400});
	});
		
		$("#tombol").click(function(){
			$("#line").show(500);
			});
    });

	</script>
    <h2><?php echo $judul;?></h2>
           <div id="line" title="Grafik Penjualan Beras Terlaris Tahun 2014" align="center" style="display:none;"> 
        FusionCharts. </div>
		<table>
		  <tr align="center">
		    <td><a href="#" id="tombol"><img src="<?php echo base_url();?>assets/images/b.png" width="35" height="35" class="zoom" /></a></td>
	      </tr>
		  <tr valign="top" align="center">
		    <td><div style="font-size:12px">Tampilkan Grafik</div></td>
	      </tr>
		  </table>
		<script type="text/javascript">
		   var chart = new FusionCharts("<?php echo base_url();?>/assets/grafik/FCF_MSLine.swf", "ChartId", "700", "350");
		   chart.setDataURL("<?php echo base_url();?>/index.php/c_kepala/line");		   
		   chart.render("line");
		</script>
        <div style="overflow:auto; height:80%;"><table width="100%" border="0" class="tabel2">
          <tr>
            <th>Bulan</th>
            <th>Total Terjual</th>
            <th>Nama Barang</th>
          </tr>
          <?php 		  
		  $no=1;
  foreach($data as $row){
	$w=$this->warna->color2($row->bulan);
	$row->bulan=$this->bulan->angka_bulan($row->bulan);
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}
	  ?>
          <tr <?php echo $warna;?>>
            <td><font color="<?php echo $w;?>"><?php echo $row->bulan;?></font></td>
            <td><?php echo $row->total;?> Karung</td>
            <td><?php echo $row->nama_barang;?></td>
            <?php $no++;} ?>
          </tr>
          <tr>
            <td style="border:none;">&nbsp;</td>
            <td bgcolor="#e4e4e4" align="center"><strong>Total Terima</strong></td>
            <td bgcolor="#e4e4e4" align="center"><strong>Total </strong></td>
            <td style="border:none;">&nbsp;</td>
          </tr>
          <tr>
            <td style="border:none;">&nbsp;</td>
            <td>: <font color="red"><?php echo $hasil->total;?></font> Karung</td>
            <td>: Rp <font color="red"><?php echo $hasil->jml;?>;</font></td>
            <td style="border:none;"></td>
          </tr>
        </table>
</div>