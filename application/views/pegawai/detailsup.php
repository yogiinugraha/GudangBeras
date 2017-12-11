    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<div class="grad"><h2><?php echo $judul;?></h2>
      <table width="400" border="0">
        <tr>
          <td>Kode Penyuplai<div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->kd_supplier;?></strong></td>
        </tr> 
        <tr>
          <td>Nama Supplier<div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->nama_supplier;?></strong></td>
        </tr>
        <tr>
          <td>Alamat<div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->alamat_supplier;?></strong></td>
        </tr>
        <tr>
          <td>Nomor Telphone
          <div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->tlp;?></strong></td>
        </tr>
        <tr>
          <td>Email
          <div style="float:right;">:</div></td>
          <td><strong><?php echo $pelanggan->email;?></strong></td>
        </tr>
        <tr>
          <td>Jenis Barang suplai<div style="float:right;">:</div></td>
          <td><strong>(<?php echo $pelanggan->kd_jenis;?>) <?php echo $pelanggan->nama_jenis;?></strong></td>
        </tr></table>
</div>   <div class="grad2" align="center"><a href="<?php echo base_url();?>index.php/c_supplier/"><input class="kembali" type="button" value="Kembali" style="color:green;"></a>
</div>
