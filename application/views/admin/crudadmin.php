<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php $this->load->view('admin/dashboard') ?>

<div class="container">
    <div class="tambah">
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah Akses</button>
        <button type="button" class="btn btn-primary">Generate PDF</button>
        <button type="button" class="btn btn-success">Generate Excel</button>
    </div>

    <br>

    <table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Telpon</th>
                <th scope="col">Level</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($c_crud > 0){
                foreach($crud as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas->id_petugas ; ?></td>
                        <td><?php echo $datas->nama; ?></td>
                        <td><?php echo $datas->username; ?></td>
                        <td><?php echo $datas->telp; ?></td>
                        <td><?php echo $datas->lavel; ?></td>
                        <td>
                        <div class="col-12">
                        <?php echo anchor('wel/edit/'.$datas->id_petugas,'<button type="button" class="btn btn-success" style="width:50%;">Edit</button>'); ?>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="button" style="width:50%;"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" >Delete</button>
                            
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
        
        </tbody>
        </table>

        <!-- Nambah Data Admin -->
    <form action="<?php echo base_url("wel/save"); ?>" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas Atau Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="namas" placeholder="Nama">
                </div>
                 
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="usernames" placeholder="Username">
                </div>
 
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="passwords" placeholder="Password">
                </div>

                <div class="form-group">
                    <label>Telpon</label>
                    <input type="text" class="form-control" name="telps" placeholder="Telpon">
                </div>

                <div class="form-group">
                    <label>Lavel</label>
                    <select name="lavel" class="form-control">
                        <option value="1">-Admin-</option>
                        <option value="2">-Petugas-</option>
                        <?php foreach($level as $datas):?>
                        <option value="<?= $datas->lavel;?>"><?= $datas->lavel;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>

        <!-- Hapuss Data Admin  -->
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
					<?php echo anchor('wel/hapusadmin/'.$datas->id_petugas,'<button type="button" class="btn btn-danger" style="width:100%;">Hapus</button>'); ?>
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
    
    <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>