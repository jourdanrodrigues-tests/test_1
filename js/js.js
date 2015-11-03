$(document).ready(function(){
    $("body").fadeTo(600, 1,"swing");
});
function loadFile(url){
    if(/css$/.test(url)&&$("link[href='"+url+"']").length===0) $("head").append("<link rel='stylesheet' href='"+url+"'>");
    else if(/js$/.test(url)&&$("script[src='"+url+"']").length===0) $("head").append("<script src='"+url+"'></script>");
}