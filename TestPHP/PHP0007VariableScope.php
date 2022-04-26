<?php
$globalScope = 15;      //global scope
function globalSCope()
{
    global $globalScope;
    echo "<p> Variable globalScope inside function is:- $globalScope </p>";
}
globalSCope();

echo "<p> Variable globalScope outside function is:- $globalScope </p>";
?>

<?php
function LocalScope()
{
    $LocalVariable = 20;
    echo "<p> Variable LocalScope inside function is:- $LocalVariable </p>";
}
LocalScope();
?>
