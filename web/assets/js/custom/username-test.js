/* User: @jdperea59 */

$(document).ready(function () {
   $(".username-input").keyup(function () {
       var nick = this.value;
       if(nick.length >=4){
       $.ajax({
          url: URL+'/username_test',
           data: {username: nick},
           type: 'POST',
           success: function (response) {
                if(response == "used"){
                    $(".username-input").css("border", "1px solid red");
                }else{
                    $(".username-input").css("border", "1px solid green");
                }
           }
       });
       } else{
           $(".username-input").css("border", "1px solid red");
       }
   })
});