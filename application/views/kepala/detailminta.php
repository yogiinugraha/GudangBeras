   <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
        <h2><?php echo $judul;?></h2></div>
        <table width="100%" border="0" class="tabel2">
          <tr>
            <th>Barang</th>
            <th>No Faktur</th>
            <th align="center">Jumlah Ambil</th>
            <th align="center">Tanggal Ambil</th>
            <th>Pengeluaran</th>
            <th>Status</th>
          </tr>
          <?php $no=1;
  foreach($data as $row){
	 
	 if($row->status == 'belum')
	  {
		  $warna='bgcolor="#ba0808"';
		  }
		else{  
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}}
	  ?>
          <tr <?php echo $warna;?>>
            <td><?php echo $row->nama_barang;?></td>
            <td><?php echo $row->no_faktur;?></td>
            <td align="center"><?php echo $row->jml_minta;?> Karung</td>
            <td><?php echo $row->tgl_permintaan;?></td>
            <td>Rp <?php echo $row->pengeluaran;?>;</td>
            <td><?php echo $row->status;?></td>
            <?php $no++;} ?>
          </tr>
          <tr>
            <td style="border:none;"></td>
            <td bgcolor="#e4e4e4"><strong>Total Beli</strong></td>
            <td align="center">: <font color="red"><?php echo $hasil->total;?></font> Karung</td>
            <td bgcolor="#e4e4e4"><strong>Total Pengeluaran</strong></td>
            <td align="center">: Rp <font color="red"><?php echo $hasil->jml;?>;</font></td>
            <td align="center">&nbsp;</td>
          </tr>

        </table>
        <br /><center>
<a href="<?php echo base_url();?>index.php/c_kepala/minta">
          <input align="top" name="input" type="button" value="Kembali" class="kembali" style="color:green;" />
        </a>
</center>
      