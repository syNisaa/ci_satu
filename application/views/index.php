<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ini/css.css')?>">

</head>
<style>
    body{
        height:cover;
    }
    .desc{
		margin-top:20%;
		height:100%;
    }
    .col-three-forth{
        background-image: url(http://localhost/ci_satu/assets/gambarDesain/nisa.jpg); 
        background-size: cover;
    }
   
</style>
<body>
    <div id="colorlib-page">
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="colorlib-navbar-brand">
							<a class="colorlib-logo" href="index.html">RuangAdu</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="colorlib-hero" >
			<!-- <div class="owl-carousel"> -->
				<!-- <div class="item"> -->
					<div class="hero-flex ">
						<div class="col-three-forth">
							<div class="hero-img"></div>
						</div>
						<div class="col-one-forth ">
							<div class="display-t ">
								<div class="display-tc js-fullheight">
									<div class="text-inner">
										<div class="desc">
											<span class="tag">Welcome</span><?php echo format_indo(date('Y-m-d'));?>
											<h2>Pengaduan Masyarakat</h2>
											<font face="Times New Roman"><p style="text-align: justify">Indonesia menerapkan sistem kebebasan berpendapat  dan menghargai setiap pendapat-pendapat yang dikemukakan oleh rakyatnya.</p></font>
											<font face="Times New Roman"><p style="text-align: justify">Kebebasan berpendapat merupakan hak yang dimiliki oleh setiap orang. RuangAdu merupakan platfrom yang bisa menjadi wadah untuk menyampaikan aspirasi, dan keritik masyarakat kepada perintahan yang ada, Tonton video untuk mengetahui lebih lanjut</p></font>
											<br>
											<a href="" data-toggle="modal" data-target="#vidio" ><button type="button" class="btn btn-outline-primary"   >Simak lebih lanjut</button></a> 
											
											<a href="<?php echo base_url()."wel/login" ?>"><button type="submit" class="btn btn-info">Yuk Gabung!</button></a>
											<br><br><br><br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
    </div>

	<div id="vidio" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- konten modal-->
          <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <h4 class="modal-title">RuangAdu</h4>
            </div>
            <!-- body modal -->
            <div class="modal-body">
				<iframe width="460" height="315" src="https://www.youtube.com/embed/F2Qt60oJqnA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>    

	
	<script src="<?php echo base_url('assets/css/ini/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/css/ini/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

</body>
</html>