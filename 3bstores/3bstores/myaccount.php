
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/mdb.min.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery.slide.css" />
  <link rel="stylesheet" href="assets/css/productCarausel.css" />
     <?php include("assets/misc/header.php"); ?>
    <script>document.title = title;</script>
    <style>
        .accountBtn:hover, .accountBtn.active {
            color: #feb81c !important;
            border-bottom: 1px solid #feb81c;
        }
/*
         .addressActive, .addressPanel2 .card-body:hover {
            border: 1px solid #36b4f5 !important;
            background: #e9f7ff !important;
        }
        .addressPanel2 .card-body {
            padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;
            background: #f8f8f8;
            cursor: pointer;
        }
*/
    </style>
</head>
<body>
    <div class="main-content">

      <div class="row checkoutWizard deliveryAddress" style="padding: 1%;">
        <div class="col-md-4" style="padding-left: 10px;">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
                <div class="row" style="height: 55px;">
                    <div class="col-md-3" style="text-align:center;height: 100%;" id="profilePicture">
                        <img style="height: 85%;" class="img-circle" src="assets/imgs/site/account_icon.png"/>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            Hello
                        </div>
                        <div class="row">
                           <b class="display_name" style="text-transform:capitalize"></b>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row" style="padding:0% 0% 3% 8%">
                    <b>Orders</b>
                </div>
                <div class="row" style="padding: 0% 0% 2% 12%;color:#ccc">
                    <a class="accountBtn myorder" onclick="showPanel('orderedItemsPanel','myorder');loadOrderedItems()">My Orders</a>
                </div>
                <div class="row" style="padding: 0% 0% 2% 12%;color:#ccc">
                    <a class="accountBtn mywishlist" onclick="showPanel('wishlistPanel','mywishlist');loadWishlist()"> My Wishlist</a>
                </div>
                <hr>
                <div class="row" style="padding:0% 0% 3% 8%">
                    <b>Credits</b>
                </div>
                <div class="row" style="padding: 0% 0% 2% 12%;color:#ccc">
                    <a class="accountBtn offer" onclick="showPanel('offersPanel','offer');getPromoOffers()"> Promotional Offers</a>
                </div>
                <div class="row" style="padding: 0% 0% 2% 12%;color:#ccc">
                    <a class="accountBtn" onclick="showPanel('referalPanel','referal');getReferalCodes()"> Referral Codes</a>
                </div>
                <hr>
                <div class="row" style="padding:0% 0% 3% 8%">
                    <b>Account</b>
                </div>
                <div class="row" style="padding: 0% 0% 2% 12%;color:#ccc">
                    <a class="accountBtn profile" onclick="showPanel('profilePanel','profile');">  Profile Info</a>
                </div>
                <div class="row" style="padding: 0% 0% 2% 12%;color:#ccc">
                    <a class="accountBtn manageaddress" onclick="showPanel('addressPanel','manageaddress')">  Manage Addresses</a>
                </div>
                <div class="row" style="padding: 0% 0% 8% 12%;color:#ccc">
                    <a class="accountBtn" onclick="main.logout();"> Logout</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 customPanel profilePanel" style="padding-left: 10px;">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
              
                <h5>Profile Information</h5>
                <hr>
                <div class="row" style="padding: 0% 0% 0% 5%;">
                    <div class="col-md-12">
                        You can update your information and Change your password here
                    </div>
                </div>
                <form id="updateProfileForm" enctype="multipart/form-data">
                    <div class="row" style="padding: 0% 6% 0% 6%;">
                    <div class="col-md-6">
                         <div class="md-form">
                            <input type="text" id="fname" class="form-control">
                            <label for="fname" style="color:#2b617d !important;font-weight:500">First Name</label>
                          </div>
                    </div>
                    <div class="col-md-6">
                         <div class="md-form">
                            <input type="text" id="lname" class="form-control">
                            <label for="lname" style="color:#2b617d !important;font-weight:500">Last Name</label>
                          </div>
                    </div>
                </div>
                <div class="row" style="padding: 0% 6% 0% 8%;"> 
                    <div class="col-md-6">
                        <div class="row" style="padding-bottom: 4%;font-weight:bold;color:#2b617d !important;font-weight:500">Gender</div>
                        <div class="row">
                            <div class="custom-control custom-radio" style="margin-right: 5%;">
                              <input type="radio" class="custom-control-input" id="male" name="gender">
                              <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="female" name="gender">
                              <label class="custom-control-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 0% 6% 0% 6%;">
                    <div class="col-md-6">
                         <div class="md-form">
                            <input type="text" id="mail" class="form-control">
                            <label for="mail" style="color:#2b617d !important;font-weight:500">Mail id</label>
                          </div>
                    </div>
                    <div class="col-md-6">
                         <div class="md-form">
                            <input type="text" id="d_mobileNo" class="form-control">
                            <label for="d_mobileNo" style="color:#2b617d !important;font-weight:500">Mobile No.</label>
                          </div>
                    </div>
                </div>
                
                <div class="row" style="padding: 0% 6% 0% 4%;"> <!--Password-->
                    <div class="col-md-3">
                        Upload Profile Image                        
                    </div>
                    <div class="col-md-3">
                        <input type="file" id="profile_picture" name="profile_picture"/>
                    </div>
                    <div class="col-md-6" style="float:right">
                        <a class="btn btn-link" tabindex="0" onclick="localStorage.setItem('otpFor','passwordChange');otp_mobileNumber();" style="text-transform:capitalize;color:#fd1fad !important">Change Password</a>
                    </div>
                </div>
                </form>
                <hr>
                <div class="row" style="padding: 3% 6% 0% 6%;">
                    <div class="col-md-6" style="margin:auto">
                        Need Help ? Contact <b class="constant_oilkart_phone">+91 98765 43210</b>
                    </div>
                    <div class="col-md-6" style="text-align:right">
                        <button type="submit" class="btn btn-primary" id="editInfoBtn" onclick="editInfo()" tabindex="0" style="width:50%;background: #2b617d !important;border: 1px solid #2b617d;">Edit Info</button>
                        <div class="btn btn-primary waves-effect waves-light" tabindex="0" style="display:none;margin:auto;width:25%;background: #feb81c !important;border: 1px solid #feb81c;color:#2b617d" onclick="editSave();" id="saveBtn">Save</div>
                        <button type="submit" class="btn btn-primary" id="cancelBtn" onclick="editCancel()" tabindex="0" style="display:none;width:50%;background: #2b617d !important;border: 1px solid #2b617d;">Cancel</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
          <div class="col-md-8 customPanel addressPanel" style="padding-left: 10px;display:none">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
              
                <h5>Manage Addresses</h5>
                <hr>
                <div class="addressesDiv row" style="padding: 2% 0% 2% 2%;">
                
              </div>
                <hr>
                <div class="row" style="padding: 0% 1% 2% 1%;">
                    <div class="col-md-6" style="margin:auto">
                         Need Help ? Contact <b class="constant_oilkart_phone">+91 98765 43210</b>
                    </div>
                    <div class="col-md-3" style="text-align:right">
                        <!--<button type="submit" class="btn btn-primary" tabindex="0" style="color:#2b617d;width:100%;background: #fff !important;border: 1px solid #2b617d;">Cancel</button>-->
                    </div>
                    <div class="col-md-3" style="text-align:right">
