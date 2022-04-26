<?php
function staticKey()
{
    static $var =0;
    echo "$var </br>";
    ++$var;
}

staticKey();
staticKey();
staticKey();
?>