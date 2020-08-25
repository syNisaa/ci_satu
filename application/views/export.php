<!DOCTYPE html>
<html>
<head>
     <title>Tutorial Export Dengan Codeigniter</title>
</head>
<body>
     <a href="<?php echo base_url('export'); ?>">Export Data</a>
     <table border="1" cellspacing="0">
          <thead>
               <tr>
                    <th style="width: 7%; text-align: center;">No</th>
                    <th style="width: 30%">Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th style="text-align: center;">Umur</th>
               </tr>
          </thead>
          <tbody>
               <?php $index = 1; ?>
               <?php foreach($semua_pengguna as $pengguna): ?>
                    <tr>
                         <td style="width: 7%; text-align: center;"><?php echo $index++; ?></td>
                         <td style="width: 30%"><?php echo $pengguna->nama; ?></td>
                         <td><?php echo $pengguna->jenis_kelamin; ?></td>
                         <td><?php echo date('j F Y', strtotime($pengguna->tanggal_lahir)); ?></td>
                         <td style="text-align: center;"><?php echo $pengguna->umur; ?></td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
</body>
</html>