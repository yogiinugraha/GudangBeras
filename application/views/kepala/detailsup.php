   <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
        <h2><?php echo $judul;?></h2></div>

        <table width="400" border="0" align="center" class="tabel1">
          <tr>
            <th colspan="2" align="center" width="40"><div class="grad">Detail Penyuplai</div></th>
          </tr>
          <tr>
            <td>Kode Penyuplai
              <div style="float:right;">:</div></td>
            <td><strong><?php echo $pelanggan->kd_supplier;?></strong></td>
          </tr>
          <tr>
            <td>Nama Supplier
              <div style="float:right;">:</div></td>
            <td><strong><?php echo $pelanggan->nama_supplier;?></strong></td>
          </tr>
          <tr>
            <td>Alamat
              <div style="float:right;">:</div></td>
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
            <td>Jenis Barang suplai
              <div style="float:right;">:</div></td>
            <td><strong>(<?php echo $pelanggan->kd_jenis;?>) <?php echo $pelanggan->nama_jenis;?></strong></td>
          </tr>
        </table>
        <br /><center>
<a href="<?php echo base_url();?>index.php/c_kepala/sup">
          <input name="input" type="button" value="Kembali" style="color:green;" class="kembali" />
        </a>

</center>