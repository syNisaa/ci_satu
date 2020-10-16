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

    .collapse{
        margin-left:70%;
    }
    .container{
        margin-top:50px;  
    }

</style>

<body>
    

    <div class="container">

        <!-- <font face="Tahoma">Silahkan verifikasi pesan pesan di bawah ini -->
        
        <table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Aduan</th>
                <th scope="col">Judul Aduan</th>
                <th scope="col">Bukti Aduan</th> 
                <th scope="col">Status Aduan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($c_verifikasi > 0){
                foreach($verifikasi as $datas){

        ?>  
                    <tr>
                        <td><?php echo $datas->id_pengaduan ; ?></td>
                        <td><?php echo $datas->tgl_pengaduan; ?></td>
                        <td><?php echo $datas->judul; ?></td>
                        <td><img src="<?php echo base_url('gambar/'.$datas->foto)?>" alt="" style="width:100px;"></td>
                        <td><button type="button" style="width:50%; margin-bottom:10px;"class="btn btn-primary"><?php echo $datas->statuss; ?></button></td>
                     
                        <td>
                        <?php if($datas->statuss == "selesai"){
                        ?>
                            <a href="#" ><button type="button" style="width:50%;"class="btn btn-dark">Sudah Selesai</button></a>
                        <?php   }       
                               else   {
                        ?>
                            <a href="#" ><?php echo anchor('wel/tanggapadu/'.$datas->id_pengaduan,'<button type="button" style="width:50%;"class="btn btn-success">Balas</button>') ; ?></a>
                        <?php
                            }
                        ?>     

                        </td>
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
        
        </tbody>
        </table>
    </div>

    
    

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

    <script src="">
         $(document).ready(function(){
 
        // get Edit Product
        $('.btn-edit').on('click',function(){
            const id_pengaduan = $(this).data('id_pengaduan');
            const tgl_pengaduan = $(this).data('tgl_pengaduan');
            const judul = $(this).data('judul');
            $('#id').val(id_pengaduan);
            $('#tgl_aduan').val(tgl_pengaduan);
            $('#judul').val(judul);
            $('#tanggapan').modal('show');
        });

        
        });
    </script>
</body>
</html>