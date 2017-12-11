    <div class="in">
      <div style=" border-bottom:#3ba2ff double 5px; margin-bottom:5px;">
        <h2><?php echo $judul;?></h2></div>
  <div class="dalam">
      <div class="tab"><strong>TAMBAH PEGAWAI</strong></div>
      
  <center>
  <form action="<?php echo base_url();?>index.php/c_admin/tambahuser" method="post" enctype="multipart/form-data">
    <table border="0">
  <tr align="center">
    <td colspan="2"><h2>Tambah Pegawai</h2></td>
    </tr>
  <tr>
    <td>Username</td>
    <td>: 
      <input name="username" placeholder="username pegawai.." type="text" required="required" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>: 
      <input name="password" placeholder="* * * * *" type="password" required="required" /></td>
  </tr>
  <tr>
    <td>Hak Akses</td>
    <td>: <select name="akses">
    <option>kepala</option>
    <option>pegawai</option>
    <option>admin</option>
    </select></td>
  </tr>
  <tr>
    <td align="right"><input name="reset" type="reset" value="Reset" /></td>
    <td><input name="submit" type="submit" value="Kirim" class="ton" /></td>
  </tr>
</table>
</form>
    <hr width="90%" size="3" color="#CCCCCC" />
  </center>
    <table width="540" border="0">
  <tr>
    <td colspan="2"><strong>Catatan :</strong></td>
    </tr>
  <tr>
    <td>*<strong>1. </strong></td>
    <td>Hanya bisa menambah pegawai baru.</td>
  </tr>
  <tr valign="top">
    <td>*<strong>2.</strong></td>
    <td>Username dan Password hanya diketahui oleh admin dan Pegawai yang bersangkutan.</td>
  </tr>
  <tr>
    <td>*<strong>3.</strong></td>
    <td>Harap gunakan data yang Valid.</td>
  </tr>
  <tr align="right">
    <td><strong></strong></td>
    <td><a href="<?php echo base_url();?>index.php/c_admin/menu"><input type="button" name="button"  value="Kembali" /></a></td>
  </tr>
</table>
<br />
    </div>
  </div>
    
    
    <div class="cleaner">
    </div>
</div> <!-- end of templatemo_content -->
