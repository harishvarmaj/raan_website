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
        
        .thumb-wrapper:hover {
            border:1px solid #d9d9d9;
            cursor:pointer;
        }
        .thumb-content h6 {
            color:#201e1e !important
        }
        .brandDiv {
            color: #999;
            padding-top:4%;
        }
        .categoryItem:hover {
            color:#ff8f03 !important;
            cursor: pointer
        }
        .categoryItem.active {
            color:#ff8f03 !important;
        }
    </style>
</head>
<body>
    <div class="main-content">

 <!-- Whole sale Enquiry -->
 <div class="row" style="padding:1%">
 <div class="col-md-2" style="padding-left: 10px;">
 <div class="card">
   <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
     <h5 class="card-title">Filters</h5>
     <div class="wholeSaleDiv" style="padding: 1% 0% 2% 0%;">
         <h6>Categories</h6>
         <span id="categoriesDiv">
             
         </span>
         <div class="row">
            <div class="col-md-6">
            Price
            </div>
             <div class="col-md-6" style="text-align: right">
                 <a class=""> Clear</a>
            </div>
         </div>
         <p style="padding:6%;margin-bottom:0;">
            <input id="ex2" type="text" class="span2" value="" data-slider-min="0" data-slider-max="3000" data-slider-step="5" data-slider-value="[0,3000]"/>
            <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text deliveryCheckMarker"  style="padding-left:0" id="basic-addon1">&#x20B9;</span>
                      </div>
                      <input type="text" style="padding-left:0;border-left:0;border-right:0;border-top: none;border-bottom: 1px solid #201e1e;border-radius:0" id="ex_min" class="form-control" placeholder="Min" onchange="filter()" aria-label="Enter Delivery Pincode" value="0" aria-describedby="Enter Delivery Pincode">
                    </div>
            </div>
             <div class="col-md-6" style="text-align: right">
                 <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text deliveryCheckMarker" style="padding-left:0" id="basic-addon1">&#x20B9;</span>
                      </div>
                      <input type="text" style="padding-left:0;border-left:0;border-right:0;border-top: none;border-bottom: 1px solid #201e1e;border-radius:0" id="ex_max" class="form-control" placeholder="Max" onchange="filter()" value="3000">
                    </div>
            </div>
         </div>
        <!-- <div class="row">
             <div class="col-md-6">
            Brand
                </div>
         </div>
         <div class="row">
             <div class="col-md-12 brandDiv">
                <div class="col-md-12">
                    <input type="checkbox" /> &nbsp;Gold Winner
                 </div>
                 <div class="col-md-12">
                    <input type="checkbox" /> &nbsp;Sunland
                 </div>
                 <div class="col-md-12">
                    <input type="checkbox" /> &nbsp;Fortune
                 </div>
                 <div class="col-md-12">
                    <input type="checkbox" /> &nbsp;SKM
                 </div>
                 <div class="col-md-12">
                    <input type="checkbox" /> &nbsp;Borges
                 </div>
                 <div class="col-md-12">
                    <input type="checkbox" /> &nbsp;Idhayam
                 </div>
            </div>
         </div>-->
         </p>
     </div>
   </div>
 </div>
 </div>
 <div class="col-md-10" style="padding-left: 10px;">
 <div class="card">
   <div class="card-body" style="padding:0;">
     <div class="wholeSaleDiv" style="padding: 1% 0% 2% 2%;">
<!--
        <span style="color:#c9c9c9">Home <i class="fa fa-angle-right"></i> Sunflower Oil <i class="fa fa-angle-right"></i></span> Refined Oil
        <h5 style="padding:2% 0% 1% 0%;">Refined Sunflower Oil</h5>
