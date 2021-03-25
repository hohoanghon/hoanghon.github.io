<?php
session_start();
 include_once 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>HHH STORE</title>
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css1/style.css">
	<link rel="stylesheet" type="text/css" href="css1/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="css1/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css1/popuo-box.css">
	<link rel="stylesheet" type="text/css" href="css1/easy-responsive-tabs.css">
	<link rel="stylesheet" type="text/css" href="css1/menu.css">
	<link rel="stylesheet" type="text/css" href="css1/creditly.css">
	<link href="css1/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="css1/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="css1/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="css1/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="css1/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="SHORTCUT ICON" href="/hinhanh/logo.png">
	<link rel="stylesheet" type="text/css" href="css/search1.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
</head>
<body>
	<?php include 'topbar.php';
		include 'menu.php' ;
		include 'slider.php';
		if(isset($_GET['quanly'])){
			$tam = $_GET['quanly'];
		}
		else{
			$tam = '';
		}
		if($tam=='danhmuc')
		{
			include 'danhmuc.php';	
		}
		else if($tam=='chitietsp'){
			include 'chitietsp.php';
		}
		else if($tam=='giohang'){
			include 'giohang.php';
		}elseif ($tam=='timkiem') {
			include 'timkiem.php';
		}
		elseif ($tam=='tintuc') {
			include 'tintuc.php';
		}
		elseif ($tam=='chitiettin') {
			include 'chitiettin.php';
		}elseif ($tam=='xemdonhang') {
			include 'xemdonhang.php';
		}
		elseif ($tam=='sanphamhot') {
			include 'sanphamhot.php';
		}
		else{
			include 'home.php';
		}
		
		
		include 'footer.php';
	?>
	<script type="text/javascript" src="/js1/script2.js"></script>
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<!--<script src="js/minicart.js"></script>-->
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	
	<!-- scroll seller -->
	<script src="js/scroll.js"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<script src="js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="css1/flexslider.css" type="text/css" media="screen" />

	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>

</body>
</html>