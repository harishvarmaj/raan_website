<style>
/* Navbar container */
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: #201e1e;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
/*  background-color: red;*/
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: fixed;
  background-color: #fff;
  min-width: 175px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 9999;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  z-index: 9999;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #f9f9f9;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content .fa-angle-right {
    margin-top: 3%;
}
.subDropDown {
    position: absolute;
    left: 100%;
    top: 0%;
    background: #f9f9f9;
    width: 87%;
    padding-left: 8%;
}
    .cartItemCount {
            background: red;
            border-radius: 7px;
            font-size: 14px;
            position: relative;
            left: 20px;
            bottom: 8px;
    }
</style>

<script>
    
if(window.location.href.indexOf("3bstores")>=0) {
    var BASE_URL = "http://localhost/3bstores/v1/api/";
    var BASE_IMAGE_URL = "http://localhost/3bstores/v1/storage/app/";
    var title="Clipshoppers";
} else {
    var BASE_URL = "http://billfiniti.com/oilkart/api/";
    var BASE_IMAGE_URL = "http://billfiniti.com/oilkart/storage/app/";
}

</script>
<div class="row headerBar">
    <div class="col-md-2"><a href="index.php"><img src="assets/imgs/logo-dark.png"/></a></div>
    <div class="col-md-5 searchBarDiv">
                <div class="input-group mb-3">
                    <input type="text" class="form-control searchBar" id="searchInput" placeholder="Search for products, brand and more" onkeypress="if(event.keyCode == 13) searchPage();">
                <div class="input-group-append">
                    <span class="input-group-text" onclick="searchPage();" style="cursor:pointer" tabindex="0" title="Search"><i class="fa fa-search"></i></span>
                </div>
            </div>
    </div>
    <div class="col-md-5">
        <div class="row" style="font-size:12px">
            <div class="col-md-12" style="text-align: right;padding-right: 2%;">
                <i class="fa fa-phone-volume yellowColor"></i> &nbsp;
                <span class="greyColor">Have a question? call us </span>
                <span class="blueColor constant_oilkart_phone">+91 98765 43210</span> &nbsp;
                <span style="cursor:pointer" onclick="window.location.href='help.php'" class="yellowColor"><b>Help & Support</b></span>
            </div>
        </div>
        <div class="row location" style="padding-top:4%">
            <div class="col-md-7">
            <!--<i class="fa fa-map-marker-alt yellowColor"></i> &nbsp;
                <span class="pin">641004,</span>
                <span class="area">Peelamedu,</span>
                <span class="city">Coimbatore</span>
                <span class="fa fa-caret-down blueColor"></span>-->
            </div>
            <div class="col-md-5" id="userTab" style="display:none; float:right;">
                <span class="far fa-user yellowColor"></span> <a href="javascript:void(0)" onkeypress="if(event.keyCode == 13) this.click();" data-toggle="modal" data-target="#loginModal"><b class="blueColor">Login</b> | <b class="greyColor">Signup</b></a>
            </div>
            <div class="col-md-5" id="userTab_loggedIn" style="display:none; float:right">
                <div class="dropdown" style="position: static !important;">
                  <button class="btn btn-link dropdown-toggle"  style="padding: 0;margin: 0;text-decoration:none;text-transform: capitalize; float:right;" type="button" data-toggle="dropdown"><span class="far fa-user yellowColor"></span> <b class="blueColor app_name">John Doe</b>
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" style="padding-left:6%">
                      <li><a onclick="window.location.href='myaccount.php'">My Account</a></li>
                      <li><a onclick="main.logout()">logout</a></li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-sm navbar-blue" style="padding:0px;height: 40px;">
  <!-- Links -->
  <ul class="navbar-nav navBar">
    <li class="nav-item navBar-category">
