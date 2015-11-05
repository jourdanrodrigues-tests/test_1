$(document).ready(function(){
    loadContent("signup");
});
function formSubmit(){
    signUp();
    return false;
}
function signUp(){
    $(".btn-primary").html("Aguarde...");
    $.ajax({
        data:{
            name:$(".name").val(),
            email:$(".email").val(),
            age:$(".age").val()
        },
        type:"post",
        url:"php/signup.php",
        success:function(data){
            var obj=JSON.parse(data);
            swal({title:obj.msg,type:obj.type},function(){$(".btn-primary").html("Cadastrar");});
            if(obj.type!=="error") loadContent('list');
        },
        error:function(){swal({title:erro[1],type:"error"},function(){$(".btn-primary").html("Cadastrar");});}
    });
}
function loadFile(url){
    if(/css$/.test(url)&&$("link[href='"+url+"']").length===0) $("head").append("<link rel='stylesheet' href='"+url+"'>");
    else if(/js$/.test(url)&&$("script[src='"+url+"']").length===0) $("head").append("<script src='"+url+"'></script>");
}