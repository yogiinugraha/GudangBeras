<?php header("Content-type: application/octet-stream");
header("Pragma: no-cache");
header("Expires: 0");
header("Content-Disposition: attachment; filename = ".$judul.".xls");
?>
<link href="<?php echo base_url();?>assets/css/cssku.css" rel="stylesheet" type="text/css" /> 
  <h2 align="center">Detail Pembelian</h2>
  <br />
  <table width="" border="0" class="tabel" align="center">
    <tr class="tabel_judul">
      <td>Barang</td>
      <td>Pembeli</td>
      <td>Jumlah Beli</td>
      <td>Tanggal Beli</td>
      <td>Pemasukan</td>
    </tr>
    <?php $no=1;
  foreach($data as $row){
	 
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}
	  ?>
    <tr <?php echo $warna;?>>
      <td><?php echo $row->nama_barang;?></td>
      <td><?php echo $row->nama_customer;?></td>
      <td align="center"><?php echo $row->jml_keluar;?> KG</td>
      <td><?php echo $row->tgl_keluar;?></td>
      <td>Rp <?php echo $row->laba;?>;</td>
      <?php $no++;} ?>
    </tr>
    <tr>
      <td style="border:none;"></td>
      <td bgcolor="#e4e4e4"><strong>Total Beli</strong></td>
      <td align="center">: <font color="red"><?php echo $total->total;?></font> KG</td>
      <td bgcolor="#e4e4e4"><strong>Total Laba</strong></td>
      <td align="center">: Rp <font color="red"><?php echo $hasil->jml;?>;</font></td>
    </tr>
  </table>
