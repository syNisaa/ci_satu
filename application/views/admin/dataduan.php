<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ini/sb-admin-2.min.css')?>">

    
</head>
<body>
    
    <?php $this->load->view('admin/dashboard');?>

<div class="container">
    <div class="tambah">
        <a href="<?php echo base_url("export/cetakaduan"); ?>"><button type="button" class="btn btn-primary">Generate PDF</button></a>
        <button type="button" class="btn btn-success">Generate Excel</button>
    </div>
    <br>
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
                        <td>
                        <div class="col-12 mt-2">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" >Delete</button>
                        </div>
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

        <!-- Delete -->
    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="delete-data">
                    <p>Hapus Data Ini?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <?php echo anchor('wel/hapuss/'.$datas->id,'<button type="button" class="btn btn-danger" style="width:100%;">Delete</button>'); ?>
                            
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
</body>
</html>