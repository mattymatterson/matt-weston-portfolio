$( document ).ready(function() {
    var toggled = false;
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    $( "#collapse-left-navbar" ).click(function() {
        if (w >= 766) { // if viewport is larger than 766
            if (toggled == false) {
                var leftNav = $("#left-nav");
                var Content = $(".container");
                var chatArea = $("#chat-box");
                var header = $("#header-bar");
                var chatBox = $("#chatType");
                leftNav.css("left", "-270px");
                header.css("left","30px");
                chatArea.css("left","40px");
                chatBox.css("left","40px");
                Content.css("left", "-270px");
                Content.css("position", "relative");
                toggled = true;
            } else {
                var leftNav = $("#left-nav");
                var Content = $(".container");
                var chatArea = $("#chat-box");
                var header = $("#header-bar");
                var chatBox = $("#chatType");
                leftNav.css("left", "0px");
                header.css("left","300px");
                chatArea.css("left","300px");
                chatBox.css("left","310px");
                Content.css("position", "relative");
                toggled = false;
            }
            if (w <= 765) {
                { //if viewport is smaller than 765
                    if (toggled == false) {
                        var leftNav = $("#left-nav");
                        var Content = $(".container");
                        var chatBox = $("#chatType");
                        leftNav.css("left", "-120px");
                        chatBox.css("left","40px");
                        Content.css("left", "30px");
                        Content.css("position", "relative");
                        toggled = true;
                    } else {
                        var leftNav = $("#left-nav");
                        var Content = $(".container");
                        var chatBox = $("#chatType");
                        leftNav.css("left", "0px");
                        chatBox.css("left","160px");
                        Content.css("position", "relative");
                        Content.css("left", "0px");
                        toggled = false;
                    }
                }
            }
        }
    }); //end nav collapse
    $("#Profile").click(function(){
        $("#profileMenu").toggle();
    });
});
$(document).keypress(function(e) {
    if ($("#chatType").is(":focus")) {
        if(e.which == 13) {
            $.post( "type.php",  { data: $("#chatType").val() }  );
            
            $("#chatType").val("");
        }
    }
});
