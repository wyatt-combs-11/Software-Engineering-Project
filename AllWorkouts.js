

$(document).ready(function(){

    console.log("JQUERY IS WORKING?");
    
    $("#test").mouseenter(function(){
        $("#h3").hide();
    })

    $("#test").mouseleave(function() {
        $("#h3").show();
    })

  });