$(document).ready(function(){

    $("#description").hide();
    $("#description15").hide();
    $("#pushD").hide();
    $("#pullD").hide();
    $("#legD").hide();
    $("#chestD").hide();
    $("#bicepD").hide();
    $("#crossD").hide();
    $("#calfD").hide();
    $("#5kD").hide();
    $("#halfD").hide();
    $("#marathonD").hide();

    console.log("JQUERY IS WORKING?");
    
    $("#test").mouseenter(function(){
        $("#exercise").hide();
        $("#description").show();
    })

    $("#test").mouseleave(function() {
        $("#exercise").show();
        $("#description").hide();
    })

    $("#15HIIT").mouseenter(function(){
        $("#hiit").hide();
        $("#description15").show();
    })

    $("#15HIIT").mouseleave(function() {
        $("#hiit").show();
        $("#description15").hide();
    })

    $("#pushdiv").mouseenter(function(){
        $("#push").hide();
        $("#pushD").show();
    })

    $("#pushdiv").mouseleave(function() {
        $("#push").show();
        $("#pushD").hide();
    })

    $("#pulldiv").mouseenter(function(){
        $("#pull").hide();
        $("#pullD").show();
    })

    $("#pulldiv").mouseleave(function() {
        $("#pull").show();
        $("#pullD").hide();
    })

    $("#legdiv").mouseenter(function(){
        $("#leg").hide();
        $("#legD").show();
    })

    $("#legdiv").mouseleave(function() {
        $("#leg").show();
        $("#legD").hide();
    })

    $("#chestdiv").mouseenter(function(){
        $("#chest").hide();
        $("#chestD").show();
    })

    $("#chestdiv").mouseleave(function() {
        $("#chest").show();
        $("#chestD").hide();
    })

    $("#bicepdiv").mouseenter(function(){
        $("#bicep").hide();
        $("#bicepD").show();
    })

    $("#bicepdiv").mouseleave(function() {
        $("#bicep").show();
        $("#bicepD").hide();
    })

    $("#crossdiv").mouseenter(function(){
        $("#cross").hide();
        $("#crossD").show();
    })

    $("#crossdiv").mouseleave(function() {
        $("#cross").show();
        $("#crossD").hide();
    })

    $("#calfdiv").mouseenter(function(){
        $("#calf").hide();
        $("#calfD").show();
    })

    $("#calfdiv").mouseleave(function() {
        $("#calf").show();
        $("#calfD").hide();
    })
    
    $("#5kdiv").mouseenter(function(){
        $("#5k").hide();
        $("#5kD").show();
    })

    $("#5kdiv").mouseleave(function() {
        $("#5k").show();
        $("#5kD").hide();
    })

    $("#halfdiv").mouseenter(function(){
        $("#half").hide();
        $("#halfD").show();
    })

    $("#halfdiv").mouseleave(function() {
        $("#half").show();
        $("#halfD").hide();
    })

    
    $("#marathondiv").mouseenter(function(){
        $("#marathon").hide();
        $("#marathonD").show();
    })

    $("#marathondiv").mouseleave(function() {
        $("#marathon").show();
        $("#marathonD").hide();
    })


  });