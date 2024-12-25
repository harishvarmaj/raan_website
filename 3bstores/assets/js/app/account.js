var userMobile = "";
function account() {
   // this.host = "http://billfiniti.com/oilkart/";
}
account.prototype = function () {
  
    init = function() {
        
    },
    getUser = function() {
        var id  = localStorage.getItem("user_oilkart_id");
     $.ajax({
            url  : BASE_URL+"profile/"+id, 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            success:function(data) {
                $("#fname").val(data.data.name).change();
                $("#mail").val(data.data.email).change();
                $("#d_mobileNo").val(data.data.phone).change();
                userMobile = data.data.phone;
                $(".profilePanel input").attr("disabled",true);
                 if(data.data.profile_image == null) {
                    $("#profilePicture").html('<img style="height: 85%;" class="img-circle" src="assets/imgs/site/account_icon.png"/>');
                } else {
                    $("#profilePicture").html('<img style="height: 85%;" class="img-circle" src="'+BASE_IMAGE_URL+''+data.data.profile_image+'"/>');
                }
            }
            
            });
    },
    editInfo = function() {
        
    }
    
    return {
    init: init,
    getUser:getUser,
    editInfo:editInfo
  }
}();

var account = new account();
