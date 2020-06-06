<? session_start();
  if (empty($_SESSION['id'])) {
    header('Location: auth.php');
    exit;
  }
  
  require_once('php/db.php');
  require_once('php/classes/Page.php');
  
  $page_id = $_GET['page_id'];
  $page = Page::getPageById($page_id);



  /* Достаём список категорий */
  $result = $mysqli->query("SELECT * FROM `category`");
  $category = '';
  while ($row = $result->fetch_assoc()){
    $category .= '<option value="'.$row['id'].'">'.$row['category_name'].'</option>';
  }
  /* Достаём список тем */
  $result = $mysqli->query("SELECT * FROM `theme`");
  $theme = '';
  while ($row = $result->fetch_assoc()){
    $theme .= '<option value="'.$row['id'].'">'.$row['theme_name'].'</option>';
  }
?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CLEEditor/jquery.cleditor.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"crossorigin="anonymous"></script>
    <script src="CLEEditor/jquery.cleditor.min.js"></script>
    <script>
        $(document).ready(function () { $("#content").cleditor({
          height: 500
          }); });
    </script>
    <title>Редактирование страницы <?=$page->getTitle();?></title>
  </head>
  <body>
    <div class="container my-5">
      <h1 class="text-center">Редактирование страницы</h1>
      <form onsubmit="return false;">
        <input type="hidden" name="page_id" value="<?=$page_id?>">
        <div class="form-group">
          <input required name="title" type="text" placeholder="Заголовок" class="form-control" value="<?= $page->getTitle() ?>">
        </div>
        <div class="form-group">
          <textarea id="content" name="content"><?=$page->getContent() ?></textarea>
        </div>
        <div class="form-group">
          <select name="category">
            <?= $category ?>
          </select>
        </div>
        <div class="form-group">
          <select name="theme" id="">
           <?= $theme ?>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="form-control btn btn-primary" value="Внести изменения">
        </div>
      </form>
      <div class="text-center" id="info" style="display:none;">
        <p class="h2">Материал успешно отредактирован</p>
        <button class="btn btn-primary" id="add_content">Редактировать ещё раз</button>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $('form').submit(function(){
        let form = this;
        let formData = $(this).serializeArray();
        let data='';
        $.each(formData,function(){
          data += this.name+'='+this.value+'&';
        });
        
        $.ajax({
          method: "POST",
          url: "../updatePage",
          data: data,
          success: function(msg){
             console.log( form );
             $(form).hide();
             $('#info').show();
           }
        });
      });
      
      $('#add_content').click(()=>{
        $('form').show().trigger("reset"); 
        $('#info').hide();
      });
    </script>
  </body>
</html>