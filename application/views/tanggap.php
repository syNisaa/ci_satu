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

    <div class="container">

        <table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Tanggapan</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi Aduan</th>
                <th scope="col">Isi Tanggapan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($c_tanggap > 0){
                foreach($tanggap as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas->id_tanggapan ; ?></td>
                        <td><?php echo $datas->tgl_tanggapan; ?></td>
                        <td><?php echo $datas->judul; ?></td>
                        <td><?php echo $datas->isi_laporan; ?></td>
                        <td><?php echo $datas->tanggapan; ?></td>
                        <td>
                            <button type="button" style="" data-toggle="modal" data-target="#modaltanggap" class="btn btn-primary">Selesai</button>
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

    <div class="modal" tabindex="-1" id="modaltanggap">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">TERIMAKASIH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pesan ini sudah di tanggapi, Terimaksih sudah memberi Saran dan Masukan!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- konten modal-->
          <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <h4 class="modal-title">Logout</h4>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <p>Tinggalkan Halaman ini</p>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <a href="<?php echo base_url()."wel/keluar" ?>"><button type="button" class="btn btn-danger" >Keluar</button></a>
            </div>
          </div>
        </div>
      </div>
    </div> 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>