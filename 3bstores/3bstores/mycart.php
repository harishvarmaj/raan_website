<?php
require_once('./api/config.php')
?>
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
    .deliveryCheckMarker {
    background: none;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid #201e1e;
    border-radius:0;
}
.deliveryCheckMarker2 {
    background: none;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid #201e1e;
    border-radius:0;
    cursor:pointer;
}
    </style>
</head>
<body>
    <div class="main-content">
       

      
      <!-- Checkout Orders -->
      <div class="row" style="padding:1%">
      <div class="col-md-8" style="padding-left: 10px;">
      <div class="card">
        <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
            <div class="row">
                <div class="col-md-6">
                <h5 class="card-title"><b>My Cart ( <span class="totalItemsCount"></span> Items )</b></h5>
            </div>
               <div class="col-md-6">
                    <!--<div class="input-group mb-3" style="width: 85%;float: right;">
                          <div class="input-group-prepend">
                            <span class="input-group-text deliveryCheckMarker" id="basic-addon1"><i class="fa fa-map-marker-alt yellowColor"></i></span>
                          </div>
                          <input type="text" style="border-left:0;border-right:0;border-top: none;border-bottom: 1px solid #201e1e;" id="checkCodeInput" class="form-control" placeholder="Enter Delivery Pincode" onkeypress="if(event.keyCode == 13)validatePincode();" aria-label="Enter Delivery Pincode" aria-describedby="Enter Delivery Pincode">
                             <div class="input-group-append">
                                <span class="input-group-text deliveryCheckMarker2" id="basic-addon2" onclick="validatePincode();">Check</span>
                              </div>
                        </div>-->
                </div> 
            </div>
            <hr style="margin:0">
          <div class="itemDiv" id="cartItems" style="padding: 2% 0% 0% 2%;">
            
            
          </div>
          <hr>
          <div class="row" style="padding: 0% 2% 0% 4%">  
            <a href="myaccount.php"><i class="fa fa-heart" style="color:#ff8f03;font-size: 16px;margin-top: 4px;"></i>  <span style="margin-left:5px;color:#201e1e;"><b>Add More from Wishlist <i class="fa fa-caret-right"></i></b></span></a>
          </div>
          <hr>
          <div class="row" style="padding: 0% 3% 2% 3%;">
              <div class="col-md-4" style="text-align: right;">
               
              </div>
            <div class="col-md-4" style="margin: auto;font-size: 14px;">
               <a href="index.php" class="btn btn-primary" tabindex="0" style="margin:auto;width:90%;background: #201e1e !important;border: 1px solid #201e1e;color:#fff">Continue Shopping</a>
            </div>
            <div class="col-md-4" style="text-align: right;">
               
              <a href="javascript:void(0)" onclick="placeOrder()" class="btn btn-primary" tabindex="0" style="margin:auto;width:90%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Place Order</a>
              <form action="charge.php" method="POST">
<!-- <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key=<?php  $api_key_id ?> 
    data-amount="50000" 
    data-currency="INR"
    data-buttontext="Pay with Razorpay"
    data-name="ClipShoppers"
    data-description="www.3bstores.in"x
    data-image="https://bit.ly/3pmgTFO"
    data-prefill.name="Cloud Valley"
    data-prefill.email="cloudvalleytech@example.com"
    data-prefill.contact="9999999999"
    data-theme.color="blue"
></script> -->
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
            <div class="row" style="padding: 0% 5% 4% 5%;">
                <div class="col-md-8">
                    <div class="row" style="padding-top: 4%;">
                    <h6 style="color:#201e1e"><b> Add Promo Code</b></h6> 
                    </div>
                    <div class="row loginToAvail" style="font-size:12px;display:none">
                        Login/Signup to avail offers
                    </div>
                </div>
                <div class="col-md-4">
                     <a href="javascript:void(0)" data-target="#applyPromo" data-toggle="modal" class="btn btn-primary" tabindex="0" style="margin:auto;width:90%;background: #fff !important;border: 1px solid #ff8f03;color:#ff8f03">Apply</a>
                </div>
            </div>
          <hr style="margin-top:0">
            <!--<div class="row" style="padding: 0% 5% 4% 5%;">
                <div class="col-md-8">
                    <div class="row">
                    <h6><b style="color:#201e1e"> Referred Discount Amount, </b>&#x20B9; 50</h6> 
                    </div>
                    <div class="row" style="font-size:12px">
                        Your friend engaged and ordered with us
                    </div>
                </div>
                <div class="col-md-4">
                     <input type="checkbox"/>
                </div>
            </div>
          <hr style="margin-top:0">-->
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
              - &#8377; <span class="cartDiscount">0</span>
              </div>
            </div>
