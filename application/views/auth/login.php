<!-- +++++ Contact Section +++++ -->

<div class="container pt">
	<div class="row mt">
		<div class="col-lg-6 col-lg-offset-3 centered" style="padding: 50px 0;">
			<h1>Halaman Login</h1>
			<?= $this->session->flashdata('message'); ?>

			<form action="" method="post">
				<div class="form-group">
					<label for="email">email :</label>
					<input placeholder="Input Your email here..." type="text" name="email" id="username" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">password :</label>
					<input placeholder="Input Your password here..." type="password" name="password" id="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="input_captcha">captcha</label>
					<?= $captcha['image']; ?>
					<input placeholder="Tulis teks pada gambar diatas" type="text" name="input_captcha" id="input_captcha" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">SUBMIT!</button>
			</form>

			<br>
			<a href="<?= base_url("auth/signup"); ?>" class="pt-5">dont have account? sign up </a>


		</div> <!-- collg6 centered-->
	</div><!-- /row -->
</div><!-- /container -->