-->
         <ul class="nav nav-tabs productFilterTabs" style="border-bottom:none">
          <li style="margin-right: 2%;"><b>Sort by</b></li>
          <li class="active" style="margin-right: 2%;"><a data-toggle="tab" href="#bestsell">Best Seller</a></li>
          <li style="margin-right: 2%;"><a data-toggle="tab" href="#newprods">New Products</a></li>
          <li style="margin-right: 2%;"><a data-toggle="tab" href="#pricehl">Price : High to Low</a></li>
          <li><a data-toggle="tab" href="#pricelh">Price : Low to High</a></li>
        </ul>

        <div class="tab-content" style="padding:3% 2% 0% 2%">
          <div id="bestsell" class="tab-pane active">
            <div class="row productRow" id="bestSellingRow">
               

            </div>

          </div>
          <div id="newprods" class="tab-pane">
           <div class="row productRow" id="newProductsRow">
               

            </div>
          </div>
          <div id="pricehl" class="tab-pane">
             <div class="row productRow" id="priceHLRow">
               

            </div>
          </div>
            <div id="pricelh" class="tab-pane">
             <div class="row productRow" id="priceLHRow">
               

            </div>
          </div>
        </div>
     </div>
   </div>
 </div>
 </div>
 </div>
</div> <!-- End of Main Content -->
    <?php include("assets/misc/footer.php"); ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/jquery.slide.js"></script>
