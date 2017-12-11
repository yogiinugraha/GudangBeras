    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<h2><?php echo $judul;?></h2>
      <form method="post" action="<?php echo base_url();?>index.php/c_supplier/tambah_sup">
<div class="grad"><table width="400" border="0" align="center">
        <tr>
          <td colspan="2" align="center" width="40"><div class="head">Tambah Supplier</div></td>
        </tr> 
        <tr>
          <td>Nama Supplier
            <div style="float:right;">:</div></td>
          <td><strong><input name="nama" type="text" placeholder="Nama Supplier.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Alamat<div style="float:right;">:</div></td>
          <td><strong><input name="alamat" type="text" placeholder="Alamat Supllier.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Nomor Telphone
          <div style="float:right;">:</div></td>
          <td><strong><input name="tlp" type="text" placeholder="Nomor Telphone.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td>Email
          <div style="float:right;">:</div></td>
          <td><strong><input name="email" type="text" placeholder="Email Supplier.." required> <font color="red">*</font></strong></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><p>Masukan Jenis Barang Yang Di Suplai :</p>
            <select name="name">
                <option>--Jenis Barang--</option>
                <?php foreach($data as $row){ echo "<option value='$row->kd_jenis'>(<strong>$row->kd_jenis</strong>) $row->nama_jenis</option>";}?>
            </select>
          </td>
        </tr>
        </table>
</div>
<div class="grad2"><table><tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_supplier/customer"><input name="" type="button" value="Kembali" style="color:green;"></a></td>
          <td>
            <input name="tambah" type="submit" value="Tambah" class="ton"></td>
        </tr>
      </table></div>
</form>
