<?php
require_once("mainFunctions.php");
function __autoload($class){autoload("",$class);}
$people=new People();
$people->getPeople();