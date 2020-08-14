<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>

    <link rel="stylesheet" href="<?php echo ('aseets/css/bootstrap.min.css')?>">
</head>

<style>
    .container{
        margin-top : 30px;
        text-align:center;
    }
</style>

<body>
    <?php $this->load->view('navbar') ?>


    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Untuk</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi Aduan</th>
                <th scope="col">Tanggal pengirim</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>1</td>
                <td>Pemerintah</td>
                <td>Covid-19</td>
                <td>Warga berkumpul ....</td>
                <td>20-02-20</td>
                <td><button type="button" class="btn btn-info">Cetak</button></td>
                </tr>
            </tbody>
        </table>        
    </div>
</body>
</html>