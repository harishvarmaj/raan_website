function mainModule() {
    
}

mainModule.prototype = function () {
  
    init = function() {
        
    },
    login = function(event) {
        var mobile = $("#loginForm #mobileNo").val();
        var paswd = $("#loginForm #paswd").val();
        if(mobile=="") {
           $("#loginForm #mobileNo").focus();
        } else if(paswd=="") {
           $("#loginForm #paswd").focus();
        } else {
            $.ajax({
            url  : BASE_URL+"login", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data : {
                login:mobile,
                password:paswd
            },
            success:function(data) {
                
               if(data.status == 0) {
                    Swal.fire({
                      type: 'error',
                      title: 'Oops!',
                      text: 'Invalid Credentials. Please try again!'
                    })
               } else if(data.status == 1) {
                   var phone = data.data.phone;
                   localStorage.setItem("user_oilkart_loggedIn","true");
                   localStorage.setItem("user_oilkart_id",data.data.id);
                   localStorage.setItem("user_oilkart_email",data.data.email);
                   localStorage.setItem("user_oilkart_name",data.data.name);
                   localStorage.setItem("user_oilkart_phone",data.data.phone);
                   localStorage.setItem("user_oilkart_roleid",data.data.role_id);
                   localStorage.setItem("api_token",data.data.api_token);
                   $("#loginModal").modal('hide');
                   loadUser();
                   if(data.data.phone_verified_at==null) {
                       sessionStorage.setItem("otpFor","verifyMobile");
                       Swal.fire({
                          title: 'You have not verified your mobile number',
                          text: "Clicking Yes will send OTP to your registered mobile. Should I proceed?",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, verify!'
                        }).then((result) => {
                          if (result.value) {
                             $.ajax({
                                url  : BASE_URL+"otp", 
                                type : "POST",
                                dataType: 'json',
                                crossDomain:true,
                                data : {
                                    api_token:localStorage.getItem("api_token"),
                                    mobile:phone,
                                    action:"register"
                                },
                                success:function(data) {
                                    //console.log(data);
                                    var html='';
                                    if(data.status == 1) {
                                       $(".registeredMobile").text("Enter your One Time Password (OTP) which is sent to your registered Mobile no. +91 XXXXXXX"+phone.substr(7,10));
                                       $("#cp_otp").modal("show");
                                       setTimeout(function(){
                                            $("#otp_value").focus();
                                        },500)
                                    }
                                }

                            });
                          }
                        })
                      
                    }
                   checkGuestCartItems();
               }
            }
            
            });   
        }
        event.preventDefault();
    },
    signup = function(event) {
        var email = $("#signupForm #email").val();
        var name = $("#signupForm #name").val();
        var mobile = $("#signupForm #mobile").val();
        var paswd = $("#signupForm #s_paswd").val();
        if(email=="") {
           $("#signupForm #email").focus();
        } else if(name=="") {
           $("#signupForm #name").focus();
        }else if(mobile=="") {
           $("#signupForm #mobile").focus();
        } else if(paswd=="") {
           $("#signupForm #s_paswd").focus();
        } else if($("#agreed:checked").length<1) {
          $("#agreed").focus();  
             Swal.fire({
                      type: 'error',
                      title: 'Oops!',
                      text: 'Please accept the terms and conditions!'
                })
        } else {
            $.ajax({
            url  : BASE_URL+"signup", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data : {
                email:email,
                password:paswd,
                phone:mobile,
                name:name,
                referal:$("#referalCode").val()
            },
            success:function(data) {
              //console.log(data);
                var phone = data.data.phone;
                if(data.status == 1) {
                    $("#signupModal,#loginModal").modal("hide");
                    $("#signupSuccessModal").modal("show");
                   localStorage.setItem("user_oilkart_loggedIn","true");
                   localStorage.setItem("user_oilkart_id",data.data.id);
                   localStorage.setItem("user_oilkart_email",data.data.email);
                   localStorage.setItem("user_oilkart_name",data.data.name);
                   localStorage.setItem("user_oilkart_phone",data.data.phone);
                   localStorage.setItem("user_oilkart_roleid",data.data.role_id);
                   localStorage.setItem("api_token",data.data.api_token);
                   loadUser();
                   checkGuestCartItems();
                     sessionStorage.setItem("otpFor","verifyMobile");
                       Swal.fire({
                          title: 'You have not verified your mobile number',
                          text: "Clicking Yes will send OTP to your registered mobile. Should I proceed?",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, verify!'
                        }).then((result) => {
                          if (result.value) {
                             $.ajax({
                                url  : BASE_URL+"otp", 
                                type : "POST",
                                dataType: 'json',
                                crossDomain:true,
                                data : {
                                    api_token:localStorage.getItem("api_token"), 
                                    mobile:phone,
                                    action:"register"
                                },
                                success:function(data) {
                                    //console.log(data);
                                    var html='';
                                    if(data.status == 1) {
                                       $(".registeredMobile").text("Enter your One Time Password (OTP) which is sent to your registered Mobile no. +91 XXXXXXX"+phone.substr(7,10));
                                       $("#cp_otp").modal("show");
                                       setTimeout(function(){
                                            $("#otp_value").focus();
                                        },500)
                                    }
                                }

                            });
                          }
                        })

                }
            }
            
            });   
        }
        event.preventDefault();
    },
    loadUser = function() {
        if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
           $("#userTab").css({"display":"none"});
            $("#userTab_loggedIn").css({"display":"block"});
            $(".app_name").html(localStorage.getItem("user_oilkart_name"));
            $(".navBar1 li:eq(0)").css({"display":"flex"});
        } else {
            $("#userTab").css({"display":"block"});
        }
    },
    logout = function() {
        Swal.fire({
          title: 'Are you sure?',
          text: "Are you sure to logout from Clipshoppers?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, get me out!'
        }).then((result) => {
          if (result.value) {
            if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
           $("#userTab").css({"display":"block"});
            $("#userTab_loggedIn").css({"display":"none"});
            localStorage.setItem("user_oilkart_loggedIn","false");
            localStorage.setItem("user_oilkart_id","");
            localStorage.setItem("user_oilkart_email","");
            localStorage.setItem("user_oilkart_name","");
            localStorage.setItem("user_oilkart_phone","");
            localStorage.setItem("user_oilkart_roleid","");
            localStorage.setItem("api_token","");
            $(".navBar1 li:eq(0)").css({"display":"none"});
            window.location.href = "index.php";
            } 
          }
        })
    }

  return {
    init: init,
    login:login,
    signup : signup,
    loadUser:loadUser,
    logout:logout
  }
}();

