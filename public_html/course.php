<?php
  require_once('admin/php/db.php');
  require_once('admin/php/classes/Page.php');
  $category = $_GET['category'];
  $theme = $_GET['theme'];
  $page = $_GET['page'];
  $content = '';
  if (!empty($category) and !empty($page) and !empty($theme)){
    $page = Page::getPage($category,$theme,$page);
    $title = $page->getTitle();
    $content = $page->getContent();
  }
  else {
    $result = $mysqli->query("SELECT * FROM `content`");
    while ($row = $result->fetch_assoc()){
    $video_url = $row['video_url'];
    $video_url = explode("https://youtu.be/",$video_url)[1];
    $content .= '
      <!-- News Post -->
      <div class="col-xl-4 col-lg-6 news_post_col">
      	<div class="news_post">
      		<div class="news_image">
      		  <iframe width="100%" height="315" src="https://www.youtube.com/embed/'.$video_url.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      		</div>
      		<div class="news_post_content">
      			<div class="news_post_title">
      				<a href="course.php?category='.$row['category'].'&theme='.$row['theme'].'&page='.$row['title'].'">'.$row['title'].'</a>
      			</div>
      		</div>
      	</div>
      </div>
    ';
    }
  }
  
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://new.slavovest.info/styles/bootstrap4/bootstrap.min.css">
    <link href="http://new.slavovest.info/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://new.slavovest.info/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://new.slavovest.info/styles/blog.css">
    <link rel="stylesheet" type="text/css" href="http://new.slavovest.info/styles/blog_responsive.css">
    <link rel="stylesheet" type="text/css" href="http://new.slavovest.info/styles/main_styles.css">
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
    									<li class="active"><a href="http://school.kuzvi.beget.tech/#main">Главная</a></li>
    									<li><a href="http://school.kuzvi.beget.tech/#about">Общая информация</a></li>
    									<li><a href="http://school.kuzvi.beget.tech/#course">Содержание курса</a></li>
    									<li><a href="http://school.kuzvi.beget.tech/#course2">Факутальтивные занятия</a></li>
    									<li><a href="http://school.kuzvi.beget.tech/#contact">Контакты</a></li>
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
  					<li class="active"><a href="http://school.kuzvi.beget.tech/#main">Главная</a></li>
  					<li><a href="http://school.kuzvi.beget.tech/#abou">Общая информация</a></li>
  					<li><a href="http://school.kuzvi.beget.tech/#course">Содержание курса</a></li>
  					<li><a href="http://school.kuzvi.beget.tech/#course2">Факультативные занятия</a></li>
  					<li><a href="http://school.kuzvi.beget.tech/#contact">Контакты</a></li>
  				</ul>
    			</nav>
    		</div>
    		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    	</div>
      
    
    	<div class="news">
    	  <div class="container">
      	  <nav aria-label="breadcrumb">
            <ol class="breadcrumb" id="breadcrumb">
              <li class="breadcrumb-item"><a href="http://school.kuzvi.beget.tech/index.html#main">Главная</a></li><li class="breadcrumb-item"><a href="http://school.kuzvi.beget.tech/course_sections/">Содержание курса</a></li><li class="breadcrumb-item active">Развитие Христианства в первом тысячелетии н.э.</li>            </ol>
          </nav>
        </div>
    		<div class="container">
    			<div class="row mb-5">
    				<div class="col">
    					<div class="section_title_container text-center">
    						<div class="section_title"><?= $title;?></div>
    					</div>
    				</div>
    			</div>
    				<!-- News Post -->
    		      <?= $content;?>
        
        	</div>
    	</div>
    
      <!-- Footer -->
      <a id="contact-us"></a>
    	<footer class="footer">
    		<div class="footer_background parallax-window" data-parallax="scroll" data-image-src="http://new.slavovest.info/images/footer.jpg" data-speed="0.8"></div>
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
    
    <script src="http://new.slavovest.info/js/jquery-3.2.1.min.js"></script>
    <script src="http://new.slavovest.info/styles/bootstrap4/popper.js"></script>
    <script src="http://new.slavovest.info/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="http://new.slavovest.info/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="http://new.slavovest.info/plugins/easing/easing.js"></script>
    <script src="http://new.slavovest.info/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="http://new.slavovest.info/plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="http://new.slavovest.info/js/custom.js"></script>
    <script>
              //<li class="breadcrumb-item "><a href="#">Library</a></li>
              //<li class="breadcrumb-item active" aria-current="page">Data</li>
              //breadcrumb
      let path = location.pathname.split('/');
      let upPath = '../';
      for (let i=1; i<path.length; i++){
        let li = document.createElement('li');
        if (i==path.length-1){
          li.className = 'breadcrumb-item active';
          li.innerHTML = path[i];
        }
        else {
          li.className = 'breadcrumb-item';
          li.innerHTML = `<a href="${upPath.repeat(path.length-1)}${path[i-1]}/${path[i]}">${path[i]}</a>`;
        }
        breadcrumb.append(li);
      }
    </script>
  </body>
</html>