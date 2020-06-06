<?
  function get_site_url(){
    return 'http://'.$_SERVER['SERVER_NAME'].'/'; // http://new.slavovest.info/
  }
  header('Content-type: text/html; charset=utf-8');
  $path = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
  session_start();
  require_once('php/db.php');
  require_once('php/classes/Page.php');
  require_once('php/classes/User.php');
  
  if ($path[1]=='auth' and empty($path[2])){
    require_once('view/auth.php');
    exit;
  }
  else if ($path[1]=='userAuthorization' and empty($path[2])){
    exit(User::userAuthorization($_POST['login'],$_POST['pass'])?"1":"0");
  }
  else if ($path[1]=='admin' and empty($path[2])){
    empty($_SESSION['id'])?header('Location: auth'):require_once('view/dashboard.php');
  }
  else if ($path[1]=='updatePage' and empty($path[2])){
    if (empty($_POST['page_id'])) 
      exit(Page::addPage($_POST['title'],$_POST['category'],$_POST['theme'],$_POST['content']));
    else 
      exit(Page::updatePage($_POST['page_id'],$_POST['title'],$_POST['category'],$_POST['theme'],$_POST['content']));
  }
  else if ($path[1]=='course_sections' and empty($path[2])){
    header('Location: '.get_site_url().'#course');
  }
  else if ($path[1]=='addTheme' and empty($path[2])){
    Page::addTheme($_POST['theme_name'],$_POST['theme_url'],$_FILES['theme_img']);
  }
  else if (empty($path[1])){
    require_once('view/index.php');
  }
  else{
    $page = Page::getPage($path[1],$path[2],$path[3]);
    require_once('view/page.php');
  }
?>