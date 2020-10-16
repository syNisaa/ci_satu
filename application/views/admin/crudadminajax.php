<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
</head>
<body>

    <?php $this->load->view('admin/dashboard') ?>

    <div class="container mt-5">
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addUserModal">Tambah Petugas</button>
    
        <table class="table table-striped border" id="listUserTable">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telpon</th>
                <th>level</th>
                <th style="text-align: right;">Action</th>
            </tr>
            </thead>
        <tbody id="listUser">
            <!-- Untuk menampilkan datanya, menggunakan JQuery + AJAX -->
        </tbody>

        </table>

        <div class="row">
            <div class="col">
                <!--Tampilkan pagination-->
                <?php 
                    echo $pagination;
                ?>
            </div>
        </div>
    
    </div>


    <!-- Modal -->
    <form id="saveUserForm" method="post">
            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama</label>
                    <div class="col-md-10">
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Username*</label>
                    <div class="col-md-10">
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Telpon</label>
                    <div class="col-md-10">
                        <input type="text" name="telp" id="telp" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Password*</label>
                    <div class="col-md-10">
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Level</label>
                    <div class="col-md-10">
                        <select id="lavel" class="form-control">
                            <option value="1">-Admin-</option>
                            <option value="2">-Petugas-</option>
                            <?php foreach($level as $datas):?>
                            <option value="<?= $datas->lavel;?>"><?= $datas->lavel;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
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
    <!-- edit -->

    
    <form id="saveEditUserForm" method="post">
            <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama</label>
                    <div class="col-md-10">
                        <input type="text" name="namaed" id="namaed" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Username*</label>
                    <div class="col-md-10">
                        <input type="text" name="usernameed" id="usernameed" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Telpon</label>
                    <div class="col-md-10">
                        <input type="text" name="telped" id="telped" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Level</label>
                    <div class="col-md-10">
                        <select id="laveled" class="form-control">
                            <option value="1">-Admin-</option>
                            <option value="2">-Petugas-</option>
                            <?php foreach($level as $datas):?>
                            <option value="<?= $datas->lavel;?>"><?= $datas->lavel;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_petugas" id="id_petugas" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>

    <!-- Delete -->
    <form id="deleteUserForm" method="post">
        <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p>Are you sure to delete this record?</p>
            </div>
            <div class="modal-footer">
            <input type="hidden" name="deleteUserId" id="deleteUserId" class="form-control">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </div>
        </div>
    </div>
    </form>


    <!-- Script -->
    <script>
        $(document).ready(function () {
                listUsers();
                $('#listUserTable').dataTable({
                "bPaginate": false,
                "bInfo": false,
                "bFilter": false,
                "bLengthChange": false,
                "pageLength": 5
                });
            // list all user in datatable
                function listUsers() 
                {
                $.ajax({
                    type: 'ajax',
                    url: 'tampilkanData',
                    async: false,
                    dataType: 'json',
                    success: function (data) 
                    {
                        var html = '';
                        var i;
                        var no = 1;
                    for (i = 0; i < data.length; i++) 
                        {
                        html += '<tr id_petugas="' + data[i].id_petugas + '">' +
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].telp + '</td>' +
                            '<td>' + data[i].lavel + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id_petugas="' + data[i].id_petugas + '" data-nama="' + data[i].nama + '"data-username="' + data[i].username + '"data-telp="' + data[i].telp + '"data-lavel="' + data[i].lavel + '">Edit</a>' +
                            ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id_petugas="' + data[i].id_petugas + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                        }
                $('#listUser').html(html);
                    }
        
                });
        
                }

// Add petugas
        $('#saveUserForm').on('submit', function () {
                var nama = $('#nama').val(); // diambil dari id nama yang ada diform modal
                var username = $('#username').val(); // diambil dari id alamat yanag ada di form modal 
                var password = $('#password').val();
                var telp = $('#telp').val();
                var lavel = $('#lavel').val();

               $.ajax({
                 type: "post",
                 url: "tambahuser",
                 data: {nama:nama,username:username,password:password,telp:telp,lavel:lavel}, // ambil datanya dari form yang ada di variabel
                 dataType: "JSON",
                 success: function (data) {
                   swal({
                       type: 'success',
                       title: 'Tambah Petugas',
                       text: 'Anda Berhasil Menambah Petugas baru'
                     })
                     // tutup modal
                    $('#nama').val('');
                    $('#username').val('');
                    $('#password').val('');
                    $('#telp').val('');
                    $('#lavel').val('');
                    $('#addUserModal').modal('hide');
                    listUsers();
                   
                 }
               })
               return false;
             });
// edit 
    $('#listUser').on('click', '.editRecord', function () {
            $('#editUserModal').modal('show');
            $("#id_petugas").val($(this).data('id_petugas'));
            $("#namaed").val($(this).data('nama'));
            $("#usernameed").val($(this).data('username'));
            $("#telped").val($(this).data('telp'));
            $("#laveled").val($(this).data('lavel'));
        });

// update data
    $('#saveEditUserForm').on('submit', function () {
        var id_petugas = $('#id_petugas').val();
        var nama = $('#namaed').val(); 
        var username = $('#usernameed').val(); 
        var telp = $('#telped').val();
        var lavel = $('#laveled').val();
        $.ajax({
        type: "POST",
        url: "updateajax",
        dataType: "JSON",
        data: {id_petugas:id_petugas, nama:nama,username:username,telp:telp,lavel:lavel},
        success: function (data) {
            swal({
               type: 'success',
               title: 'Update Petugas',
               text: 'Anda Berhasil MengUpdate Petugas'
            })
            $("#userId").val("");
            $("#usernameEdit").val("");
            $('#emailEdit').val("");
            $('#editUserModal').modal('hide');
            listUsers();
        }
    });
    return false;
    });

    // show delete modal
    $('#listUser').on('click', '.deleteRecord', function () {
        var id_petugas = $(this).data('id_petugas');
        $('#deleteUserModal').modal('show');
        $('#deleteUserId').val(id_petugas);
    });

    // delete user record
    $('#deleteUserForm').on('submit', function () {
        var id_petugas = $('#deleteUserId').val();
        $.ajax({
        type: "POST",
        url: "hapusUser",
        dataType: "JSON",
        data: { id_petugas: id_petugas },
        
        success: function (data) {
            swal({
                    type: 'error',
                    title: 'Delete Petugas',
                    text: 'Anda Telah Menghapus 1 Petugas'
                })
            $("#" + id_petugas).remove();
            $('#deleteUserId').val("");
            $('#deleteUserModal').modal('hide');
            listUsers();
        }
    });
    return false;
    });

        
        
//end js   
       });
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--  -->
    </body>
</html>