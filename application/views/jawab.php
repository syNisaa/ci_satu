<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php $this->load->view('admin/dashboard')?>
  
<div class="container">
<?php foreach($aduan as $u){ ?>
    <a href="<?php echo base_url()."wel/veriadmin" ?>"><button class="btn btn-danger">Back</button>   </a> 
            <div class="card mt-5">
                <div class="card-header text-center">
                   <h5>-Tanggapan-</h5>
                </div>
                <div class="card-body">
                <form action="<?php echo base_url("wel/tanggap"); ?>" method="post">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_pengaduan; ?>">
                    <p>Tanggal Aduan : </p><input type="text" class="form-control" name="tgl_aduan" value="<?php echo $u->tgl_pengaduan; ?>"><br>
                    <p>Judul Aduan : </p><input type="text" class="form-control" name="judul" value="<?php echo $u->judul; ?>"><br>
                    <p>isi Aduan : </p><input type="text" class="form-control" name="isi" value="<?php echo $u->isi_laporan; ?>"><br>
                    <p>Tanggal Tanggapan : </p><input type="date" class="form-control" name="tgltanggap"><br>
                    <p>Tanggapan : </p><input type="text" class="form-control" name="isitanggap" placeholder="Tulis tanggapan disini">
                    <br><button type="submit" class="btn btn-success" style="margin-right:10px"  >Kirim</button> 
                    
                </form> <br>
                     
                    </div>
                </div>
            </div>
        </div>
    
        <?php
            }
        ?>
    
            
    </body>
</html>