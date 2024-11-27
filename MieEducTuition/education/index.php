<?php
session_start();

// If the user is logged in, the session will have the 'user_id' variable.
if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['first_name']; // Using first_name from the session
} else {
    $username = null;
}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Education &mdash; Free Website Template, Free HTML5 Template by freehtml5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <p class="site">www.MieEducTuition.com</p>
                        <p class="num">Call: +017 835 4199</p>
						<ul class="fh5co-social">
							<li><a href="https://www.facebook.com/mieeductuition?mibextid=LQQJ4d"><i class="icon-facebook2"></i></a></li>
							<li><a href="https://x.com/MieEducTuition"><i class="icon-twitter2"></i></a></li>
							<li><a href="https://www.instagram.com/mieeductuition/"><i class="icon-instagram"></i></a></li>
						</ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i>Educ<span>.</span></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="subject.php">Subject</a></li>
                            <li><a href="teacher.php">Teacher</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="pricing.php">Pricing</a></li>
							<li class="has-dropdown">
								<a href="blog.php">Blog</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li>
                            <li><a href="contact.php">Contact</a></li>

                            <?php if ($username): ?>
                                <!-- If logged in, show username and logout -->
                                <li class="btn-cta"><a href="profile.php"><span><?php echo $username; ?></span></a></li>
                                <li class="btn-cta"><a href="logout.php"><span>Logout</span></a></li>
                            <?php else: ?>
                                <!-- If not logged in, show login and register -->
                                <li class="btn-cta"><a href="login.php"><span>Login</span></a></li>
                                <li class="btn-cta"><a href="register.php"><span>Create Account</span></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
	
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(images/img_bg_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>The Roots of Education are Bitter, But the Fruit is Sweet</h1>
									<h2><a href="http://MieEducTuition.com/" target="_blank">MieEducTuition.com</a></h2>
									<p><a class="btn btn-primary btn-lg" href="#">Start Learning Now!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>The Great Aim of Education is not Knowledge, But Action</h1>
									<h2><a href="http://MieEducTuition.com/" target="_blank">MieEducTuition.com</a></h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Start Learning Now!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>We Help You to Learn New Things</h1>
									<h2><a href="http://MieEducTuition.com/" target="_blank">MieEducTuition.com</a></h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Start Learning Now!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>
	
	<div id="fh5co-course-categories" style="background-image: url(images/grey.png);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Subject categories</h2>
					<span class=""></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-shop"></i>
						</span>
						<div class="desc">
							<h3><a href="bahasa_melayu.php">BAHASA MELAYU</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-heart4"></i>
						</span>
						<div class="desc">
							<h3><a href="bahasa_inggeris.php">BAHASA INGGERIS</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-banknote"></i>
						</span>
						<div class="desc">
							<h3><a href="matematik.php">MATEMATIK</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-lab2"></i>
						</span>
						<div class="desc">
							<h3><a href="sains.php">SAINS</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-photo"></i>
						</span>
						<div class="desc">
							<h3><a href="sejarah.php">SEJARAH</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-home-outline"></i>
						</span>
						<div class="desc">
							<h3><a href="pendidikan_islam.php">PENDIDIKAN ISLAM</a></h3>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div id="fh5co-course-categories" style="background-image: url(images/grey.png);">
		<div class="container">
			<!-- Heading -->
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="section-title">Our Subjects</h2>
				</div>
			</div>
	
			<!-- Subject Cards -->
			<div class="row subject-grid">
				<div class="course">
					<a href="#" class="course-img" style="background-image: url(images/melayu_1653282744.webp);"></a>
					<div class="desc">
						<h3><a href="#">BAHASA MELAYU</a></h3>
						<p></p>
						<span><a href="subject.php" class="btn btn-primary btn-sm btn-course">Take A Subject</a></span>
					</div>
				</div>
				<div class="course">
					<a href="#" class="course-img" style="background-image: url(images/english-1280x640.jpg);"></a>
					<div class="desc">
						<h3><a href="#">BAHASA INGGERIS</a></h3>
						<p></p>
						<span><a href="subject.php" class="btn btn-primary btn-sm btn-course">Take A Subject</a></span>
					</div>
				</div>
				<div class="course">
					<a href="#" class="course-img" style="background-image: url(images/math.jpg);"></a>
					<div class="desc">
						<h3><a href="#">MATEMATIK</a></h3>
						<p></p>
						<span><a href="subject.php" class="btn btn-primary btn-sm btn-course">Take A Subject</a></span>
					</div>
				</div>
				<div class="course">
					<a href="#" class="course-img" style="background-image: url(images/science-logo-design-template_636083-92.avif);"></a>
					<div class="desc">
						<h3><a href="#">SAINS</a></h3>
						<p></p>
						<span><a href="subject.php" class="btn btn-primary btn-sm btn-course">Take A Subject</a></span>
					</div>
				</div>
				<div class="course">
					<a href="#" class="course-img" style="background-image: url(images/sejarah.jpg);"></a>
					<div class="desc">
						<h3><a href="#">SEJARAH</a></h3>
						<p></p>
						<span><a href="subject.php" class="btn btn-primary btn-sm btn-course">Take A Subject</a></span>
					</div>
				</div>
				<div class="course">
					<a href="#" class="course-img" style="background-image: url(images/images.png);"></a>
					<div class="desc">
						<h3><a href="#">PENDIDIKAN ISLAM</a></h3>
						<p></p>
						<span><a href="subject.php" class="btn btn-primary btn-sm btn-course">Take A Subject</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div id="fh5co-blog" style="background-image: url(images/grey.png);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Blog &amp; Events</h2>
					<p>Discover our latest collaborations and educational initiatives with local schools.</p>
				</div>
			</div>
			<div class="row row-padded-mb">
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center">
							<img src="images/smk  bs.jpeg" alt="Event Logo" class="event-logo">
						</div>
						<h3><a href="#">SMK BUKIT SAWA</a></h3>
						<p></p>
					</div>
				</div>
				
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center">
							<img src="images/images smka dguling.jpeg" alt="Event Logo" class="event-logo">
						</div>
						<h3><a href="#">SMKA DURIAN GULING</a></h3>
						<p></p>
					</div>
				</div>
				
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center">
							<img src="images/smk tt.jpeg" alt="Event Logo" class="event-logo">
						</div>
						<h3><a href="#">SMK TUN TELANAI</a></h3>
						<p></p>
					</div>
				</div>				
			</div>

	<div id="fh5co-pricing" class="fh5co-bg-section" style="background-image: url(images/grey.png);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Plan &amp; Pricing</h2>
					<p></p>
				</div>
			</div>
			<div class="row">
				<div class="pricing pricing--rabten">
					<div class="col-md-4 animate-box">
						<div class="pricing__item">
							<div class="wrap-price">
								 <!-- <div class="icon icon-user2"></div> -->
	                     <h3 class="pricing__title">Standart</h3>
	                     <!-- <p class="pricing__sentence">Single user license</p> -->
							</div>
                     <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">RM</span>30.00
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per month</span>
                        </span>
                     </div>
                     <div class="wrap-price">
                     	<ul class="pricing__feature-list">
	                        <li class="pricing__feature">2 Subject</li>
	                        <li class="pricing__feature">Free Notes Book</li>
	                        <li class="pricing__feature">Free Exercise Book</li>
	                     </ul>
						 <p><a href="pricing.php" class="pricing__action">Choose Plan</a></p>
                     </div>
                  </div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="pricing__item">
							<div class="wrap-price">
								<!-- <div class="icon icon-store"></div> -->
	                     <h3 class="pricing__title">Pro</h3>
	                     <!-- <p class="pricing__sentence">Up to 5 users</p> -->
							</div>
                     <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">RM</span>54.00
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per month</span>
                        </span>
                     </div>
                     <div class="wrap-price">
                     	<ul class="pricing__feature-list">
							<li class="pricing__feature">4 Subject</li>
	                        <li class="pricing__feature">Free Notes Book</li>
	                        <li class="pricing__feature">Free Exercise Book</li>
	                     </ul>
	                     <p><a href="pricing.php" class="pricing__action">Choose Plan</a></p>
                     </div>
                 </div>
					</div>
					<div class="col-md-4 animate-box">
                  <div class="pricing__item">
                  	<div class="wrap-price">
                  		<!-- <div class="icon icon-home2"></div> -->
	                     <h3 class="pricing__title">Premium</h3>
	                     <!-- <p class="pricing__sentence">Unlimited users</p> -->
							</div>
                     <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">RM</span>80.00
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per month</span>
                        </span>
                     </div>
                     <div class="wrap-price">
                     	<ul class="pricing__feature-list">
	                        <li class="pricing__feature">6 Subject</li>
	                        <li class="pricing__feature">Free Notes Book</li>
	                        <li class="pricing__feature">Free Exercise Book</li>
	                     </ul>
	                     <p><a href="pricing.php" class="pricing__action">Choose Plan</a></p>
                     </div>
                  </div>
               </div>
            </div>
			</div>
		</div>
	</div>

	<div id="fh5co-testimonial" style="background-image: url(images/school.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2><span>Testimonials</span></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<!-- Danish Irfan's testimonial -->
									<div class="user" style="background-image: url(images/IMG_9803.PNG);"></div>
									<span>DANISH IRFAN<br><small>Students</small></span>
									<blockquote>
										<p>&ldquo;MieEducTuition has completely changed how I approach my studies. 
										The teachers are patient, and their explanations make even the hardest subjects easy to understand. 
										I feel more confident than ever in my academic journey!&rdquo;</p>
									</blockquote>
									<!-- Explanation: Danish Irfan highlights the supportive teaching methods at MieEducTuition 
										 that helped him grasp challenging subjects and boosted his confidence. -->
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<!-- Ahmad Nabil's testimonial -->
									<div class="user" style="background-image: url(images/IMG_9801.PNG);"></div>
									<span>AHMAD NABIL<br><small>Students</small></span>
									<blockquote>
										<p>&ldquo;The personalized learning approach at MieEducTuition helped me excel in math and science. 
										The extra materials and guidance from the tutors have been invaluable for my growth.&rdquo;</p>
									</blockquote>
									<!-- Explanation: Ahmad Nabil emphasizes how MieEducTuition's personalized teaching methods 
										 and additional resources helped him improve significantly in math and science. -->
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<!-- Hafiz Iman's testimonial -->
									<div class="user" style="background-image: url(images/IMG_9802.PNG);"></div>
									<span>HAFIZ IMAN<br><small>Students</small></span>
									<blockquote>
										<p>&ldquo;Studying at MieEducTuition has been an inspiring experience. 
										The interactive classes and regular assessments have kept me motivated and on track 
										to achieve my academic goals.&rdquo;</p>
									</blockquote>
									<!-- Explanation: Hafiz Iman appreciates the engaging and motivating environment at MieEducTuition, 
										 which has helped him stay focused on his educational objectives. -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	


	<div id="fh5co-counter" class="fh5co-counters" style="background-image: url(images/img_bg_4.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-world"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="3297" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Global Reach</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-study"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="3700" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Students Supported</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-bulb"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="5034" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Successful Lessons</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="1080" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Expert Tutors</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-register" style="background-image: url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>Get 400 of Online Classes for Free</h2>
					<h3>By ENCIK HAKIMI AMRI</h3>
					<div class="simply-countdown simply-countdown-one"></div>
					<p><strong>Limited Offer, Hurry Up!</strong></p>
					<p><a href="choose_teacher.php" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-gallery" class="fh5co-bg-section">
		<div class="row text-center">
			<h2><span>Gallery</span></h2>
		</div>
		<div class="row">
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(images/EE_1.jpeg);"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(images/EE_2.jpeg);"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(images/EE_3.jpeg);"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(images/EE_4.jpeg);"></a>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/img_bg_4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h3>About Education</h3>
					<p>Education is the key to unlocking potential and shaping a brighter future.</p>
					<p>Education transforms lives and builds communities.</p>
					<p>Education lights the path to a better world.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learning</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Course</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learn &amp; Grow</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Engage us</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">Visual Assistant</a></li>
						<li><a href="#">System Analysis</a></li>
						<li><a href="#">Advertise</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Legal</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
    <div class="col-md-12 text-center">
        <p>
            <small class="block">&copy; 2024 MieEducTuition. All Rights Reserved.</small> 
            <small class="block">Designed by <a href="index.php" target="_blank">MieEducTuition</a> | Image Sources: <a href="http://unsplash.co/" target="_blank">Unsplash</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels</a></small>
        </p>
    </div>
</div>


		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>
	</body>
</html>

