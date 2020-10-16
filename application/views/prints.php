<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Aduan</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi Laporan</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($c_adu > 0){
                foreach($adu as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas->id_pengaduan; ?></td>
                        <td><?php echo $datas->tgl_pengaduan; ?></td>
                        <td><?php echo $datas->judul; ?></td>
                        <td><?php echo $datas->isi_laporan; ?></td>
                        <td><?php echo $datas->foto; ?></td>
                    </tr> 
        <?php   }       
        }   else   {
            ?>
            <tr>
                <td colspan="8"><center> Data Kosong </center></td>
            </tr>
            <?php
        }
            ?>
</body>
</html>