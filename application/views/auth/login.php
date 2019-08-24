	<div id="login">
		<small class="text-center text-primary d-block mb-3">Silahkan login</small>
		<p class="text-center"><span class="badge badge-primary"><?=$this->session->flashdata("msg")?></span></p>
		<form action="<?=base_url("auth/login/cek")?>" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" name="email" id="exampleInputEmail1"
					aria-describedby="emailHelp" placeholder="Masukkan email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name="password" id="exampleInputPassword1"
					placeholder="Password">
			</div>
			<small id="emailHelp" class="form-text">Belum memiliki akun? <a href="<?= base_url('auth/register') ?>"
					id="link-regis">Klik
					disini</a></small>
			<button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">LOGIN</button>
		</form>
	</div>
