

$(document).ready(function(){

    $("#description").hide();
    console.log("JQUERY IS WORKING?");
    
    $("#test").mouseenter(function(){
        $("#exercise").hide();
        $("#description").show();
    })

    $("#test").mouseleave(function() {
        $("#exercise").show();
        $("#description").hide();
    })

  });