<!--      <a class="nav-link active" href="#">Shop by Category <span class="fa fa-caret-down"></span></a>-->
         <div class="dropdown">
            <button class="dropbtn" style="height:46px">Shop by Category
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="categoryDropdown" style="color:grey">
<!--
                <a href="#">Cocunut Oil <i class="fa fa-angle-right" style="float:right"></i></a>
                    <div class="subDropDown dropDown_COCOIL" style="display:none">
                        <a href="#">Gingerly Oil</a>    
                        <a href="#">Gingerly Oil</a>    
                        <a href="#">Gingerly Oil</a>    
                    </div>
                <a href="#">Gingerly Oil <i class="fa fa-angle-right" style="float:right"></i></a>
                <div class="subDropDown dropDown_COCOIL" style="display:none;">
                        <a href="#">Poorna</a>    
                        <a href="#">SKM</a>    
                        <a href="#">Gingerly Oil</a>    
                    </div>
                <a href="#">Sunflower Oil <i class="fa fa-angle-right" style="float:right"></i></a>
                <a href="#">Groundnut Oil <i class="fa fa-angle-right" style="float:right"></i></a>
                <a href="#">Sunflower Oil <i class="fa fa-angle-right" style="float:right"></i></a>
                <a href="#">Olive Oil <i class="fa fa-angle-right" style="float:right"></i></a>
                <a href="#">Mustard Oil <i class="fa fa-angle-right" style="float:right"></i></a>
                <a href="#">Rice Bran Oil <i class="fa fa-angle-right" style="float:right"></i></a>
-->
            </div>
          </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="offers.php">Offers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="wholeSale.php">Wholesale</a>
    </li>
  </ul>
  <ul class="navbar-nav navBar1">
    <li class="nav-item" style="display:none">
      <a class="nav-link" href="javascript:void(0)" onclick="goToWishList()"><span class="fa fa-heart yellowColor"></span> Wishlist</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="goToMyCart()" href="javascript:void(0)"><span class="cartItemCount">0</span><span class="fa fa-shopping-cart yellowColor"></span> My Cart 
<!--          <span class="fa fa-caret-down"></span>-->
        </a>
    </li>
  </ul> 
</nav>
<form type="post" id="loginForm" onsubmit="main.login(event);">
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" style="width: 130%;">
      <div class="modal-body" style="height:400px;">
        <div class="modalCloseBtn" data-dismiss="modal">X</div>
        <div class="row">
          <div class="col-md-7" style="padding: 3% 8% 7% 7%;">
              <center><h4 style="color:#201e1e">Login to <span class="constant_oilkart_name_camel"></span></h4>
              <p style="font-size:13px;color:#201e1e">Please login to continue</p></center>
              <div class="md-form" style="margin-top: 15%;">
                <input type="text" id="mobileNo" maxlength="10" class="form-control">
                <label for="mobileNo">Mobile</label>
                <img src="assets/imgs/site/login_user.png" class="imgLogin"/>
              </div>
              <div class="md-form">
                <input type="password" id="paswd" class="form-control">
                <label for="paswd">Password</label>
                <img src="assets/imgs/site/login_password.png" class="imgLogin"/>
              </div>
              <div class="md-form" style="text-align:right">
                <a tabindex="0" onclick="forgotPassword();" style="font-size:12px;color:#ff8f03">Forgot Password?</a>
              </div>
              <div class="md-form" style="text-align:center">
                <button type="submit" class="btn btn-primary" tabindex="0" style="width:50%;background: #201e1e !important;border: 1px solid #201e1e;">Login</button>
              </div>
          </div>
          <div class="col-md-5 loginPanel-blue" style="padding: 7% 2% 0% 2%;text-align:center">
              <img src="assets/imgs/logo-white.png" style="width:55%"/>
              <h5 style="color:#ff8f03;margin-top:16%">
                Sign up to <span class="constant_oilkart_name_camel"></span>
              </h5>
              <p style="color:white;font-size:12px;margin-top:18%">
                Use your mobile no to sign up & start shopping
              </p>
              <div class="md-form" style="text-align:center;margin-top:20%">
                <div class="btn btn-primary" data-toggle="modal" data-target="#signupModal" tabindex="0" style="width:54%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Sign up</div>
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</form>
<!-- Sign up Modal -->
<form id="signupForm" method="post" onsubmit="main.signup(event);">
<div id="signupModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" style="width: 130%;">
      <div class="modal-body" style="height:456px;">
        <div class="modalCloseBtn" data-dismiss="modal">X</div>
        <div class="row">
          <div class="col-md-5 loginPanel-blue" style="height:456px;padding: 7% 2% 0% 2%;text-align:center;left:-1px">
              <img src="assets/imgs/logo-white.png" style="width:55%"/>
              <h5 style="color:#ff8f03;margin-top:16%">
                Welcome Back!
              </h5>
              <p style="color:white;font-size:12px;margin-top:8%">
                To keep connected with us Please login to continue
              </p>
              <div class="md-form" style="text-align:center;margin-top:20%">
                <div class="btn btn-primary" data-toggle="modal" data-target="#signupModal" tabindex="0" style="width:50%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Login</div>
              </div>
          </div>
          <div class="col-md-7" style="padding: 1% 8% 7% 7%;">
              <center><h4 style="color:#201e1e">Create Account</h4>
              <p style="font-size:13px;color:#201e1e">Use your mobile no for registration</p></center>
              <div class="md-form">
                <input type="email" id="email" class="form-control">
                <label for="email">Email</label>
              </div>
              <div class="md-form">
                <input type="text" id="name" class="form-control">
                <label for="name">Name</label>
              </div>
              <div class="md-form">
                <input type="text" id="mobile" maxlength="10" class="form-control">
                <label for="mobile">Mobile No</label>
              </div>
              <div class="md-form">
                <input type="password" id="s_paswd" class="form-control">
                <label for="s_paswd">Password</label>
              </div>
              <div class="md-form">
                <a tabindex="0" style="font-size:12px;color:#ff8f03" data-toggle="modal" data-target="#referalModal">Add Referral Code</a>
              </div>
              <div class="md-form" style="font-size:12px">
                <input type="checkbox" id="agreed"/> I've agreed <span style="color:#ff8f03;font-size:12px">Terms & Conditions</span>
              </div>
              <div class="md-form" style="text-align:center">
                <button type="submit" class="btn btn-primary" tabindex="0" style="width:50%;background: #201e1e !important;border: 1px solid #201e1e;">Sign up</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Sign up Success Modal -->
