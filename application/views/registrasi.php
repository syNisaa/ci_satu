<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
<style>
        body{
            background-image: url('img/tbb7.jpg');
            background-size: cover;
            overflow:hidden;
        }
        .contain{
            margin:10% auto;
            width: 45%;
            background-color:white;
            padding: 5%;
            margin-top:0%;
        }
        .contain form input{
            border-radius:20px;
            margin-bottom:5%;
        }

        .contain form button{
            border-radius:20px;
            width:30%;
        }
    </style>
    <title>Reg</title>
</head>
<body>
    <div class="row">
        <img src="<?php echo base_url('assets/gambarDesain/238.jpg')?>" alt="" style="width:50%;">
        <div class="contain text-center">
            <div class="back" style="margin-top:-30px;px;">
                <a href="<?php echo base_url()."wel/index" ?>"><img src="<?php echo base_url('assets/gambarDesain/back.png')?>" alt="" style="width:10%;"></a>
            </div>
            <h2><font face="Courier New"><b>Yuk join dan sampaikan pendapatmu!</b></font></h2>
            <br>
        <form method="post" action="<?php echo site_url('wel/simpan_data')?>">
            <h1><b><u><font face="Adobe Arabic">Registrasi</font></u></b></h1>
            <input type="text" class="form-control" name="namas" placeholder="Nama">
            <input type="text" class="form-control" name="usernames" placeholder="Username">
            <input type="text" class="form-control" name="emails" placeholder="Email">
            <input type="password" class="form-control" name="passwords" placeholder="Password">
            <button type="submit" class="btn btn-info">Regist</button>
        </form>
        </div>
    </div>

    </body>
</html>