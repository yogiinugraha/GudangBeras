    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
  <?php 
  			$query="SELECT * FROM t_permintaan";
			$sql=mysqli_query($query);
			$jum=mysqli_num_rows($sql);
			if($jum == 0)
			{
				$no=$jum+1;}
			else
			{
				$query="SELECT no_permintaan FROM t_permintaan ORDER BY no_permintaan DESC LIMIT 1";
				$sql=mysqli_query($query);
				$hasil=mysqli_fetch_array($sql);
				$no=$hasil[0]+1;
			}
  ?>
    <table width="200" border="0" style="float:left; margin-right:30px;">
      <tr align="center">
        <th><div class="grad">Foto Barang</div></th>
      </tr>
      <tr>
        <td align="center"><img src="<?php echo base_url();?>assets/images/<?php echo $barang->foto;?>" class="cover"/></td>
      </tr>
    </table>
    <form method="post" action="<?php echo base_url();?>index.php/c_pemesanan/formulir">
      <table width="400" border="0" class="tabel1">
        <tr>
          <th colspan="2" align="center" width="40"><div class="grad">FORMULIR PEMESANAN</div></th>
        </tr>
        <tr>
          <td>No Permintaan
            <div style="float:right;">:</div></td>
          <td><input name="no" type="hidden" value="<?php echo $no;?>" readonly="readonly" />
            <strong><?php echo $no;?></strong></td>
        </tr>
        <tr>
          <td>Nama Beras
            <div style="float:right;">:</div></td>
          <td><input name="kd_barang" type="hidden" value="<?php echo $barang->kd_barang;?>" readonly="readonly" />
            <strong><?php echo "(".$barang->kd_barang.") ".$barang->nama_barang;?></strong></td>
        </tr>
        <tr>
          <td>Nama Penyuplai
            <div style="float:right;">:</div></td>
          <td><strong><?php echo "(".$barang->kd_supplier.") ".$barang->nama_supplier;?>
            <input name="kd_supplier" type="hidden" value="<?php echo $barang->kd_supplier;?>" readonly="readonly" />
          </strong></td>
        </tr>
        <tr>
          <td>Sisa Stok
          <div style="float:right;">:</div></td>
          <td><strong><?php echo $barang->stok." Karung";?>
              <input name="stok" type="hidden" value="<?php echo $barang->stok;?>" readonly="readonly" />
          </strong></td>
        </tr>
        <tr valign="top">
          <td>Jumlah Ambil
            <div style="float:right;">:</div></td>
          <td><input name="jml" type="text" placeholder="Nomilnal..." required="required" />
            <strong>Karung</strong></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Harga</h3></td>
        </tr>
        <tr valign="top">
          <td colspan="2" align="center"><h3>Rp <?php echo $barang->harga;?>; / Karung<strong>
            <input name="harga" type="hidden" value="<?php echo $barang->harga;?>" readonly="readonly" />
          </strong></h3></td>
        </tr>
        <tr>
          <td align="right"><a href="<?php echo base_url();?>index.php/c_pemesanan/index">
            <input name="input" type="button" value="Kembali" class="kembali" />
          </a></td>
          <td><input name="submit" type="submit" value="kirim" class="simpan" /></td>
        </tr>
      </table>
    </form>
    <br />
    <br />
