<div class="accordion" id="accordionExample">
	<div class="card">
		<?php if ($this->session->flashdata("msg")): ?>
		<p class="text-center"><span class="badge badge-danger"><?=$this->session->flashdata("msg")?></span></p>
		<?php endif;?>
		<?php foreach ($user as $key => $value): ?>
			<div class="card-header" id="headingOne<?= $key ?>">
				<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse"
							data-target="#collapseOne<?= $key ?>"
							aria-expanded="true" aria-controls="collapseOne<?= $key ?>">
						<?= $value->nama ?>
					</button>
				</h2>
			</div>

			<div id="collapseOne<?= $key ?>" class="collapse <?= $key == 0 ? 'show' : '' ?>"
				 aria-labelledby="headingOne<?= $key ?>" data-parent="#accordionExample">
				<div class="card-body">
					<div class="row">
						<div class="col-4">
							<p>Nama</p>
						</div>
						<div class="col-8">
							<p>: <?= $value->nama ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<p>Email</p>
						</div>
						<div class="col-8">
							<p style="word-wrap: normal;">: <?= $value->username ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<p>Tanggal gabung</p>
						</div>
						<div class="col-8">
							<p>: <?= $value->created_at ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<p>Status Akun</p>
						</div>
						<div class="col-8">
							<p>: <?= $value->is_active == 1 ? "<span class='badge badge-success'>Active</span>" : "<span class='badge badge-danger'>Non Active</span>"?></p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<?php if ($value->level != 1): ?>
								<?php if ($value->is_active == 1): ?>
									<a class="btn btn-danger w-100 rounded-pill"
									   href="<?= base_url("user/block_user/$value->user_id") ?>">BLOCK</a>
								<?php else: ?>
									<a class="btn btn-success w-100 rounded-pill"
									   href="<?= base_url("user/un_block_user/$value->user_id") ?>">UN BLOCK</a>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
