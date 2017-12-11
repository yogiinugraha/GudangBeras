    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<form method="post" action="<?php echo base_url();?>index.php/c_supplier/tambah"><div class="grad"><h2><?php echo $judul;?></h2>
      
<table width="400" border="0">
        <tr>
          <td>Nomor KTP
            <div style="float:right;">:</div></td>
          <td><strong><input name="ktp" type="text" placeholder="Nomor KTP.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Nama Pelanggan
            <div style="float:right;">:</div></td>
          <td><strong><input name="nama" type="text" placeholder="Nama Pelanggan.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Alamat<div style="float:right;">:</div></td>
          <td><strong><input name="alamat" type="text" placeholder="Alamat Pelanggan.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Nomor Telphone
          <div style="float:right;">:</div></td>
          <td><strong><input name="tlp" type="text" placeholder="Nomor Telphone.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Email
          <div style="float:right;">:</div></td>
          <td><strong><input name="email" type="text" placeholder="Email Pelanggan.." required> <font color="red">*</font></strong></td>
        </tr>
      </table>
</div>
<div class="grad2">        
<table>
		<tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_supplier/customer"><input class="kembali" type="button" value="Kembali" style="color:green;"></a></td>
          <td>
            <input name="tambah" type="submit" value="Tambah" class="tambah"></td>
        </tr>
      </table>
</div>
</form>