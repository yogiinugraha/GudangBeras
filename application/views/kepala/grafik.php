   <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
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
			$(document).ready(function() {
    $("#buka").click(function(){
		$("#dialog").dialog({modal:true,width:700,height:90});
	});
		
	    $("#dialog1").dialog({modal:true});
		$("#buka").click(function(){
			$(".m").show(500);
			});
		$(".tutup").click(function(){
			$(".m").hide(500);
			});
		
    });

	
		
	function pie(){
		var bulan=$('#tombol').val();
		if(bulan == "Tampilkan Grafik"){
		$("#tombol").val("Tutup Grafik");}
		else{
		$("#tombol").val("Tampilkan Grafik");}
		$("#line").slideToggle('slow');		
		}
	</script>
        <h2><?php echo $judul;?></h2>
<div style=" overflow:auto; height:90%; text-align:center;"><div id="akordion">
  	<div class="akordion_judul">Persentase Keuntungan</div>
    <div class="akordion_isi">
      <h2>Keuntungan Tiap Bulannya</h2><?php
   $strXML = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Rupiah ' formatNumberScale='0' basefontsize='15'>";
$no=2;
foreach($hasil as $row){
	$row->bulan=$this->bulan->angka_bulan($row->bulan);
	$warna=$this->warna->color($no);
         $strXML .= "<set name='".$row->bulan."' value='".$row->keuntungan."' color='".$warna."'/>";
		$no++;}
   $strXML .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_column3D.swf", "", $strXML, "aai", 600, 250);
?></div>
  	<div class="akordion_judul">Grafik Pemasukan</div>
    <div class="akordion_isi"><h2>Pemasukan Tahun 2014</h2><?php
   $strXML = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Rupiah ' formatNumberScale='0' basefontsize='15'>";
$no=1;
foreach($keluar as $row){
	$row->bulan=$this->bulan->angka_bulan($row->bulan);
	$warna=$this->warna->color($no);
         $strXML .= "<set name='".$row->bulan."' value='".$row->laba."' color='".$warna."'/>";
		$no++;}
   $strXML .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_column3D.swf", "", $strXML, "ahdi", 600, 250);
?></div>
  	<div class="akordion_judul">Grafik Pengeluaran</div>
    <div class="akordion_isi"><h2>Pengeluaran Tahun 2014</h2><?php
   $s = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Rupiah ' formatNumberScale='0' basefontsize='15'>";
$no=5;
foreach($minta as $row){
	$warna=$this->warna->color($no);
	$row->bulan=$this->bulan->angka_bulan($row->bulan);
         $s .= "<set name='".$row->bulan."' value='".$row->pengeluaran."' color='".$warna."'/>";
		$no++;}
   $s .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_column3D.swf", "", $s, "hai", 600, 250);
?></div>
  	<div class="akordion_judul">Stok Barang</div>
    <div class="akordion_isi"><h2>Pesentase Stok Beras</h2><?php
   $strXML = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Karung ' formatNumberScale='0' basefontsize='13'>";
$n=1;
foreach($stok as $row){
	$warna=$this->warna->color($n);
         $strXML .= "<set name='".$row->nama_barang."' value='".$row->stok."' color='".$warna."'/>";
		$n++;
		}
   $strXML .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_pie2D.swf", "", $strXML, "idah", 600, 250);
?></div>
  	<div class="akordion_judul">Penjualan Barang</div>
    <div class="akordion_isi"><h2>Penjualan Barang Tahun 2014</h2><?php
   $strXML = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Karung ' formatNumberScale='0' basefontsize='15'>";
$no=3;
foreach($keluar as $row){
	$warna=$this->warna->color($no);
	$row->bulan=$this->bulan->angka_bulan($row->bulan);
         $strXML .= "<set name='".$row->bulan."' value='".$row->total."' color='".$warna."'/>";
		$no++;}
   $strXML .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_column3D.swf", "", $strXML, "FactorySum", 600, 250);
?></div>
  	<div class="akordion_judul">Pengambilan Barang</div>
    <div class="akordion_isi"><h2>Grafik Permintaan Barang Tahun 2014</h2><?php
   $s = "<graph decimalPrecision='0' showNames='1' numberSuffix=' Karung ' formatNumberScale='0' basefontsize='15'>";
$no=5;
foreach($minta as $row){
	$warna=$this->warna->color($no);
	$row->bulan=$this->bulan->angka_bulan($row->bulan);
         $s .= "<set name='".$row->bulan."' value='".$row->total."' color='".$warna."'/>";
		$no++;}
   $s .= "</graph>";
   echo renderChart(base_url()."/assets/grafik/FCF_column3D.swf", "", $s, "hadi", 600, 250);
?></div>
  	<div class="akordion_judul">Beras Terlaris</div>
    <div class="akordion_isi"><div id="line" align="center"> 
        FusionCharts. </div>
		<script type="text/javascript">
		   var chart = new FusionCharts("<?php echo base_url();?>/assets/grafik/FCF_MSLine.swf", "ChartId", "700", "350");
		   chart.setDataURL("<?php echo base_url();?>/index.php/c_kepala/line");		   
		   chart.render("line");
		</script></div>
</div>
