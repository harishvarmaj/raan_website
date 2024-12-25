
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/mdb.min.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap-slider.min.css" />
  <link rel="stylesheet" href="assets/css/productCarausel.css" />
     <?php include("assets/misc/header.php"); ?>
    <script>document.title = title;</script>
    <style>
        .slider-selection {
            background: #ff8f03;
        }
        .productPanel:hover {
            border:1px solid #d9d9d9;
        }
        .swal2-container {
            z-index: 9999 !important;
        }
    </style>
</head>
<body>
    <div class="main-content">

 <!-- Whole sale Enquiry -->
 <div class="row" style="padding:1%">
 <div class="col-md-12" style="padding-left: 10px;">
 <div class="card">
   <div class="card-body" style="padding:0;">
     <div class="wholeSaleDiv" style="padding: 0% 0% 2% 2%;">
         <div class="row" style="padding:1%">
            <span><a href="index.php" style="color:#c9c9c9">Home</a> <i class="fa fa-angle-right"></i> <span id="categoryName" tyle="color:#c9c9c9">Sunflower Oil <i class="fa fa-angle-right"></i></span></span>
         </div>
         <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3" id="thumbnailDiv"> <!--Thumbnails-->
<!--
                    <div class="row imgCap">
                        <img src="assets/imgs/site/product_1.jpg" width="150" height="150"/>
                    </div>
                    <div class="row imgCap">
                        <img src="assets/imgs/site/product_2.jpg" width="150" height="150"/>
                    </div>
                    <div class="row imgCap">
                        <img src="assets/imgs/site/product_3.jpg" width="150" height="150"/>
                    </div>
-->
                    </div>
                    <div class="col-md-9" style="padding: 0% 0% 0% 4%;"> <!--Thumbnails view-->
                        <div class="row productRow" style="position: relative;top: 2%;">
                                <div class="col-md-10">
                                    <!--<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;-->
                                    <span class="alert alert-info productBestSeller zIndex">Best Quality</span>
                                </div>
                                <div class="col-md-2 zIndex">
                                    <span style="cursor:pointer;font-size:19px;color:#949292;float:right" id="wishlistIcon_ns" onclick="toggleWishlist()" class="far fa-heart"></span>
                                    <span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s" onclick="toggleWishlist()" class="fa fa-heart"></span>
                                </div>
                        </div>
                        <div class="row thumbnailViewCap">
                            <img src="" id="imgCap_active" onclick="zoomModal()" style="display:none;margin: auto;" width="400" height="400"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding: 0% 0% 0% 3%;">
                <h5 style="color: #201e1e;font-weight: bold;text-transform:capitalize" id="productName">Fortune Refined, Sunlite Sunflower Oil, 1 Ltr Pack</h5>
                <div class="row"  style="padding: 2% 0% 0% 2.2%;">
                    <span style="color:#949292">Brand : </span><span id="productBrand" style="color:#ff8f03;text-transform:capitalize"> Fortune</span> &nbsp;&nbsp;&nbsp; <span style="color:#949292">Product Code : </span> <span style="color:#ff8f03;text-transform:capitalize" id="productCode">S01002</span>
                </div>
                <div class="row" style="padding: 2% 0% 0% 2.2%;">
                    Price <span id="productQuantity">()</span>
                </div>
                <div class="row" style="padding: 2% 0% 0% 2.2%;">
                    <h3 id="productPrice">&#x20B9; 190</h3> &nbsp;&nbsp;&nbsp;
                    <span style="color:#949292;padding-top: 1%;">MRP: <strike>Rs. <span id="productMRP">249</span></strike></span> &nbsp;<span style="padding-top: 1%;color:#fd1fad">( <span id="offerPrice">Rs. 0</span> Offer )</span>
                </div>
                <div class="row" style="padding: 2% 0% 0% 2.2%;">
                    Quantity
                </div>
                <div class="row" style="padding: 2% 0% 0% 2.2%;">
                    <input type="number" class="form-control" id="quantity" min="1" max="100" value="1" style="width:80px;border-top: 0;border-left: 0;border-right: 0;border-radius: 0;"/>
                       
                </div>
                <div class="row" style="padding: 3% 0% 0% 0%;">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" tabindex="0" style="height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;color:#201e1e;width:96%;background: #ff8f03 !important;border: 1px solid #ff8f03;" onclick="addToCart();">Add to Cart</button>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary" tabindex="0" style="height: 49px;font-weight: bold;font-size: 15px;border-radius: 8px;text-transform:capitalize;width:83%;background: #201e1e !important;border: 1px solid #201e1e;" onclick="BuyNow();">Buy Now</a>
                    </div>
                </div>
                <div class="row" style="padding: 2% 0% 0% 2.2%;">
                    Delivery
                </div>
                <div class="row" style="padding: 2% 0% 0% 2.2%;">
                    <div class="input-group mb-3" style="width:55%">
                      <div class="input-group-prepend">
                        <span class="input-group-text deliveryCheckMarker" id="basic-addon1"><i class="fa fa-map-marker-alt yellowColor"></i></span>
                      </div>
                      <input type="text" style="border-left:0;border-right:0;border-top: none;border-bottom: 1px solid #201e1e;" id="checkCodeInput" class="form-control" placeholder="Enter Delivery Pincode"  onkeypress="if(event.keyCode==13) validatePincode()" aria-label="Enter Delivery Pincode" aria-describedby="Enter Delivery Pincode">
                         <div class="input-group-append">
                            <button type="submit" class="input-group-text deliveryCheckMarker2" onclick="validatePincode()" id="basic-addon2">Check</button>
                          </div>
                    </div>
                </div>
                <div class="row" style="padding: 2% 0% 0% 2.2%;color:#201e1e">
                    <img src="assets/imgs/site/delivery_time.png" height="20" width="32"/> &nbsp;&nbsp; Delivery in 90 Minutes
                </div>
