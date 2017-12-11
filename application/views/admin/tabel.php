<table width="" border="1" class="tabel">
          <tr class="tabel_judul2">
            <td>Kode</td>
            <td>Pengirim</td>
            <td width="200">Perihal</td>
            <td width="450">Isi Pesan</td>
            <td>Tanggal</td>
            <td>Status</td>
          </tr>
          <?php $no=1;
  foreach($data as $row){
	 if($row->status == 'belum'){
		 $t="bold";
	 }
	 else{
		 $t="";}
	  if ($no % 2 == 0)
	  {
		  $warna='bgcolor="#e4e4e4"';
		  }
	else{$warna="";}
	  ?>
          <tr <?php echo $warna;?>>
            <td><a href="javascript:void(0)" onClick="pesan('<?php echo $row->no;?>')" style="font-family:'Times New Roman'; color:#000; font-size:16px; cursor:pointer; font-weight:<?php echo $t;?>;"><?php echo $row->no;?></a></td>
            <td align="center"><a href="javascript:void(0)" onClick="pesan('<?php echo $row->no;?>')" style="font-family:'Times New Roman', Times, serif; color:#000; font-size:16px; cursor:pointer; font-weight:<?php echo $t;?>;"><?php echo $row->username;?></a></td>
            <td><a href="javascript:void(0)" onClick="pesan('<?php echo $row->no;?>')" style="font-family:'Times New Roman', Times, serif; color:#000; font-size:16px; cursor:pointer; font-weight:<?php echo $t;?>;"><?php echo $row->perihal;?></a></td>
            <td><a href="javascript:void(0)" onClick="pesan('<?php echo $row->no;?>')" style="font-family:'Times New Roman', Times, serif; color:#000; font-size:16px; cursor:pointer; font-weight:<?php echo $t;?>;"><?php echo $row->pesan;?> ...</a></td>
            <td><a href="javascript:void(0)" onClick="pesan('<?php echo $row->no;?>')" style="font-family:'Times New Roman', Times, serif; color:#000; font-size:16px; cursor:pointer; font-weight:<?php echo $t;?>;"><?php echo $row->tgl;?></a></td>
            <td align="center"><a href="javascript:void(0)" onClick="pesan('<?php echo $row->no;?>')" style="font-family:'Times New Roman', Times, serif; color:#000; font-size:16px; cursor:pointer; font-weight:<?php echo $t;?>;"><?php echo $row->status;?></a></td>
          </tr> <?php $no++;} ?>
        </table>