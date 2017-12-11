    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
    <form action="<?php echo base_url();?>index.php/c_produk/optionedit/<?php echo $barang->kd_barang;?>" method="post" enctype="multipart/form-data">
<div class="grad">       
<h2><?php echo $judul; ?></h2>    
      
<table width="400" border="0">
        <tr>
          <td>Kode Barang
            <div style="float:right;">:</div></td>
          <td><strong><input name="kd" type="text" value="<?php echo $barang->kd_barang;?>" readonly></strong></td>
        </tr> 
        <tr>
          <td>Nama Barang
            <div style="float:right;">:</div></td>
          <td><strong><input name="nama" type="text" value="<?php echo $barang->nama_barang;?>" required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Jenis Barang suplai<div style="float:right;">:</div></td>
          <td><strong>
          <select name="jenis">
          		<option><?php echo $barang->kd_jenis;?></option>
                <?php foreach($data as $row){?>
                <option value="<?php echo $row->kd_jenis;?>"><?php echo "($row->kd_jenis) ".$row->nama_jenis;?></option>
                <?php }?>
          </select> <font color="red">*</font>
          </strong></td>
        </tr>
        <tr>
          <td>Foto
          <div style="float:right;">:</div></td>
          <td><strong>
            <input type="file" name="foto" value="<?php echo $barang->kd_jenis;?>" />
          </td>
        </tr>
      </table>

</div>
<div class="grad2"><table align="center">
<tr>
      <td align="right"><a href="<?php echo base_url();?>index.php/c_produk/option"><input class="kembali" type="button" value="Kembali" style="color:green;"></a></td>
          <td>
            <input name="submit" type="submit" value="Ubah" class="simpan"></td>
        </tr></table></div></form>