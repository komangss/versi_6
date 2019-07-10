<div class="container pt">
    <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3 centered">
            <h1>Halaman Sign Up</h1>
            <?php if (isset($error)) : ?>
                <p style="color: red; font-style: italic;">username / password salah</p>
            <?php endif; ?>
            <!-- login start -->
            <form action="" method="post">
                <ul>
                    <li style="list-style-type: none;">
                        <label for="usernameNew"></label>Username :</label>
                        <input type="text" name="usernameNew" id="usernameNew" required>
                    </li>
                    <li style="list-style-type: none;">
                        <label for="passwordNew">Password :</label>
                        <input type="password" name="passwordNew" id="passwordNew" required>
                    </li>
                    <li style="list-style-type: none;">
                        <label for="passwordNew2">Ulangi Passwordnya :</label>
                        <input type="password" name="passwordNew2" id="passwordNew2" required>
                    </li>

                    <br>
                    <li>
                        <button type="submit" name="signup" class="btn btn-success ">Sign UP</button>
                    </li>
                    <!-- <button onclick="document.getElementById('id01').style.display='block';
												document.getElementById('navbar').style.display='none';" style="width:auto;" class="btn btn-success " >Sign Up</button> -->
                    <br><a href="<?= base_url('login/new'); ?>">Dont have Account?</a>
                </ul>
            </form>


        </div> <!-- collg6 centered-->
    </div><!-- /row -->
</div><!-- /container -->
