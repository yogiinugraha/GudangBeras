    <div class="in">
      <div style=" border-bottom:#3ba2ff double 5px; margin-bottom:5px;">
        <h2><?php echo $judul;?></h2></div>
  <div class="dalam">
      <div class="tab"><strong>EDIT PEGAWAI</strong></div>
      
  <center>
  <form action="<?php echo base_url();?>index.php/c_admin/edit" method="post" enctype="multipart/form-data">
    <table border="0">
  <tr align="center">
    <td colspan="2"><h2>Ubah Data Pegawai</h2></td>
    </tr>
  <tr>
    <td>NIP</td>
    <td>: 
      <input name="nip" placeholder="nomor induk.." type="text" value="<?php echo $data->nip;?>" readonly /></td>
  </tr>
  <tr>
    <td>Nama Pegawai</td>
    <td>: 
      <input name="nama" placeholder="nama pegawai.." type="text" value="<?php echo $data->nama_pegawai;?>" required="required" /></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: 
      <textarea name="alamat" placeholder="alamat pegawai.." required="required" ><?php echo $data->alamat;?></textarea></td>
  </tr>
  <tr>
    <td>Nomor Handphone</td>
    <td>: 
      <input name="tlp" placeholder="nomor tlp.." type="text" value="<?php echo $data->tlp;?>" required="required" /></td>
  </tr>
  <tr valign="top">
    <td>foto</td>
    <td>: <img src="<?php echo base_url();?>/assets/images/<?php echo $data->gambar;?>" width="70" style="border:#000 solid 3px;" /></td>
  </tr>
  <tr>
    <td>Ubah Foto</td>
    <td>: 
      <input type="file" name="foto" required="required" id="fileField" /></td>
  </tr>
  <tr>
    <td align="right"><a href="<?php echo base_url();?>index.php/c_admin/pegawai">
      <input type="button" name="button"  value="Kembali" />
    </a></td>
    <td><input name="ubah" type="submit" value="Ubah" class="ton" /></td>
  </tr>
</table>
</form>
    <hr width="90%" size="3" color="#CCCCCC" />
Edit Data Lain : <select name="pilih">
<option>Pilih NIP</option>
<?php foreach($hasil as $row){
echo "<option>$row->nip</option>";
}?>
</select>
  </center>
  <br />
    </div>
  </div>
    
    
    <div class="cleaner">
    </div>
</div> <!-- end of templatemo_content -->
