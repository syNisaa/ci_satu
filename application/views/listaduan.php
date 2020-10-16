<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php $this->load->view('acc');?>
<div class="container">
    <div class="row" style="margin-right:10%;">
        <?php 
            if($c_adu > 0){
                foreach($adu as $d){
        ?>  
        <div class="card" style="width: 18rem; ; margin-left: 37px; margin-bottom:15px" >
            <img src="<?php echo base_url('gambar/'.$d->foto)?>" class="card-img-top" alt="..." style="height: 10rem">
            <div class="card-body">
                <h5 class="card-title"><?php echo $d->judul;?></h5>
                <p class="card-text"><?php echo $d->isi_laporan;?></p>
                <?php if($d->statuss == "selesai"){
                        ?>
                            <a href="#" ><button type="button"class="btn btn-dark">Selesai</button></a>
                        <?php   }       
                               else   {
                        ?>
                            <a href="#" data-toggle="modal" data-target="#modallist" class="btn btn-primary"><?php echo $d->statuss;?></a>
                        <?php
                            }
                        ?>     
                
            </div>
        </div>

        <?php   }       
            }   else   {
                ?>
                <tr>
                    <td colspan="8"><center> Data Kosong </center></td>
                </tr>
        <?php
            }
        ?>
    </div>
</div>

<div class="modal" tabindex="-1" id="modallist">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Saran Dan Masukan Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pesan ini belum di tanggapi</p>
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

    	
	<script src="<?php echo base_url('assets/css/ini/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/css/ini/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

</body>
</html>