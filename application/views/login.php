<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
<style>
        body{
            /* background: linear-gradient(to right, #000046, #1cb5e0);   */
            overflow:hidden;
        }

        #but{
            align:center;
            /* margin-left:SS0%; */
        }
        .contain{
            margin:10% auto;
            width: 45%;
            background-color:white;
            padding: 5%;
            margin-top:6%; 
            box-shadow: 1px 1px 1px 1px grey;
        }
        .contain form input{
            width:100%;
            margin-bottom:5%;
        }

        .contain form button{
            margin-bottom:2%;
            width:100%;
        }
        .but1{
            margin-right:5px;
            margin-left:40%;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="row">
        <img src="<?php echo base_url('assets/gambarDesain/anisa.jpg')?>" alt="" style="width:50%;">
        <div class="contain text-center">
            <h2><font face="Courier New"><b>Login</b></font></h2>
            <br>
            
            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-danger"> <?= $this->session->flashdata('message') ?> </div>
            <?php } ?>
            <form method="post" action="<?php echo site_url('wel/auth')?>">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                
                <button type="submit" class="btn btn-info">Login</button>
            </form>
                <div class="">
                    <input type="checkbox" class="form-checkbox"> Show password |
                    <a href="" data-toggle="modal" data-target="#lupapassword">Lupa Password?</a>
                </div>
                <div class="row" id="but" style="margin-top:10px">
                    <div class="but1"><a href="<?php echo base_url()."wel/register" ?>"><button type="button" class="btn btn-success" style="width:100%">Sign</button></a></div>
                    <div class="but2"><a href="<?php echo base_url()."wel/index" ?>"><button type="button" class="btn btn-dark" style="width:100%;">Back</button></div></a>
                </div>
        </div>
    </div>
    <form action="" method="post">
        <div id="lupapassword" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                <h4 class="modal-title">RuangAdu - Reset Password-</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?= validation_errors()?>
                    <?= form_open('pir/email_reset_password_validation')?>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Masukan Email Terdaftar">
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Kirim</button>
                <?=form_close()?>
                </div>
            </div>
            </div>
        </div>
        </div>  
    </form>  

	
	<script src="<?php echo base_url('assets/css/ini/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/css/ini/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
    </script>

    </body>
</html>