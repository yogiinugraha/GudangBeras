    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<div class="grad"> 
<h2>Pesan Untuk Admin</h2>
    	    <form action="<?php echo base_url();?>index.php/c_home/p_pesan" method="post">
<table width="0" border="0">
    	      <tr>
    	        <td>Username</td>
    	        <td>&nbsp;</td>
    	        <td colspan="2">:
   	            <input type="text" name="username" placeholder="Username anda.." required /></td>
   	          </tr>
    	      <tr>
    	        <td>Password</td>
    	        <td>&nbsp;</td>
    	        <td colspan="2">:
   	            <input type="password" name="password" placeholder="* * * * * *" required /></td>
   	          </tr>
    	      <tr>
    	        <td>Perihal</td>
    	        <td>&nbsp;</td>
    	        <td colspan="2">: 
   	            <input type="text" name="perihal" size="50" placeholder="Judul pesan anda..." required /></td>
   	          </tr>
    	      <tr valign="top">
    	        <td>Isi Pesan</td>
    	        <td>&nbsp;</td>
    	        <td colspan="2">            
    	          <div style="float:left; margin-right:3px;">:</div>
    	          <textarea name="isi"  cols="45" rows="5" placeholder="Tulis pesan anda disini..." required ></textarea>  	          </td>
   	          </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td>&nbsp;</td>
    	        <td>&nbsp;</td>
    	        <td>&nbsp;</td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
    	        <td>&nbsp;</td>
    	        <td align="right"><input name="input2" type="reset" value="Reset"/></td>
    	        <td><input name="input" type="submit" value="Kirim" class="simpan" /></td>
  	        </tr>
  	      </table>
</form></div>
<div class="grad2">
    	    * Pesan Ini akan dikirimkan langsung kepada admin.<br />
    	    * Harap gunakan kata yang baik dan sopan
</div>