<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootsrtap.min.css')?>">
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
        margin-left:70%;
    }
    .container{
        margin-top:50px;  
    }

</style>

<body>
    <?php $this->load->view('navbar')?>
    

    <div class="container">

        <font face="Tahoma">Silahkan verifikasi pesan pesan di bawah ini
        
        <table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal pengirim</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        
        <?php 
            // if()
        ?>
            <tr>
                <td>1</td>
                <td>Covid-19</td>
                <td>20-02-20</td>
                <td><button type="button" class="btn btn-primary">Acc</button> <button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
        </tbody>
        </table>
    </div>
</body>
</html>