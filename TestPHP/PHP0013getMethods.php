<?php
    if(isset($_GET["name"]) || isset($_GET["age"]))
    {
        echo "Hello your name is ".$_GET['name']."</br>";
        echo "Your age is ".$_GET['age']."Year";
        exit();
    }
?>

<html>
<body>
    <form action="<?php $_PHP_Self ?>" method ="GET">
        Name <input type= "text" name = "name"/>
        Age <input type = "text" name = "age"/>
        <input type = "submit"/>
    </form>
</body>
</html>