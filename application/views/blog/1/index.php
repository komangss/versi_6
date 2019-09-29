<!-- +++++ Post +++++ -->
<div id="white">
	<div class="container">
		<div class="row col-lg-8 col-lg-offset-2">
			<p><img src="<?= base_url('assets/img/user.png'); ?>" width="50px" height="50px">
				<strong>Antonio Komang Yudistira</strong>
			</p>
			<p>April 20, 2019</p>
			<h1>
				Suhu
			</h1>
			<p>
				<img class="img-responsive" src="<?= base_url('assets/img/bg-fisika.jpg'); ?>" alt="">
			</p>
			<p>
				Halo teman teman, jumpa lagi di seri belajar Fisika
				bersama saya admin anton.
			</p>
			<p>
				suhu adalah suatu besaran untuk menyatakan ukuran derajat panas
				atau dinginnya suatu benda.
				Sebagai gambaran tentang suhu adalah saat
				mandi menggunakan air hangat.
				Untuk mendapatkan air hangat tersebut
				kita mencampur air dingin dengan air panas.
				Ketika tangan kita menyentuh air yang dingin,
				maka kita mengatakan suhu air tersebut dingin.
				Ketika tangan kita menyentuh air yang
				panas maka kita katakan suhu air tersebut
				panas. Ukuran derajat panas dan dingin
				suatu benda tersebut dinyatakan dengan 
				besaran suhu.
			</p>
			<p>
				bagaimana? teman teman sudah mengerti?
				disini kami menyediakan fitur konversi
				suhu. silahkan cek langsung kebawah..
			</p><br>

			<p>
				TAGS: <a href="#">Science</a> - <a href="#">Suhu</a>
			</p>
			<hr>
			<p>
				<a href="blog.html"># Back</a>
			</p>

			<!-- temp-->
			<h2>konverter suhu :</h2><br><br>
			<div class="suhu">
				<table border="1">
					<tr>
						<th><button id="celcius" class="btn btn-primary">Celcius</button></th>
						<th><button id="fhn" class="btn btn-success">Fahrenheit</button></th>
						<th><button id="kvn" class="btn btn-danger">Kelvin</button></th>
					</tr>
					<tr>
						<td>
							<div id="showCelcius">
								<p>
									<label>Celsius</label><br>
									<input id="inputCelsius" type="number" placeholder="Celsius" oninput="temperatureConverter(this.value)" onchange="temperatureConverter(this.value)">
								</p>
								<p>Fahrenheit: <span id="outputFahrenheit"></span></p>
								<p>Kelvin : <span id="outputKelvin"></span></p>
							</div>
						</td>
						<td>
							<div id="showfhn">
								<p>
									<label>Fahrenheit</label><br>
									<input id="inputFahrenheit" type="number" placeholder="Fahrenheit" oninput="temperatureConverter2(this.value)" onchange="temperatureConverter2(this.value)">
								</p>
								<p>Celcius: <span id="outputCelcius"></span></p>
								<p>Kelvin : <span id="outputKelvin2"></span></p>
							</div>
						</td>
						<td>
							<div id="showkvn">
								<p>
									<label>Kelvin</label><br>
									<input id="inputKelvin" type="number" placeholder="Kelvin" oninput="temperatureConverter3(this.value)" onchange="temperatureConverter3(this.value)">
								</p>
								<p>Fahrenheit: <span id="outputFahrenheit2"></span></p>
								<p>Celcius: <span id="outputCelcius2"></span></p>
							</div>
						</td>
					</tr>
				</table>

			</div>
			<!-- temp end-->
		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /white -->
</div>
<!-- post -->


<hr>

<!-- container -->
<div class="container jumbotron">
	<h1>
		COMMENT BOX
	</h1>
	<!-- wrap -->

	<div id="wrap" class="row">
		<div class="col-md-5">
			<h3 class="heading">
				Comments and Responses
			</h3>
		</div>
		<div class="col-md-7">
		</div>
	</div>
	<p>
		Your email address will not be published. Required
		fields are marked *
	</p>
	<?= $this->session->flashdata('message'); ?>

	<!-- input komentar -->

	<?php if ($this->session->userdata('id_user')) {
		echo '
		<form action="blog1" method="post">
			<div class="form-group">
				<input type="hidden" name="iduser" value="' . $this->session->userdata('id_user') . '">
			</div>
			<div class="form-group">
				<input type="hidden" name="nama" value="' . $this->session->userdata('nama_user') . '">
			</div>
			<div class="form-group">
				<input type="hidden" name="tanggal" value="' . time() . '">
			</div>
			<div class="form-group">
				<label for="komentar">Komentar</label>
				<textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
		';
	}
	?>
	<br>
	<?php foreach ($komentar as $km) : ?>
		<div class="coment">
			<ul style="list-style: none;">
				<div class="col-lg-2">
					<img src="<?= base_url('assets/img/user.png'); ?>" width="40px" height="50px" class="imgclass">
					<li><strong><?= $km['nama'] ?></strong></li>
				</div>
				<div class="col-lg-10" style="margin-top: 20px;">
					<li><?= $km['isi_komen'] ?></li>
					<li><?= date('Y-m-d  H:i:s', $km['date_created']); ?></li>
				</div>
			</ul>
		</div>
	<?php endforeach; ?>

</div>