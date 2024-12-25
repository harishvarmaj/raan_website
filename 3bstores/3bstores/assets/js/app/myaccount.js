$(function() {

       showPanel('profilePanel','profile');
       if(sessionStorage.getItem("isFromWishList")== "true") {
          showPanel('wishlistPanel','mywishlist');
           loadWishlist();
            sessionStorage.setItem("isFromWishList","");
        } else if (sessionStorage.getItem("isFromReferral") == "true") {
            showPanel('referalPanel','referal');
            getReferalCodes()
            sessionStorage.setItem("isFromReferral","");
        }
    $(".display_name").text(localStorage.getItem("user_oilkart_name"));
      });
    
    function showPanel(idValue,menuID) {
        $(".customPanel").hide();
        $("."+idValue).show();
        $(".accountBtn").removeClass("active");
        $("."+menuID).addClass("active");
        if(menuID == "profile") {
           account.getUser();
           editCancel();
        }
        if(menuID == "manageaddress") {
           viewAllAddress();
        }
    }
    function getReferalCodes() {   
        var yourCode=localStorage.getItem("user_oilkart_name").substr(0,5);
        while(yourCode.length<5){
            yourCode=yourCode+"X";
        }
        $(".yourCode").text(yourCode+""+localStorage.getItem("user_oilkart_id"));
        $.ajax({
                                url  : BASE_URL+"referal", 
                                type : "GET",
                                dataType: 'json',
                                crossDomain:true,
                                data:{
                                    api_token:localStorage.getItem("api_token"),
                                },
                                success:function(data) {
                                   //console.log(data);
                                    $(".referalList").html("");
                                    if(data.status == 1 && data.data.length>0) {
                                        for(var i=0;i<data.data.length;i++) {
                                            if(data.data[i].completed=="1") {
                                                  $(".referalList").append('<div class="col-md-4">'
                                                                    +'<div class="panel-header" style="padding: 3%;background:#feb81c;font-weight:bold;color:#2b617d !important;text-align:center">'+data.data[i].code+'</div>'
                                                                    +'<div class="panel-body" style="padding: 3%;border: 1px solid #feb81c;">'
                                                                    +'Max Amount: '+data.data[i].max_amount
                                                                    +'<br>Minimum Cart Amount: '+data.data[i].min_cart_amount
                                                                    +'<br><hr><span style="font-size:12px">'+data.data[i].description+'</span>'
                                                                    +'<br><hr><span style="font-size:12px;color:red">You have used this</span>'
                                                                    +'</div>'
                                                                +'</div>');
                                            } else {
                                                $(".referalList").append('<div class="col-md-4">'
                                                                    +'<div class="panel-header" style="padding: 3%;background:#feb81c;font-weight:bold;color:#2b617d !important;text-align:center">'+data.data[i].code+'</div>'
                                                                    +'<div class="panel-body" style="padding: 3%;border: 1px solid #feb81c;">'
                                                                    +'Max Amount: '+data.data[i].max_amount
                                                                    +'<br>Minimum Cart Amount: '+data.data[i].min_cart_amount
                                                                    +'<br><hr><span style="font-size:12px">'+data.data[i].description+'</span>'
                                                                    +'<br><hr><span style="font-size:12px;color:green">Not used yet</span>'
                                                                    +'</div>'
                                                                +'</div>');    
                                            }           
                                        }
                                    } 
                                }

                            });
    }
    function addToCart(idValue,wishlistId) {
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
                            if(data.data[i].product_combinations.id == idValue) {
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
                                           Swal.fire({
                                              type: 'success',
                                              title: 'Success!',
                                              text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                            })
                                        }
                                         deleteWishlist(wishlistId);
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
                                         getCartItemCount();
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Success!',
                                          text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                        })
                                         deleteWishlist(wishlistId);
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
                                     getCartItemCount();
                                    Swal.fire({
                                      type: 'success',
                                      title: 'Success!',
                                      text: 'You have added '+$("#quantity").val()+' of this products to the cart'
                                    })
                                     deleteWishlist(wishlistId);
                                } 
                            }

                        });       
                    } 
                }

            });
