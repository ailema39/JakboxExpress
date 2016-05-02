<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Jakbox Express</title>

    <!-- Styling -->
    <link href="css/style.css" rel="stylesheet"/>
	<link href="css/magnific-popup.css" rel="stylesheet"/>
	<link href="//fonts.googleapis.com/css?family=Roboto%3A400%2C700%7CSource+Sans+Pro%3A700%2C900&amp;subset=latin" rel="stylesheet"/>
	   	
	<script src="js/modernizr.custom.24530.js" type="text/javascript"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="images/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="images/apple-touch-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="images/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon-180x180.png"/>
    <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="images/favicon-194x194.png" sizes="194x194"/>
    <link rel="icon" type="image/png" href="images/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/png" href="images/android-chrome-192x192.png" sizes="192x192"/>
    <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16"/>
    <link rel="manifest" href="images/manifest.json"/>
    <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#5bbad5"/>
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <meta name="msapplication-TileColor" content="#da532c"/>
    <meta name="msapplication-TileImage" content="images/mstile-144x144.png"/>
    <meta name="msapplication-config" content="images/browserconfig.xml"/>
    <meta name="theme-color" content="#ffffff"/>
	
</head>
<body>
	
	<!-- MAIN PAGE CONTAINER -->
	<div class="boxed-container">
		
		<!-- TOP BAR -->
		<div class="top">
			
			<div class="container">
				
				<nav class="top__menu">
					<ul class="top-navigation js-dropdown">
						<li>
							<a href="faq.html">Preguntas Frecuentes</a>
						</li>
					</ul> 
				</nav>
			
			</div><!-- /.container -->
		
		</div><!-- /.top -->
		
		<!-- HEADER -->
		<div class="header_container">
			
			<div class="container">
				
				<header class="header">
					
					<div class="header__logo">
						<a href="index.html">
							<img class="img-responsive" srcset="images/logo.png" alt="Jakbox Express" src="images/logo.png">
						</a>
						<button data-target="#cargopress-navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
							<span class="navbar-toggle__text">MENU</span>
							<span class="navbar-toggle__icon-bar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</span>
						</button>
					</div><!-- /.header__logo -->
					
					<div class="header__navigation">
						<nav class="collapse navbar-collapse" id="cargopress-navbar-collapse">
							<ul class="main-navigation js-main-nav js-dropdown">
								<li class="current-menu-item"><a href="index.html">Inicio</a></li>
								<li><a href="about.html">Sobre Nosotros</a></li>
								<li><a href="tracking.html">Tracking</a></li>
								<li><a href="calculator.html">Calculadora</a></li>
								<li><a href="contact.html">Cont&aacute;ctenos</a></li>
							</ul>
						</nav>
					</div><!-- /.header__navigation -->
					
					<div class="header__widgets">
						
						<div class="widget-icon-box">
							
							<div class="icon-box">	
								<i class="fa fa-headphones"></i>
								<h4 class="icon-box__title">Ll&aacute;menos</h4>
								<span class="icon-box__subtitle">1-888-123-4567</span>
							</div>
						
						</div>
						
						<div class="widget-icon-box">
							
							<div class="icon-box">	
								<i class="fa fa-clock-o"></i>
								<h4 class="icon-box__title">Horario Hoy</h4>
								<span class="icon-box__subtitle" id="schedule"></span>
							</div>
						
						</div>
					
						<div class="widget-icon-box">
							
							<div class="icon-box">
								<i class="fa fa-envelope-o"></i>
								<h4 class="icon-box__title">Escr&iacute;banos</h4>
								<span class="icon-box__subtitle">info@jakboxexpress.com</span>
							</div>
							
						</div>
					
						<a target="_self" class="btn btn-info" id="button_requestQuote">REG&Iacute;STRESE</a>
				
					</div><!-- /.header__widgets -->
			
				</header>
			
			</div><!-- /.container -->
		
		</div><!-- /.header_container -->
		
		<!-- JUMBOTRON -->
		<div class="jumbotron jumbotron--with-captions">
			
			<div>
 
				<div class="carousel-inner">
										
					<div class="item active">
						<img id="slide" alt="POR TIERRA O AIRE, NO HAY PARADA PARA NOSOTROS" sizes="100vw" srcset="images/slider_1_1920.jpg 1920w, images/slider_1_425.jpg 425w" src="images/slider_1.jpg">
                        <div class="container">
							<div class="jumbotron-content">
								<div class="jumbotron-content__title">
									<h1>POR TIERRA O AIRE, NO HAY NADA QUE NOS DETENGA</h1>
								</div>
								<div class="jumbotron-content__description">
									<p class="p1">
										<span class="s1">Partiendo desde la carga hasta la descarga y manteniendo los m&aacute;s altos est&aacute;ndares en t&eacute;rminos de seguridad mientras est&aacute; en tr&aacute;nsito, no dejamos nada al azar.</span>
									</p>
									<a target="_self" href="about.html" class="btn btn-primary">M&Aacute;S DETALLES</a>
								</div>
							</div>
						</div>
					</div><!-- /.item -->
					
				</div><!-- /.carousel-inner -->				
				
			</div><!-- /.carousel -->
			
		</div><!-- /.jumbotron -->
        
        <!-- ABOUT / QUICK QUITE / GALLERY / FAQ -->
		<div class="container">
			
			<div class="row margin-bottom-60">
				
				<div class="col-sm-6">
					
					<h3 class="widget-title big lined">
						<span>ABOUT US</span>
					</h3>
					<p>
						But i must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete count of the system, and expound the actual teaings of the great explorer idea announcing. But i must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete count of the system, and expound the actual teaings of the great explorer idea announcing.
					</p>
					<p>
						But i must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and i will give you a complete count of the system, and expound the actual teaings of the great explorer idea announcing.
					</p>
					<p>
						<a href="about.html" class="read-more">READ MORE</a>
					</p>
					
				</div><!-- /.col -->
				
				<div class="col-sm-6" id="quickQuoteForm_wrapper">
					
					<div class="featured-widget">
						
						<h3 class="widget-title">
							REQUEST A QUICK QUOTE
						</h3>
						
						<p>
						But i must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete count.
						</p>
						
						<form data-toggle="validator" method="post" action="form.php" id="quickQuoteForm" class="aSubmit">
							<div style="display:none"><input type="text" name="maximus" value=""></div>
							<input type="hidden" name="subject" value="CargoPress: Quick Quote Request">
							<div class="contact-form-small">
								<div class="row">
									<div class="col-xs-12  col-md-6">
										<div class="form-group">
											<input type="text" placeholder="First and Last Name *" aria-invalid="false" aria-required="true" size="40" value="" name="name" required>
										</div>
										<div class="form-group">
											<input type="email" placeholder="E-mail address" aria-invalid="false" aria-required="true" size="40" value="" name="email" required>
										</div>
										<select aria-invalid="false" name="service">
											<option value="Cargo">Cargo</option>
											<option value="Ground Transport">Ground Transport</option>
											<option value="Logistic Service">Logistic Service</option>
											<option value="Storage">Storage</option>
											<option value="Trucking Service">Trucking Service</option>
											<option value="Warehousing">Warehousing</option>
										</select>
									</div>
									<div class="col-xs-12  col-md-6">
										<div class="form-group">
											<input type="text" placeholder="Subject *" aria-invalid="false" aria-required="true" size="40" value="" name="subject" required>
										</div>
										<div class="form-group">
											<textarea placeholder="Message *" aria-invalid="false" rows="10" cols="40" name="message" required></textarea>
										</div>
									</div>
									<div class="col-xs-12  col-md-12">
										<input type="submit" class="btn btn-primary pull-right" value="SEND MESSAGE">
										<img class="ajax-loader" id="loader" src="images/ajax-loader.gif" alt="Sending ..." style="display:none;">
									</div>
								</div><!-- /.row -->
								<div class="response success">Your message was sent; we'll be in touch shortly!</div>
								<div class="response error">Unfortunately, we could not sent your message right now. Please try again.</div>
							</div><!-- /.contact-form-small -->
						</form>
						
					</div><!-- /.featured-widget -->
					
				</div><!-- /.col -->
				
			</div><!-- /.row -->
			
		</div><!-- /.container -->
		
		<!-- FOOTER -->
		<footer class="footer">
			
			<div class="footer-bottom">
				
				<div class="container">
					
					<div class="footer-bottom__right">
						Copyright &copy; 2016&ndash;2022 Jakbox Express. Todos los derechos reservados. 
					</div>
					
				</div><!-- /.container -->
				
			</div><!-- /.footer-bottom -->
			
		</footer>
		
	</div><!-- /.boxed-container -->
	
	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="js/bootstrap/carousel.js"></script>
	<script src="js/bootstrap/transition.js"></script>
	<script src="js/bootstrap/button.js"></script>
	<script src="js/bootstrap/collapse.js"></script>
	<script src="js/bootstrap/validator.js"></script>
	<script src="js/underscore.js"></script>
	<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="js/SimpleMap.js"></script>
	<script src="js/NumberCounter.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/custom.js"></script>
	
    
    <script type="text/javascript">
        $( document ).ready(function() {
            setTodaySchedule();
            verticalAdjustment();
            
            $(window).resize(function() {
                verticalAdjustment();
            });
        });
        
        function verticalAdjustment(){
            var a = $(window).height() -  $('body').height();
            
            if(a > 0){
                var b = $('#slide').outerHeight() + a;
                $('#slide').height(b);
            } else {
                $('#slide').height('auto');
                verticalAdjustment();
            }
        };
        
        function setTodaySchedule() {
            var a = new Date().getDay();
            
            switch (a) { 
            	case 0: 
            		$('#schedule').text('CERRADO');
            		break;
            	case 6: 
            		$('#schedule').text('08:00 - 12:00');
            		break;
            	default:
            		$('#schedule').text('08:00 - 17:00');
            }
        };
    </script>
</body>
</html>