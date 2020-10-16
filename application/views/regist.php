<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Part 15 : Membuat Modal dengan Bootstrap</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
   <div class="container">		
	<center><h1>Membuat Modal dengan Bootstrap | www.malasngoding.com</h1></center>
	<br/>
	<!-- Tombol untuk menampilkan modal-->
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buka Modal</button>
 
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Bagian heading modal</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>bagian body modal.</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
            <a href="<?php echo base_url()."wel/logout" ?>"><button type="button" class="btn btn-danger">Logout</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

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
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
            <a href="<?php base_url().'wel/'?>"><button type="button" class="btn btn-danger" >Tutup Modal</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>