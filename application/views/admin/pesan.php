    <div class="in">
      <div style=" border-bottom:#3ba2ff double 5px; margin-bottom:5px;">
        <h2><?php echo $judul;?></h2></div>
  <div class="dalam">
      <div class="tab"><strong>PESAN DARI PEGAWAI</strong></div>
    <center>
      <h2>Pesan Masuk</h2><br />
        <div id="p"><table width="" border="1" class="tabel">
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
        </table></div>
        <table id="tbl" width="500" height="200" align="center" style="border:#ccc solid 2px; border-radius:0px 0px 10px 10px; display:none;">
        <tr class="tabel_judul2" height="10">
        <td align="center"><strong>Rincian Pesan</strong></td>
        </tr>
        <tr valign="top">
        <td><div id="m" style="font-family:'Times New Roman', Times, serif; font-size:18px; padding:1px 5px 1px 5px;">
        </div></td>
        </tr>
        </table>
      <br />
        <br />

    </center>
    <hr width="90%" size="3" color="#CCCCCC" />
    <br />
        <table width="" border="0">
          <tr>
            <td colspan="3"><strong>Catatan :</strong></td>
          </tr>
          <tr>
            <td>*<strong>1.</strong></td>
            <td><strong>
              <input name="input3" type="button" value="Kembali" style="color:green;" />
            </strong></td>
            <td>=&gt; Kembali ke halaman sebelumnya..</td>
          </tr>
          <tr>
            <td>*<strong>2.</strong></td>
            <td><img src="<?php echo base_url();?>assets/images/del.png" width="20" height="20" class="zoom" /></td>
            <td>=&gt; Menghapus USER.</td>
          </tr>
        </table>
        <br />
        <br />
    
    </div>
    <div class="cleaner"></div>
  </div>
    
    
    <div class="cleaner"></div>
</div> <!-- end of templatemo_content -->
