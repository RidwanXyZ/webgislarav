$(document).ready(function (){
    console.log("Loaded");
    $('#click').click(function()
    {
        $("#leftSide").animate({width:'toggle'},500);
    });
})
