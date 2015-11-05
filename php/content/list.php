<?php
require_once("../mainFunctions.php");
function __autoload($class){autoload("../",$class);}
$people=new People();
$obj=json_decode($people->getPeople());
echo "
    <div class='panel-heading'>Lista de inscritos</div>
    <div class='panel-body'>
    <table class='table'><thead><tr><th>Nome</th><th>Email</th><th>Idade</th></tr></thead><tbody>";
foreach($obj->people as $guy) echo "<tr><td>$guy->name</td><td>$guy->email</td><td>$guy->age</td></tr>";
echo "</tbody></table></div>";