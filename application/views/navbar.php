<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
</head>

<style>
    body{
        background-image:url(gambarDesain/4445.jpg);
        overflow:hidden;
        margin-bottom:-80px;
        /* height:890px; */
        background-size: cover;
    }
    .collapse{
        margin-left:65%;
    }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo base_url()."wel/verifikasi"?>" style="color: blue;">RuangAdu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()."wel/verifikasi"?>">Verifikasi</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()."wel/laporan"?>">Laporan</a>
            </li>
            <li class="nav-item active" >
                <a class="nav-link" href="<?php echo base_url()."wel/tanggapan"?>">Tanggapan</a>
            </li>
            <li class="nav-item active" >
                <a class="nav-link" href="<?php echo base_url()."wel/index" ?>" style="color:red;">Logout</a>
            </li>
            </ul>
        </div>
    </nav>    

</body>
</html>