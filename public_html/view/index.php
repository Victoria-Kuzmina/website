<?
$theme_list = Page::getThemeList();
$theme = '';
  foreach ($theme_list as $c){
  $theme .= '
    <div class="col-md-6" style="background-image:url(images/'.$c['theme_img'].')">
  		<div><a href="course_sections/'.$c['theme_url'].'">'.$c['theme_name'].'</a></div>
  	</div>';
  }
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>«Электронная воскресная школа для взрослых»</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
  </head>
  <body>
  
    <div class="super_container">
    	
    	<!-- Header -->
    
    	<header class="header">
    		<!-- Header Content -->
    		<div class="header_container">
    			<div class="container">
    				<div class="row">
    					<div class="col">
    						<div class="header_content d-flex flex-row align-items-center justify-content-start">
                <!-- <div class="logo_container">
    								<a href="#">
    									<div class="logo"><img src="images/logo.png" alt=""></div>
    									<div class="logo_text">mimosan</div>
    								</a>
    							</div>-->
    							<nav class="main_nav_contaner m-auto">
    								<ul class="main_nav">
    									<li class="active"><a href="#main">Главная</a></li>
    									<li><a href="#about">Общая информация</a></li>
    									<li><a href="#course">Содержание курса</a></li>
    									<li><a href="#course2">Факультативные занятия</a></li>
    									<li><a href="#contact-us">Контакты</a></li>
    								</ul>
    								<div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
    							</nav>
    
    							<!-- Hamburger -->
    
    							<div class="hamburger ml-auto">
    								<i class="fa fa-bars" aria-hidden="true"></i>
    							</div>
    
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    
    		<!-- Header Search Panel -->
    		<div class="header_search_container">
    			<div class="container">
    				<div class="row">
    					<div class="col">
    						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
    							<form action="#" class="header_search_form">
    								<input type="search" class="search_input" placeholder="Search" required="required">
    								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
    									<i class="fa fa-search" aria-hidden="true"></i>
    								</button>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>			
    		</div>			
    	</header>
    
    	<!-- Menu -->
    
    	<div class="menu d-flex flex-column align-items-center justify-content-center">
    		<div class="menu_content">
    			<div class="cross_1 d-flex flex-column align-items-center justify-content-center"><img src="images/logo.png" alt=""></div>
    			<form action="#" class="menu_search_form">
    				<input type="search" class="menu_search_input" placeholder="Search" required="required">
    				<button class="menu_search_button d-flex flex-column align-items-center justify-content-center">
    				<i class="fa fa-search" aria-hidden="true"></i>
    			</button>
    			</form>
    			<nav class="menu_nav">
    				<ul>
    					<li class="active"><a href="#main">Главная</a></li>
								<li><a href="#about">Общая информация</a></li>
								<li><a href="#course">Содержание курса</a></li>
								<li><a href="#course2">Факультативные занятия</a></li>
								<li><a href="#contact-us">Контакты</a></li>
    				</ul>
    			</nav>
    		</div>
    		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    	</div>
    
    	<!-- Home -->
      <a id="main"></a>
    	<div class="home">
    		<div class="home_background" style="background-image:url(images/index.jpg)"></div>
    		<div class="home_content text-center">
    			<div class="container p-4" style="background:rgb(0,0,0,.5);">
    				<div class="row">
    					<div class="col">
    						<div class="home_title">«Электронная воскресная школа для взрослых»</div>
    						<div class="home_text">при храмовом комплексе преподобного Сергия Радонежского на Рязанке (Москва)</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    
    	<!-- Event -->
    
    	<div class="event">
    		<div class="container">
    			<div class="row">
    				<div class="col">
    					<div class="event_container d-flex flex-lg-row flex-column align-items-center justify-content-start">
    						<div class="event_date d-flex flex-column align-items-center justify-content-center">
    							<div class="event_day">19</div>
    							<div class="event_month">Апреля</div>
    						</div>
    						<div class="event_content">
    							<div class="h3 text-dark">Пасха</div>
    							<ul class="event_row">
    								<li>
    									<span>Светлое Христово Воскресение — самый большой и светлый христианский праздник</span>
    								</li>
    							</ul>
    						</div>
    						<div class="event_timer_container ml-lg-auto">
    							<ul class="event_timer">
    								<li><div id="day" class="event_num">00</div><div class="event_ss">day</div></li>
    								<li><div id="hour" class="event_num">00</div><div class="event_ss">hrs</div></li>
    								<li><div id="minute" class="event_num">00</div><div class="event_ss">min</div></li>
    								<li><div id="second" class="event_num">00</div><div class="event_ss">sec</div></li>
    							</ul>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    
    	<!-- About -->
      <a id="about"></a>
    	<div class="about">
    		<div class="container">
    			<div class="row">
    				<div class="col">
    					<div class="section_title_container text-center">
    						<div class="section_title">Общая информация</div>
    						<div class="section_subtitle">«Электронная воскресная школа для взрослых»</div>
    					</div>
    				</div>
    			</div>
    			<div class="row about_row">
    				<div class="col-sm-6">
    					<div class="about_image"><img src="images/about.jpg" alt=""></div>
    				</div>
    				<div class="col-sm-6">
    						<div class="about_text">
    							<p> Электронная воскресная школа создана для прихожан Храмового комплекса преподобного Сергия Радонежского на Рязанке, 
    							    а также для всех православных христиан, не имеющих возможности посещать воскресные школы при храмах. 
    							    К сожалению, наличие воскресных школ для взрослых при православных храмах на сегодняшний день можно 
    							    встретить очень не часто, так как все школы в основном работают только с детьми. 
    							    Поэтому создание Электронной воскресной школы должно внести свою лепту в распространении религиозных 
    							    знаний среди взрослого населения.
    							 </p>
    							 <p>
                      Подход к созданию электронной школы основан на большом (с 1992 года)
                      опыте автора и разработчика по преподаванию различных дисциплин в
                      воскресных школах для взрослых при Православных храмах Москвы и Московской
                      области и выбора тематик, вызывающих
                      наибольший интерес у слушателей.
                      Автор и разработчик — преподаватель воскресной школы при Храмовом комплексе пр.Сергия Радонежского, профессор-Ершов Виталий Юрьевич.
                      Основной курс дистанционного обучения включил в себя историю Ветхого Завета, изучение Нового
                      Завета, историю распространения христианства, образование и развитие
                      Христианской церкви. Особое внимание уделено истории Русской Православной
                      Церкви и историческому формированию православного богослужения.
                      Факультативно в курс будут включаться обзоры других мировых
                      религий, образование различных сект, течений и многое другое.
                      Лекции и занятия читаются автором на популярном языке для лиц не обладающих специальной
                      подготовкой.
    							</p>
    						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    
    	<!-- Содержание курса -->
      <a id="course"></a>
    	<div class="sermons">
    		<div class="container">
    			<div class="row">
    				<div class="col">
    					<div class="section_title_container text-center">
    						<div class="section_title">Содержание курса</div>
    					</div>
    				</div>
    			</div>
    			<div class="row course_row">
    				<?=$theme?>
    			</div>
    		</div>
    	</div>
  
      <!-- Содержание курса -->
      <a id="course2"></a>
  		<div class="container my-5">
  			<div class="row my-5">
  				<div class="col">
  					<div class="section_title_container text-center">
  						<div class="section_title">Факультативные занятия</div>
  					</div>
  				</div>
  			</div>
  			<div class="row course_row">
  				<div class="col-md-4" style="background:#e9dac3">
  					<div><a href="sermon.html">Христианство во 2-ом тысячелетии за пределами Руси</a></div>
  				</div>
  				
  				<div class="col-md-4" style="background:#e5ddca">
  					<div><a href="sermon.html">Обзор наиболее крупных сект</a></div>
  				</div>
  
  				<div class="col-md-4" style="background:#e9dac3">
  					<div><a href="sermon.html">Православные святые (помогающие при болезнях и целители) и их эпохи</a></div>
  				</div>
  				
  			</div>
  		</div>
    
    	<!-- Footer -->
      <a id="contact-us"></a>
    	<footer class="footer">
    		<div class="footer_background parallax-window" data-parallax="scroll" data-image-src="images/footer.jpg" data-speed="0.8"></div>
    		<div class="container">
    			<div class="row">
    
    				<!-- Footer - Contact -->
    				<div class="col-lg-6 footer_col">
    					<div class="footer_column footer_contact_column">
    						<div class="footer_contact">
    							<ul>
    								<li><div><i class="fa fa-map-marker" aria-hidden="true"></i></div><span>Москва Окская ул. 17 Воскресная школа для взрослых при  Храмовом комплексе преподобного Сергия Радонежского.</span></li>
    								<li><div><i class="fa fa-envelope" aria-hidden="true"></i></div><span>kama46@yandex.ru</span></li>
    							</ul>
    						</div>
    					</div>
    				</div>
    
    				<!-- Footer - Links -->
    				<div class="col-lg-6 footer_col">
    					<div class="footer_column footer_links">
    						<div class="footer_title">Меню</div>
    						<ul class="footer_links_list">
							    <li><a href="#main">Главная</a></li>
									<li><a href="#about">Общая информация</a></li>
									<li><a href="#course">Содержание курса</a></li>
									<li><a href="#course2">Факультативные занятия</a></li>
									<li><a href="#contact-us">Контакты</a></li>
    						</ul>
    					</div>
    				</div>
    
    			</div>
    			<div class="row copyright_row">
    				<div class="col">
    					<div class="copyright_container d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
    						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Powered by <a href="https://vozhzhaev.ru" target="_blank">Vladlen Vozhzhaev</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</footer>
    </div>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>