<!--
                <div class="row" style="padding: 2% 0% 0% 2.2%;color:#201e1e">
                    <img src="assets/imgs/site/delivery_time.png" height="20" width="32"/> &nbsp;&nbsp; Order placing after 6 pm, will be delivered Tomorrow
                </div>
-->
                <div class="row" style="padding: 2% 0% 0% 2.2%;color:#201e1e">
                    <img src="assets/imgs/site/delivery.png" height="20" width="32"/> &nbsp;&nbsp; Free Delivery on above Rs. 500.
                </div>
            </div>
         </div>
         <div class="row" style="padding:2% 0% 0% 1%">
            <h4>Description</h4>
         
         </div>
<!--
         <div class="row" style="padding:1% 3% 0% 1%">
            <h5>Fortune Sunflower Refined Oil</h5>
         </div>
         <div class="row" style="padding:1% 3% 0% 1%">
            <h6>About the Product</h6>
         </div>
-->
         <div class="row" style="padding:0% 3% 0% 1%">
            <p style="color:#999" id="product_desc">
             Fortune Refined, Sunlite Sunflower Oil is a light, healthy and nutritious cooking oil. Being rich in vitamins and consisting mainly of polyunsatured fatty acids, it makes food easy to digest.
            </p>
         </div>
<!--
         <div class="row" style="padding:1% 3% 0% 1%">
            <h6>Ingrediant</h6>
         </div>
         <div class="row" style="padding:0% 3% 0% 1%">
            <p style="color:#999">
                 Fortune Refined, Sunlite Sunflower Oil, Permitted Antioxidant TBHQ (E-319), Vitamin A &amp; Vitamin D.
            </p>
         </div>
         <div class="row" style="padding:1% 3% 0% 1%">
            <h6>Nutritional Facts</h6>
         </div>
         <div class="row" style="padding:0% 3% 0% 1%">
            <p style="color:#999">
                Energy - 900 Kcal; Carbohydrates, Protein - 0g; Cholestrol - 0g; Fat - 100g
            </p>
         </div>
         <div class="row" style="padding:1% 3% 0% 1%">
            <h6>Benefits</h6>
         </div>
         <div class="row" style="padding:0% 3% 0% 1%">
            <p style="color:#999">
                It is manufactured through H.A.R.T process and is light and healthy that is easy to digest. It is rich in Vitamin E which keeps the skin healthy and good for the immune system.
            </p>
         </div>
-->
         
     </div>
   </div>
 </div>
     
     <!--Feature Products-->
     <div class="row featureProducts" style="margin-top: 15px;margin-bottom: 15px;">
        <div class="col-md-12">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;">
              <h5 class="card-title">Feature Products</h5>
              <?php include("assets/misc/productSliders/featureproducts.php"); ?>
            </div>
          </div>
        </div>
      </div>
 </div>
 </div>
</div> <!-- End of Main Content -->
    <?php include("assets/misc/footer.php"); ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.slide.js"></script>