<script src="assets/js/mdb.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
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
       $("#ex2").slider({ min: 0, max: 3000, value: [0, 3000], focus: true });
       $("#ex2").change(function(){
          $("#ex_min").val($(this).val().split(",")[0]);
           $("#ex_max").val($(this).val().split(",")[1]);
           filter();
       });
           search();
       
      });
    
    function toggleWishlist(idValue) {
        
         if($("#wishlistIcon_ns"+idValue+":visible").length>0) {
            $.ajax({
                url  : BASE_URL+"wishlist", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data:{
                    product_variant_combination_id:idValue,
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  $("#wishlistIcon_ns"+idValue+":visible").hide();
                  $("#wishlistIcon_s"+idValue).show();
                }
            });
        } else if($("#wishlistIcon_s"+idValue+":visible").length>0) {
            $.ajax({
                url  : BASE_URL+"wishlist/"+idValue, 
                type : "DELETE",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                   $("#wishlistIcon_s"+idValue+":visible").hide();
                   $("#wishlistIcon_ns"+idValue).show();
                }
            });
        } else {
            $.ajax({
                url  : BASE_URL+"wishlist/"+idValue, 
                type : "DELETE",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                   $("#wishlistIcon_s"+idValue+":visible").hide();
                   $("#wishlistIcon_ns"+idValue).show();
                }
            });
        }
    }
    
    function search() {
        if(sessionStorage.getItem("globalSearchKeyword") == null || sessionStorage.getItem("globalSearchKeyword") == "null") {
            sessionStorage.setItem("globalSearchKeyword","")
        }
            var data; 
                 data = {
                    // api_token:localStorage.getItem("api_token") ,
                     keyword:  ""+sessionStorage.getItem("globalSearchKeyword"),
                     min_price:($("#ex_min").val()=="")?"0":$("#ex_min").val(),
                     max_price:($("#ex_max").val()=="")?"0":$("#ex_max").val()
                 }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
               //console.log(data);
                var html = '';
                var wid=0;
                if(data.status==1)
                for(var i=0;i<data.data.length;i++) {
                    if(data.data[i].enabled_products !== null){
                         html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                                    if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                        wid = data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html +'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>';  
                    }   
                }
                $("#bestSellingRow").html(html);
            }
            });
            
                 data = {
                     keyword:sessionStorage.getItem("globalSearchKeyword"),
                     min_price:0,
                     max_price:10000,
                     sort_by:"desc",
                     sort_by_field:"created_at"
                 }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
              //console.log(data);
                 var html = '';
                if(data.status == 1) {
                   for(var i=0;i<data.data.length;i++) {
                       if(data.data[i].enabled_products !== null){
                        var wid = 0;
                    html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                             if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                        wid = data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html+'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>'; 
                       }  
                    }
                }
                
                $("#newProductsRow").html(html);
               
            }
            }); 
            
                 data = {
                     keyword:sessionStorage.getItem("globalSearchKeyword"),
                     min_price:0,
                     max_price:10000,
                     sort_by:"desc",
                     sort_by_field:"price"
                 }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
              //console.log(data);
                 var html = '';
                if(data.status == 1) {
                   for(var i=0;i<data.data.length;i++) {
                       if(data.data[i].enabled_products !== null){
                        var wid = 0;
                    html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                             if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                        wid = data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html+'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>';
                       }   
                    }
                }
                
                $("#priceHLRow").html(html);
               
            }
            }); 
            
                 data = {
                     keyword:sessionStorage.getItem("globalSearchKeyword"),
                     min_price:0,
                     max_price:10000,
                     sort_by:"asc",
                     sort_by_field:"price"
                 }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
              //console.log(data);
                 var html = '';
                if(data.status == 1) {
                   for(var i=0;i<data.data.length;i++) {
                       if(data.data[i].enabled_products !== null){
                         var wid = 0;
                    html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                             if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                        wid = data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html+'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>'; 
                       }  
                    }
                }
                
                $("#priceLHRow").html(html);
               
            }
            }); 
    }
     function loadCategories() {
        $.ajax({
            url  : BASE_URL+"category", 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            success:function(data) {
              //console.log(data);
                var html = "";
                if(data.status == 1) {
                    for(var i=0;i<data.data.length;i++) {
                        html = html + '<p class="categoryItem cItem'+data.data[i].id+'" onclick="setCategoryId('+data.data[i].id+')" style="color:#c2c2c2;font-size:14px"><i class="fa fa-caret-right"></i> '+data.data[i].name+'</p>';
                    }
                    $("#categoriesDiv").html(html);
                }
                 $(".dropdown-content a").hover(function() {
                  if($(this).next(".subDropDown").length>0) {
                        $(".subDropDown:visible").hide();
                        $(this).next(".subDropDown").show();   
                   }  
                });
                if(sessionStorage.getItem("current_categoryId")!== undefined &&    sessionStorage.getItem("current_categoryId")!== "") {
                         setTimeout(function() {
                        setCategoryId(sessionStorage.getItem("current_categoryId"));  
                        filter();         
                        sessionStorage.setItem("current_categoryId","")
                      },1000);
                    }
            }
            
            }); 
    }
    loadCategories();
    
    function setCategoryId(idValue) {
        $(".categoryItem").removeClass('active');
        $(".cItem"+idValue).addClass('active');
        sessionStorage.setItem("currentCategoryID",idValue);
        filter();
    }
    function filter() {
        if($("#ex_min").val() !=="" && $("#ex_max").val() !=="" && $("#ex_max").val() !==0) {
            var data;
            if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
                 data = {
                     api_token:localStorage.getItem("api_token"),
                     category_id:  sessionStorage.getItem("currentCategoryID"),
                    min_price:($("#ex_min").val()=="")?"0":$("#ex_min").val(),
                    max_price:($("#ex_max").val()=="")?"0":$("#ex_max").val()
                 }
             } else {
                 data = {
                    category_id:  sessionStorage.getItem("currentCategoryID"),
                    min_price:($("#ex_min").val()=="")?"0":$("#ex_min").val(),
                    max_price:($("#ex_max").val()=="")?"0":$("#ex_max").val()
                 }
             }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
              //console.log(data);
                 var html = '';
                if(data.status == 1) {
                   for(var i=0;i<data.data.length;i++) {
                       var wid = 0;
                    html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                             if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                 wid= data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html+'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>';   
                    }
                }
                
                $("#bestSellingRow").html(html);
               
            }
            }); 
                 data = {
//                     api_token:localStorage.getItem("api_token"),
                     category_id:sessionStorage.getItem("currentCategoryID"),
                     min_price:0,
                     max_price:10000,
                     sort_by:"desc",
                     sort_by_field:"created_at"
                 }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
              //console.log(data);
                 var html = '';
                if(data.status == 1) {
                   for(var i=0;i<data.data.length;i++) {
                       var wid = 0;
                    html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                             if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                 wid= data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html+'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>';   
                    }
                }
                
                $("#newProductsRow").html(html);
               
            }
            }); 
                 data = {
                     category_id:sessionStorage.getItem("currentCategoryID"),
                     min_price:0,
                     max_price:10000,
                     sort_by:"desc",
                     sort_by_field:"price"
                 }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
              //console.log(data);
                 var html = '';
                if(data.status == 1) {
                   for(var i=0;i<data.data.length;i++) {
                       var wid = 0;
                    html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                             if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                 wid= data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html+'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>';   
                    }
                }
                
                $("#priceHLRow").html(html);
               
            }
            });    
                 data = {
//                     api_token:localStorage.getItem("api_token"),
                     category_id:sessionStorage.getItem("currentCategoryID"),
                     min_price:0,
                     max_price:10000,
                     sort_by:"asc",
                     sort_by_field:"price"
                 }
            $.ajax({
            url  : BASE_URL+"search", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:data,
            success:function(data) {
              //console.log(data);
                 var html = '';
                if(data.status == 1) {
                   for(var i=0;i<data.data.length;i++) {
                       var wid = 0;
                    html = html + '<div class="col-sm-3 productcarousel" style="padding: 1%;">'
							+'<div class="thumb-wrapper" style="padding: 3%;" >'
                                +'<div class="row productRow" style="position: relative;top: 6px;">'
                                +'<div class="col-md-10" style="text-align: left;padding-left: 22px;">'
//                                    +'<span class="alert alert-info productNew zIndex">New</span> &nbsp;&nbsp;'
                                    +'<span class="alert alert-info productBestSeller zIndex">Best Quality</span>'
                                +'</div>';
                             if(data.data[i].userwishlist[0] !== undefined && data.data[i].userwishlist[0] !== null && data.data[i].userwishlist[0].product_variant_combination_id == data.data[i].id) {
                                 wid= data.data[i].userwishlist[0].id;
                                       html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right;display:none" id="wishlistIcon_ns'+wid+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;" id="wishlistIcon_s'+wid+'" onclick="toggleWishlist('+wid+')" class="fa fa-heart"></span>'
                                    +'</div>';
                                       } else {
                                    html = html +'<div class="col-md-2 zIndex" style="padding-right:18px">'
                                        +'<span style="cursor:pointer;font-size:19px;color:#d2d2d2;float:right" id="wishlistIcon_ns'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="far fa-heart"></span>'
                                        +'<span style="float:right;cursor:pointer;font-size:19px;color:#dc3545;display:none" id="wishlistIcon_s'+data.data[i].id+'" onclick="toggleWishlist('+data.data[i].id+')" class="fa fa-heart"></span>'
                                    +'</div>';   
                                       }
                        html = html+'</div>'
								+'<div class="img-box">'
									+'<img onclick="viewProductDetail('+data.data[i].id+');" src="'+BASE_IMAGE_URL+''+data.data[i].enabled_products.images[0].path+'" class="img-responsive img-fluid" style="max-width:85%" alt="">'
								+'</div>'
								+'<div class="thumb-content" onclick="viewProductDetail('+data.data[i].id+');">'
									+'<h6 style="text-transform:capitalize">'+data.data[i].enabled_products.name+'</h6>'
									+'<p class="item-price" style="color:#ff8f03;text-transform:capitalize">'+data.data[i].enabled_products.brand+'</p>'
									+'<p class="item-price"><span style="color:#222">'+data.data[i].price+'</span> <strike>'+data.data[i].mrp+'</strike> </p>'
								+'</div>'
							+'</div>'
						+'</div>';   
                    }
                }
                
                $("#priceLHRow").html(html);
               
            }
            });  
        }       
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
