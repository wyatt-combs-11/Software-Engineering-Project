

console.log("YES")
$(document).ready(function(){

    $("#runD").hide();
    $("#pushD").hide();
    $("#15D").hide();
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
        $("#run").fadeOut(250);
        setTimeout(function(){
            $("#runD").show();
        },250);
    })

    $("#test").mouseleave(function() {
        $("#runD").hide();
        $("#run").fadeIn(250);
    })

    $("#15HIIT").mouseenter(function(){
        $("#hiit").fadeOut(250);
        setTimeout(function(){
            $("#15D").show();
        },250);
    })

    $("#15HIIT").mouseleave(function() {
        $("#15D").hide();
        $("#hiit").fadeIn(250);
    })

    $("#pushdiv").mouseenter(function(){
        $("#push").fadeOut(250);
        setTimeout(function(){
            $("#pushD").show();
        },250);
    })

    $("#pushdiv").mouseleave(function() {
        $("#pushD").hide();
        $("#push").fadeIn(250);
    })

    $("#pulldiv").mouseenter(function(){
        $("#pull").fadeOut(250);
        setTimeout(function(){
            $("#pullD").show();
        },250);
    })

    $("#pulldiv").mouseleave(function() {
        $("#pullD").hide();
        $("#pull").fadeIn(250);
    })

    $("#legdiv").mouseenter(function(){
        $("#leg").fadeOut(250);
        setTimeout(function(){
            $("#legD").show();
        },250);
    })

    $("#legdiv").mouseleave(function() {
        $("#legD").hide();
        $("#leg").fadeIn(250);
    })

    $("#chestdiv").mouseenter(function(){
        $("#chest").fadeOut(250);
        setTimeout(function(){
            $("#chestD").show();
        },250);
    })

    $("#chestdiv").mouseleave(function() {
        $("#chestD").hide();
        $("#chest").fadeIn(250);
    })

    $("#bicepdiv").mouseenter(function(){
        $("#bicep").fadeOut(250);
        setTimeout(function(){
            $("#bicepD").show();
        },250);
    })

    $("#bicepdiv").mouseleave(function() {
        $("#bicepD").hide();
        $("#bicep").fadeIn(250);
    })

    $("#crossdiv").mouseenter(function(){
        $("#cross").fadeOut(250);
        setTimeout(function(){
            $("#crossD").show();
        },250);
    })

    $("#crossdiv").mouseleave(function() {
        $("#crossD").hide();
        $("#cross").fadeIn(250);
    })

    $("#calfdiv").mouseenter(function(){
        $("#calf").fadeOut(250);
        setTimeout(function(){
            $("#calfD").show();
        },250);
    })

    $("#calfdiv").mouseleave(function() {
        $("#calfD").hide();
        $("#calf").fadeIn(250);
    })

    $("#5kdiv").mouseenter(function(){
        $("#5k").fadeOut(250);
        setTimeout(function(){
            $("#5kD").show();
        },250);
    })

    $("#5kdiv").mouseleave(function() {
        $("#5kD").hide();
        $("#5k").fadeIn(250);
    })

    $("#halfdiv").mouseenter(function(){
        $("#half").fadeOut(250);
        setTimeout(function(){
            $("#halfD").show();
        },250);
    })

    $("#halfdiv").mouseleave(function() {
        $("#halfD").hide();
        $("#half").fadeIn(250);
    })

    $("#marathondiv").mouseenter(function(){
        $("#marathon").fadeOut(250);
        setTimeout(function(){
            $("#marathonD").show();
        },250);
    })

    $("#marathondiv").mouseleave(function() {
        $("#marathonD").hide();
        $("#marathon").fadeIn(250);
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

  
  