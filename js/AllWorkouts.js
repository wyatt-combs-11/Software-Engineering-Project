

$(document).ready(function(){

    $("#description").hide();
    console.log("JQUERY IS WORKING?");
    
    $("#test").mouseenter(function(){
        $("#exercise").fadeOut(250);
        setTimeout(function(){
            $("#description").show();
        },250);
    })

    $("#test").mouseleave(function() {
        $("#description").hide();
        $("#exercise").fadeIn(250);
    })

    /*
    $("#lightdarkTog").onclick(function() {
        var theme = document.getElementsByTagName('link')[0];
        if (theme.getAttribute('href') == "baseWebsite.css") {
            theme.setAttribute('href', "baseWebsiteDark.css");
        } else {
            theme.setAttribute('href', "baseWebsite.css");
        }
    })
    */





  });

  
  