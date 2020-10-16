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
<body id="page-top">

<?php $this->load->view('admin/dashboard')?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="tambah">
            <a href="<?php echo base_url("wel/cetak"); ?>"><button type="button" class="btn btn-primary">Generate PDF</button></a>
            <a href="<?php echo base_url("wel/print_xls"); ?>"><button type="button" class="btn btn-success">Generate Excel</button></a>
        </div>
        <br>
        <table class="table" style="text-align:center;">
            <thead class="">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
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
                            <td>
                            <div class="col-12">
                                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal" >Edit</button> -->
                            </div>
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
            
            </tbody>
            </table>
        </div>
</div>


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
					<?php echo anchor('wel/hapus/'.$datas->id,'<button type="button" class="btn btn-danger" style="width:100%;">Hapus</button>'); ?>
				</div>
			</div>
		</div>
	</div>

    <!-- update -->
    <!-- <form action="" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas Atau Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php foreach($masyarakat as $u){ ?>
                <input type="hidden" name="ids" value="<?php echo $u->id ?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="namas" value="<?php echo $u->nama ?>">
                </div>
                 
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="usernames" value="<?php echo $u->username ?>">
                </div>
 
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="emails" value="<?php echo $u->email ?>">
                </div>

                <div class="form-group">
                    <label>Telpon</label>
                    <input type="text" class="form-control" name="passwords" value="<?php echo $u->password ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
            <?php } ?>
    </form> -->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Logout</h4>
            </div>
            <div class="modal-body">
              <p>Tinggalkan Halaman ini</p>
            </div>
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