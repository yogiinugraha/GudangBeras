<div id="nav">
	<ul>
    <li><a href="#"><img src="<?php echo base_url();?>assets/pic/home.png" width="30" height="25" style="float:left; margin-right:2px; margin-top:-3px;" /><span>Home</span></a></li>
    <li><a href="<?php echo base_url();?>index.php/c_login/logout"><img src="<?php echo base_url();?>assets/pic/logout.png" width="30" height="25" style="float:left; margin-right:2px; margin-top:-3px;" /><span>Logout</span></a></li>
    </ul>
</div>
<div id="menu">
<div class="judul">Akses Pengguna</div>
<div id="border">
	<div class="profil"><img src="<?php echo base_url();?>assets/pic/kevri.jpg" width="70" height="70" style="float:left; margin-right:3px;" />
    <div class="akses"><strong style="line-height:15px; font-size:16px;"><?php echo $this->session->userdata('akses');?></strong><br />
    <span style="font-size:14px;">Hadi Mulyadi</span></div>
	</div>
<div id="akor">
	<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/onebit_19.png" width="24" height="24" style="float:left; margin:1px 3px 0px 0px;"  />Beranda</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_home/home" onclick="ganti_judul('Home')" target="frame">Home</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_home/pesan" onclick="ganti_judul('Pesan')" target="frame">Pesan</a></td>
          </tr>
          </tr>
          <?php if ($cek == 'kosong'){
			  $diplay=' style="display:none;"';
			  }
			  elseif($cek == 'ada'){$diplay="";}?>
          <tr <?php echo $diplay;?>>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_home/stok" onclick="ganti_judul('Home')">Cek Stok</a></td>
          </tr>
        </table>
        </div>
	<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/barang.png" width="24" height="24" style="float:left; margin:1px 3px 0px 0px;"  />Barang &amp; Penjualan</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_produk/index" onclick="ganti_judul('Penjualan')" target="frame">Beli Beras</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_produk/beli_banyak" onclick="ganti_judul('Penjualan')" target="frame">Beli Banyak</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_produk/option" onclick="ganti_judul('Option Barang')" target="frame">option</a></td>
          </tr>
        </table>
        </div>
	<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/chat.png" width="24" height="24" style="float:left; margin:1px 3px 0px 0px;"  />Pesanan Pelanggan</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_produk/pemesanan_customer" onclick="ganti_judul('Tambah Pesanan')" target="frame">Tambah Pesanan</a></td>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_produk/konfirmasi_pesanan" onclick="ganti_judul('Konfirmasi Pesanan')" target="frame">Konfirmasi Pesanan</a></td>
          </tr>
        </table>
        </div>
		<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/stok.png" width="24" height="24" style="float:left; margin:1px 3px 0px 0px;"  />Stok &amp; Pemesanan</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_pemesanan/index" onclick="ganti_judul('Pemesanan Barang')" target="frame">Pemesanan</a></td>
          </tr><tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_transaksi/supplier" onclick="ganti_judul('Konfirmasi Data Pesanan')" target="frame">Konfirmasi Barang</a></td>
          </tr>
        </table>
        </div>
		<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/icon3.png" width="25" height="30" style="float:left; margin:1px 3px 0px 0px;"  />Riwayat Transaksi</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_transaksi/customer" onclick="ganti_judul('Riwayat Penjualan Barang')" target="frame">Data Penjualan</a></td>
          </tr><tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_supplier/terima" onclick="ganti_judul('Konfirmasi Data Pesanan')" target="frame">Data Pemesanan</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
           <td><a href="<?php echo base_url();?>index.php/c_produk/data_pesanan" onclick="ganti_judul('Daftar Pesanan')" target="frame">Data Pesanan</a></td>
          </tr>

        </table>
        </div>
      		<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/sup.png" width="24" height="24" style="float:left; margin:1px 3px 0px 0px;"  />Mitra Kerja</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_supplier/customer" onclick="ganti_judul('Daftar Pelanggan')" target="frame">Pelanggan</a></td>
          </tr><tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_supplier/index" onclick="ganti_judul('Daftar Supplier')" target="frame">Supplier</a></td>
          </tr>
        </table>
        </div>		<div class="akor_judul"><img src="<?php echo base_url();?>assets/pic/toa.png" width="24" height="24" style="float:left; margin:1px 3px 0px 0px;"  />About Us</div>
		<div class="akor_isi">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kebijakan/index/garansi" onclick="ganti_judul('Ketentuan dan Kebijakan')" target="frame">Garansi</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kebijakan/index/pelanggan" onclick="ganti_judul('Ketentuan dan Kebijakan')" target="frame">Pelanggan</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kebijakan/index/penjualan" onclick="ganti_judul('Ketentuan dan Kebijakan')" target="frame">Penjualan</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url();?>assets/pic/pb_icon_new.png" width="20" height="20" style="float:left; margin:3px 3px 0px 0px;" /></td>
            <td><a href="<?php echo base_url();?>index.php/c_kebijakan/index/pemesanan" onclick="ganti_judul('Ketentuan dan Kebijakan')" target="frame">Pemesanan</a></td>
          </tr>
        </table>
        </div>

	</div>
</div>
</div>
