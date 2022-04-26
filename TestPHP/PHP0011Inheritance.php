<!DOCTYPE html>
<html>
<body>
<?php
class Fruit {
  public $name;             //$name is a public 
  public $color;            //$color is a public 

  function __construct($name,$color) {      //Creating a constructor function using __construct . Constructor allows you to initiallize an object's properties upon creation of the object.
    $this->name = $name;            //Here $this->name is instance variable and $name is local variable 
    $this->color = $color; 
  }

  function get_name() {             //Here we creating a function to get the name of the fruit
    return $this->name;                //Its return the values of Instance Variables
  }
  function get_color(){
      return $this->color;
  }

  function __destruct()            //__destruct() function are used to destroy the __constructore class it always call at the last of the programs
  {                                 //Destruct keyword has no attribute.
      echo "<br> The fruit is $this->name and the color is $this->color.";
  }
}

class foods extends Fruit {         //Here foods class extends the Fruit class i.e. Fruit class is the based class and foods class is derived class
    public function message()
    {
        echo "<br> This is the extends class";
    }
}

$apple = new foods("Apple","red");      //creating a object to invoke the constructor
echo $apple->get_name();                //calling the function using object
echo "<br>";
echo $apple->get_color();
echo "<br>";
echo $apple->message();
echo "<br>";
echo $apple->message();


?>
    
</body>
</html>
