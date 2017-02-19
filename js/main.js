$( document ).ready(function() {
    var toggled = false;
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    $( "#collapse-left-navbar" ).click(function() {
        if (w >= 766) { // if viewport is larger than 766
            if (toggled == false) {
                var leftNav = $("#left-nav");
                var Content = $(".container");
                var chatArea = $("#chat-box");
                var chatBox = $("#chatType");
                leftNav.css("left", "-270px");
                chatArea.css("left","40px");
                chatBox.css("left","40px");
                Content.css("left", "-270px");
                Content.css("position", "relative");
                toggled = true;
            } else {
                var leftNav = $("#left-nav");
                var Content = $(".container");
                var chatArea = $("#chat-box");
                var chatBox = $("#chatType");
                leftNav.css("left", "0px");
                chatArea.css("left","270px");
                chatBox.css("left","320px");
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
            $.ajax ({
                type: "GET",
                dataType: 'json',
                url: '/save_json.php',
                success: function() { alert("Enter Pressed and Ajax working");},
                failure: function() { alert("Enter Pressed and Ajax not working");}
            });
            $("#chatType").val("");
        }
    }
});
