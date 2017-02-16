$( document ).ready(function() {
    var toggled = false;

    $( "#collapse-left-navbar" ).click(function() {
        if (toggled == false){
            var leftNav = $("#left-nav");
            var Content = $(".container");
            var ChatBox = $("#chatType")
            leftNav.css("left","-270px");
            Content.css("left","-270px");
            Content.css("position","relative");
            ChatBox.css("left","5vh");
            ChatBox.css("width","50%");
            toggled = true;
        } else {
            var leftNav = $("#left-nav");
            var Content = $(".container");
            var ChatBox = $("#chatType")
            leftNav.css("left","0px");
            Content.css("position","relative");
            Content.css("left","0px");
            ChatBox.css("left","35vh");
            ChatBox.css("width","70%");
            toggled = false;
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