//         $.ajax({
//            url  : BASE_URL+"cart", 
//            type : "POST",
//            dataType: 'json',
//            crossDomain:true,
//            data:{
//                api_token:localStorage.getItem("api_token"),
//                product_variant_combination_id:idValue,
//                user_id:localStorage.getItem("user_oilkart_id"),
//                quantity:"1"
//            },
//            success:function(data) {
//               //console.log(data);
//                if(data.status == 1) {
//                    getCartItemCount();
//                    Swal.fire({
//                      type: 'success',
//                      title: 'Success!',
//                      text: 'You have added this product to the cart.'
//                    }) 
//                   
//                } 
//            }
//            
//            }); 
    }
    function editInfo() {
         $(".profilePanel input").attr("disabled",false);
        $(".profilePanel input").first().focus();
        $("#editInfoBtn").hide();
        $("#saveBtn,#cancelBtn").show();
    }
    
    function editCancel() {
         $(".profilePanel input").attr("disabled",true);
        $("#editInfoBtn").show();
        $("#saveBtn,#cancelBtn").hide();
    }
    
    function editSave() {
        if(userMobile == $("#d_mobileNo").val()) {
            var id = localStorage.getItem("user_oilkart_id");
            var form = new FormData($("#updateProfileForm")[0]);
            form.append("name",$("#fname").val());
            form.append("_method","PUT");
            form.append("email",$("#mail").val());
            form.append("phone",$("#d_mobileNo").val());
            form.append("id",id);
          $.ajax({
            url  : BASE_URL+"profile/"+id, 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            processData: false,
            contentType: false,
            mimeType: "multipart/form-data",
            data:form,
            cache : false,
            success:function(data) {
                //console.log(data);
                if(data.status == 1) {
                    Swal.fire({
                      type: 'success',
                      title: 'Success!',
                      text: 'Profile updated successfully.'
                    })
                    $(".profilePanel input").attr("disabled",true);
                    $("#editInfoBtn").show();
                    $("#saveBtn,#cancelBtn").hide();
                    $(".modal").modal("hide");
                }
            }
        });
        } else {
            localStorage.setItem("otpFor","mobileChange");
            otp_mobileNumber();
        }
           
    }
    
    function addAddress() {
        if($("#a_name").val() == "") {
           $("#a_name").focus();
        } else if($("#a_mobileNo").val() == "") {
           $("#a_mobileNo").focus();
        } else if($("#a_pincode").val() == "") {
           $("#a_pincode").focus();
        } else if($("#a_address").val() == "") {
           $("#a_address").focus();
        } else if($("#a_locality").val() == "") {
           $("#a_locality").focus();
        } else if($("#a_city").val() == "") {
           $("#a_city").focus();
        } else if($("#a_state").val() == "") {
           $("#a_state").focus();
        } else {
             $.ajax({
                url  : BASE_URL+"user-address", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token"),
                    name:$("#a_name").val(),
                    mobile:$("#a_mobileNo").val(),
                    address_1:$("#a_address").val(),
                    address_2:$("#a_locality").val(),
                    pincode:$("#a_pincode").val(),
                    type:$("input[name='addtype']:checked").val(),
                    city:$("#a_city").val(),
                    state:$("#a_state").val(),
                    user_id:localStorage.getItem("user_oilkart_id")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                       $(".modal").modal('hide');
                        viewAllAddress();
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Error!',
                          text: 'Something went wrong !!'
                        })
                    }
                }
            });
        }
    }
   function deleteAddress(idValue) {
        var confirmDelete = confirm("Are you sure to delete this address");
        if(confirmDelete == true) {
            $.ajax({
                url  : BASE_URL+"user-address/"+idValue, 
                type : "DELETE",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                        viewAllAddress();
                    } else {
                         Swal.fire({
                          type: 'error',
                          title: 'Error!',
                          text: 'Something went wrong !!'
                        })
                    }
                }
            });   
        }
    }
    function getPromoOffers() {
         $.ajax({
                url  : BASE_URL+"cms", 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                        var totalOffers = 0;
                      for(var i=0;i<data.data.length;i++) {
                          if(data.data[i].slug == "Offer-both" || data.data[i].slug == "Offer-web") {
                             $(".promoOffersDiv").append('<div class="row">'
                                                             +'<div class="col-md-6">'
                                                                +'<img style="width:100%" src="'+BASE_IMAGE_URL+''+data.data[i].images[0].path+'"/>'
                                                             +'</div>'
                                                             +'<div class="col-md-6">'  
                                                                +'<div class="row"><b>'
                                                                +data.data[i].offers[0].title+''
                                                                +'<hr style="margin-top:0"></b></div>'
                                                                +'<div class="row">'
                                                                +'CODE : <b> &nbsp;'+data.data[i].offers[0].code
                                                                +'</b></div>'
                                                                +'<div class="row">'
                                                                +'DISCOUNT : <b> &nbsp;'+data.data[i].offers[0].discount
                                                                +'%</b></div>'
                                                                +'<div class="row">'
                                                                +'MINIMUM CART AMOUNT : <b> &nbsp;'+data.data[i].offers[0].max_amount
                                                                +'</b></div>'
                                                             +'</div>'
                                                         +'</div>');
                              totalOffers++;
                            }
                      }  
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Error!',
                          text: 'Something went wrong !!'
                        })
                    }
                    $(".promoOfferCount").text(totalOffers);
                }
            }); 
    }
     function viewAllAddress() {
        $.ajax({
                url  : BASE_URL+"user-address", 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token"),
                },
                success:function(data) {
                    var html= "";
                if(data.status == 1) {
                      for(var i=0;i<data.data.length;i++) {
                      html = html + '<div class="col-md-4 addressPanel2" style="margin-bottom: 6%;">'
                                          +'<div class="card" style="box-shadow:none;">'
                                            +'<div class="card-body" onclick="addressClick(this,'+data.data[i].id+')">'
                                            +'  <h5 class="card-title"> <b>'+data.data[i].name+' </b> <hr></h5>'
                                              +'<p style="padding: 0% 8% 0% 9%;">'
                                                  +'<span style="background: #e3e3e3;color:grey">'+data.data[i].type+'</span>'
                                              +'</p>'
                                              +'<p style="padding: 0% 8% 0% 9%;">'
                                                +data.data[i].address_1+', '+data.data[i].address_1+', '+data.data[i].state+' - '+data.data[i].pincode+' <br>'
                                                +'Mobile : +91 '+data.data[i].mobile+''
                                              +'</p>'
                                              +'<hr style="margin:0">'
                                              +'<div class="row">'
                                                +'<div class="col-md-6">'
                                                  +'<a class="btn btn-link waves-effect waves-light" onclick="deleteAddress('+data.data[i].id+')" style="color: #bf134e !important;text-transform: capitalize;">Remove</a>'
                                                +'</div>'
                                                +'<div class="col-md-6">'
                                                  +'<a onclick="editAddress('+data.data[i].id+')" class="btn btn-link waves-effect waves-light" style="text-transform: capitalize;color: #bf134e !important;">Edit</a>'
                                                +'</div>'
                                              +'</div>'
                                            +'</div>'
                                          +'</div>'
                                        +'</div>';
                  }
                }
                    html = html + '<div class="col-md-4" style="margin-bottom: 6%;">'
                                      +'<div class="card" style="height:100%;min-height: 250px;box-shadow:none;cursor:pointer" data-toggle="modal" data-target="#addAddressModal">'
                                        +'<div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;margin:auto">'
                                          +'<p style="text-align:center;position: relative;top: 30%;">'
                                            +'<i class="fa fa-plus-circle" style="font-size: 30px;"></i><br>'
                                            +'Add New Address</p>'
                                        +'</div>'
                                      +'</div>'
                                    +'</div>';
                    $(".addressesDiv").html(html);
                }
            });
    }

    function addressClick(_this, idValue){
               $(".addressActive").removeClass("addressActive"); 
               _this.setAttribute("class","card-body addressActive");
                sessionStorage.setItem("currentCartAddress",idValue);
     }

    function editAddress(idValue) {
        $("#updateAddrBtn").attr("onclick","updateAddress("+idValue+")");
        $("#editAddressModal").modal('show');
          $.ajax({
                url  : BASE_URL+"user-address/"+idValue, 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                       $("#e_name").val(data.data[0].name).change();
                        $("#e_address").val(data.data[0].address_1).change();
                        $("#e_locality").val(data.data[0].address_2).change();
                        $("#e_pincode").val(data.data[0].pincode).change();
                        $("#e_mobileNo").val(data.data[0].mobile).change();
                        $("#e_city").val(data.data[0].city).change();
                        $("#e_state").val(data.data[0].state).change();
                        $("#e_"+data.data[0].type).attr("checked",true);
                    } 
                }
            });
    }

    function updateAddress (idValue) {
        
        if($("#e_name").val() == "") {
           $("#e_name").focus();
        } else if($("#e_mobileNo").val() == "") {
           $("#e_mobileNo").focus();
        } else if($("#e_pincode").val() == "") {
           $("#e_pincode").focus();
        } else if($("#e_address").val() == "") {
           $("#e_address").focus();
        } else if($("#e_locality").val() == "") {
           $("#e_locality").focus();
        } else if($("#e_city").val() == "") {
           $("#e_city").focus();
        } else if($("#e_state").val() == "") {
           $("#e_state").focus();
        } else {
             $.ajax({
                url  : BASE_URL+"user-address/"+idValue, 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data : {
                    _method:"PUT",
                    api_token:localStorage.getItem("api_token"),
                    name:$("#e_name").val(),
                    mobile:$("#e_mobileNo").val(),
                    address_1:$("#e_address").val(),
                    address_2:$("#e_locality").val(),
                    pincode:$("#e_pincode").val(),
                    type:$("input[name='addtype']:checked").val(),
                    city:$("#e_city").val(),
                    state:$("#e_state").val(),
                    user_id:localStorage.getItem("user_oilkart_id")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                       $(".modal").modal('hide');
                        Swal.fire({
                          type: 'success',
                          title: 'Success!',
                          text: 'Update Success.'
                        })
                        viewAllAddress();
                    } 
                }
            });
        }
    }
    function loadWishlist() {
        $.ajax({
                url  : BASE_URL+"wishlist", 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token"),
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                        $(".wishListItems").text(data.data.length);
                       var html = '';
                        for(var i=0;i<data.data.length;i++) {
                            html = html +'<div class="row itemRow" style="padding: 0% 2% 1% 2%;">'
                                              +'<div class="col-md-2">'
                                                  +'<img src="'+BASE_IMAGE_URL+''+data.data[i].product_combinations.enabled_products.images[0].path+'" style="width:100%"/>'
                                              +'</div>'
                                              +'<div class="col-md-7">'
                                                  +'<p><b style="color:#2b617d;text-transform:capitalize"><a>'+data.data[i].product_combinations.enabled_products.name+'</a></b> <br>'
                                                      +'<span style="color:grey">Brand : </span>'
                                                      +'<span style="color:#feb81c;text-transform:capitalize">'+data.data[i].product_combinations.enabled_products.brand+'</span> &nbsp;&nbsp;&nbsp;'
                                                      +'<span style="color:grey">Product Code :</span>'
                                                      +'<span style="color:#feb81c">S01002</span>'
                                                    +'<p><a style="color:#fd1fad;" onclick="deleteWishlist('+data.data[i].id+');"><i class="fa fa-times-circle"></i> Remove</a> &nbsp;&nbsp;&nbsp;<a onclick="addToCart('+data.data[i].product_combinations.id+','+data.data[i].id+')" style="color:#fd1fad;"><i     class="fa fa-shopping-cart"></i> Add to cart</a></p>'
                                                  +'</p>'
                                              +'</div>'
                                              +'<div class="col-md-3" style="text-align:right">'
                                                  +'<h5><b>&#8377; 190</b></h5>'
                                                  +'<p style="color:grey"><strike>MRP : Rs.249</strike></p>'
                                                  +'<span style="color:#fd1fad;">(23% Offer)</span>'
                                              +'</div>'
                                            +'</div>'
                                            +'<hr>';
                        }
                        $(".itemDiv").html(html);
                    }
                }
            });
    }

    function cancelOrder(idValue) {
         Swal.fire({
          title: 'Are you sure?',
          text: "Are you sure to Cancel this Order?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Cancel it!'
        }).then((result) => {
          if (result.value) {
                $.ajax({
                    url  : BASE_URL+"orders/"+idValue, 
                    type : "POST",
                    dataType: 'json',
                    crossDomain:true,
                    data : {
                        _method:"PUT",
                        api_token:localStorage.getItem("api_token"),
                        cancelled_reason:"test",
                        order_status:"Cancelled",
                        cancelled_at:"2019-06-12 08:16:44"
                    },
                    success:function(data) {
                      //console.log(data);
                        if(data.status == 1) {
                            Swal.fire({
                              type: 'success',
                              title: 'Success!',
                              text: 'Order has been cancelled successfully.'
                            })  
                        } else {
                            Swal.fire({
                              type: 'error',
                              title: 'Oops!',
                              text: 'Something went wrong.'
                            }) 
                        }
                    }
                });
          }
        })
         
    }
    function loadOrderedItems() {
        $.ajax({
                url  : BASE_URL+"orders", 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token"),
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                        $(".orderedItemsCount").text(data.data.length);
                       var html = '';
                        for(var i=0;i<data.data.length;i++) {
                            html = html + '<div class="panel-header" style="padding: 1%;background: #2b617d !important; color:#fff">Order #'+data.data[i].id
                            
                            +'</div>';
                            
                            html = html + '<div class="panel-body">'
                            for(var k=0;k<data.data[i].order_items.length;k++) {
                                var pincode = (data.data[i].address.pincode=="null")?"":data.data[i].address.pincode;
                                html = html +'<div class="row itemRow" style="padding: 1% 2% 1% 2%;">'
                                                              +'<div class="col-md-2">'
                                                                  +'<img src="'+BASE_IMAGE_URL+''+data.data[i].order_items[k].product_combinations.product.images[0].path+'" style="width:100%"/>'
                                                              +'</div>'
                                                              +'<div class="col-md-7">'
                                                                  +'<p><b style="color:#2b617d;text-transform:capitalize"><a>'+data.data[i].order_items[k].name+'</a></b> <br>'
                                                                      +'<span style="color:grey">Brand : </span>'
                                                                      +'<span style="color:#feb81c;text-transform:capitalize">'+data.data[i].order_items[k].product_combinations.product.brand+'</span>'
                                                                     +'<p>Qty <select disabled id="quantity'+data.data[i].order_items[k].quantity+'" style="border: none;border-bottom: 1px solid #0f5e9c;">'
                                                                         +'<option>'+data.data[i].order_items[k].quantity+'</option>'
                                                                      +'</select>'
                                                                    +'</p>'
                                                                +'<p><b>Address</b><br>'
                                                                +''+data.data[i].address.address_1+',<br>'
                                                                +''+data.data[i].address.address_2+'<br>'
                                                                +''+pincode+'</p>'
                                                              +'</div>'
                                                              +'<div class="col-md-3" style="text-align:right">'
                                                                  +'<h5><b>&#8377; '+data.data[i].order_items[k].price+'</b></h5>'
                                                                  +'<p style="color:grey"><strike>MRP : Rs. '+data.data[i].order_items[k].mrp+'</strike></p>'
                                                                  +'<span style="color:#fd1fad;">(Rs. '+(Number(data.data[i].order_items[k].mrp)-Number(data.data[i].order_items[k].price))+' Offer)</span>'
                                                              +'</div>'
                                                            +'</div>';
                            }
                            +'</div>';
                            html = html +'<p>'
                                        +'Subtotal :<b> Rs.'+data.data[i].sub_total+'</b>, ';
                                          
                            if(data.data[i].delivery_charge == null || data.data[i].delivery_charge == "null") {
                                html = html +'Delivery Charge :<b> FREE</b>'
                                        +'</p>';
                            } else {
                                 html = html +'Delivery Charge :<b> Rs.'+data.data[i].delivery_charge+'</b>'
                                        +'</p>';
                            }
                                      
                            
                            html = html + '<hr><div class="panel-footer"  style="padding: 1%;background: #f8f8f8;text-align:right;margin-bottom:2%">';
                            if(data.data[i].order_status == "Cancelled") {
                                html = html +'<span style="font-size: 12px;float: left;background: #f53c3c;color: #fff;padding: 4px;border-radius: 4px;">Cancelled</span>';
                            } else if(data.data[i].order_status == "Pending") {
                                html = html +'<span style="font-size: 12px;float: left;background: #feb81c;color: #fff;padding: 4px;border-radius: 4px;">Pending</span>';
                            } else {
                                 html = html +'<span style="font-size: 12px;float: left;background: #feb81c;color: #fff;padding: 4px;border-radius: 4px;">Pending</span>';
                            }
                            if(data.data[i].offer_code !== "null" && data.data[i].offer_code !=="" && data.data[i].discount!== null && data.data[i].discount !=="") {
                               html=html + '<span style="margin-left: 40px;font-size: 12px;float:left;float: left;background: #28a745;color: #fff;padding: 4px;border-radius: 4px;">Offer code <b>'+data.data[i].offer_code+'</b> applied, <b>Rs. '+data.data[i].discount+'</b> reduced. </span>';
                            }
                            html = html +'Total : &#8377; <b>'+data.data[i].total+'</b>'
                            +'</div>';
                        }
                        $(".orderedItemDiv").html(html);
                    }
                }
            });
    }
    function deleteWishlist(idValue) {
         $.ajax({
                url  : BASE_URL+"wishlist/"+idValue, 
                type : "DELETE",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token"),
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                       loadWishlist();
                        if($(".wishListItems").text()!== "0") {
                            $(".wishListItems").text(Number($(".wishListItems").text())-1);   
                        }
                    }
                }
            });
    }

