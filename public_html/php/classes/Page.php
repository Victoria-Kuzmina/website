<?
class Page{
  private $id;
  private $title;
  private $theme;
  private $theme_name;
  private $category;
  private $category_name;
  private $content;
  function __construct($id,$title,$theme,$category,$content,$theme_name,$category_name){
    $this->id = $id;
    $this->title = $title;
    $this->theme = $theme;
    $this->category=$category;
    $this->content =$content;
    $this->category_name = $category_name;
    $this->theme_name = $theme_name;
  }
  public function getId(){return $this->id;}
  public function getTitle(){return $this->title;}
  public function getTheme(){return $this->theme;}
  public function getThemeName(){return $this->theme_name;}
  public function getCategory(){return $this->category;}
  public function getCategoryName(){return $this->category_name;}
  public function getContent(){return $this->content;}
  public function getBreadcrumb($path,$siteUrl){
    $countPath = count($path);
    $breadcrumb_titles = [$this->category_name,$this->theme_name,$this->title];
    $breadcrumb = '<li class="breadcrumb-item"><a href="'.$siteUrl.'index.html#main">Главная</a></li>';
    for ($i=1; $i<$countPath; $i++){
      $siteUrl .= $path[$i].'/';
      if ($i+1==$countPath)
        $breadcrumb.='<li class="breadcrumb-item active">'.$breadcrumb_titles[$i-1].'</li>';
      else
        $breadcrumb.='<li class="breadcrumb-item"><a href="'.$siteUrl.'">'.$breadcrumb_titles[$i-1].'</a></li>';
    }
    return $breadcrumb;
  }
  
  /*Отдаёт страницу*/
  public static function getPage($category,$theme,$page){
    global $mysqli;
    if (empty($page)) {
      $content ='';
      $sql = "SELECT * FROM `content`,`category`,`theme` WHERE `theme`.`theme_url`='$theme' and `category`.`category_url`='$category' and `content`.`theme` = `theme`.`id` and `category`.`id`=`category`";
      $result = $mysqli->query($sql);
      while ($row = $result->fetch_assoc()){
        $content .= '
        <p class="h5 mb-2">
          <a href="'.get_site_url().$category.'/'.$theme.'/'.$row['page_name'].'">'.$row['title'].'</a>
        </p>
        ';
        $title = $row['theme_name'];
        $category_name = $row['category_name'];
      }
      
      $page = new Page(null,$title,$theme,$category,$content,$title,$category_name);
    }
    else{
      $sql = "SELECT * FROM `content`,`category`,`theme` WHERE `page_name`='$page' and `theme`.`theme_url`='$theme' and `category`.`category_url`='$category'";
      $result = $mysqli->query($sql);
      $result = $result->fetch_assoc();
      $page = new Page($result['id'],$result['title'],$result['theme'],$result['category'],$result['content'],$result['theme_name'],$result['category_name']);
    }
    if (empty($page->getTitle())) $page = new Page(null,null,null,null,'<h1 class="text-center mb-5 w-100">404 страница не найдена</h1>');
    return $page;
  }
  /*Отдаёт страницу по ID*/
  public static function getPageById($page_id){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `content` WHERE `id`='$page_id'");
    $result = $result->fetch_assoc();
    return new Page($page_id,$result['title'],$result['theme'],$result['category'],$result['content']);
  }
  
  /*Отдаёт страницы*/
  public static function getPages(){
    global $mysqli;
    $result = $mysqli->query("SELECT `content`.`id`, `title`, `content`, `category`.`category_name`, `theme`.`theme_name` FROM `content`,`category`,`theme` WHERE `category`.`id`=`category` AND `theme`.`id`=`theme`");
    $arr = [];
    while ($row = $result->fetch_assoc()){
      $arr[] = new Page($row['id'],$row['title'],null,null,null,$row['theme_name'],$row['category_name']);
    }
    return $arr;
  }
  public static function addPage($title,$category,$theme,$content){
    global $mysqli;
    $page_name = str_replace(' ','_',$title);
    $mysqli->query("INSERT INTO `content`(`title`, `theme`, `category`, `content`, `page_name`) VALUES ('$title','$theme','$category','$content','$page_name')");
  }
  
  /* Редактирует страницу */
  public static function updatePage($page_id,$title,$category,$theme,$content){
    global $mysqli;
    $mysqli->query("UPDATE `content` SET `title`='$title',`theme`='$theme',`category`='$category',`content`='$content' WHERE `id`='$page_id'");
  }
  
  public static function getCategoryList(){
    global $mysqli;
    $category_list = array();
    $result = $mysqli->query("SELECT * FROM `category`");
    while ($row = $result->fetch_assoc()){
      $category_list[] = $row;
    }
    return $category_list;
  }
  public static function getThemeList(){
    global $mysqli;
    $theme_list = array();
    $result = $mysqli->query("SELECT * FROM `theme`");
    while ($row = $result->fetch_assoc()){
      $theme_list[] = $row;
    }
    return $theme_list;
  }
  
  public static function addTheme($theme_name,$theme_url,$theme_img){
    global $mysqli;
    $uploaddir = 'images/';
    $file_hash_name = md5(microtime()).basename($theme_img['name']);
    $uploadfile = $uploaddir.$file_hash_name;
    move_uploaded_file($theme_img['tmp_name'], $uploadfile);
    $mysqli->query("INSERT INTO `theme`(`theme_name`, `theme_url`, `theme_img`) VALUES ('$theme_name','$theme_url','$file_hash_name')");
  }
}
?>