<script src="assets/js/mdb.min.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/productCarousal.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
   $(function() {
         $(".productFilterTabs li").click(function() {
        $(".productFilterTabs .active").removeClass("active");
           $(this).addClass("active");
       });
        $('.bannerSlider').slide({
          'slideSpeed': 6000,
          'isShowArrow': true,
          'dotsEvent': 'mouseenter',
          'isLoadAllImgs': true
        });
       $("#ex2").slider({ min: 50, max: 500, value: [50, 500], focus: true });
       $("#ex2").change(function(){
          $("#ex_min").val("\&#x20B9; " +$(this).val().split(",")[0]);
           $("#ex_max").val("\&#x20B9;" +$(this).val().split(",")[1]);
       });
       $(".imgCap:eq(0)").addClass("active");
       $("#imgCap_active").attr("src",$(".imgCap:eq(0) img").attr("src"));
       $("#imgCap_active").show();       
        productDetails();  
       loadFeatured();
        if(localStorage.getItem("user_oilkart_loggedIn") !== "true") {
            $("#wishlistIcon_ns, #wishlistIcon_s").hide();
        }
       
   });
    
    function validatePincode() {
        var pincode = $("#checkCodeInput").val();
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
                      text: 'Delivery is available for this location'
                    })
                } else {
                    Swal.fire({
                      type: 'error',
                      title: 'Oops!',
                      text: 'Delivery is  not available for this location!'
                    })
                }
            }
            
            });   
        }
    }
    
    function addToCart() {
        if(sessionStorage.getItem("ProductStockStatus")== "0") {
             Swal.fire({
                      type: 'error',
                      title: 'Oops!',
                      text: $("#productName").text()+' is out of stock!'
                    })
           return false;
        }
        if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
             $.ajax({
                url  : BASE_URL+"cart", 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
                data:{
                    api_token:localStorage.getItem("api_token"),
                },
                success:function(data) {
                   //console.log(data);
                    var added = false;
                    if(data.status == 1) {
                        for(var i=0;i<data.data.length;i++) {
                            if(data.data[i].product_combinations.id == sessionStorage.getItem("current_productViewID")) {
                                added=true;
                               $.ajax({
                                    url  : BASE_URL+"cart/"+data.data[i].id, 
                                    type : "POST",
                                    dataType: 'json',
                                    crossDomain:true,
                                    data:{
                                        api_token:localStorage.getItem("api_token"),
                                        product_variant_combination_id:data.data[i].product_variant_combination_id,
                                        _method:"PUT",
                                        quantity:Number(data.data[i].quantity) + 1,
                                        user_id:localStorage.getItem("user_oilkart_id")
                                    },
                                    success:function(data) {
                                       //console.log(data);
                                        if(data.status == 1) {
                                        if(sessionStorage.getItem("fromCart") == "buyNow") {
                                        window.location.href="mycart.php"   
                                        }
                                           Swal.fire({
                                              type: 'success',
                                              title: 'Success!',
                                              text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                            })
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
                                    product_variant_combination_id:sessionStorage.getItem("current_productViewID"),
                                    user_id:localStorage.getItem("user_oilkart_id"),
                                    quantity:$("#quantity").val()
                                },
                                success:function(data) {
                                   //console.log(data);
                                    if(data.status == 1) {
                                        if(sessionStorage.getItem("fromCart") == "buyNow") {
                                            window.location.href="mycart.php"   
                                        }
                                         getCartItemCount();
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Success!',
                                          text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                        })
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
                                product_variant_combination_id:sessionStorage.getItem("current_productViewID"),
                                user_id:localStorage.getItem("user_oilkart_id"),
                                quantity:$("#quantity").val()
                            },
                            success:function(data) {
                               //console.log(data);
                                if(data.status == 1) {
                                    if(sessionStorage.getItem("fromCart") == "buyNow") {
                                            window.location.href="mycart.php"   
                                        }
                                     getCartItemCount();
                                    Swal.fire({
                                      type: 'success',
                                      title: 'Success!',
                                      text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                    })
                                } 
                            }

                        });       
                    } 
                }

            });     
        } else {
            if(localStorage.getItem("temp_user_id")=="" || localStorage.getItem("temp_user_id") == null) {
               localStorage.setItem("temp_user_id",new Date().getMonth()+""+new Date().getDate()+""+new Date().getMinutes()+Math.floor(Math.random()*10000))
            }
            $.ajax({
                url  : BASE_URL+"guest_cart/"+localStorage.getItem("temp_user_id"), 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
//                data:{
//                    api_token:localStorage.getItem("api_token"),
//                },
                success:function(data) {
                   //console.log(data);
                    var added = false;
                    if(data.status == 1) {
                        for(var i=0;i<data.data.length;i++) {
                            if(data.data[i].product_combinations.id == sessionStorage.getItem("current_productViewID")) {
                                added=true;
                               $.ajax({
                                    url  : BASE_URL+"guest_cart/"+data.data[i].id, 
                                    type : "POST",
                                    dataType: 'json',
                                    crossDomain:true,
                                    data:{ product_variant_combination_id:data.data[i].product_variant_combination_id,
                                        _method:"PUT",
                                        quantity:Number(data.data[i].quantity) + 1,
                                    },
                                    success:function(data) {
                                       //console.log(data);
                                        if(data.status == 1) {
                                            if(sessionStorage.getItem("fromCart") == "buyNow") {
                                            window.location.href="mycart.php"   
                                            }
                                           Swal.fire({
                                              type: 'success',
                                              title: 'Success!',
                                              text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                            })
                                        }
                                    }

                                });
                            } 
                        }
                        if(!added) {
                           $.ajax({
                                url  : BASE_URL+"guest_cart", 
                                type : "POST",
                                dataType: 'json',
                                crossDomain:true,
                                data:{
                            product_variant_combination_id:sessionStorage.getItem("current_productViewID"),
                                guest_cart_id:localStorage.getItem("temp_user_id"),
                                quantity:$("#quantity").val()
                            },
                                success:function(data) {
                                   //console.log(data);
                                    if(data.status == 1) {
                                        if(sessionStorage.getItem("fromCart") == "buyNow") {
                                            window.location.href="mycart.php"   
                                        }
                                         getCartItemCount();
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Success!',
                                          text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                        })
                                    } 
                                }

                            });
                        }
                    } else {
                         $.ajax({
                            url  : BASE_URL+"guest_cart", 
                            type : "POST",
                            dataType: 'json',
                            crossDomain:true,
                            data:{
                            product_variant_combination_id:sessionStorage.getItem("current_productViewID"),
                                guest_cart_id:localStorage.getItem("temp_user_id"),
                                quantity:$("#quantity").val()
                            },
                            success:function(data) {
                               //console.log(data);
                                if(data.status == 1) {
                                    if(sessionStorage.getItem("fromCart") == "buyNow") {
                                            window.location.href="mycart.php"   
                                    }
                                     getCartItemCount();
                                    Swal.fire({
                                      type: 'success',
                                      title: 'Success!',
                                      text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                    })
                                } 
                            }

                        });       
                    } 
                }

            }); 
            getCartItemCount();
        }
    }
    
    
    function BuyNow() {
        sessionStorage.setItem("fromCart","buyNow");
        addToCart();
        //window.location.href = "mycart.php"; 
    }
    
    function zoomModal() {
        $("#zoomModal").modal('show');
        $("#zoomModal_Image").attr("src", $("#imgCap_active").attr("src")).show();
    }
    
    function productDetails() {
        var prodID = sessionStorage.getItem("current_productViewID");
        var data;
        if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
            data = {
                api_token:localStorage.getItem("api_token")
            }
           }
        $.ajax({
            url  : BASE_URL+"product/"+prodID, 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
               //console.log(data);
                var imgs = data.data.images;
                var imgHTML = '';
                sessionStorage.setItem("ProductStockStatus",data.data.variant_combinations[0].quantity);
                $("#productName").html(data.data.name);
                $("#productBrand").html(data.data.brand);
                $("#productPrice").html("&#x20B9; "+data.data.variant_combinations[0].price);
                $("#productMRP").html(data.data.variant_combinations[0].mrp);
                $("#product_desc").html(data.data.description);
                $("#offerPrice").html("Rs. "+(Number(data.data.variant_combinations[0].mrp)-Number(data.data.variant_combinations[0].price)));
                $("#productQuantity").html(" &nbsp;<span style='color:#ff8f03'>( "+data.data.variant_combinations[0].product_variant_option.name+" )</span>");
                if(data.data.variant_combinations[0].userwishlist[0] !== undefined && data.data.variant_combinations[0].userwishlist[0] !== null && data.data.variant_combinations[0].userwishlist[0].product_variant_combination_id == prodID) {
                   $("#wishlistIcon_s").show();
                    $("#wishlistIcon_ns").hide();
                    sessionStorage.setItem("wid",data.data.variant_combinations[0].userwishlist[0].id);
                }
                for(var i=0;i<imgs.length;i++) {
                    var active = (i == 0)?'active':'';
                    imgHTML = imgHTML + '<div class="row imgCap '+active+'"><img src="'+BASE_IMAGE_URL+''+imgs[i].path+'" width="150" height="150"/></div>';
                    $("#imgCap_active").attr("src",BASE_IMAGE_URL+imgs[0].path);
                }
                $("#thumbnailDiv").html(imgHTML);
                $(".imgCap").click(function(){
                   $(".imgCap").removeClass("active");
                  $("#imgCap_active").attr("src",$(this).find("img").attr("src"));
                $(this).addClass("active");
               });
               
                // Get category name
                $("#categoryName").html('<a style="color:#c9c9c9" onclick="loadCategory('+data.data.category_id+')" >'+categoryName[data.data.category_id]+'</a> <i class="fa fa-angle-right"></i></span>&nbsp; '+data.data.name);
                
            }
            
            });
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

<!--Zoom Modal-->


<div id="zoomModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top: 7%;">
    <div class="modal-content" style="width: 100%;">
      <div class="modal-body" style="height:484px;padding: 5% 12% 9% 12%;">
        <img src="" id="zoomModal_Image" style="display:none;width:100%"/>
      </div>
    </div>

  </div>
</div>

