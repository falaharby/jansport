<?php
session_start();
include 'dbconnect.php';

	$uid = $_SESSION['id'];
	$caricart = mysqli_query($conn,"select * from cart where userid='$uid' and status='Cart'");
	$fetc = mysqli_fetch_array($caricart);
	$orderidd = $fetc['orderid'];
	$itungtrans = mysqli_query($conn,"select count(detailid) as jumlahtrans from detailorder where orderid='$orderidd'");
	$itungtrans2 = mysqli_fetch_assoc($itungtrans);
	$itungtrans3 = $itungtrans2['jumlahtrans'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Jansport Shop</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Falenda Flora, Ruben Agung Santoso" />
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
@media (max-width: 767px){
	.div-nav-right {
    float: none;
	}
}
</style>
</head>
	
<body>
<!-- header -->
	<!-- <div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>DAPATKAN PENAWARAN MENARIK KHUSUS HARI INI, BELANJA SEKARANG!</p>
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
				<h1><a href="index.php">TOKOPEKITA</a></h1>
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
								
								<div class="div-nav-right">
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
	<!-- main-slider -->
	<div class="jumbotron"  style="padding: 0px;">
		<img src="images/bg5.png" width="100%" alt="">
	</div>
		<!-- <ul id="demo1">
			<li>
				<img src="images/bg5.png" alt="" />
			</li>
			<li>
				<img src="images/slide2.jpg" alt="" />
			</li>
			
			<li>
				<img src="images/slide3.jpg" alt="" />
			</li>
		</ul> -->
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2 style="font-weight: 300;
    color: #5b32b4;
    font-size: 48px;
		text-transform:none;">Our Product</h2>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile_top_brands_grids">
							
							<?php 
											$brgs=mysqli_query($conn,"SELECT * from produk order by idproduk ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){

												?>
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column" style="border: none;">
										<div class="agile_top_brand_left_grid">
										
											<div class="agile_top_brand_left_grid1">
										
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><img title=" " alt=" " src="<?php echo $p['gambar']?>" width="200px" height="200px" /></a>		
															<p style="font-size: 20px;"><?php echo $p['namaproduk'] ?></p>
															<!-- <div class="stars">
															<?php
															$bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
															$rate = $p['rate'];
															
															for($n=1;$n<=$rate;$n++){
																echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
															};
															?>
															</div> -->
															<h4>Rp<?php echo number_format($p['hargaafter']) ?> <span style="font-size: 12px; color: gray;">Rp<?php echo number_format($p['hargabefore']) ?></span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
																<fieldset>
																	<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><input type="submit" class="button" value="Lihat Produk" /></a>
																</fieldset>
														</div>
													</div>
				
											</div>
										</div>
									</div>
								</div>
								<?php
											}
								?>
								
								
								<div class="clearfix"> </div>
							</div>
						</div>
						
											
					</div>
				</div>
			</div>
	</div>
<!-- //top-brands -->





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