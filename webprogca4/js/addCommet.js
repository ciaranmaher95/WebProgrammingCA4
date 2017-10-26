
//diplays message if users comment containc prohibited words

$(document).ready(function(){

//retrieves page url
var url = window.location.href;

            //extracts message form url
            var message = url.toString().split("message=")[1];
            //restores blacnk spaces between words
            message = message .replace(/%20/g, " ");
            //alerts user that their comment didn't post
            alert(message);

});