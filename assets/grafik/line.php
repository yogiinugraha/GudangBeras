<?php
$koneksi=mysql_connect("localhost","root","")or die(mysql_errno());
$db=mysql_select_db("gudang")or die(mysql_error());
?>
<graph decimalPrecision='0'numberSuffix=' Kg ' rotateNames='1'  showvalues='0' formatNumberScale='0' basefontsize='15'>
<categories>
<?php $query1=mysql_query("SELECT bulan FROM r_produk GROUP BY bulan");
while($row=mysql_fetch_array($query1)){
	$b=$this->bulan->angka_bulan($row[0]);

echo "<category name='".$b."' />";}
?>
</categories>

<?php $query2=mysql_query("SELECT nama_barang FROM r_produk GROUP BY nama_barang");
$no=1;
while($ro=mysql_fetch_array($query2)){
		if($no == 1)
	{
		$warna="#991c18";
		}
	elseif($no == 2)
	{
		$warna="#eae81f";
		}
	elseif($no == 3)
	{
		$warna="#2aff00";
		}
	elseif($no == 4)
	{
		$warna="#0000ff";
		}
	elseif($no == 5)
	{
		$warna="#3ca3ff";
		}
	elseif($no == 6)
	{
		$warna="#ea701f";
		}
	else
	{
		$warna="#b1d8f6";
		}

echo "<dataset seriesName='".$ro[0]."' color='$warna' anchorBorderColor='$warna' anchorBgColor='$warna'>";
	$hasil=mysql_query("SELECT SUM(jml_keluar) AS total,bulan FROM r_produk WHERE nama_barang='$ro[0]' GROUP BY bulan");
	while($r=mysql_fetch_array($hasil)){	
	echo "<set value='".$r[0]."' />";
	}
echo "</dataset>";
$no++;
}
?>
</graph>
