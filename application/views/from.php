<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
</head>
<style>
    .collapse{
        margin-left:70%;
    }
</style>
<body>
    <?php $this->load->view('acc');?>
<div class="container">
    
    <h4 style="text-align:center" ><b>RuangAdu</h4>

    <form action="<?php echo site_url('wel/simpan_aduan')?>" id="aduan" method ='POST' enctype="multipart/form-data">
            <div class="form-grup">

                <label class='font-weight-bold'>Tanggal Aduan</label> :    <?php echo format_indo(date('Y-m-d'));?>
                <input type="hidden" class='form-control' name='tgl' value="<?php echo format_indo(date('Y-m-d'));?>"><br>

                <label class='font-weight-bold'>NIK</label>
                <input type="text" class='form-control' name='nik'><br>

                <label class='font-weight-bold'>Judul Aduan</label>
                <input type="text" class='form-control' name='judul'><br>

                <label class='font-weight-bold'>Deskripsi Aduan</label>
                <input type="text" class='form-control' name='des' ><br>

                <label class='font-weight-bold'>Bukti</label>
                <input type="file" name="berkas">
            </div>

                <input type='submit' class='btn btn-primary mt-4' name='submit' value = "Simpan">

            </form>
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

    <script src="">
     $(document).ready(function () {
        $('#aduan').on('submit', function () {
            $('#myModal').modal('show');
        })

     });
     
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

    <script src="<?php echo base_url('assets/css/ini/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/css/ini/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

</body>
</html>