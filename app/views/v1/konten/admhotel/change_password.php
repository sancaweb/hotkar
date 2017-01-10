<?php
	$id_user=$this->session->getValue('id_user');
	if($this->user_back->get_user_byID($id_user)){
		$user_back=$this->user_back->get_user_byID($id_user);
		$username=$user_back->username;
		$password=$user_back->password;
		$nama_pengguna=$user_back->nama_pengguna;
		$email=$user_back->email;
	}else{
		$username='Username Tidak Ditemukan';
		$nama_pengguna='Nama Pengguna Tidak Ditemukan';
		$email='Email Tidak Ditemukan';
	}
?>
<div class="tab-pane active" id="change_password">
	<div class="padding40">

		<span class="dark size18">Change password</span>
		<div class="line4"></div>
		<div id="alertnya"></div>
		<form id="form_user" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="#">
		<input name="id_user" type="hidden" class="form-control input-lg" value="<?php echo $id_user;?>" readonly>
		Username<br/>		
		<input name="username" type="text" class="form-control input-lg " value="<?php echo $username;?>" readonly>
		<br/>
		Nama Pengguna<br/>
		<input name="nama_pengguna" type="text" class="form-control input-lg " value="<?php echo $nama_pengguna; ?>">
		<br/>
		Email<br/>
		<input name="email" type="email" class="form-control input-lg" value="<?php echo $email;?>" required>
		<br/>
		Old Password<br/>
		<div class="old_pass " id="old_pass" >
		<input name="old_password" type="password" class="form-control input-lg" placeholder="Masukan password lama anda" required>
		</div>
		<br/>
		New Password<br/>
		<input name="new_password" id="new_password" type="password" class="form-control input-lg" placeholder="Masukan password baru anda" >
		<br/>
		Confirm Password<br/>
		<input name="confirm_password" id="confirm_password" type="password" class="form-control input-lg" placeholder="Ketik ulang password" >
		<br/>
		<p id="loader"><img src="<?php echo $this->uri->baseUri;?>style/images/ajax-loader.gif"></p><br/>
		<button type="submit" class="btn-search5">Save changes</button>
		</form>
		<div class="line4"></div>		
	</div>
	</div>