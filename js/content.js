function loadContent(action){
    if(action==="signup"){
        $(".signup").addClass("active");
        $(".list").removeClass("active");
        if(!$(".panel").hasClass("panel-primary")) $(".panel").removeClass("panel-danger").addClass("panel-primary");
        $(".panel").html(signUpContent());
        fadeIn();
    }else if(action==="list"){
        $(".list a").html("Aguarde...");
        $(".list").addClass("active");
        $(".signup").removeClass("active");
        $(".panel").html(listContent());
    }
}
function signUpContent(){
    return  "<div class='panel-heading'>Novo cadastro</div>"+
            "<div class='panel-body'>"+
                "<form class='mainForm' onsubmit='return formSubmit();'>"+
                    "<p class='form-group'><label data-for='name'>Nome</label>"+
                    "<input type='text' class='name form-control' required></p>"+
                    "<p class='form-group'><label data-for='email'>E-mail</label>"+
                    "<input type='email' class='email form-control' required></p>"+
                    "<p class='form-group'><label data-for='age'>Idade</label>"+
                    "<input type='number' class='age form-control' required></p>"+
                    "<div class='btn-group btn-group-justified' role='group' aria-label='...'>"+
                        "<div class='btn-group' role='group'>"+
                            "<button class='btn btn-primary'>Cadastrar</button>"+
                        "</div>"+
                        "<div class='btn-group' role='group'>"+
                            "<input type='reset' class='btn btn-warning' value='Limpar campos'>"+
                        "</div>"+
                    "</div>"+
                "</form>"+
            "</div>";
}
function listContent(){
    $.ajax({
        type:"post",
        url:"php/list.php",
        success:function(data){
            var obj=JSON.parse(data),people="";
            for(i=0;i<obj.people.length;i++)
                people+="<tr><td>"+obj.people[i].name+"</td><td>"+obj.people[i].email+"</td><td>"+obj.people[i].age+"</td></tr>";
            var dataContent="<div class='panel-heading'>Lista de inscritos</div>"+
                        "<div class='panel-body'><table class='table'>"+
                            "<thead><tr><th>Nome</th><th>Email</th><th>Idade</th></tr></thead>"+
                            "<tbody>"+people+"</tbody>"+
                        "</table></div>";
            listAJAX({content:dataContent,sw:["primary","danger"]});
        },
        error:function(){listAJAX({content:erro[0],sw:["danger","primary"]});}
    });
}
function listAJAX(obj){
    if(!$(".panel").hasClass("panel-"+obj.sw[0])) $(".panel").removeClass("panel-"+obj.sw[1]).addClass("panel-"+obj.sw[0]);
    $(".panel").html(obj.content);
    $(".list a").html("Visualizar cadastros");
    fadeIn();
}
function fadeIn(){$("body").fadeTo(600,1,"swing");}