function otp_mobileNumber() {
   // localStorage.setItem("otpFor","passwordChange");
    if(localStorage.getItem("otpFor") == "mobileChange") {
        $("#cp_mobile").find('.modal-body').find('h5').text('Change Mobile Number');
       } else if (localStorage.getItem("otpFor") == "passwordChange") {
        $("#cp_mobile").find('.modal-body').find('h5').text('Change Password');
       }
    $("#otp_mobileNumber").val("+91 "+$("#d_mobileNo").val()).attr("disabled",true);
    $("#cp_mobile").modal("show");
}

function otp_sendOTP() {
    $(".registeredMobile").text("Enter your One Time Password (OTP) which is sent to your registered Mobile no. +91 XXXXXXX"+$("#d_mobileNo").val().substr(7,10));
    $.ajax({
                url  : BASE_URL+"otp", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data : {
                    mobile:$("#d_mobileNo").val(),
                    action:"reset_password",
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                       $("#cp_mobile").modal("hide");
                        $("#cp_otp").modal("show");
                        setTimeout(function(){
                            $("#otp_value").focus();
                        },500)
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Error!',
                          text: 'Something went wrong !!'
                        })
                    }
                }
            });
    
}

function otp_verify() {
    if($("#otp_value").val()!=="" && $("#otp_value").val().length==4) {
       $.ajax({
                url  : BASE_URL+"verifyMobile", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data : {
                    otp:$("#otp_value").val(),
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  //console.log(data);
                    if(data.status == 1) {
                        if(localStorage.getItem("otpFor") == "mobileChange") {
                            userMobile = $("#d_mobileNo").val();
                            editSave();
                        } else {
                            $("#cp_otp").modal("hide");
                            $("#cp_final").modal("show");
                            setTimeout(function(){
                                $("#n_password").focus();
                            },500) 
                        }
                       
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