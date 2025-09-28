<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/index.css">
    <!-- Title -->
    <title>B2B Kismis Store</title>
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="css/icofont.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="css/datepicker.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/topCompnay.css">
    <!-- Medipro CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />

</head>

<body>
    
     <?php include 'header.php'; ?>

		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/Wallpepar4.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<!-- <div class="text">
									<h1>We offer <span>Kismis</span> you can rely on with<span>complete trus!</span></h1>
									<p> Our Kismis are carefully selected to ensure the highest quality, offering you a sweet and nutritious snack you can enjoy anytime.</p>
								 
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/Wallpepar   .jpg')">
					<div class="container">
						<div class="row">
							 <div class="col-lg-12">
								<!--<div class="text">
										<h1>We offer <span>Kismis</span> you can rely on with<span>complete trus!</span></h1>
										<p> Our Kismis are carefully selected to ensure the highest quality, offering you a sweet and nutritious snack you can enjoy anytime.</p>
								 
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('img/Wallpepar3.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<!-- <div class="text">
									<h1>We offer <span>Kismis</span> you can rely on with<span>complete trus!</span></h1>
									<p> Our Kismis are carefully selected to ensure the highest quality, offering you a sweet and nutritious snack you can enjoy anytime.</p>
								 
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->
    <!-- Company Show Start -->
    <main class="container py-5 bg-blue-50">
        <h1 class="text-3xl font-semibold text-center py-4">Our Product</h1>
        <div class="Top-company-grid">
            <?php
            // Include the database connection
            include('db.php');

            // Fetch all products from the database
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);

            // If there are products in the database
            if ($result && mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                echo "<p class='text-center text-red-600'>No products found.</p>";
            }

            if (isset($products)) {
                foreach ($products as $product) {
                    // Handle images (fallback if empty)
                    $image1 = !empty($product['image']) ? $product['image'] : 'https://via.placeholder.com/150';

                    $product_id = $product['pid'];
                    echo "<div class='Top-company-card Top-fade-in'>
                <a href='view_company_profile.php?id={$product_id}'>
                    <!-- Main image -->
                    <img src='Company/productPic/{$image1}' alt='Product Image' />
                    <h2 class='text-center font-bold mt-2'>{$product['pname']}</h2>
                    <div class='text-start'> 
                        <p><strong>Price:</strong> ₹{$product['price']}</p>
                         
                    </div>
                </a>

              

                <!-- Add to Cart Button -->
                <div class='mt-3 text-center'>
                    <form action='cart.php' method='POST'>
                        <input type='hidden' name='product_id' value='{$product_id}' />
                        <button type='submit' class='bg-green-500 text-white px-3 py-2.5 rounded hover:bg-green-700'>
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>";
                }
            }
            ?>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="viewMore.php" class="see-more-btn text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-700">See
                more</a>
        </div>
    </main>

    <!-- Company Show End -->



    <!-- <section>
		<div class="trusted-section">
			<div class="trusted-text">
				<h3> Trusted by 1000+ medical enterprises and 7 lakhs+ MSMEs for healthcare solutions and services.
				</h3>
			</div>

			<marquee behavior="scroll" direction="left" scrollamount="5">
				<div class="Hightlight-company-logos">
					<img alt="Bajaj logo" height="100" src="Company/profilePic/logo1.png" width="100" />
					<img alt="Allianz logo" height="100" src="Company/profilePic/logo2.png" width="100" />
					<img alt="Flipkart logo" height="100" src="Company/profilePic/logo3.png" width="100" />
					<img alt="BigBasket logo" height="100" src="Company/profilePic/logo4.png" width="100" />
					<img alt="HDFC Bank logo" height="100" src="Company/profilePic/logo5.png" width="100" />
					<img alt="Swiggy logo" height="100" src="Company/profilePic/logo6.png" width="100" />
					<img alt="Uber logo" height="100" src="Company/profilePic/logo7.png" width="100" />
					<img alt="Swiggy logo" height="100" src="Company/profilePic/logo8.png" width="100" />
					<img alt="Uber logo" height="100" src="Company/profilePic/logo9.png" width="100" />
					<img alt="Swiggy logo" height="100" src="Company/profilePic/logo10.png" width="100" />
				</div>
			</marquee>
		</div>
	</section> -->



    <!-- end health section -->
                <!-- Footer Area -->
<footer id="footer" class="footer">

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <!-- Footer Logo -->
                <div class="col-lg-3 col-md-6 col-12">
                     <div class="single-footer">
                   
                        <a href="index.php">
                            <img src="img/logo/logo2.png" alt="Kismis Logo"
                                 
                                >
                        </a>
                     </div>
                </div>

                <!-- About Us -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>About Us</h2>
                        <p>
                            Kismis is a healthy snack full of energy. <br>
                            Eating kismis daily is good for digestion and immunity.
                        </p>
                        <!-- Social Icons -->
                        <ul class="social">
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/leeladhr23?igsh=MXUxdWRtdTk2N2R4ZQ==" target="_blank"><i class="icofont-instagram"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Open Hours -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>Open Hours</h2>
                        <p>We are available at the following times:</p>
                        <ul class="time-sidual">
                            <li class="day">Monday - Friday <span>8.00 - 20.00</span></li>
                            <li class="day">Saturday <span>9.00 - 18.30</span></li>
                            <li class="day">Sunday <span>9.00 - 15.00</span></li>
                        </ul>
                    </div>
                </div>

         
                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>Contact Us</h2>
                        <ul class="contact-info">
                            <li><i class="icofont-phone"></i> +123 456 7890</li>
                            <li><i class="icofont-email"></i> info@kismis.com</li>
                            <li><i class="icofont-location-pin"></i> 123 Street Name, City</li>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                            <input name="email" placeholder="Your email address" class="common-input"
                                onfocus="this.placeholder=''" onblur="this.placeholder='Your email address'" required type="email">
                            <button class="button" type="submit">
                                <i class="icofont icofont-paper-plane"></i>
                            </button>
                        </form>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Footer Top -->

    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright-content">
                        <p>© Copyright 2025 | All Rights Reserved by <b>@avi</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright -->

</footer>
<!-- End Footer Area -->

 
    <!--/ End Footer Area -->

    <!-- jquery Min JS -->
    <script src="js/jquery.min.js"></script>
    <!-- jquery Migrate JS -->
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <!-- jquery Ui JS -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Easing JS -->
    <script src="js/easing.js"></script>
    <!-- Color JS -->
    <script src="js/colors.js"></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- Jquery Nav JS -->
    <script src="js/jquery.nav.js"></script>
    <!-- Slicknav JS -->
    <script src="js/slicknav.min.js"></script>
    <!-- ScrollUp JS -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Niceselect JS -->
    <script src="js/niceselect.js"></script>
    <!-- Tilt Jquery JS -->
    <script src="js/tilt.jquery.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="js/owl-carousel.js"></script>
    <!-- counterup JS -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Steller JS -->
    <script src="js/steller.js"></script>
    <!-- Wow JS -->
    <script src="js/wow.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up CDN JS -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>