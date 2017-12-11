   <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
        <h2><?php echo $judul; ?></h2>
        <table>
  <tr align="center">
    <td><a href="#" id="buka"><img src="<?php echo base_url();?>assets/images/excel.png" width="35" height="33" class="zoom" /></a></td>
    <td><a href="<?php echo base_url();?>index.php/c_pdf/stok"><img src="<?php echo base_url();?>assets/images/pdf.png" width="35" height="33" /></a></td>
    </tr>
  <tr valign="top" align="center">
    <td><div style="font-size:12px">Cetak Ke Excel</div></td>
    <td><div style="font-size:12px">Cetak Ke Pdf</div></td>
    </tr>
</table>
<table width="100%" border="0" class="tabel2">
  <tr>
    <th>Kode Penyuplai</th>
    <th>Nama Penyuplai</th>
    <th>Jenis Barang suplai</th>
    <th>Action</th>
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
    <td><?php echo $row->kd_supplier;?></td>
    <td><?php echo $row->nama_supplier;?></td>
    <td><?php echo $row->nama_jenis;?></td>
    <td align="center"><a href="<?php echo base_url();?>index.php/c_kepala/detailsup/<?php echo $row->kd_supplier;?>">
    <img src="<?php echo base_url();?>assets/images/detail.png" width="20" height="20" class="zoom" />
    </a></td>
   <?php $no++;} ?>
  </tr>
</table>
<?php echo $this->pagination->create_links();?>