<!--                        <button type="submit" class="btn btn-primary" tabindex="0" style="color:#2b617d;width:100%;background: #feb81c !important;border: 1px solid #feb81c;">Save</button>-->
                    </div>
                </div>
            </div>
          </div>
        </div>
          <div class="col-md-8 customPanel wishlistPanel" style="padding-left: 10px;display:none">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
              
                <h5>My Wishlist ( <span class="wishListItems">0</span> Items )</h5>
                <hr>
                <div class="row" style="padding: 0% 0% 0% 5%;">
                    <div class="col-md-12">
                        You can move your wishlist products to cart
                    </div>
                </div>
            <div class="itemDiv" style="padding: 2% 0% 0% 2%;">
        
          </div>
                
            </div>
          </div>
        </div>
          <div class="col-md-8 customPanel orderedItemsPanel" style="padding-left: 10px;display:none">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
              
                <h5>My Orders ( <span class="orderedItemsCount">0</span> Items )</h5>
                <hr>
                <div class="row" style="padding: 0% 0% 0% 5%;">
                    <div class="col-md-12">
                        You can see your ordered products
                    </div>
                </div>
            <div class="orderedItemDiv" style="padding: 2% 0% 0% 2%;">
                
            </div>
                
            </div>
          </div>
        </div>
        <div class="col-md-8 customPanel offersPanel" style="padding-left: 10px;display:none">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
              
                <h5>Promotional Offers ( <span class="promoOfferCount">0</span> Items )</h5>
                <hr>
                <div class="promoOffersDiv">
                    
                </div>
          </div>
                
            </div>
          </div>
          <div class="col-md-8 customPanel referalPanel" style="padding-left: 10px;display:none">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
                <div class="row">
                    <div class="col-md-8">
                        <h5>Referral Codes </h5>    
                    </div>
                    <div class="col-md-4">
                        Your Referral code : <h5 style="float:right;font-weight: bold;" class="yourCode">VIMAL12</h5>
                    </div>
                </div>
                <hr>
                <div class="referalCodeDiv" style="width:28%">
                    
                </div>
                <div class="row referalList">
                        
                    </div>
          </div>
                
            </div>
          </div>

        </div>
    
      </div>
