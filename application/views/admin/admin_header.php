<html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>"/>
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
                    <a class="navbar-brand" href="<?php echo base_url('admin/index'); ?>">Admin Panel</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li ><a href="<?php echo base_url('users'); ?>">Home Page <span class="sr-only">(current)</span></a></li>
                        <li ><a href="<?php echo base_url('admin/add_products'); ?>">Add Product <span class="sr-only">(current)</span></a></li>
                       <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Users
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url('add_users/insert_users'); ?>">Add User</a></li>
                                <li class="divider"></li>
                                <li><a href="#">View Users</a></li>
                            </ul>
                        </li>

                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php
                                if ($this->session->userdata('username')) {
                                    echo 'Welcome, '.$this->session->userdata('username'); 
                                }
                                ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('user_login/logout'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>&nbsp;&nbsp;</div>
        <div>&nbsp;&nbsp;</div>
        <div>&nbsp;&nbsp;</div>


