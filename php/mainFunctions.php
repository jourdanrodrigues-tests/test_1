<?php
function searchFiles($folder,$file){
    // Função para inserção automática de classes
    if (is_dir($folder)){
        if (file_exists("$folder/$file")) return "$folder/$file";
        $dirs=array_diff(scandir($folder,1),array(".",".."));
        foreach ($dirs as $dir)
            if (is_dir("$folder/$dir")&&searchFiles("$folder/$dir",$file)!==false)
                return searchFiles("$folder/$dir",$file);
    }else return false;
}
function autoload($path,$class){
    // Conteúdo da função "__autoload"
    $folder=$path."class";
    $class.=".php";
    $file=searchFiles($folder,$class);
    if ($file!==false) require_once $file;
    else AJAXReturn("{'type':'error','message':'Não foi possível encontrar o arquivo \'$class\'.'}");
}
function loadFiles($var){
    // exemplo -> "{'extension':['file1','file2',...,'filen']}" *file sem a extensão
    $obj=json_decode(fixJSON($var));
    if(isset($obj->js)) foreach($obj->js as $file) echo "<script src='js/$file.js'></script>";
    else if(isset($obj->css)) foreach($obj->css as $file) echo "<link rel='stylesheet' href='css/$file.css' />";
}
function post($var){return filter_input(INPUT_POST,$var);} // Filtro para variáveis $_POST
function server($var){return filter_input(INPUT_SERVER,$var);} // Filtro para variáveis $_SERVER
function swal($var){
    $obj=json_decode(fixJSON($var));
    echo "<script>$(document).ready(function(){swal({title:'$obj->title',type:'$obj->type'";
    if(isset($obj->time)) echo ",time:$obj->time";
    echo "}";
    if(isset($obj->funcScope)){
        if(!isset($obj->funcParam)) $obj->funcParam="";
        echo ",function($obj->funcParam){ $obj->funcScope}";
    }
    echo ");});</script>";
}
function AJAXReturn($var){
    $obj=json_decode(fixJSON($var));
    echo '{"type":"'.$obj->type.'","msg":"'.$obj->msg.'"}';
}
function fixJSON($var){
    return str_replace("'","\"",$var);
}