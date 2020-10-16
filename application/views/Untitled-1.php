<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    
</head>

<style>

    body{
    }
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
                        <td>
                        <div class="col-12">
                            <button type="button" <?php echo $datas->id_pengaduan; ?> style="width:50%;"class="btn btn-success" data-toggle="modal" data-target="#tanggapanmodal" >Balas</button>
                            <a href="javascript:void(0);" class="btn btn-info btn-sm tanggapRecord" data-id_pengaduan="' + $datas.id_pengaduan + '" data-tgl_pengaduan="' + $datas->tgl_pengaduan + '"data-judul="' + $datas->judul + '">Edit</a>
                            
                            <a href="javascript:void(0);" class="tanggap" id="btntanggap" data-id_pengaduan="<?= $datas->id_pengaduan;?>" data-tgl_pengaduan="<?= $datas->tgl_pengaduan;?>" data-judul="<?= $datas->judul;?>">tanggap</a>
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

    <form action="/product/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control product_name" name="product_name" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control product_price" name="product_price" placeholder="Product Price">
                </div>
 
                <div class="form-group">
                    <label>Category</label>
                    <select name="product_category" class="form-control product_category">
                        <option value="">-Select-</option>
                        <?php foreach($category as $row):?>
                        <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    
     <!-- Tanggapan  -->
    <form action="<?php echo base_url("wel/tanggap"); ?>" method="post">
        <div class="modal fade" id="tanggapanmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Aduan Masyarakat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="tanggapan">
                        <input type="text" class="form-control" name="id" id="id">
                        <p>Tanggal Aduan : </p><input type="text" class="form-control" name="tgl_aduan" id="tgl"><br>
                        <p>Judul Aduan : </p><input type="text" class="form-control" name="judul" id="judul"><br>
                        <p>isi Aduan : </p><input type="text" class="form-control" name="isi" id="isi"><br>
                        <p>Tanggal Tanggapan : </p><input type="date" class="form-control" name="tgltanggap"><br>
                        <p>Tanggapan : </p><input type="text" class="form-control" name="isitanggap" placeholder="Tulis tanggapan disini">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-succes">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </form> 

    <script src="">
         $(document).ready(function(){
 
        // get Edit Product
        $('.tanggap').on('click',function(){
            const id_pengaduan = $(this).data('id_pengaduan');
            const tgl_pengaduan = $(this).data('tgl_pengaduan');
            const judul = $(this).data('judul');
            $('#id').val(id_pengaduan);
            $('#tgl_aduan').val(tgl_pengaduan);
            $('#judul').val(judul);
            $('#editModal').modal('show');
        });

        
        });
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>




<!-- Tanggapan  -->
<form action="<?php echo base_url("wel/tanggap"); ?>" method="post">
        <div class="modal fade" id="tanggapan" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Aduan Masyarakat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="tanggapan">
                        <input type="text" class="form-control" name="id" value="<?php echo $u->id_pengaduan; ?>">
                        <p>Tanggal Aduan : </p><input type="text" class="form-control" name="tgl_aduan" value="<?php echo $u->tgl_pengaduan; ?>"><br>
                        <p>Judul Aduan : </p><input type="text" class="form-control" name="judul" value="<?php echo $u->judul; ?>"><br>
                        <p>isi Aduan : </p><input type="text" class="form-control" name="isi" value="<?php echo $u->isi_laporan; ?>"><br>
                        <p>Tanggal Tanggapan : </p><input type="date" class="form-control" name="tgltanggap"><br>
                        <p>Tanggapan : </p><input type="text" class="form-control" name="isitanggap" placeholder="Tulis tanggapan disini">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-succes">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form> 