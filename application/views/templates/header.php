<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title><?= $title; ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/css/main.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/js/hover.zoom.js"></script>
    <script src="<?= base_url(); ?>assets/js/hover.zoom.conf.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>">Anton</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="work.html">Work</a></li>
                    <li><a href="<?= base_url('about'); ?>">About</a></li>
                    <li><a href="<?= base_url('blog1'); ?>">Blog</a></li>
                    <li>
                        <?php if ($this->session->userdata('login') == true) {
                            echo "<a href='" . base_url('login/logout') . "'>Logout</a>";
                        } else {
                            echo "<a href='" . base_url('login') . "'>login</a>";
                        } ?>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>