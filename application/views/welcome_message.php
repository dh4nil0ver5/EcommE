<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Web</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/home.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/homepage.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/karyawan.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        body{
            background-image: url("<?php echo base_url(); ?>img/background.jpg");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="<?php echo base_url(); ?>img/logo.png"/>
    </div>
    <div class="content">
        <div class="form-all">
            <div class="form-cont-user">
                <input class="in-data" />
                <div class="in-tag none">
                    <center>
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </center>
                </div>
            </div>
            <div class="none">
            <div class="form-cont-pass none">
                    <input class="pas" />
                    <div class="in-tag-pas none">
                        <center>
                            <i class="fa fa-sign-in"></i>
                        </center>
                    </div>
            </div>
            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url();?>js/js.js"></script>
</body>
</html>