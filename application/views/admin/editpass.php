    <div class="in">
      <div style=" border-bottom:#3ba2ff double 5px; margin-bottom:5px;">
        <h2><?php echo $judul;?></h2></div>
  <div class="dalam">
      <div class="tab"><strong>EDIT PASSWORD</strong></div>
      
  <center>
  <form action="<?php echo base_url();?>index.php/c_admin/editpass" method="post" enctype="multipart/form-data">
    <table border="0">
  <tr align="center">
    <td colspan="3"><h2>Ubah Password User</h2></td>
    </tr>
  <tr>
    <td>Username</td>
    <td>: 
      <input name="username" placeholder="username pegawai.." type="text" required="required" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password Lama</td>
    <td>:
      <input name="password1" placeholder="* * * * *" type="password" id="pass1" required="required" /></td>
    <td rowspan="2">
    <div id="tidak" style=" border:#F00 solid 1px; padding:5px; display:none;"><font size="-1" color="red">*Password Tidak Sesuai</font></div>
    <div id="ya" style=" border:#0F0 solid 1px; padding:5px; display:none;"><font size="-1" color="green">*Password Sesuai</font></div>
    </td>
  </tr>
  <tr>
    <td>Ketik Ulang Password</td>
    <td>:
      <input name="password2" placeholder="* * * * *" type="password" id="pass2" onkeyup="cek()" required="required" /></td>
    </tr>
  <tr>
    <td>Password Baru</td>
    <td>:
      <input name="password3" placeholder="* * * * *" type="password" id="pass3" required="required" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><input name="reset" type="reset" value="Reset" /></td>
    <td><input name="submit" type="submit" value="Kirim" class="ton" /></td>
    <td>&nbsp;</td>
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
