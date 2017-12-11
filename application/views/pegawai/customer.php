    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
<table width="100%" border="0">
  <tr>
    <td>
    <input name="" type="button" value="Refresh" class="refresh" onclick="javascript:history.go(-2)" /></td>
    <td align="right"><form action="<?php echo base_url();?>index.php/c_transaksi/customer" method="post">
Cari Barang : <input name="keyword" type="text" size="50" /> <input class="cari" type="submit" value="Cari" />
</form></td>
  </tr>
</table><br />
        <table width="100%" border="0" class="tabel2">
          <tr>
            <th width="5%">No.</th>
            <th>Nama Pembeli</th>
            <th>Total Beli</th>
            <th>Bulan</th>
            <th>Detail</th>
          </tr>
          <?php 	  
		  $no=1;
  foreach($data as $row){
	  if($row->nama_customer == 'UNKNOW')
	  {
		  $tag="<font color='#00FF00'>";
		  $tagg="</font>";
		  }
		else {
		  $tag="";
		  $tagg="";
		  }
		$row->bulan=$this->bulan->angka_bulan($row->bulan); 
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}
	  ?>
          <tr <?php echo $warna;?>>
            <td align="center"><?php echo $no;?></td>
            <td><?php echo $tag.$row->nama_customer.$tagg;?></td>
            <td><?php echo $row->total;?> Karung</td>
            <td><?php echo $row->bulan;?></td>
            <td align="center"><a href="<?php echo base_url();?>index.php/c_transaksi/detailcustomer/<?php echo $row->kd;?>/<?php echo $row->bulan;?>"> <img src="<?php echo base_url();?>assets/images/detail.png" alt="" width="20" height="20" class="zoom" /> </a></td>
            <?php $no++;} ?>
          </tr>
        </table>
 <div class="pagination"><?php echo $this->pagination->create_links();?></div>
