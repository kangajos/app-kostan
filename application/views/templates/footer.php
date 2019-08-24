</div>
</main>
<!-- akhir main content -->

<!-- footer -->
<footer class="fixed-bottom">
	<div class="row align-items-center pt-2">
		<div class="col-4 justify-content-center d-flex">
			<a href="<?= base_url('home') ?>" class="d-flex justify-content-center">
				<i class="fas fa-home <?= $this->uri->segment(1) == 'home' ? 'text-primary' : '' ?>"></i>
				<p class="<?= $this->uri->segment(1) == 'home' ? 'text-primary' : '' ?>">Home</p>
			</a>
		</div>
		<div class="col-4 justify-content-center d-flex">
			<a href="<?= base_url('lists') ?>" class="d-flex justify-content-center">
				<i class="fas fa-list-ol <?= $this->uri->segment(1) == 'lists' ? 'text-primary' : '' ?>"></i>
				<p class="<?= $this->uri->segment(1) == 'lists' ? 'text-primary' : '' ?>">List</p>
			</a>
		</div>

		<?php if (!$this->session->userdata('status')): ?>
			<div class="col-4 justify-content-center d-flex">
				<a href="<?= base_url('auth/login') ?>" class="d-flex justify-content-center">
					<i class="fas fa-sign-in-alt <?= $this->uri->segment(1) == 'auth' ? 'text-primary' : '' ?>"></i>
					<p>Login</p>
				</a>
			</div>
		<?php else: ?>
			<div class="col-4 justify-content-center d-flex">
				<a href="<?= base_url('profile') ?>" class="d-flex justify-content-center">
					<i class="fas fa-user <?= $this->uri->segment(1) == 'profile' ? 'text-primary' : '' ?>"></i>
					<p class="<?= $this->uri->segment(1) == 'profile' ? 'text-primary' : '' ?>">Profile</p>
				</a>
			</div>
		<?php endif; ?>
	</div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>myassets/js/main.js"></script>
<script type="text/javascript">
    $('.edit').on('click', function () {
        var url = $(this).attr("data-urledit");
        // alert(url);
        $.ajax({
			url : url,
			method : 'get',
			dataType : 'html',
			success : function (html) {
				$(".tampil_edit").html(html);
            }
		})
    })

    $('.delete').on('click', function () {
        var url = $(this).attr("data-urldelete");
        // alert(url);
    })
</script>
</body>
</html>
