<?
class User{
  private $id;
  private $name;
  private $lastname;
  private $group;
  public function getId(){}
  public static function getUser($id){}
  public static function getUserList(){}
  public static function addUser(){}
  public static function updateUSer(){}
  
  public static function userAuthorization($login,$pass){
    global $mysqli;
    $login = quotemeta($_POST['login']);
    $pass  = quotemeta($_POST['pass']);
    $login = htmlspecialchars($login);
    $pass  = htmlspecialchars($pass);
    $login = mb_strtolower($login);
    $result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");
    $result = $result->fetch_assoc();
    if (empty($result) or !password_verify($pass,$result['pass'])) return false;
    $_SESSION['id']   = $result['id'];
    return true;
  }
}


?>