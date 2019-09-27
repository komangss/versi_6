<div class="container pt">
    <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3 centered">
            <h1>Halaman Sign Up</h1>
            <!-- login start -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">nama :</label>
                    <input placeholder="Input Your nama here..." type="text" name="nama" id="nama" class="form-control">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="email">email :</label>
                    <input placeholder="Input Your email here..." type="text" name="email" id="email" class="form-control">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password">password :</label>
                    <input placeholder="Input Your password here..." type="password" name="password" id="password" class="form-control">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password2">Repeat Password</label>
                    <input placeholder="Repeat Your password here..." type="password" name="password2" id="password2" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">SUBMIT!</button>
            </form>

            <a href="<?= base_url("auth"); ?>" class="pt-5">Already have account? Login </a>


        </div> <!-- collg6 centered-->
    </div><!-- /row -->
</div><!-- /container -->