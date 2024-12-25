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
        .addressActive, .addressPanel .card-body:hover {
            border: 1px solid #36b4f5 !important;
            background: #e9f7ff !important;
        }
        .addressPanel .card-body {
            padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;
            background: #f8f8f8;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div class="main-content">

      <div class="row checkoutWizard deliveryAddress" style="padding: 1%;">
        <div class="col-md-8" style="padding-left: 10px;">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
              <h5 class="card-title">Select Delivery Address <hr></h5>
              <div class="addressesDiv row" style="padding: 2% 0% 2% 2%;">
            
              </div>
              <hr>
              <div class="row" style="padding: 0% 3% 2% 3%;">
                <div class="col-md-6" style="margin: auto;font-size: 14px;">
                  Need Help? Contact <b class="constant_oilkart_phone">+91 98765 43210</b>
                </div>
                <div class="col-md-6" style="text-align: right;">
                  <div onclick="showTab('checkoutOrders')" class="btn btn-primary" tabindex="0" style="margin:auto;width:50%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Continue</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" style="padding-left: 10px;">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
              <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">Price Details</h5>
                </div>
                <div class="col-md-8" style="color:#201e1e !important;text-align:right">
                    <span class="freeDelivery" style="display:none"> <img src="assets/imgs/site/delivery_free.png" style="width:11%"/> Free delivery for this order!</span>
                </div>
              </div>
              <hr style="margin-top:0">
              <div class="summary" style="padding: 0% 5% 4% 5%;">
                <div class="row">
                  <div class="col-md-6">
                      Total Items : <span class="totalItemsCount">0</span>
                  </div>
                  <div class="col-md-6" style="text-align:right">
                    View Detail
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Total Amount
                  </div>
                  <div class="col-md-6" style="text-align:right">
                  &#8377; <span class="totalAmount">0</span>
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Cart Discount
                  </div>
                  <div class="col-md-6" style="text-align:right;color:#36b4f5 ">
                  - &#8377;  <span class="cartDiscount">0</span>
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Delivery Charge
                  </div>
                  <div class="col-md-6" style="text-align:right;color:#36b4f5">
                  &#8377; <span class="deliveryCharge"></span>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                  <b>Total</b>
                  </div>
                  <div class="col-md-6" style="text-align:right">
                  <b>&#8377; <span class="grandTotal">0</span></b>
                  </div>
                </div>
                <hr>
                <p style="color:#201e1e">
                  <img src="assets/imgs/site/delivery_time.png" style="width:6%" /> Delivery within 1 day
                </p>
                <p style="color:#201e1e">
                  <img src="assets/imgs/site/delivery.png" style="width:6%" /> Free delivery on above Rs. 500
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Checkout Orders -->
      <div class="row checkoutWizard checkoutOrders" style="padding:1%;display:none">
      <div class="col-md-8" style="padding-left: 10px;">
      <div class="card">
        <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
          <h5 class="card-title">Order Summary, You can continue to place order with following items (<span class="totalItemsCount">0</span> Items)<hr></h5>
          <div class="itemDiv" id="cartItems" style="padding: 2% 0% 0% 2%;">
            
          </div>
          <div class="row" style="padding: 0% 3% 2% 3%;">
            <div class="col-md-8" style="margin: auto;font-size: 14px;">
              Order Confirmation email will be sent to <b class="orderConfirmMailAddr">john.doe@gmail.com</b>
            </div>
            <div class="col-md-4" style="text-align: right;">
              <div onclick="showTab('paymentTab')" class="btn btn-primary" tabindex="0" style="margin:auto;width:50%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Continue</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="padding-left: 10px;">
      <div class="card">
        <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
          <div class="row">
            <div class="col-md-4">
                <h5 class="card-title">Price Details</h5>
            </div>
            <div class="col-md-8" style="color:#201e1e !important;text-align:right">
               <span class="freeDelivery" style="display:none"> <img src="assets/imgs/site/delivery_free.png" style="width:11%"/> Free delivery for this order!</span>
            </div>
          </div>
          <hr style="margin-top:0">
          <div class="summary" style="padding: 0% 5% 4% 5%;">
                <div class="row">
                  <div class="col-md-6">
                    Total Items : <span class="totalItemsCount">0</span>
                  </div>
                  <div class="col-md-6" style="text-align:right">
                    View Detail
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Total Amount
                  </div>
                  <div class="col-md-6" style="text-align:right">
                  &#8377; <span class="totalAmount">0</span>
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Cart Discount
                  </div>
                  <div class="col-md-6" style="text-align:right;color:#36b4f5 ">
                  - &#8377;  <span class="cartDiscount">0</span>
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Delivery Charge
                  </div>
                  <div class="col-md-6" style="text-align:right;color:#36b4f5">
                  &#8377; <span class="deliveryCharge"></span>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                  <b>Total</b>
                  </div>
                  <div class="col-md-6" style="text-align:right">
                  <b>&#8377; <span class="grandTotal">0</span></b>
                  </div>
                </div>
                <hr>
                <p style="color:#201e1e">
                  <img src="assets/imgs/site/delivery_time.png" style="width:6%" /> Delivery within 1 day
                </p>
                <p style="color:#201e1e">
                  <img src="assets/imgs/site/delivery.png" style="width:6%" /> Free delivery on above Rs. 500
                </p>
              </div>
        </div>
      </div>
    </div>
  </div>
<!-- End of Checkout Orders -->

<!-- Payment -->
<div class="row checkoutWizard paymentTab" style="padding:1%;display:none">
<div class="col-md-8" style="padding-left: 10px;">
<div class="card">
  <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
    <h5 class="card-title">You can Pay using below options<hr></h5>
    <div class="paymentDiv" style="padding: 2% 0% 2% 2%;">
      <div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" style="border-bottom: 1px solid #d2d2d2;" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-credit" role="tab" aria-controls="v-pills-home" onclick="getPayment('1')" aria-selected="true">Razorpay</a>
            <a class="nav-link" style="border-bottom: 1px solid #d2d2d2;"id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-nbanking" role="tab" aria-controls="v-pills-profile" onclick="getPayment('1')" aria-selected="false">Net Banking</a>
            <a class="nav-link active" style="border-bottom: 1px solid #d2d2d2;" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-cod" role="tab" aria-controls="v-pills-profile" onclick="getPayment('2')" aria-selected="false">Cash On Delivery</a>
            <a class="nav-link" style="border-bottom: 1px solid #d2d2d2;" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-upi" role="tab" aria-controls="v-pills-messages" aria-selected="false">Phonepe/BHIM UPI</a>
            <a class="nav-link"style=" border-bottom: 1px solid #d2d2d2;" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-wallet" role="tab" aria-controls="v-pills-settings" aria-selected="false">Wallet</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade" id="v-pills-credit" role="tabpanel" aria-labelledby="v-pills-home-tab"><p style="padding: 3% 0% 3% 0%;">
              <img src="assets/imgs/site/razor-pay.png" style="width:25%"/> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            </p>
          </div>
            <div class="tab-pane fade" id="v-pills-nbanking" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
            <div class="tab-pane fade show active" id="v-pills-cod" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <p>Cash on Delivery</p>
            <p>Pay with <b>Cash or Googlepay / Paytm</b></p>
            <p style="padding: 3% 0% 3% 0%;">
              <img src="assets/imgs/site/gpay.png" style="width:25%"/> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
              <img src="assets/imgs/site/Paytm_logo.jpg" style="width:25%"/>
            </p>
            <p>
              Before placing your order, Confirm your Address & Price
            </p>
            <p>
              <b class="place_order_name">John Doe</b> &nbsp; &nbsp;&nbsp;<span style="color:grey"> Office</span><br>
                <span class="place_order_address_1">No.47, Santa Monica</span>,<br>
                <span class="place_order_address_2">Peelamedu</span>, <span class="place_order_city">Coimbatore</span>,<br>
                <span class="place_order_state"> Tamil Nadu </span>- <span class="place_order_pincode">641 004</span><br>
                Mobile : <b>+91 <span class="place_order_mobile">98765 43210</span></b>
            </p>
            </div>
            <div class="tab-pane fade" id="v-pills-upi" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            <div class="tab-pane fade" id="v-pills-wallet" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
          </div>
        </div>
      </div>

    </div>
    <div class="row" style="padding: 0% 3% 2% 3%;">
      <div class="col-md-8" style="margin: auto;font-size: 14px;">
        Order Confirmation email will be sent to <b class="orderConfirmMailAddr">john.doe@gmail.com</b>
      </div>
      <div class="col-md-4" style="text-align: right;">
        <div onclick="placeOrder()" class="btn btn-primary" id="rzp-button1" tabindex="0" style="margin:auto;width:60%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Place Order</div>
        
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-4" style="padding-left: 10px;">
<div class="card">
  <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
    <div class="row">
      <div class="col-md-4">
          <h5 class="card-title">Price Details</h5>
      </div>
      <div class="col-md-8" style="color:#201e1e !important;text-align:right">
          <span class="freeDelivery" style="display:none"> <img src="assets/imgs/site/delivery_free.png" style="width:11%"/> Free delivery for this order!</span>
      </div>
    </div>
    <hr style="margin-top:0">
    <div class="summary" style="padding: 0% 5% 4% 5%;">
                <div class="row">
                  <div class="col-md-6">
                    Total Items : 1
                  </div>
                  <div class="col-md-6" style="text-align:right">
                    View Detail
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Total Amount
                  </div>
                  <div class="col-md-6" style="text-align:right">
                  &#8377; <span class="totalAmount">0</span>
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Cart Discount
                  </div>
                  <div class="col-md-6" style="text-align:right;color:#36b4f5 ">
                  - &#8377;  <span class="cartDiscount">0</span>
                  </div>
                </div>
                <div class="row" style="margin-top:5%">
                  <div class="col-md-6">
                  Delivery Charge
                  </div>
                  <div class="col-md-6" style="text-align:right;color:#36b4f5">
                  &#8377; <span class="deliveryCharge"></span>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                  <b>Total</b>
                  </div>
                  <div class="col-md-6" style="text-align:right">
                  <b>&#8377; <span class="grandTotal">0</span></b>
                  </div>
                </div>
                <hr>
<!--
                <p style="color:#ff8f03 !important">
                  <b>Your Order will be Delivered within 2 hours</b>
                </p>
-->
<!--
                <p style="color:#201e1e">
                  <img src="assets/imgs/site/delivery.png" style="width:6%" /> Delivery in 90 minutes
                </p>
-->
                <p style="color:#201e1e">
                  <img src="assets/imgs/site/delivery_time.png" style="width:6%" /> Delivery within 1 day
                </p>
                <p style="color:#201e1e">
                  <img src="assets/imgs/site/delivery.png" style="width:6%" /> Free delivery on above Rs. 500
                </p>
              </div>
  </div>
</div>
</div>
</div>
<!-- End of Payment -->
<!-- Confirmation -->
<div class="row checkoutWizard confirmationTab" style="padding:1%;display:none">
<div class="col-md-12" style="padding-left: 10px;">
<div class="card">
  <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
    <h5 class="card-title">Order Confirmation<hr></h5>
    <div class="orderConfirmDiv" style="padding: 2% 0% 2% 2%;text-align:center">
      <div class="row" style="text-align:center;height: 216px;">
          <img src="assets/imgs/site/confirmation.png" style="margin: auto;width: 10%;"/>
      </div>
      <div class="row" style="text-align:center;">
            <h3 style="margin:auto;color:#201e1e">Thank you! Successfully placed order with <span class="constant_oilkart_name_camel"></span></h3>
      </div>
      <div class="row" style="padding-top:1%">
        <p style="margin:auto;color:#201e1e">Order Id : <b class="c_orderId">#OIL1001</b> &nbsp;&nbsp;&nbsp; Total Price : <b class="c_totalAmount">Rs.1415</b>&nbsp;&nbsp;&nbsp; Customer Name : <b class="c_customerName">John Doe</b>&nbsp;&nbsp;&nbsp; Mobile No : <b class="c_mobileNo">+91 9876543210</b></p>
      </div>
      <div class="row" style="padding-top:2%;padding-bottom:2%">
        <p style="margin:auto;color:grey"><a>Click continue to see your order details in My Orders</a></p>
      </div>
      <div class="row" style="padding-top:1%">
        <a href="index.php" class="btn btn-primary" tabindex="0" style="margin:auto;width:15%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Continue</a>
      </div>
    </div>
    <div class="row" style="padding: 0% 3% 2% 3%;">
      <div class="col-md-8" style="margin: auto;font-size: 14px;">
        Need Help? Contact <b class="constant_oilkart_phone">+91 98765 43210</b>
      </div>
      <div class="col-md-4" style="text-align: right;">

      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- End of Confirmation -->
</div> <!-- End of Main Content -->
    <?php include("assets/misc/footer.php"); ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slide.js"></script>
<script src="assets/js/mdb.min.js"></script>
<script src="assets/js/app/placeorder.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
   $(document).ready(function(){
       $(".orderConfirmMailAddr").text(localStorage.getItem("user_oilkart_email"));
       getCartItems2();
       viewAllAddress();
       getCartItemCount();
      });
    
    
     
</script>
</body>
</html>
<!-- Add Address Modal -->
<div id="addAddressModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 2%;">
    <div class="modal-content" style="width: 77%;">
      <div class="modal-body" style="height:712px;padding: 5% 12% 9% 12%;">
        <div class="modalCloseBtn" data-dismiss="modal">X</div>
        <h5>Add New Address</h5>
        <div class="md-form">
          <input type="text" id="a_name" class="form-control">
          <label for="a_name" style="color:#201e1e">Name</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_mobileNo" maxlength="10" class="form-control">
          <label for="a_mobileNo" style="color:#201e1e">Mobile No</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_pincode" maxlength="6" class="form-control">
          <label for="a_pincode" style="color:#201e1e">Pincode</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_address" class="form-control">
          <label for="a_address" style="color:#201e1e">Address</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_locality" class="form-control">
          <label for="a_locality" style="color:#201e1e">Locality</label>
        </div>
        <div class="md-form">
          <input type="text" id="a_city" class="form-control">
          <label for="a_city" style="color:#201e1e">City</label>
        </div>
          <div class="md-form">
          <input type="text" id="a_state" class="form-control">
          <label for="a_state" style="color:#201e1e">State</label>
        </div>
        <div class="md-form">
          <div style="color:#201e1e">Type of Address</div>
          <div class="row" style="padding: 0% 0% 13% 14%">
            <div class="custom-control custom-radio" style="margin-right: 21%;">
              <input type="radio" class="custom-control-input" id="a_Home" value="Home" name="addtype">
              <label class="custom-control-label" for="a_Home">Home</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="a_Office" value="Office" name="addtype">
              <label class="custom-control-label" for="a_Office">Office</label>
            </div>
        </div>
          <div class="row" style="color:#201e1e;padding-left:7%">
          <input type="checkbox"/> Make this Default Address
        </div>

        </div>
        <div class="md-form" style="text-align: center;">
            <div class="btn btn-primary" tabindex="0" onkeypress="if(event.keyCode == 13) addAddress();" onclick="addAddress();" style="margin:auto;width:50%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Add Address</div>
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
          <label for="e_name" style="color:#201e1e">Name</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_mobileNo" maxlength="10" class="form-control">
          <label for="e_mobileNo" style="color:#201e1e">Mobile No</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_pincode" maxlength="6" class="form-control">
          <label for="e_pincode" style="color:#201e1e">Pincode</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_address" class="form-control">
          <label for="e_address" style="color:#201e1e">Address</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_locality" class="form-control">
          <label for="e_locality" style="color:#201e1e">Locality</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_city" class="form-control">
          <label for="e_city" style="color:#201e1e">City</label>
        </div>
        <div class="md-form">
          <input type="text" id="e_state" class="form-control">
          <label for="e_state" style="color:#201e1e">State</label>
        </div>
        <div class="md-form">
          <div style="color:#201e1e">Type of Address</div>
          <div class="row" style="padding: 0% 0% 13% 14%">
            <div class="custom-control custom-radio" style="margin-right: 21%;">
              <input type="radio" class="custom-control-input" id="e_Home" value="Home" name="addtype">
              <label class="custom-control-label" for="home">Home</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="e_Office" value="Office" name="addtype">
              <label class="custom-control-label" for="office">Office</label>
            </div>
        </div>
          <div class="row" style="color:#201e1e;padding-left:7%">
          <input type="checkbox"/> Make this Default Address
        </div>

        </div>
        <div class="md-form" style="text-align: center;">
            <div class="btn btn-primary" id="updateAddrBtn" tabindex="0" onkeypress="if(event.keyCode == 13) updateAddress();" onclick="updateAddress();" style="margin:auto;width:50%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Update</div>
        </div>
      </div>
    </div>

  </div>
</div>