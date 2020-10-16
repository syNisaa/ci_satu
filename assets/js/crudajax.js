
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
                    url: 'user/tampilkanData',
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
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="' + data[i].id + '" data-username="' + data[i].username + '"data-email="' + data[i].email + '">Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + data[i].id + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                        }
                $('#listUser').html(html);
                    }
        
                            });
        
                }
        
            
            // save new user record
            $('#saveUserom').submit('click', function () {
            var Usernama = $('#nama').val();
            var Username = $('#username').val();
            var Usertelpon = $('#telpon').val();
            var UserPassword = $('#password').val();
            var Userlavel = $('#lavel').val();
            $.ajax({
                type: "POST",
                url: "simpanData",
                dataType: "JSON",
                data: {nama : Usernama, username: Username, telp: Usertelpon, password: UserPassword, lavel: Userlavel },
                success: function (data) {
                   $('#nama').val("");
                   $('#username').val("");
                   $('#telpon').val("");
                   $('#password').val("");
                   $('#lavel').val("");
                   $('#addUserModal').modal('hide');
                   listUsers();
             }
           });
           return false;
            });


    
            $('#saveUserForm').on('submit', function () {
                var nama = $('#nama').val(); // diambil dari id nama yang ada diform modal
                var username = $('#username').val(); // diambil dari id alamat yanag ada di form modal 
                var password = $('#password').val();
                var telp = $('#telp').val();
                var lavel = $('#lavel').val();

               $.ajax({
                 type: "post",
                 url: "tambahuser",
                 beforeSend :function () {
                   swal({
                       title: 'Menunggu',
                       html: 'Memproses data',
                       onOpen: () => {
                         swal.showLoading()
                       }
                     })      
                   },
                 data: {nama:nama,username:username,password:password,telp:telp,lavel:lavel}, // ambil datanya dari form yang ada di variabel
                 dataType: "JSON",
                 success: function (data) {
                   listUser.ajax.reload(null,false);
                   swal({
                       type: 'success',
                       title: 'Tambah Mahasiswa',
                       text: 'Anda Berhasil Menambah Mahasiswa'
                     })
                     // bersihkan form pada modal
                     $('#saveUserForm').modal('hide');
                     // tutup modal
                     $('#nama').val('');
                     $('#username').val('');
                   
                 }
               })
               return false;
             });
        
            });


        