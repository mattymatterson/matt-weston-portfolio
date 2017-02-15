function createNewChat(name, initials, chatPosOrig, amtChats, chatPosMod, chatOffset) {
    var newChat = document.createElement('button');
    newChat.id = initials + "Chat"
    newChat.textContent = name;
    newChat.className = 'online';
    newChat.style.position = "fixed";
    newChat.style.zIndex = "9999999999";
    newChat.style.bottom = "0px";
    newChat.style.right = 150 + (amtChats* chatPosMod) + chatOffset;
    document.getElementById("chatContainer").appendChild(newChat);
    amtChats += 1;

}
function createChatBoxes(initials, amtChats, chatPosMod, chatOffset) {
    var newChatBox = document.createElement('div');
    newChatBox.id = initials + "chatBox";
    newChatBox.className = 'onlineList';
    newChatBox.style.position = "fixed";
    newChatBox.style.right = 150 + (amtChats* chatPosMod) + chatOffset;
    newChatBox.display = "none";
}
$(document).ready(function() {
    var chatPosOrig = document.getElementById("chat").style.width;
    var chatOffset = (Math.max(document.documentElement.clientWidth, window.innerWidth || 0)/100)*9;
    var chatPosMod = 150;
    var amtChats = 0;
    $("#chat").click(function(){
        $(".onlineList").toggle();
    });
    $("#mw").click(function(){
        if (document.getElementById("mwChat") == null) {
            createNewChat("Matt Weston", "mw", chatPosOrig, amtChats, chatPosMod, chatOffset);
            amtChats +=1;
            $("#mwChat")(function(){
                alert("clicked!");
            });
        }
    });
    $("#qc").click(function(){
        if (document.getElementById("qcChat") == null) {
            createNewChat("Quin Carter", "qc", chatPosOrig, amtChats, chatPosMod, chatOffset);
            createChatBoxes("qc", amtChats, chatPosMod, chatOffset);
            amtChats +=1;
        }
    });
    $("#lm").click(function(){
        if (document.getElementById("lmChat") == null) {
            createNewChat("Logan McCourry", "lm",  chatPosOrig, amtChats, chatPosMod, chatOffset);
            createChatBoxes("lm", amtChats, chatPosMod, chatOffset);
            amtChats +=1;
        }
    });
});