<html>
    <head>
        <title>Nyatapola Accessories</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>"/>
        <script src="<?php echo base_url('/assets/js/jquery-1.8.3.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.elevatezoom.js'); ?>"></script>        
        <script src="<?php echo base_url('/assets/js/jquery-2.1.1.min.js'); ?>"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('users/index'); ?>">Nyatapolo Accessories</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php echo form_open('users/users_search', ['class' => 'navbar-form navbar-left', 'role' => 'search']); ?>
                    <div class="form-group">
                        <?php echo form_input(['name' => 'search', 'class' => 'form-control', 'placeholder' => 'Search']); ?>
                    </div>
                    <?php echo form_submit(['name' => 'submit', 'class' => 'btn btn-default', 'value' => 'Submit']); ?>
                    <div class="form-group">
                        <?php echo form_error('search', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <?php echo form_close(); ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="<?php echo base_url('user_login'); ?>" class="dropdown-toggle" role="button" aria-expanded="false">Login</a>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>&nbsp;&nbsp;</div>
        <div>&nbsp;&nbsp;</div>
        <div>&nbsp;&nbsp;</div>