<div id="signupSuccessModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" style="width: 77%;">
      <div class="modal-body" style="height:470px;">
        <div class="modalCloseBtn" data-dismiss="modal">X</div>
        <div class="row" style="text-align:center;padding: 0% 12% 0% 12%;">
            <img src="assets/imgs/site/confirmation.png" class="confirmImage"/>
            <h5 style="margin-top:2%;color:#201e1e">
              You have registered Successfully with <span class="constant_oilkart_name_camel"></span>
            </h5>
            <p style="margin:auto;color:grey;font-size:13px">
              Click continue to start your Shopping
            </p>
            <p style="margin-top:8%">
              <div class="btn btn-primary" onclick="window.location.href='index.php'" tabindex="0" style="margin:auto;width:50%;background: #feb81c !important;border: 1px solid #feb81c;color:#201e1e" data-dismiss="modal">Continue</div>
            </p>
            <p>
              <img src="assets/imgs/site/invite_1.png" style="width:25%;margin:auto;margin-top: 7%;"/>
            </p>
            <h5 style="text-decoration: underline;margin:auto;color:#201e1e">
              Invite & Get Offers
            </h5>
            <p style="color:#feb81c;margin:auto;font-size:13px;margin-top: 2%;">
              Invite your friends to join <span class="constant_oilkart_name_camel"></span> store and avail discount offers
            </p>
        </div>

      </div>
    </div>

  </div>
</div>

<!--Referal Modal-->
<div id="referalModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" style="width: 77%;">
      <div class="modal-body" style="height:200px;padding: 5% 12% 9% 12%;">
        <div class="modalCloseBtn" data-dismiss="modal" style="bottom:91%">X</div>
        <h5>Referral</h5>
        <div class="md-form">
          <input type="text" id="referalCode" class="form-control">
          <label for="promoCode" style="color:#201e1e">Referral Code</label>
        </div>
        <div class="md-form">
          <button class="btn btn-primary" data-dismiss="modal">Add</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!--Forgot Password-->
<div id="cp_mobile" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
        <h5 style="padding: 0% 0% 5% 0%;color:#201e1e">Forgot Password</h5>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            You will receive OTP to the below Mobile no.
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            <input type="text" id="otp_mobileNumber" style="text-align:center;border-top: none;border-left: none;border-right: none;border-radius: 0;width:70%;margin:auto;color:grey"  class="form-control"/>    
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;color:#201e1e">
            If the Mobile no is not yours, Contact <b>+91 9876543210</b>
        </div>
        <div class="row">
            <button type="submit"onclick="sendOTP()" class="btn btn-primary" tabindex="0" style="width:50%;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#201e1e;width:96%;background: #feb81c !important;border: 1px solid #feb81c;">Send OTP</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!--OTP Modal-->
