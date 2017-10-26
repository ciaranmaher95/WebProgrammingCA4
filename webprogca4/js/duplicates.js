//same as addComment.js

$(document).ready(function(){
var url = window.location.href;
        
        var split = url.toString().split("m=")[1];
        var type = split.toString().split("&name")[0];
        
        //messages returned by Person->validation()
        if(type == 'val')
        {
            var firstsplit= url.toString().split("name=")[1];
            var message1 = firstsplit.toString().split("&email")[0];
            var secondsplit = url.toString().split("email=")[1];
            var message2 = secondsplit.toString().split("&pw")[0];
            var message3 = url.toString().split("pw=")[1];
 
            message1 = message1.replace(/%20/g, " ");
            message2 = message2.replace(/%20/g, " ");
            message3 = message3.replace(/%20/g, " ");
            alert(message1 +'\n'+ message2 +'\n'+ message3);
        }
        
        //messages returned by Person->duplicates()
        else if(type == 'dup')
        {
            var firstsplit= url.toString().split("name=")[1];
            var message1 = firstsplit.toString().split("&email")[0];
            var message2 = url.toString().split("email=")[1];
            
            message1 = message1.replace(/%20/g, " ");
            message2 = message2.replace(/%20/g, " ");
            alert(message1 +'\n'+ message2);
        }

});