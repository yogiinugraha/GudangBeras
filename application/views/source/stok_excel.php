<?php header("Content-type: application/octet-stream");
header("Pragma: no-cache");
header("Expires: 0");
header("Content-Disposition: attachment; filename = ".$judul.".xls");
?>
<link href="<?php echo base_url();?>assets/css/cssku.css" rel="stylesheet" type="text/css" /> 
  <h2 align="center">Laporan Sisa Stok Sekarang</h2>
  <table width="" border="0" class="tabel" align="center">
    <tr class="tabel_judul">
      <td>No</td>
      <td>Kode Barang</td>
      <td>Nama Barang</td>
      <td width="90" align="center">Sisa Stok</td>
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
      <td align="center"><?php echo $no;?>.</td>
      <td><?php echo $row->kd_barang;?></td>
      <td><?php echo $row->nama_barang;?></td>
      <td align="center"><?php echo $row->stok;?> KG</td>
      <?php $no++;} ?>
    </tr>
  </table>