<!--
            <div class="row" style="margin-top:5%">
              <div class="col-md-6">
              Offer Discount
              </div>
              <div class="col-md-6" style="text-align:right;color:#36b4f5">
              Apply Coupon
              </div>
            </div>
-->
<!--
            <div class="row" style="margin-top:5%">
              <div class="col-md-6">
              Referral Discount
              </div>
              <div class="col-md-6" style="text-align:right;color:#36b4f5">
              - &#x20B9; 0
              </div>
            </div>
-->
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


</div> <!-- End of Main Content -->
    <?php include("assets/misc/footer.php"); ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slide.js"></script>
<script src="assets/js/mdb.min.js"></script>
<script src="assets/js/productCarousal.js"></script>
<script>
   $(function() {
        $('.bannerSlider').slide({
          'slideSpeed': 6000,
          'isShowArrow': true,
          'dotsEvent': 'mouseenter',
          'isLoadAllImgs': true
        });
       if(localStorage.getItem("user_oilkart_loggedIn") !== "true") {
           $(".loginToAvail").show();
       }
       sessionStorage.setItem("fromCart","");
      });
    getCartItems();  
     getCartItemCount();
    function validatePincode() {
        var pincode = $("#checkCodeInput").val();
        if(pincode == "") {
           $("#checkCodeInput").focus();
        } else
        if(pincode.length>4) {
            $.ajax({
            url  : BASE_URL+"pincode/"+pincode, 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            success:function(data) {
               //console.log(data);
                if(data.status == 1) {
                    Swal.fire({
                          type: 'success',
                          title: 'Success!',
                          text: 'Delivery is available for this location.'
                        })  
                } else {
                    Swal.fire({
                          type: 'error',
                          title: 'Oops!',
                          text: 'Delivery is  not available for this location'
                        })  
                }
            }
            
            });   
        }
    }
    function placeOrder(){
      if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
                    if(Number($(".cartDiscount").text())>0) {
                            sessionStorage.setItem("currentCart_discount",$(".cartDiscount").text());   
                        }
                        window.location.href="placeorder.php";
      } else {
          $("#loginModal").modal("show");
      }
                   
    }

    function getCartItems() {
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
                        //console.log(data);
                        if(data.status == 0) {
                           Swal.fire({
                              type: 'error',
                              title: 'Oops!',
                              text: 'No products found in the cart'
                            }) 
                            setTimeout(function(){
                                window.location.href = "index.php";    
                            },500);
                        }
                        var html='';
                        $(".totalItemsCount").text(data.data.length);
                        for(var i=0;i<data.data.length;i++) {
                            html = html + '<div class="row itemRow" style="padding: 0% 2% 1% 2%;" id="cartItem'+data.data[i].id+'">'
                                              +'<div class="col-md-2">'
                                                +'<img onclick="viewProductDetail('+data.data[i].product_combinations.id+')" src="'+BASE_IMAGE_URL+''+data.data[i].product_combinations.product.images[0].path+'" style="width:100%"/>'
                                              +'</div>'
                                              +'<div class="col-md-7">'
                                                  +'<p><b style="color:#201e1e"><a onclick="viewProductDetail('+data.data[i].product_combinations.id+')">'+data.data[i].product_combinations.product.name+'</a></b> <br>'
                                                      +'<span style="color:grey">Brand : </span>'
                                                      +'<span style="color:#ff8f03">'+data.data[i].product_combinations.product.brand+'</span> &nbsp;&nbsp;&nbsp;'
                                                      +'<span style="color:grey">Product Code :</span>'
                                                      +'<span style="color:#ff8f03">S01002</span>'
                                                    +'<p>Qty <input onblur="editCart('+data.data[i].id+','+data.data[i].product_combinations.id+');" min="1" onchange="editQuantity()" class="cart_quantity c_quantity'+data.data[i].product_combinations.id+'" type="number" style="border: none;width: 8%;border-bottom: 1px solid #0f5e9c;text-align: center;" value="'+data.data[i].quantity+'"/>'
                                                    +'</p>'
                                                    +'<p><a style="color:#fd1fad;" onclick="removeItem('+data.data[i].id+')"><i class="fa fa-times-circle"></i> Remove</a></p>'
                                                  +'</p>'
                                              +'</div>'
                                              +'<div class="col-md-3" style="text-align:right">'
                                                  +'<h5><b>&#8377; <span class="priceAmount">'+data.data[i].product_combinations.price+'</span></b></h5>'
                                                  +'<p style="color:grey"><strike>MRP : Rs.'+data.data[i].product_combinations.mrp+'</strike> </p>'
                                                  +'<span style="color:#fd1fad;">(Rs.'+(Number(data.data[i].product_combinations.mrp)-Number(data.data[i].product_combinations.price))+' Offer)<input type="hidden" class="baseValue" value="'+data.data[i].product_combinations.price+'"/></span>'
                                              +'</div>'
                                            +'</div><hr>';
                        }
                        $("#cartItems").html(html);
                        
                        //$(".totalAmount").text(data.extra.total_price);
                        //$(".grandTotal").text(Number($(".totalAmount").text()) - Number($(".cartDiscount").text()));
                        for(var i=0;i<$(".priceAmount").length;i++) {
                            var subTotal = Number($(".baseValue:eq("+i+")").val()) * Number($(".cart_quantity:eq("+i+")").val());
                            $(".priceAmount:eq("+i+")").text(subTotal);
                        }
                        calculateCart();
                    }

                    });
        } else {
            if(localStorage.getItem("temp_user_id")=="" || localStorage.getItem("temp_user_id") == null) {
               localStorage.setItem("temp_user_id",new Date().getMonth()+""+new Date().getDate()+""+new Date().getMinutes()+Math.floor(Math.random()*10000));
            }
            $.ajax({
                    url  : BASE_URL+"guest_cart/"+localStorage.getItem("temp_user_id"), 
                    type : "GET",
                    dataType: 'json',
                    crossDomain:true,
//                    data : {
//                      api_token:localStorage.getItem("api_token")  
//                    },
                    success:function(data) {
                        //console.log(data);
                        if(data.status == 0) {
                           Swal.fire({
                              type: 'error',
                              title: 'Oops!',
                              text: 'No products found in the cart'
                            }) 
                            setTimeout(function(){
                                window.location.href = "index.php";    
                            },500);
                        }
                        var html='';
                        $(".totalItemsCount").text(data.data.length);
                        for(var i=0;i<data.data.length;i++) {
                            html = html + '<div class="row itemRow" style="padding: 0% 2% 1% 2%;" id="cartItem'+data.data[i].id+'">'
                                              +'<div class="col-md-2">'
                                                +'<img onclick="viewProductDetail('+data.data[i].product_combinations.id+')" src="'+BASE_IMAGE_URL+''+data.data[i].product_combinations.product.images[0].path+'" style="width:100%"/>'
                                              +'</div>'
                                              +'<div class="col-md-7">'
                                                  +'<p><b style="color:#201e1e"><a onclick="viewProductDetail('+data.data[i].product_combinations.id+')">'+data.data[i].product_combinations.product.name+'</a></b> <br>'
                                                      +'<span style="color:grey">Brand : </span>'
                                                      +'<span style="color:#ff8f03">'+data.data[i].product_combinations.product.brand+'</span> &nbsp;&nbsp;&nbsp;'
                                                      +'<span style="color:grey">Product Code :</span>'
                                                      +'<span style="color:#ff8f03">S01002</span>'
                                                    +'<p>Qty <input onblur="editCart('+data.data[i].id+','+data.data[i].product_combinations.id+');" onchange="editQuantity()" class="cart_quantity c_quantity'+data.data[i].product_combinations.id+'" type="number" style="border: none;width: 8%;border-bottom: 1px solid #0f5e9c;text-align: center;" value="'+data.data[i].quantity+'"/>'
                                                    +'</p>'
                                                    +'<p><a style="color:#fd1fad;" onclick="removeItem('+data.data[i].id+')"><i class="fa fa-times-circle"></i> Remove</a></p>'
                                                  +'</p>'
                                              +'</div>'
                                              +'<div class="col-md-3" style="text-align:right">'
                                                  +'<h5><b>&#8377; <span class="priceAmount">'+data.data[i].product_combinations.price+'</span></b></h5>'
                                                  +'<p style="color:grey"><strike>MRP : Rs.'+data.data[i].product_combinations.mrp+'</strike> </p>'
                                                  +'<span style="color:#fd1fad;">(Rs. '+(Number(data.data[i].product_combinations.mrp)-Number(data.data[i].product_combinations.price))+' Offer)<input type="hidden" class="baseValue" value="'+data.data[i].product_combinations.price+'"/></span>'
                                              +'</div>'
                                            +'</div><hr>';
                        }
                        $("#cartItems").html(html);
                        calculateCart();
                        //$(".totalAmount").text(data.extra.total_price);
                        //$(".grandTotal").text(Number($(".totalAmount").text()) - Number($(".cartDiscount").text()));
                    }

                    });
        }
                 
             
    }
    
    function editCart(cartId, idValue) {
        if($(".c_quantity"+idValue).val() !== "0") {
           $.ajax({
                url  : BASE_URL+"cart/"+cartId, 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data:{
                    api_token:localStorage.getItem("api_token"),
                    product_variant_combination_id:idValue,
                    _method:"PUT",
                    quantity:$(".c_quantity"+idValue).val(),
                    user_id:localStorage.getItem("user_oilkart_id")
                },
                success:function(data) {
                   //console.log(data);
                    if(data.status == 1) {
                      window.location.reload(true);
                    }
                }

            });
        }
         
    }
    
    function editQuantity() {
        for(var i=0;i<$(".priceAmount").length;i++) {
            var totalAm = 0;
            totalAm = totalAm + Number($(".baseValue:eq("+i+")").val()) * Number($(".cart_quantity:eq("+i+")").val());
            $(".priceAmount:eq("+i+")").text(totalAm);
        }
        
        calculateCart();
    }
    function removeItem(idValue) {
        if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
            $.ajax({
                url  : BASE_URL+"cart/"+idValue, 
                type : "DELETE",
                dataType: 'json',
                crossDomain:true,
                data:{
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                   //console.log(data);
                    if(data.status == 1) {
                        $("#cartItem"+idValue).remove();
                        if($(".totalItemsCount").text()!==0)
                        $(".totalItemsCount").text(Number($(".totalItemsCount:eq(0)").text())-1);
                        $(".grandTotal").text(Number($(".grandTotal").text()) - Number($(".cartDiscount").text()));
                        $(".cartDiscount").text("0");
                        calculateCart();
                        //$("#promoCode").val("");
                    }
                }

            });
        } else {
            $.ajax({
                url  : BASE_URL+"guest_cart/"+idValue, 
                type : "DELETE",
                dataType: 'json',
                crossDomain:true,
                success:function(data) {
                   //console.log(data);
                    if(data.status == 1) {
                        $("#cartItem"+idValue).remove();
                        if($(".totalItemsCount").text()!==0)
                        $(".totalItemsCount").text(Number($(".totalItemsCount:eq(0)").text())-1);
                        $(".grandTotal").text(Number($(".grandTotal").text()) - Number($(".cartDiscount").text()));
                        $(".cartDiscount").text("0");
                        calculateCart();
                        //$("#promoCode").val("");
                    }
                }

            });
        }
            
    }
    
    function calculateCart(){
        var total = 0;
        
        
        for(var i=0;i<$(".priceAmount").length;i++) {
            total = total + Number($(".baseValue:eq("+i+")").val()) * Number($(".cart_quantity:eq("+i+")").val());
        }
        
        $(".totalAmount").html(total);
        var totalAmount = Number($(".totalAmount:eq(0)").text()) - Number($(".cartDiscount:eq(0)").text());
        if(totalAmount < 500) {
          $(".deliveryCharge").text("0");
            totalAmount = totalAmount + 0;
           // $(".deliveryCharge").text("25");
           //  totalAmount = totalAmount + 25;
            $(".freeDelivery").hide();
        } else {
           $(".deliveryCharge").text("FREE");
            $(".freeDelivery").show();
        }
        $(".grandTotal").text(totalAmount);
        
    }
    function addNewPromo() {
        if($("#promoCode").val().indexOf("REF")>=0) {
           if($("#promoCode").val() !== "" && $(".cartDiscount").text()=="0") {
           $.ajax({
            url  : BASE_URL+"referal/"+$("#promoCode").val(), 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            data:{
                api_token:localStorage.getItem("api_token")
            },
            success:function(data) {
               //console.log(data);
                if(data.status == 1) {
                    sessionStorage.setItem("appliedPromoCode",$("#promoCode").val());
                    $(".modal").modal('hide');
                    if(Number($(".grandTotal").text()) >= data.data.min_cart_amount) {
                        $(".cartDiscount").text(data.data.max_amount);
                        calculateCart();  
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Oops!',
                          text: 'Minimum cart value should be '+data.data.min_cart_amount
                        })      
                    }
                } else {
                    Swal.fire({
                          type: 'error',
                          title: 'Oops!',
                          text: 'No promos found for this code.'
                        })  
                }
            }
            
            }); 
        }
        } else {
            if($("#promoCode").val() !== "" && $(".cartDiscount").text()=="0") {
           $.ajax({
            url  : BASE_URL+"offers/"+$("#promoCode").val(), 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            data:{
                api_token:localStorage.getItem("api_token")
            },
            success:function(data) {
               //console.log(data);
                if(data.status == 1) {
                    sessionStorage.setItem("appliedPromoCode",$("#promoCode").val());
                    $(".modal").modal('hide');
                    if(Number($(".grandTotal").text()) >= data.data.min_cart_amount) {
                        $(".cartDiscount").text(data.data.max_amount);
                        calculateCart();  
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Oops!',
                          text: 'Minimum cart value should be '+data.data.min_cart_amount
                        })      
                    }
                } else {
                    Swal.fire({
                          type: 'error',
                          title: 'Oops!',
                          text: 'No promos found for this code.'
                        })  
                }
            }
            
            }); 
        }   
        }
    }
    function viewProductDetail(idValue) {
        sessionStorage.setItem("current_productViewID",idValue);
        window.location.href="productView.php";
    }

