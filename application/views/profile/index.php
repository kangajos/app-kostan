<div class="profile">
	<h6 class="text-center">Selemat datang, <?= $this->session->userdata('nama') ?> :)</h6>
	<img src="<?= base_url() ?>myassets/img/img1.jpg" class="rounded-circle mx-auto d-block mb-2" alt="img-profile">
	<p class="mb-0 text-center">Nama : <?= $this->session->userdata('nama') ?></p>
	<p class="text-center">Email &nbsp;: <?= $this->session->userdata('email') ?></p>
	<a href="<?= base_url('post_iklan/index/active') ?>" class="btn btn-primary w-100 rounded-pill mb-1">DATA KOST</a>
	<?php if ($this->session->userdata("level") == 1): ?>
		<a href="<?= base_url('user') ?>" class="btn btn-primary w-100 rounded-pill mb-3">LIHAT USER</a>
	<?php endif; ?>
	<a href="<?= base_url("auth/login/out") ?>" class="btn btn-danger w-100 rounded-pill">LOGOUT</a>
</div>
