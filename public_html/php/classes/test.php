<?
class Person{
  private $name;
  private $age;
  public static $qwerty = '123456';
  function __construct($n, $a){
    $this->name = $n;
    $this->age  = $a;
  }
  public function getName(){return $this->name;}
  public function getAge(){return $this->age;}
  public function setAge(){
    if($this->age<$num) 
    $this->age=$num;
  }
}

echo Person::$qwerty;

$Alex = new Person('Alex',22);
$Igor = new Person('Igor',55);
/*$Alex->setAge(12);
echo $Alex->getAge();*/
?>