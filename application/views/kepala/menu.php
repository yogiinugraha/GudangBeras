<div id="nav">
	<ul>
    <li><a href="#"><img src="<?php echo base_url();?>assets/pic/home.png" width="30" height="25" style="float:left; margin-right:2px; margin-top:-3px;" /><span>Home</span></a></li>
    <li><a href="<?php echo base_url();?>index.php/c_login/logout"><img src="<?php echo base_url();?>assets/pic/logout.png" width="30" height="25" style="float:left; margin-right:2px; margin-top:-3px;" /><span>Logout</span></a></li>
    </ul>
</div>
<div id="menu">
<div class="judul">Akses Pengguna</div>
<div id="border">
	<div class="profil"><img src="<?php echo base_url();?>assets/pic/hadi.jpg" width="70" height="70" style="float:left; margin-right:3px;" />
    <div class="akses"><strong style="line-height:15px; font-size:16px;"><?php echo $this->session->userdata('akses');?></strong><br />
    <span style="font-size:14px;">Kepala Jujur</span></div>
	</div>
<div id="akor">
	<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/onebit_19.png" width="24" height="24" style="float:left; margin:1px 3px 0px 0px;"  />Beranda</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0" width="150">
          <tr>
            <td width="10"><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/home" onclick="ganti_judul('Home')" target="frame">Home</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/laporan" onclick="ganti_judul('Control Panel')" target="frame">Control Panel</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/pemesanan" onclick="ganti_judul('Konfirmasi Pemesanan')" target="frame">Konfirmasi</a>
            <?php if($notif <= 0){
				$style="style='display:none;'";
				}
				else{$style="";}?>
            <div class="notif" <?php echo $style;?>><?php echo $notif;?></div>
            </td>
          </tr>
        </table>
        </div>
	<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/n.png" width="24" height="30" style="float:left; margin:1px 3px 0px 0px;"  />Laporan</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/stok" onclick="ganti_judul('Laporan Stok Beras')" target="frame">Laporan Stok</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/keluar" onclick="ganti_judul('Laporan Penjualan')" target="frame">Laporan Penjualan</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/minta" onclick="ganti_judul('Laporan Pemesanan Barang')" target="frame">Laporan Pemesanan</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/produk" onclick="ganti_judul('Laporan Penjualan Beras Terlaris')" target="frame">Laporan Beras Terlaris</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kepala/sup" onclick="ganti_judul('Daftar Supplier')" target="frame">Laporan Supplier</a></td>
          </tr>
        </table>
        </div>
		<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/c.png" width="24" height="30" style="float:left; margin:1px 3px 0px 0px;"  />Grafik</div>
		<div class="akor_isi">
		  <table border="0" cellpadding="0" cellspacing="0">
		    <tr>
		      <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
		      <td><a href="<?php echo base_url();?>index.php/c_kepala/grafik" onclick="ganti_judul('Grafik')" target="frame">Kumpulan Grafik</a></td>
	        </tr>
	      </table>
		</div>

	</div>
</div>
</div>
