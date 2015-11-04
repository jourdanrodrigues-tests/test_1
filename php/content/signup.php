<?php
require_once("../mainFunctions.php");
function __autoload($class){autoload("../",$class);}
if(post("request")==="htmlContent") echo "
    <div class='panel-heading'>Novo cadastro</div>
    <div class='panel-body'>
        <form class='mainForm' onsubmit='return formSubmit();'>
            <p class='form-group'>
                <label data-for='name'>Nome</label>
                <input type='text' class='name form-control' required>
            </p>
            <p class='form-group'>
                <label data-for='email'>E-mail</label>
                <input type='email' class='email form-control' required>
            </p>
            <p class='form-group'>
                <label data-for='age'>Idade</label>
                <input type='number' class='age form-control' required>
            </p>
            <div class='btn-group btn-group-justified' role='group' aria-label='...'>
                <div class='btn-group' role='group'>
                    <button class='btn btn-primary'>Go go</button>
                </div>
                <div class='btn-group' role='group'>
                    <input type='reset' class='btn btn-warning' value='Reset'>
                </div>
            </div>
        </form>
    </div>";
elseif(post("request")==="signUp"){
    $people=new People();
    $people->setAttr("{'name':'".post("name")."','email':'".post("email")."','age':'".post("age")."'}");
    $people->signUp();
}