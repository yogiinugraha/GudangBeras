    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<div class="grad"><h2><?php echo $judul;?></h2>
      <form method="post" action="<?php echo base_url();?>index.php/c_supplier/ubah">
<table width="400" border="0">
        <tr>
          <td>Kode Penyuplai<div style="float:right;">:</div></td>
          <td><strong><input name="kd" type="text" value="<?php echo $pelanggan->kd_supplier;?>" readonly></strong></td>
        </tr> 
        <tr>
          <td>Nama Supplier<div style="float:right;">:</div></td>
          <td><strong><input name="nama" type="text" value="<?php echo $pelanggan->nama_supplier;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Alamat<div style="float:right;">:</div></td>
          <td><strong><input name="alamat" type="text" value="<?php echo $pelanggan->alamat_supplier;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Nomor Telphone
          <div style="float:right;">:</div></td>
          <td><strong><input name="tlp" type="text" value="<?php echo $pelanggan->tlp;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Email
          <div style="float:right;">:</div></td>
          <td><strong><input name="email" type="text" value="<?php echo $pelanggan->email;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Jenis Barang suplai<div style="float:right;">:</div></td>
          <td><strong>
          <select name="jenis">
          		<option value="<?php echo $pelanggan->kd_jenis;?>"><?php echo $pelanggan->nama_jenis;?></option>
                <?php foreach($sup as $row){?>
                <option value="<?php echo $row->kd_jenis;?>"><?php echo "($row->kd_jenis) ".$row->nama_jenis;?></option>
                <?php }?>
          </select> <font color="red">*</font>
          </strong></td>
        </tr>
      </table>
</div>
<div class="grad2">        
<table><tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_supplier/">
          <input class="kembali" type="button" value="Kembali" style="color:green;"></a></td>
          <td>
            <input name="ubah" type="submit" value="Ubah" class="edit"></td>
        </tr>
      </table>
</div>
</form>