<!DOCTYPE html>
<html>
<body>
<?php
class student
{
    public $roll;
    public $name;

    public function __consturct($roll, $name)
    {
        $this->roll = $roll;
        $this->name = $name;
    }

    public function getdata()
    {
        echo "Roll no is {$this->roll} and name is {$this->name}";
    }

}

class stdcls extends student
{
    public $cls;
    public function __consturct($roll,$name,$cls)
    {
        $this->roll = $roll;
        $this->name = $name;
        $this ->cls = $cls;
    }
}
$stddir = new student(23,"Raunak");
echo $stdir->getdata();


?>
    
</body>
</html>
