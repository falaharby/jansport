<?php
session_start();
include 'dbconnect.php';

if(!isset($_SESSION['log'])){
	header('location:login.php');
} else {
	
};
	
	$uid = $_SESSION['id'];
	$caricart = mysqli_query($conn,"select * from cart where userid='$uid' and status='Cart'");
	$fetc = mysqli_fetch_array($caricart);
	$orderidd = $fetc['orderid'];
	$itungtrans = mysqli_query($conn,"select count(detailid) as jumlahtrans from detailorder where orderid='$orderidd'");
	$itungtrans2 = mysqli_fetch_assoc($itungtrans);
	$itungtrans3 = $itungtrans2['jumlahtrans'];
	
if(isset($_POST["update"])){
	$kode = $_POST['idproduknya'];
	$jumlah = $_POST['jumlah'];
	$q1 = mysqli_query($conn, "update detailorder set qty='$jumlah' where idproduk='$kode' and orderid='$orderidd'");
	if($q1){
		echo "Berhasil Update Cart
		<meta http-equiv='refresh' content='1; url= cart.php'/>";
	} else {
		echo "Gagal update cart
		<meta http-equiv='refresh' content='1; url= cart.php'/>";
	}
} else if(isset($_POST["hapus"])){
	$kode = $_POST['idproduknya'];
	$q2 = mysqli_query($conn, "delete from detailorder where idproduk='$kode' and orderid='$orderidd'");
	if($q2){
		echo "Berhasil Hapus";
	} else {
		echo "Gagal Hapus";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Jansport - Cart</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Jansport Shop" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<style>
	.div-nav-right {
    float: right;
}
@media (max-width: 767px){
	.div-nav-right {
    float: none;
	}
}
.timetable_sub th {
    background: #7051E4;
    color: #fff !important;
    text-transform: capitalize;
    font-size: 13px;
    border-right: 1px solid #7051E4;
}
.header-icons-noti {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background-color: #111111;
  color: white;
  font-family: Montserrat-Medium;
  font-size: 12px;
  position: absolute;
  top: 0;
  right: -10px;
}	
</style>
</head>
	
<body>
<!-- header -->
	<!-- <div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>DAPATKAN PENAWARAN MENARIK KHUSUS HARI INI, <a href="products.html">BELANJA SEKARANG!</a></p>
			</div>
			<div class="agile-login">
				<ul>
				<?php
				if(!isset($_SESSION['log'])){
					echo '
					<li><a href="registered.php"> Daftar</a></li>
					<li><a href="login.php">Masuk</a></li>
					';
				} else {
					
					if($_SESSION['role']=='Member'){
					echo '
					<li style="color:white">Halo, '.$_SESSION["name"].'
					<li><a href="logout.php">Keluar?</a></li>
					';
					} else {
					echo '
					<li style="color:white">Halo, '.$_SESSION["name"].'
					<li><a href="admin">Admin Panel</a></li>
					<li><a href="logout.php">Keluar?</a></li>
					';
					};
					
				}
				?>
					
				</ul>
			</div>
			<div class="product_list_header">  
					<a href="cart.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					 </a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi Kami : (+6281) 222 333</li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">Tokopekita</a></h1>
			</div>
		<div class="w3l_search">
			<form action="search.php" method="post">
				<input type="search" name="Search" placeholder="Cari produk...">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div> -->
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits" style="background-image: url(images/bg3.png); margin-left: -10px;">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs"  style="padding-top: 15px; padding-bottom: 15px;">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori <b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
													
														<?php 
														$kat=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
														while($p=mysqli_fetch_array($kat)){

															?>
														<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>
																				
														<?php
																	}
														?>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
							
									<li><a href="daftarorder.php">Daftar Pesanan</a></li>
										
								</ul>
								
								<div class="div-nav-right" style="float : right">
									<ul class="nav navbar-nav">
									<?php
											if(!isset($_SESSION['log'])){
												echo '
												<li><a href="registered.php"> Daftar</a></li>
												<li><a href="login.php">Masuk</a></li>
												';
											} else {
												
												if($_SESSION['role']=='Member'){
												echo '
												<li><a href="#" disabled="disabled" >Halo '.$_SESSION["name"].'</a></li>
												<li><a href="logout.php">Logout?</a></li>
												';
												} else {
												echo '
												<li><a href="#" disabled="disabled" >Halo '.$_SESSION["name"].'</a></li>
												<li><a href="admin">Admin Panel</a></li>
												<li><a href="logout.php">Logout?</a></li>
												';
												};
												
											}
											?>
											<li><span class="linedivide1" style="display: block;
											height: 20px;
											width: 1px;
											background-color: #e5e5e5;
											margin-left: 23px;
											margin-right: 23px;
											margin-top: 15px;"></span>
											</li>
										<li><a href="cart.php" style="padding-top: 12px;"><img src="images/icon-header-02.png" width="18" style="padding: 0px;" alt=""></a><span class="header-icons-noti"><?php echo $itungtrans3 ?></span></li>
										</ul>
										
								</div>
							</div>				
					</nav>
			</div>
		</div>
		
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Dalam keranjangmu ada : <span><?php echo $itungtrans3 ?> barang</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>No.</th>	
							<th>Produk</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							
						
							<th>Harga Satuan</th>
							<th>Hapus</th>
						</tr>
					</thead>
					
					<?php 
						$brg=mysqli_query($conn,"SELECT * from detailorder d, produk p where orderid='$orderidd' and d.idproduk=p.idproduk order by d.idproduk ASC");
						$no=1;
						while($b=mysqli_fetch_array($brg)){

					?>
					<tr class="rem1"><form method="post">
						<td class="invert"><?php echo $no++ ?></td>
						<td class="invert"><a href="product.php?idproduk=<?php echo $b['idproduk'] ?>"><img src="<?php echo $b['gambar'] ?>" width="100px" height="100px" /></a></td>
						<td class="invert"><?php echo $b['namaproduk'] ?></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                     
									<input type="number" name="jumlah" class="form-control" height="100px" value="<?php echo $b['qty'] ?>" \>
								</div>
							</div>
						</td>
				
						<td class="invert">Rp<?php echo number_format($b['hargaafter']) ?></td>
						<td class="invert">
							<div class="rem">
							
								<input type="submit" name="update" class="form-control" value="Update" \>
								<input type="hidden" name="idproduknya" value="<?php echo $b['idproduk'] ?>" \>
								<input type="submit" name="hapus" class="form-control" value="Hapus" \>
							</form>
							</div>
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
						</td>
					</tr>
					<?php
						}
					?>
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h3>Total Harga</h4>
					<ul>
						<?php 
						$brg=mysqli_query($conn,"SELECT * from detailorder d, produk p where orderid='$orderidd' and d.idproduk=p.idproduk order by d.idproduk ASC");
						$no=1;
						$subtotal = 10000;
						while($b=mysqli_fetch_array($brg)){
						$hrg = $b['hargaafter'];
						$qtyy = $b['qty'];
						$totalharga = $hrg * $qtyy;
						$subtotal += $totalharga
						?>
						<li><?php echo $b['namaproduk']?><i> - </i> <span>Rp<?php echo number_format($totalharga) ?> </span></li>
						<?php
						}
						?>
						<li>Total (inc. 10k Ongkir)<i> - </i> <span>Rp<?php echo number_format($subtotal) ?></span></li>
					</ul>
				</div>
				<div class="checkout-right-basket">
					<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
					<a href="checkout.php"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
<!-- ***** Footer Area Start ***** -->
<footer class="footer-social-icon text-center clearfix" style="background:#f0f0f0f0; margin-bottom:0px; padding-bottom:30px; padding-top:30px">
        <!-- footer logo -->
        <div class="footer-text">
            <img src="images/logo3.png" alt="">
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href=""> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
            <p>Copyright ©2021. Tugas Pemrograman Web Mobile</p>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear' 
				};
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 
</body>
</html>