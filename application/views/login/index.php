
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
											<button type="submit" name="login" class="btn btn-success ">Login</button>
											<button onclick="document.getElementById('id01').style.display='block';
												document.getElementById('navbar').style.display='none';" style="width:auto;" class="btn btn-success " >Sign Up</button>
										</ul>
									</form>	
								
				<!-- sign up start -->		
				<div id="id01" class="modal">
						<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
						<form class="modal-content" action="" method="post">
										<h1>Sign Up</h1>
										<p>Please fill in this form to create an account.</p>
										<hr>
										<label for="username"><b>Username</b></label>
											<input type="text" placeholder="Enter Username" name="username" required>

											<label for="psw"><b>Password</b></label>
											<input type="password" placeholder="Enter Password" name="password" required>

											<label for="psw-repeat"><b>Repeat Password</b></label>
											<input type="password" placeholder="Repeat Password" name="password2" required>
											
										<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
		
										<div class="clearfix">
												<button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-success ">Cancel</button>
												<button type="submit" class="btn btn-success " name ="register" >Sign Up</button>
											</div>
									</div>
							</form>
						</div><!--modal-->
				</div> <!-- collg6 centered-->
		</div><!-- /row -->
	</div><!-- /container -->
	
	