</script>
</body>
</html>
<!-- Add Address Modal -->
<div id="addAddressModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" style="width: 77%;">
      <div class="modal-body" style="height:644px;padding: 5% 12% 9% 12%;">
        <div class="modalCloseBtn" data-dismiss="modal">X</div>
        <h5>Add New Address</h5>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#201e1e">Name</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#201e1e">Mobile No</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#201e1e">Pincode</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#201e1e">Address</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#201e1e">Locality</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#201e1e">City</label>
        </div>
        <div class="md-form">
          <p style="color:#201e1e">Type of Address</p>
          <p>
          <input type="radio" name="type"/> Home &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="type"/> Office
        </p>
          <p style="color:#201e1e">
          <input type="checkbox"/> Make this Default Address
        </p>

        </div>
        <div class="md-form" style="text-align: center;">
            <div class="btn btn-primary" tabindex="0" style="margin:auto;width:50%;background: #ff8f03 !important;border: 1px solid #ff8f03;color:#201e1e">Add Address</div>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="applyPromo" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" style="width: 77%;">
      <div class="modal-body" style="height:200px;padding: 5% 12% 9% 12%;">
        <div class="modalCloseBtn" data-dismiss="modal" style="bottom:91%">X</div>
        <h5>Add New Promo</h5>
        <div class="md-form">
          <input type="text" id="promoCode" onkeypress="if(event.keyCode == 13) addNewPromo()" class="form-control">
          <label for="promoCode" style="color:#201e1e">Promo Code</label>
        </div>
        <div class="md-form">
          <button class="btn btn-primary" onclick="addNewPromo()">Add</button>
        </div>
      </div>
    </div>

  </div>
</div>
