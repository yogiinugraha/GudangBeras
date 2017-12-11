    <div class="in">
      <div style=" border-bottom:#3ba2ff double 5px; margin-bottom:5px;">
        <h2><?php echo $judul;?></h2></div>
  <div class="dalam">
      <div class="tab"><strong>DAFTAR PEGAWAI B3</strong></div>
      <div class="tambah"> <font color="#ba0808"><strong>MASUKAN :</strong></font>
        <select name="list" id="pilih">
          <option value="kosong">--Pencarian--</option>
          <?php foreach($data as $row){	?>
          <option value="<?php echo $row->username;?>"><?php echo $row->username;?></option>
          <?php }?>
          <option value="semua" style="color:#ba0808; text-align:center;">-Show All-</option>
        </select>
        <div style="float:right; font-weight:bold;">Page Of || <?php echo $this->pagination->create_links();?></div>
      </div>
    <center>
      <h2>Daftar User</h2><br />
        <table width="" border="0" class="tabel">
          <tr class="tabel_judul">
            <td>No</td>
            <td>Username</td>
            <td>Akses</td>
            <td align="center">Opsi</td>
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
            <td><?php echo $no;?></td>
            <td><?php echo $row->username;?></td>
            <td><?php echo $row->akses;?></td>
            <td align="center"><a href="<?php echo base_url();?>index.php/c_admin/deleteuser/<?php echo $row->username;?>" onclick="return confirm('Anda yakin akan menghapus akun ?')"><img src="<?php echo base_url();?>assets/images/del.png" width="20" height="20" class="zoom" /></a></td>
            <?php $no++;} ?>
          </tr>

        </table>
        <a href="<?php echo base_url();?>index.php/c_admin/menu"><input type="button" name="button"  value="Kembali" /></a>
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
