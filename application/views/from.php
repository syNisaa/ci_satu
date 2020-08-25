<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
</head>
<style>
    .collapse{
        margin-left:80%;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="color: blue;">RuangAdu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active" >
                <a class="nav-link" href="<?php echo base_url()."wel/index" ?>" style="color:red;">Logout</a>
            </li>
            </ul>
        </div>
    </nav>    
<div class="container">
    
    <?php

        $this->session->set_userdata('favourite_website', 'http://tutsplus.com');
     
// set array of items in session
        $arraydata = array(
                'pengaduan'  => 'nama',
                'website'     => 'http://code.tutsplus.com',
                'twitter_id' => '@sajalsoni',
                'interests' => array('tennis', 'travelling')
        );
        $this->session->set_userdata($arraydata);
        
        /**** GET SESSION DATA ****/
        // get data from session
        echo "Favourite Website: ". $this->session->userdata('pengaduan');
            ?>
    <h5 style="text-align:center">Ayo Tulis Aduan Mu disini </h5>
    <br>

    <form action="<?php echo site_url('wel/simpan_aduan')?>" method ='POST'>
            <div class="form-grup">

                <label class='font-weight-bold'>Tanggal Aduan</label>
                <input type="date" class='form-control' name='tgl'>

                <label class='font-weight-bold'>NIK</label>
                <input type="text" class='form-control' name='nik'>

                <label class='font-weight-bold'>Judul Aduan</label>
                <input type="text" class='form-control' name='judul' >

                <label class='font-weight-bold'>Deskripsi Aduan</label>
                <input type="text" class='form-control' name='des' >

                <label class='font-weight-bold'>Gambar</label>
                <input type="gambar" class='form-control' name='gambar' >

                <!-- <label  class='font-weight-bold'>status</label> -->
                <!-- <input type="date" class='form-control' name='tgl' > -->

            </div>

                <input type='submit' class='btn btn-primary mt-4' name='submit' value = "Simpan">

            </form>
    </div>
</body>
</html>