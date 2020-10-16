<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            margin-top:3%; 
            box-shadow: 1px 1px 1px 1px grey;
        }
        .row{
            
           
        }
        .contain form input{
            /* border-radius:20px; */
            width:100%;
            margin-bottom:5%;
        }

        .contain form button{
            /* border-radius:20px; */
            margin-bottom:2%;
            width:100%;
        }
        .but1{
            margin-right:5px;
            margin-left:45%;
        }
    </style>
    <title>Reg</title>
</head>
<body>
    <div class="row">
        <img src="<?php echo base_url('assets/gambarDesain/anisa.jpg')?>" alt="" style="width:50%;">
        <div class="contain text-center">
            <h2><font face="Courier New"><b>Sign Up</b></font></h2>

            <?php if ($this->session->flashdata('gagal')) { ?>
                <div class="alert alert-danger"> <?= $this->session->flashdata('gagal') ?> </div>
            <?php } ?>

        <form method="post" action="<?php echo site_url('wel/simpan_data')?>">
            <input type="text" class="form-control" name="namas" placeholder="Nama">
            <input type="text" class="form-control" name="usernames" placeholder="Username">
            <input type="text" class="form-control" name="emails" placeholder="Email">
            <input type="password" class="form-control" name="passwords" placeholder="Password">
            <button type="submit" class="btn btn-info">Regist</button>
        </form>
            <div class="row" id="but">
                <div class="but1"><a href="<?php echo base_url()."wel/login" ?>"><button type="button" class="btn btn-dark" style="width:100%;">Back</button></div></a>
            </div>
        </div>
    </div>

    </body>
</html>