var main = new mainModule();
setTimeout(function() {
   main.loadUser(); 
},100);

function checkGuestCartItems() {
      // Check guest login items
                   $.ajax({
                    url  : BASE_URL+"guest_cart/"+localStorage.getItem("temp_user_id"), 
                    type : "GET",
                    dataType: 'json',
                    crossDomain:true,
                    success:function(data) {
                        //console.log(data);
                        if(data.status == 1) {
                           if(data.data.length>0) {
                               for(var i=0;i<data.data.length;i++) {
                                   var guestProdId = data.data[i].product_combinations.id;
                                   var prodQuantity = data.data[i].quantity;
                                   $.ajax({
                                        url  : BASE_URL+"cart", 
                                        type : "GET",
                                        dataType: 'json',
                                        crossDomain:true,
                                        data:{
                                            api_token:localStorage.getItem("api_token"),
                                        },
                                        success:function(data2) {
                                           //console.log(data);
                                            var added = false;
                                            if(data2.status == 1) {
                                                for(var j=0;j<data2.data.length;j++) {
                                                    var cartId = data2.data[j].id;
                                                    if(guestProdId == data2.data[j].product_combinations.id) {
                                                        added=true;
                                                       $.ajax({
                                                            url  : BASE_URL+"cart/"+cartId, 
                                                            type : "POST",
                                                            dataType: 'json',
                                                            crossDomain:true,
                                                            data:{
                                                                api_token:localStorage.getItem("api_token"),
                                                                product_variant_combination_id:data2.data[j].product_variant_combination_id,
                                                                _method:"PUT",
                                                                quantity:Number(data2.data[j].quantity) + 1,
                                                                user_id:localStorage.getItem("user_oilkart_id")
                                                            },
                                                            success:function(data) {
                                                               //console.log(data);
                                                                if(data.status == 1) {
                                                                   // clearCart(cartId);
                                                                   window.location.reload(true);
                                                                }
                                                            }

                                                        });
                                                    } 
                                                }
                                                if(!added) {
                                                   $.ajax({
                                                        url  : BASE_URL+"cart", 
                                                        type : "POST",
                                                        dataType: 'json',
                                                        crossDomain:true,
                                                        data:{
                                                            api_token:localStorage.getItem("api_token"),
                                                            product_variant_combination_id:data2.data[j].product_combinations.id,
                                                            user_id:localStorage.getItem("user_oilkart_id"),
                                                            quantity:$("#quantity").val()
                                                        },
                                                        success:function(data) {
                                                           //console.log(data);
                                                            if(data.status == 1) {
                                                               // clearCart(cartId);
                                                                window.location.reload(true);
                                                            } 
                                                        }

                                                    });
                                                }
                                            } else {
                                                 $.ajax({
                                                    url  : BASE_URL+"cart", 
                                                    type : "POST",
                                                    dataType: 'json',
                                                    crossDomain:true,
                                                    data:{
                                                        api_token:localStorage.getItem("api_token"),
                                                        product_variant_combination_id:guestProdId,
                                                        user_id:localStorage.getItem("user_oilkart_id"),
                                                        quantity:prodQuantity
                                                    },
                                                    success:function(data) {
                                                       //console.log(data);
                                                        if(data.status == 1) {
                                                            //clearCart(cartId);
                                                            window.location.reload(true);
                                                        } 
                                                    }

                                                });       
                                            } 
                                        }

            });
                               } 
                           }
                        }
                        
                    }

                    });
}

function clearCart(idValue) {
    $.ajax({
            url  : BASE_URL+"guest_cart/"+idValue, 
            type : "DELETE",
            dataType: 'json',
            crossDomain:true,
            success:function(data) {
               /*//console.log(data);
                if(data.status == 1) {
                    window.location.reload(true);
                } */
            }

        }); 
}