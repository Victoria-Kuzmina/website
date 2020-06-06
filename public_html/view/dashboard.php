<? 
$pages = Page::getPages();
$content = '
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Заголовок</th>
      <th scope="col">Тема</th>
      <th scope="col">Категория</th>
      <th scope="col">Настройки</th>
    </tr>
  </thead>
  <tbody>';
foreach ($pages as $page){
  $content .= '
    <tr>
      <th scope="row">'.$page->getId().'</th>
      <td>'.$page->getTitle().'</td>
      <td>'.$page->getThemeName().'</td>
      <td>'.$page->getCategoryName().'</td>
      <td><a href="../page_edit.php?page_id='.$page->getId().'">[редактировать]</a></td>
    </tr>';
}
$content .= ' 
  </tbody>
</table>';

$category_list = Page::getCategoryList();
$category = '<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">URL</th>
      <th scope="col">Изображение</th>
      <th scope="col">Настройки</th>
    </tr>
  </thead>
  <tbody id="categoryTbody">';
  foreach ($category_list as $c){
  $category .= '
    <tr>
      <th scope="row">'.$c['id'].'</th>
      <td>'.$c['category_name'].'</td>
      <td>'.$c['category_url'].'</td>
      <td><img width="100%" src="'.$c['category_img'].'"></td>
      <td><a href="#">[редактировать]</a></td>
    </tr>';
  }
  $category .= ' 
    </tbody>
  </table>';
  
  
$theme_list = Page::getThemeList();
$theme = '<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">URL</th>
      <th scope="col">Изображение</th>
      <th scope="col">Настройки</th>
    </tr>
  </thead>
  <tbody id="themeTbody">';
  foreach ($theme_list as $c){
  $theme .= '
    <tr>
      <th scope="row">'.$c['id'].'</th>
      <td>'.$c['theme_name'].'</td>
      <td>'.$c['theme_url'].'</td>
      <td><img width="100%" src="images/'.$c['theme_img'].'"></td>
      <td><a href="#">[редактировать]</a></td>
    </tr>';
  }
  $theme .= ' 
    </tbody>
  </table>';
?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Панель управления</title>
  </head>
  <body>
    
    <div class="container-fluid my-5">
      <div class="row">
        <div class="col-lg-2 col-,d">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-pages-tab" data-toggle="pill" href="#v-pills-pages" role="tab" aria-controls="v-pills-pages" aria-selected="false">Страницы сайта</a>
            <a class="nav-link" id="v-pills-category-tab" data-toggle="pill" href="#v-pills-category" role="tab" aria-controls="v-pills-category" aria-selected="false">Категории сайта</a>
            <a class="nav-link" id="v-pills-theme-tab" data-toggle="pill" href="#v-pills-theme" role="tab" aria-controls="v-pills-theme" aria-selected="false">Темы категорий</a>
          </div>
        </div>
        <div class="col-lg-10 col-md-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-pages" role="tabpanel" aria-labelledby="v-pills-pages-tab">
              <?= $content ?>
              <a href="#" class="btn btn-primary">Добавить страницу</a>
            </div>
            <div class="tab-pane fade" id="v-pills-category" role="tabpanel" aria-labelledby="v-pills-category-tab">
              <?= $category ?>
              <button id="addCategory" class="btn btn-primary">Добавить категорию</button>
            </div>
            <div class="tab-pane fade" id="v-pills-theme" role="tabpanel" aria-labelledby="v-pills-theme-tab">
              <?= $theme ?>
              <button id="addTheme" class="btn btn-primary">Добавить тему</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $('#addTheme').click(function(){
        let t_id = $('#themeTbody>tr').last()[0].cells[0].innerText;
        $('#themeTbody').append(`
          <tr>
            <form id="theme_form_${+t_id+1}" onsubmit="return false;"></form>
            <th scope="row">${+t_id+1}</th>
            <td><input id="theme_name_form_${+t_id+1}" type="text" class="form-control" placeholder="Название"></td>
            <td><input id="theme_url_form_${+t_id+1}" type="text" class="form-control" placeholder="Адрес темы (по английски)"></td>
            <td><input id="theme_file_form_${+t_id+1}" type="file" class="form-control"></td>
            <td><input id="theme_btn_form_${+t_id+1}" form="theme_form_${+t_id+1}" type="submit" value="Сохранить" class="btn btn-success"></td>
          </tr>
        `);
        

        $(`#theme_form_${+t_id+1}`).submit(function(){
          let formData = new FormData();
          formData.append("theme_name",$(`#theme_name_form_${+t_id+1}`).val());
          formData.append("theme_url",$(`#theme_url_form_${+t_id+1}`).val());
          formData.append("theme_img",document.getElementById(`theme_file_form_${+t_id+1}`).files[0]);
          $(`#theme_name_form_${+t_id+1}`).parent().text($(`#theme_name_form_${+t_id+1}`).val());
          $(`#theme_url_form_${+t_id+1}`).parent().text($(`#theme_url_form_${+t_id+1}`).val());
          $(`#theme_img_form_${+t_id+1}`).parent().text('');
          $(`#theme_btn_form_${+t_id+1}`).parent().html('<a href="#">[редактировать]</a>');
          $.ajax({
            method: "POST",
            url: "addTheme",
            data: formData,
            processData: false,
            contentType: false,
            success: function(msg){
              console.log(msg);  
            }
          });
        });
      });



      $('#addCategory').click(function(){
        let t_id = $('#categoryTbody>tr').last()[0].cells[0].innerText;
        $('#categoryTbody').append(`
          <tr>
            <form id="form_${+t_id+1}" onsubmit="return false;"></form>
            <th scope="row">${+t_id+1}</th>
            <td><input id="name_form_${+t_id+1}" type="text" class="form-control" placeholder="Название"></td>
            <td><input id="url_form_${+t_id+1}" type="text" class="form-control" placeholder="Адрес категории (по английски)"></td>
            <td><input id="file_form_${+t_id+1}" type="file" class="form-control"></td>
            <td><input form="form_${+t_id+1}" type="submit" value="Сохранить" class="btn btn-success"></td>
          </tr>
        `);
        

        $(`#form_${+t_id+1}`).submit(function(){
          let formData = new FormData();
          formData.append("category_name",$(`#name_form_${+t_id+1}`).val());
          formData.append("category_url",$(`#url_form_${+t_id+1}`).val());
          formData.append("category_img",document.getElementById(`file_form_${+t_id+1}`).files[0]);
          $.ajax({
            method: "POST",
            url: "addCategory",
            data: formData,
            processData: false,
            contentType: false,
            success: function(msg){
              console.log(msg);  
            }
          });
        });
      });

    </script>
  </body>
</html>