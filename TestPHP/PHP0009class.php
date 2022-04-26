

<?php
 class Fruit 
 {
    public $name;
    public $color;

    function set_name($name,$color)
    {
        $this -> name = $name;
        $this -> color = $color;
        //this-> $color = $color;
    }
    
    function get_name()
    {
        return $this-> name;
        return $this->color; 
    }
 }

 $fruit1 = new Fruit();
 $fruit2 = new Fruit();

 $fruit1->set_name('Apple','red');
 $fruit2 ->set_name('banana','yellow');

 echo $fruit1->get_name();
 echo "<br>";
 echo $fruit2->get_name();

?>