</div> <!-- End of Main Content -->
    <?php include("assets/misc/footer.php"); ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slide.js"></script>
<script src="assets/js/mdb.min.js"></script>
<script src="assets/js/app/account.js"></script>
<script src="assets/js/app/myaccount.js"></script>
    <script>
    function resetPassword(){
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
                     user_id:localStorage.getItem("user_oilkart_id"),
                     password:$("#n_password").val(),
                     mobile:$("#d_mobileNo").val()
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
</body>
</html>
<!-- Change Password 1 -->
<div id="cp_mobile" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
        <h5 style="padding: 0% 0% 5% 0%;color:#2b617d">Change Password</h5>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            You will receive OTP to the below registered Mobile no.
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            <input type="text" id="otp_mobileNumber" style="text-align:center;border-top: none;border-left: none;border-right: none;border-radius: 0;width:70%;margin:auto;color:grey"  class="form-control"/>    
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;color:#2b617d">
            If the Mobile no is not yours, Contact <b>+91 9876543210</b>
        </div>
        <div class="row">
            <button type="submit"onclick="otp_sendOTP()" class="btn btn-primary" tabindex="0" style="width:50%;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#2b617d;width:96%;background: #feb81c !important;border: 1px solid #feb81c;">Send OTP</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Change Password 2 -->
<div id="cp_otp" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
        <h5 style="padding: 0% 0% 5% 0%;color:#2b617d">OTP Verification</h5>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            <span class="registeredMobile">XXXXX XX210</span>
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;">
            <input type="text" id="otp_value" style="text-align:center;border-top: none;border-left: none;border-right: none;border-radius: 0;width:50%;margin:auto;color:grey" placeholder="XXXX" class="form-control"/>    
        </div>
        <div class="row" style="padding: 0% 0% 11% 0%;color:#2b617d">
            <div style="margin:auto">Not Received OTP?  &nbsp;<b>Resend</b></div>
        </div>
        <div class="row">
            <button type="submit" onclick="otp_verify()" class="btn btn-primary" tabindex="0" style="width:50%;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#2b617d;width:96%;background: #feb81c !important;border: 1px solid #feb81c;">Verify</button>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Change Password 3 -->
<div id="cp_final" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
        <h5 style="padding: 0% 0% 5% 0%;color:#2b617d">Reset your Password</h5>
        <div class="row" style="padding:0% 0% 5% 0%;">
            <div class="md-form" style="margin:auto;width:75%">
                <input type="password" id="n_password" class="form-control">
                <label for="n_password" style="color:#2b617d !important;font-weight:500">New Password</label>
            </div>
        </div>
          <div class="row" style="padding:0% 0% 5% 0%;">
             <div class="md-form" style="margin:auto;width:75%">
                <input type="password" id="c_password" class="form-control">
                <label for="c_password" style="color:#2b617d !important;font-weight:500">Confirm Password</label>
            </div>
          </div>
          <div class="row">
            <button type="submit" onclick ="resetPassword()" class="btn btn-primary" tabindex="0" style="width:50% !important;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#2b617d;width:96%;background: #feb81c !important;border: 1px solid #feb81c;margin:auto">Reset</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Change Password 4 -->
<div id="cp_confirm" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top: 9%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="padding: 5% 12% 9% 12%;text-align:center">
        <div class="modalCloseBtn" data-dismiss="modal" style="padding:4px 0px 0px 0px">X</div>
          <div class="row">
            <img src="assets/imgs/site/confirmation.png" style="width: 25%;margin: auto;"/>
          </div>
            <h3 style="padding: 0% 0% 8% 0%;color:#2b617d">Password Changed Successfully</h3>
            <div class="row" style="color:grey;padding: 0% 0% 8% 0%;">
                <div style="margin:auto">Click continue to Login</div>
            </div>
          <div class="row">
            <button type="submit" class="btn btn-primary" tabindex="0" style="width:50%;height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#2b617d;width:96%;background: #feb81c !important;border: 1px solid #feb81c;" data-dismiss="modal">Continue</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Add Address Modal -->
<div id="addAddressModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="margin-top: 2%;">
    <div class="modal-content" style="width: 77%;">
      <div class="modal-body" style="height:712px;padding: 5% 12% 9% 12%;">
        <div class="modalCloseBtn" data-dismiss="modal">X</div>
        <h5>Add New Address</h5>
        <div class="md-form">
          <input type="text" id="a_name" class="form-control">
          <label for="a_name" style="color:#2b617d">Name</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_mobileNo" maxlength="10" class="form-control">
          <label for="a_mobileNo" style="color:#2b617d">Mobile No</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_pincode" maxlength="6" class="form-control">
          <label for="a_pincode" style="color:#2b617d">Pincode</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_address" class="form-control">
          <label for="a_address" style="color:#2b617d">Address</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_locality" class="form-control">
          <label for="a_locality" style="color:#2b617d">Locality</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_city" class="form-control">
          <label for="a_city" style="color:#2b617d">City</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_state" class="form-control">
          <label for="a_state" style="color:#2b617d">State</label>
        </div>
        <div class="row" style="padding: 0% 3% 0% 5%;"> 
                    <div class="col-md-8">
                        <div class="row" style="padding-bottom: 4%;color:#2b617d !important;">Type of Address</div>
                        <div class="row">
                            <div class="custom-control custom-radio" style="margin-right: 21%;">
                              <input type="radio" class="custom-control-input" id="a_Home" value="Home" name="addtype">
                              <label class="custom-control-label" for="a_Home">Home</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="a_Office" value="Office" name="addtype">
                              <label class="custom-control-label" for="a_Office">Office</label>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="md-form" style="text-align: center;">
            <div class="btn btn-primary" tabindex="0" onkeypress="if(event.keyCode == 13) addAddress();" onclick="addAddress();" style="margin:auto;width:50%;background: #feb81c !important;border: 1px solid #feb81c;color:#2b617d">Add Address</div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Edit Address Modal -->
<div id="editAddressModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 2%;">
    <div class="modal-content" style="width: 77%;">
      <div class="modal-body" style="height:712px;padding: 5% 12% 9% 12%;">
        <div class="modalCloseBtn" data-dismiss="modal">X</div>
        <h5>Update Address</h5>
        <div class="md-form">
          <input type="text" id="e_name" class="form-control">
          <label for="e_name" style="color:#2b617d">Name</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_mobileNo" maxlength="10" class="form-control">
          <label for="e_mobileNo" style="color:#2b617d">Mobile No</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_pincode" maxlength="6" class="form-control">
          <label for="e_pincode" style="color:#2b617d">Pincode</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_address" class="form-control">
          <label for="e_address" style="color:#2b617d">Address</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_locality" class="form-control">
          <label for="e_locality" style="color:#2b617d">Locality</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_city" class="form-control">
          <label for="e_city" style="color:#2b617d">City</label>
        </div>
           <div class="md-form">
          <input type="text" id="e_state" class="form-control">
          <label for="e_state" style="color:#2b617d">State</label>
        </div>
        <div class="row" style="padding: 0% 3% 0% 5%;"> 
                    <div class="col-md-8">
                        <div class="row" style="padding-bottom: 4%;color:#2b617d !important;">Type of Address</div>
                        <div class="row">
                            <div class="custom-control custom-radio" style="margin-right: 21%;">
                              <input type="radio" class="custom-control-input" id="e_Home" value="Home" name="addtype">
                              <label class="custom-control-label" for="e_Home">Home</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="e_Office" value="Office" name="addtype">
                              <label class="custom-control-label" for="e_Office">Office</label>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="md-form" style="text-align: center;">
            <div class="btn btn-primary" id="updateAddrBtn" tabindex="0" onkeypress="if(event.keyCode == 13) updateAddress();" onclick="updateAddress();" style="margin:auto;width:50%;background: #feb81c !important;border: 1px solid #feb81c;color:#2b617d">Update</div>
        </div>
      </div>
    </div>

  </div>
</div>