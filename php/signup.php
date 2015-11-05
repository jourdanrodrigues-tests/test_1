<?php
require_once("mainFunctions.php");
function __autoload($class){autoload("",$class);}
$people=new People();
$people->setAttr("{'name':'".post("name")."','email':'".post("email")."','age':'".post("age")."'}");
$people->signUp();