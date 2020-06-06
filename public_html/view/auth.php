<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/signin.css">
    <title>Вход администратора</title>
  </head>
  <body class="text-center">
    <form class="form-signin" action="php/auth_obr.php" method="POST" onsubmit="return false;">
      <h1 class="h3 mb-3 font-weight-normal">Вход администратора</h1>
      <label for="inputEmail" class="sr-only">Login</label>
      <input name="login" type="email" id="inputEmail" class="form-control" placeholder="Login" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div id="info" style="display:none; color:red;">Логин или пароль не верный!</div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
      <p class="mt-5 mb-3 text-muted">&copy; <script>document.write(new Date().getFullYear());</script></p>
    </form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $('form').submit(function(){
        $('#info').hide();
        let formData = new FormData(this);
        console.log();
        $.ajax({
          method: "POST",
          url: "userAuthorization",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response){
            if (response=="1") location.href="admin";
            else $('#info').show();
          }
        });
      });
    </script>
  </body>
</html>