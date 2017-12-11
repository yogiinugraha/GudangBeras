<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Akses Login Aplikasi</title>
    <link href="<?php echo base_url();?>assets/style/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/images/folder.png" rel="shortcut icon" />

</head>
<body>
<div id="header">
  <div class="head">
  	<img src="<?php echo base_url();?>assets/pic/header.jpg" width="350" height="100" />
  </div>
  <div class="sub_head">
    <h2>Aplikasi Inverntori Beras</h2>
	  <center><strong><em>Penjualan Beras - Stok Beras - Pengelolaan Data Beras</em></strong></center>
  </div>
</div><br />

<br />

<!-- HEADER HUNGKUL -->
<div id="nav">
	<ul>
  </ul>
</div>
<!-- NAVIGASI HUNGKUL -->

  <form action="<?php echo base_url();?>index.php/c_login/login" method="post"><div id="login">
<table width="100%" height="100%">
<tr valign="top">
<td align="center">
<table  border="0" style="margin-top:50px;">
  <tr>
    <td colspan="3" align="center"><h2>Silahkan Login</h2></td>
    </tr>
  <tr>
    <td rowspan="4"><img src="<?php echo base_url();?>assets/images/loginn.png" width="100" height="100" /></td>
    <td>Username</td>
    <td>:
      <input name="username" type="text" class="input" placeholder="Username Anda" required="required"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:
<input name="password" type="password" class="input" placeholder=" * * * * *" required="required"/></td>
  </tr>
  <tr>
    <td><input name="but" type="reset" value="Reset" id="but2" class="input" style="margin-right:10px;" /></td>
    <td><input name="but2" type="submit" value="Login" id="but" class="log"/></td>
  </tr>
</table>
</td>
</tr>
</table>
</div>
</form><div id="bawah">
Copyright &copy; Yogi Nugraha || Bang Beur Corp || Inventori Beras || Informatika 2017
</div>
</body>
</html>
