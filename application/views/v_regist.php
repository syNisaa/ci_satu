<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <title>Document</title>
</head>

<style>
    body{
        /* background-image:url(assets/gambarDesain/439.jpg); */
        overflow-x:hidden;
        margin-bottom:-50px;
        height:890px;
        background-size: cover;
    }

    .contain form input{
            margin-top:20px;
            width:40%;
            margin : 2% auto;
            border-radius:20px;
    }
    .contain{
        margin-top:10%;
    }
    h5{
        color:black;
    }
    .tulis{
        text-align:center;
    }
    input{
        text-align:center;
    }
    .row{
        margin-top:6px;
    }
    img{
        margin-left:50px;
        width:10%;
    }
    h2{
        margin-left:28%;
    }

</style>

<body>

    <div class="row"><br>
        <a href="<?php echo base_url()."wel/index" ?>"><img src="<?php echo base_url('assets/gambarDesain/back.png')?>" alt=""></a>
        <h2><font face="Courier New"><b>Yuk join dan sampaikan pendapatmu!</b></font></h2>
    </div>
    <div class="contain text-center">
    <?php foreach($masyarakat as $u){ ?>

	<form action="<?php echo base_url(). 'wel/update'; ?>" method="post">
    
     <input type="hidden" name="ids" value="<?php echo $u->id ?>">
		
        <table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="text" name="namas" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>username</td>
				<td><input type="text" name="usernames" value="<?php echo $u->username ?>"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="emails" value="<?php echo $u->email ?>"></td>
			</tr>
            <tr>
				<td>password</td>
				<td><input type="text" name="passwords" value="<?php echo $u->password ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
    </div>

    <hr>

</div>
</body>
</html>