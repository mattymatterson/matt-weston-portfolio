$( document ).ready(function() {
    var toggled = false;
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    $( "#collapse-left-navbar" ).click(function() {
        if (w > 767) {
            if (toggled == false){
                var leftNav = $("#left-nav");
                var Content = $(".container");
                leftNav.css("left","-270px");
                Content.css("left","-270px");
                Content.css("position","relative");
                toggled = true;
            } else {
                var leftNav = $("#left-nav");
                var Content = $(".container");
                leftNav.css("left","0px");
                Content.css("position","relative");
                Content.css("left","0px");
                toggled = false;
            } else { //if viewport is smaller than 677
                if (toggled == false){
                    var leftNav = $("#left-nav");
                    var Content = $(".container");
                    leftNav.css("left","-120px");
                    Content.css("left","30px");
                    Content.css("position","relative");
                    toggled = true;
                } else {
                    var leftNav = $("#left-nav");
                    var Content = $(".container");
                    leftNav.css("left","0px");
                    Content.css("position","relative");
                    Content.css("left","0px");
                    toggled = false;
                }
         }
    });
    $("#Profile").click(function(){
        $("#profileMenu").toggle();
    });
});
$(document).keypress(function(e) {
    if ($("#chatType").is(":focus")) {
        if(e.which == 13) {
            alert('You pressed enter!');
        }
    }  
});