<div id="cp_otp" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
        <h5 style="padding: 0% 0% 5% 0%;color:#201e1e">OTP Verification</h5>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            <span class="registeredMobile">XXXXX XX210</span>
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            <input type="text" id="otp_value" style="text-align:center;border-top: none;border-left: none;border-right: none;border-radius: 0;width:50%;margin:auto;color:grey" placeholder="XXXX" class="form-control"/>    
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;color:#201e1e">
            <div style="margin:auto">Not Received OTP?  &nbsp;<b>Resend</b></div>
        </div>
        <div class="row">
            <button type="submit" onclick="validateOTP()" class="btn btn-primary" tabindex="0" style="width:50%;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#201e1e;width:96%;background: #feb81c !important;border: 1px solid #feb81c;">Verify</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!--Change Password-->
<div id="cp_final" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
        <h5 style="padding: 0% 0% 5% 0%;color:#201e1e">Reset your Password</h5>
        <div class="row" style="padding:0% 0% 5% 0%;">
            <div class="md-form" style="margin:auto;width:75%">
                <input type="password" id="n_password" class="form-control">
                <label for="n_password" style="color:#201e1e !important;font-weight:500">New Password</label>
            </div>
        </div>
          <div class="row" style="padding:0% 0% 5% 0%;">
             <div class="md-form" style="margin:auto;width:75%">
                <input type="password" id="c_password" class="form-control">
                <label for="c_password" style="color:#201e1e !important;font-weight:500">Confirm Password</label>
            </div>
          </div>
          <div class="row">
            <button type="submit" onclick ="resetPassword_guest()" class="btn btn-primary" tabindex="0" style="width:50% !important;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#201e1e;width:96%;background: #feb81c !important;border: 1px solid #feb81c;margin:auto">Reset</button>
        </div>
      </div>
    </div>

  </div>
</div>
<!--confirm Password-->
<div id="cp_confirm" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
          <div class="row">
            <img src="assets/imgs/site/confirmation.png" style="width: 25%;margin: auto;"/>
          </div>
            <h3 style="padding: 0% 0% 8% 0%;color:#201e1e">Password Changed Successfully</h3>
            <div class="row" style="color:grey;padding: 0% 0% 8% 0%;">
                <div style="margin:auto">Click continue to Login in to <span class="constant_oilkart_name_camel"></span></div>
            </div>
          <div class="row">
            <button type="submit" data-toggle="modal" data-target="#loginModal" class="btn btn-primary" tabindex="0" style="width:50%;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#201e1e;width:96%;background: #feb81c !important;border: 1px solid #feb81c;" data-dismiss="modal">Continue</button>
        </div>
      </div>
    </div>

  </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/app/login.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/sweetalert2.js"></script>
