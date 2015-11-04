<!--
    Criar um sistema em que o usuário vai digitar Nome, E-Mail e Idade de pessoas que ele vai cadastrar.
    Ao cadastrar cada pessoa, o usuário será levado a uma listagem das pessoas já cadastradas.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Deway Project</title>
        <meta charset="utf-8" />
        <?php
            require_once("php/mainFunctions.php");
            loadFiles("{'css':['bootstrap','sweetalert','main']}");
            loadFiles("{'js':['libs/jQuery','libs/bootstrap','libs/sweetalert','var','js']}");
        ?>
    </head>
    <body class="col-lg-12">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Deway Project</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                    <ul class="nav navbar-nav">
                        <li class="signup active"><a onclick="loadContent('signup')">Novo cadastro</a></li>
                        <li class="list"><a onclick="loadContent('list')">Visualizar cadastros</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container col-lg-6 col-lg-offset-3"><div class='panel'></div></div>
    </body>
</html>