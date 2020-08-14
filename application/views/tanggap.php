<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tanggapan</title>

    <link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css')?>">
</head>
<body>
    <?php $this->load->view('navbar')?>;

    <div class="container">

        <font face="Tahoma">Silahkan verifikasi pesan pesan di bawah ini

        <table class="table" style="text-align:center;">
        <thead class="">
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
                <td><button type="button" class="btn btn-success">Balas</button></td>
            </tr>
        </tbody>
        </table>
    </div>
</body>
</html>