<script>

        
    var categoryId = [];
    var categoryName = [];
    loadCategories();
    getCartItemCount();
    $(document).ready(function(){
        
       /* $(".subDropDown:visible").mouseleave(function(){
           $(".subDropDown:visible").hide(); 
        });*/
 
        $(".dropdown").hover(function(){
            $(".subDropDown:visible").hide();
        });
    });
    function goToWishList() {
        sessionStorage.setItem("isFromWishList","true");
        window.location.href = "myaccount.php";
    }
    function searchPage() {
        sessionStorage.setItem("globalSearchKeyword",$("#searchInput").val());
        window.location.href="productList.php";
    }
    function goToMyCart() {
        window.location.href = "mycart.php";
    }
    function loadCategories() {
        $.ajax({
            url  : BASE_URL+"category", 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            success:function(data) {
              ////console.log(data);
                var html = "";
                var topVal=0;
                
                if(data.status == 1) {
                    for(var i=0;i<data.data.length;i++) {
                        categoryId[data.data[i].name] = data.data[i].id;
                        categoryName[data.data[i].id] = data.data[i].name;
                        if(i>0) {
                             topVal = topVal + 14;  
                        }
                        
                        html = html + '<a href="#" onclick="loadCategory('+data.data[i].id+')">'+data.data[i].name+' <i class="fa fa-angle-right" style="float:right"></i></a>';
                        if(data.data[i].products.length>0) {
                           html = html + '<div class="subDropDown" style="display:none;top:'+topVal+'%">';
                            for(var k=0;k<data.data[i].products.length;k++) {
                                html = html + '<a href="#" onclick="productView('+data.data[i].products[k].id+')">'+data.data[i].products[k].name+'</a>';   
                            }
                            html = html + '</div>';   
                        }
                    }
                    $("#categoryDropdown").html(html);
                }
                 $(".dropdown-content a").hover(function(e) {
                  if($(this).next(".subDropDown").length>0) {
                      $(".subDropDown:visible").hide();
                        $(this).next(".subDropDown").show();   
                   }
                });
            }
            
            }); 
    }
    function loadCategory(idValue) {
        sessionStorage.setItem("current_categoryId",idValue);
        window.location.href = "productList.php";
    }
    
    function getCartItemCount() {
         if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
            $.ajax({
            url  : BASE_URL+"cart", 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            data : {
              api_token:localStorage.getItem("api_token")  
            },
            success:function(data) {
               // //console.log(data);
                var html='';
                if(data.status == 1) {
                   $(".cartItemCount").text(data.data.length);
                }
            }
            
            }); 
          } 
         else {
                $.ajax({
                    url  : BASE_URL+"guest_cart/"+localStorage.getItem("temp_user_id"), 
                    type : "GET",
                    dataType: 'json',
                    crossDomain:true,
//                    data : {
//                      api_token:localStorage.getItem("api_token")  
//                    },
                    success:function(data) {
                       // //console.log(data);
                        var html='';
                        if(data.status == 1) {
                           $(".cartItemCount").text(data.data.length);
                        }
                    }

                    });
         }
    }
    function productView(idValue) {
        sessionStorage.setItem("current_productViewID",idValue);
        window.location.href="productView.php";
    }
    
    function forgotPassword() {
        $("#loginModal").modal("hide");
        $("#cp_mobile").modal("show");
         setTimeout(function(){
               $("#otp_mobileNumber").focus();
         },500)
    }
    function sendOTP() {
        $.ajax({
                    url  : BASE_URL+"otp", 
                    type : "POST",
                    dataType: 'json',
                    crossDomain:true,
                    data : {
                      //api_token:localStorage.getItem("api_token") 
                        mobile:$("#otp_mobileNumber").val(),
                        action:"forget_password"
                    },
                    success:function(data) {
                       // //console.log(data);
                        var html='';
                        if(data.status == 1) {
                            $(".registeredMobile").text("Enter your One Time Password (OTP) which is sent to your registered Mobile no. +91 XXXXXXX"+$("#otp_mobileNumber").val().substr(7,10));
                           $("#cp_mobile").modal("hide");
                           $("#cp_otp").modal("show");
                             setTimeout(function(){
                                $("#otp_value").focus();
                            },500)
                        } else {
                             Swal.fire({
                              type: 'error',
                              title: 'Error!',
                              text: data.data
                            })
                        }
                    }

                    });
    }
    
    function validateOTP() {
        if( sessionStorage.getItem("otpFor") == "verifyMobile") {
             $.ajax({
                url  : BASE_URL+"verifyMobile", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data : {
                    otp:$("#otp_value").val(),
                    mobile:localStorage.getItem("user_oilkart_phone")
//                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  ////console.log(data);
                    if(data.status == 1) {
                        $(".modal").modal("hide");
                       Swal.fire({
                          type: 'success',
                          title: 'Success!',
                          text: 'Your mobile number has been verified successfully!'
                        })
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Wrong OTP!',
                          text: 'Please provide the correct OTP !!'
                        })
                    }
                }
            });
            sessionStorage.setItem("otpFor","");
        } else {
            $.ajax({
                url  : BASE_URL+"verifyMobile", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data : {
                    otp:$("#otp_value").val(),
                    mobile:$("#otp_mobileNumber").val()
//                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                      $("#cp_otp").modal("hide");
                      $("#cp_final").modal("show");
                        setTimeout(function(){
                                $("#n_password").focus();
                            },500)
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Wrong OTP!',
                          text: 'Please provide the correct OTP !!'
                        })
                    }
                }
            });
        }
        
    }
    
    function resetPassword_guest(){
        if($("#n_password").val() == "") {
           $("#n_password").focus();
            return false;
        } else if($("#c_password").val() == "") {
           $("#c_password").focus();
            return false;
        } else if($("#n_password").val() !== $("#c_password").val()) {
            Swal.fire({
              type: 'error',
              title: 'Oops!',
              text: 'Passwords mismatch.'
            })
            return false;
        } else {
             $.ajax({
                url  : BASE_URL+"changePassword", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                 data: {
                     password:$("#n_password").val(),
                     mobile:$("#otp_mobileNumber").val()
                     
                 },
                success:function(data) {
                    if(data.status == 1) {
                       $(".modal").modal("hide");
                        $("#cp_confirm").modal("show");
                    } else {
                       Swal.fire({
                          type: 'error',
                          title: 'Error!',
                          text: 'Something went wrong !!'
                        })
                        return false;
                    }
                }
            });
        }
    }
</script>