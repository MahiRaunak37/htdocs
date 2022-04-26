<?php
    if(isset($_POST["name"]) || isset($_POST["age"]))
    {
        echo "Hello your name is ".$_POST['name']."</br>";
        echo "Your age is ".$_POST['age']."Year";
        exit();
    }
?>

<html>
<body>
    <form action="<?php $_PHP_SELD ?>" method ="POST">
        Name <input type= "text" name = "name"/>
        Age <input type = "text" name = "age"/>
        <input type = "submit"/>
    </form>
</body>
</html>