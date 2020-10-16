<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <title>Document</title>
</head>

<body>

    <h1 style="text-align: center;">Data cetak</h1>
    <?php echo "Tanggal : ".date('d-m-Y'); ?>

    <hr>

<div class="container">
    <table class="table" style="text-align:center;" border="1">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        
        <?php 
            if($c_masyarakat > 0){
                foreach($masyarakat as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas->id; ?></td>
                        <td><?php echo $datas->nama; ?></td>
                        <td><?php echo $datas->username; ?></td>
                        <td><?php echo $datas->email; ?></td>
                        <td><?php echo $datas->password; ?></td>
                    </tr> 
        <?php   }       
        }   else   {
            ?>
                <td colspan="8"><center> Data Kosong </center></td>
            <?php
        }
            ?>
        
        </table>
</div>
</body>
</html>