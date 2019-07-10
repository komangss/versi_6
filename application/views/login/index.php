
	<!-- +++++ Contact Section +++++ -->
	
	<div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h1>Halaman Login</h1>
					<?php if( isset($error) ) : ?>
						<p style="color: red; font-style: italic;">username / password salah</p>
					<?php endif; ?>
						<!-- login start -->
								<form action="" method="post">
									<ul>
										<li style="list-style-type: none;">
											<label for="usernameLogin" ></label>Username :</label>
											<input type="text" name="usernameLogin" id="usernameLogin" required>
										</li>
										<li style="list-style-type: none;">
											<label for="passwordLogin">Password :</label>
											<input type="password" name="passwordLogin" id="passwordLogin" required>
											</li>
												<input type="checkbox" name="remember" id="remember" style="margin-bottom:15px">
												<label for="remember">Remember me</label>
											<br>
											<li>
                                            <button type="submit" name="login" class="btn btn-success ">Login</button>
                                            </li>
                                            <!-- <button onclick="document.getElementById('id01').style.display='block';
												document.getElementById('navbar').style.display='none';" style="width:auto;" class="btn btn-success " >Sign Up</button> -->
                                        <br><a href="<?= base_url('login/new'); ?>">Dont have Account?</a>
                                            </ul>
									</form>	
								
		
				</div> <!-- collg6 centered-->
		</div><!-- /row -->
	</div><!-- /container -->
	
	