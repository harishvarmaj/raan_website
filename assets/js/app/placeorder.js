function addressClick(_this, idValue){
               $(".addressActive").removeClass("addressActive"); 
               _this.setAttribute("class","card-body addressActive");
                sessionStorage.setItem("currentCartAddress",idValue);
     }
    
    
    function showTab(idValue){
        if(idValue == "checkoutOrders" && $(".addressPanel:visible").length<1) {
            Swal.fire({
              type: 'error',
              title: 'Oops!',
              text: 'Please add address to continue.'
            })
            $(".addressActive .pincodeSpan")
        }  else if(idValue == "checkoutOrders" && $(".addressActive").length<1) {
            Swal.fire({
              type: 'error',
              title: 'Oops!',
              text: 'Please select an address to continue.'
            })
        } else {
            if(idValue == "checkoutOrders"){
                 var pincode = $(".addressActive .pincodeSpan").text();
                $.ajax({
                url  : BASE_URL+"pincode/"+pincode, 
                type : "GET",
                dataType: 'json',
                crossDomain:true,
                success:function(data) {
                    if(data.status == 0) {
                        Swal.fire({
                              type: 'error',
                              title: 'Oops!',
                              text: 'Delivery is  not available for this location. Select different address!'
                        })  
                    } else {
                        $.ajax({
                            url  : BASE_URL+"user-address/"+ sessionStorage.getItem("currentCartAddress"), 
                            type : "GET",
                            dataType: 'json',
                            crossDomain:true,
                            data : {
                                api_token:localStorage.getItem("api_token"),
                            },
                            success:function(data) {
                              //console.log(data);
                                if(data.status == 1) {
                                    $(".place_order_name").text(data.data[0].name);
                                    $(".place_order_type").text(data.data[0].type);
                                    $(".place_order_address_1").text(data.data[0].address_1);
                                    $(".place_order_address_2").text(data.data[0].address_2);
                                    $(".place_order_city").text(data.data[0].city);
                                    $(".place_order_state").text(data.data[0].state);
                                    $(".place_order_pincode").text(data.data[0].pincode);
                                    $(".place_order_mobile").text(data.data[0].mobile);
                                    sessionStorage.setItem("final_address_address_1",data.data[0].address_1);
                                    sessionStorage.setItem("final_address_address_2",data.data[0].address_2);
                                    sessionStorage.setItem("final_address_pincode",data.data[0].pincode);
                                }
                            }
                        });
                        $(".checkoutWizard").hide();
                        $("."+idValue).show();
                        getCartItems2();
                    }
                }

                });
            } else {
                $(".checkoutWizard").hide();
                $("."+idValue).show();
                if(idValue !== "confirmationTab") {
                    getCartItems2();   
                }
                
            }
                      
        }
        
    }
    function viewProductDetail(idValue) {
        sessionStorage.setItem("current_productViewID",idValue);
        window.location.href="productView.php";
    }

     function getCartItems2() { 
         var prodID = sessionStorage.getItem("buyNow_cartprodID");
         $.ajax({
            url  : BASE_URL+"cart", 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            data : {
              api_token:localStorage.getItem("api_token")  
            },
            success:function(data) {
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
                //console.log(data);
                $(".totalItemsCount").text(data.data.length);
                var html='';
                if(data.status == 1) {
                    for(var i=0;i<data.data.length;i++) {
                       sessionStorage.setItem("cart_totalItems",data.data.length); sessionStorage.setItem("cart_product_variant_combination_id"+i,data.data[i].product_variant_combination_id); sessionStorage.setItem("cart_name"+i,data.data[i].product_combinations.product.name);
                       sessionStorage.setItem("cart_mrp"+i,data.data[i].product_combinations.mrp);
                        sessionStorage.setItem("cart_price"+i,data.data[i].product_combinations.price);
                        sessionStorage.setItem("cart_quantity"+i,data.data[i].quantity);
                        var sub_total = Number(data.data[i].product_combinations.quantity) * Number(data.data[i].product_combinations.price);
                        sessionStorage.setItem("cart_sub_total"+i,sub_total);
                    html = html + '<div class="row itemRow" style="padding: 0% 2% 1% 2%;" id="cartItem'+data.data[i].id+'">'
                                      +'<div class="col-md-2">'
                                        +'<img onclick="viewProductDetail('+data.data[i].id+')" src="'+BASE_IMAGE_URL+''+data.data[i].product_combinations.product.images[0].path+'" style="width:100%"/>'
                                      +'</div>'
                                      +'<div class="col-md-7">'
                                          +'<p><b style="color:#2b617d"><a onclick="viewProductDetail('+data.data[i].id+')">'+data.data[i].product_combinations.product.name+'</a></b> <br>'
                                              +'<span style="color:grey">Brand : </span>'
                                              +'<span style="color:#feb81c">'+data.data[i].product_combinations.product.brand+'</span> &nbsp;&nbsp;&nbsp;'
                                              +'<span style="color:grey">Product Code :</span>'
                                              +'<span style="color:#feb81c">S01002</span>'
                                            +'<p>Qty <input disabled type="text" id="itemQuantity'+data.data[i].id+'" class="cart_quantity" style="border: none;width: 7%;border-bottom: 1px solid #0f5e9c;text-align: center;" value="'+data.data[i].quantity+'"/>'
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
                for(var i=0;i<$(".priceAmount").length;i++) {
                        var subTotal = Number($(".priceAmount:eq("+i+")").text()) * Number($(".cart_quantity:eq("+i+")").val());
                        $(".priceAmount:eq("+i+")").text(subTotal);
                    }
                calculateCart();   
            }
                if(sessionStorage.getItem("currentCart_discount") !== "") {
                   $(".cartDiscount").text(sessionStorage.getItem("currentCart_discount"));
                    calculateCart(); 
                }
            }
            
            });
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
                        alert("Something went wrong !!");
                    }
                }
            });
        }
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
                      html = html + '<div class="col-md-4 addressPanel" style="margin-bottom: 6%;">'
                                          +'<div class="card" style="box-shadow:none;">'
                                            +'<div class="card-body" onclick="addressClick(this,'+data.data[i].id+')">'
                                            +'  <h5 class="card-title"> <b>'+data.data[i].name+' </b> <hr></h5>'
                                              +'<p style="padding: 0% 8% 0% 9%;">'
                                                  +'<span style="background: #e3e3e3;color:grey">'+data.data[i].type+'</span>'
                                              +'</p>'
                                              +'<p style="padding: 0% 8% 0% 9%;height:36%">'
                                                +data.data[i].address_1+', '+data.data[i].address_1+', '+data.data[i].state+'-<span class="pincodeSpan">'+data.data[i].pincode+'</span> <br>'
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
    function removeItem(idValue) {
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
                        $("#cartItem"+idValue).hide();
                        if($(".totalItemsCount").text()!==0)
                        $(".totalItemsCount").text(Number($(".totalItemsCount:eq(0)").text())-1);
                    }
                }

            });
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
                        alert("Something went wrong !!");
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
           $(".deliveryCharge").text("25");
            totalAmount = totalAmount + 25;
            $(".freeDelivery").hide();
        } else {
           $(".deliveryCharge").text("FREE");
            $(".freeDelivery").show();
        }
        $(".grandTotal").text(totalAmount);
    }

function placeOrder() {
    var deliveryCharge = ($(".deliveryCharge:eq(0)").text() == "FREE")?"0":$(".deliveryCharge:eq(0)").text();
        var form = new FormData();
        form.append("api_token",localStorage.getItem("api_token"));
        form.append("transaction_id", "1");
        form.append("payment_method_id", " 1");
        form.append("amount_paid",  Number($(".grandTotal:eq(0)").text()));
        form.append("total", $(".grandTotal:eq(0)").text());
        form.append("sub_total", Number($(".totalAmount:eq(0)").text()));
        form.append("discount", Number($(".cartDiscount:eq(0)").text()));
        form.append("offer_code",  sessionStorage.getItem("appliedPromoCode"));
        form.append("shipping_number", "2121232323");
        form.append("shipping_tax", "15");
        form.append("delivery_charge", deliveryCharge);
        form.append("shipping_charge", "20");
        form.append("order_status", "Pending");
        form.append("delivery_boy_id", "");
        form.append("cancelled_at", "");
        form.append("address[address_1]", sessionStorage.getItem("final_address_address_1"));
        form.append("address[address_2]", sessionStorage.getItem("final_address_address_2"));
        form.append("address[pincode]", sessionStorage.getItem("final_address_pincode"));
    
    
    for(var i=0;i<Number(sessionStorage.getItem("cart_totalItems"));i++) {
        form.append("order_items["+i+"][product_variant_combination_id]", Number(sessionStorage.getItem("cart_product_variant_combination_id"+i)));
        form.append("order_items["+i+"][name]", sessionStorage.getItem("cart_name"+i));
        form.append("order_items["+i+"][price]", Number(sessionStorage.getItem("cart_price"+i)));
        form.append("order_items["+i+"][mrp]", Number(sessionStorage.getItem("cart_mrp"+i)));
        form.append("order_items["+i+"][quantity]", Number(sessionStorage.getItem("cart_quantity"+i)));
        form.append("order_items["+i+"][gst]", "12");
        form.append("order_items["+i+"][sub_total]", Number(sessionStorage.getItem("cart_sub_total"+i)));   
    }

        $.ajax({
                url  : BASE_URL+"orders", 
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
                        if(data.status == 1 && data.data !== "") {
                            $(".c_orderId").text("#"+data.data.id);
                            $(".c_totalAmount").text("Rs. "+data.data.total);
                            $(".c_customerName").text(localStorage.getItem("user_oilkart_name"));
                            $(".c_mobileNo").text("+91 "+localStorage.getItem("user_oilkart_phone"));
                            showTab('confirmationTab');
                            clearCart();
                        } else {
                             Swal.fire({
                              type: 'error',
                              title: 'Oops!',
                              text: 'Something went wrong. Contact admin'
                            })
                        }
                    }

            });
}

function clearCart() {
      $.ajax({
                url  : BASE_URL+"cart/deleteAll", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token"),
                    user_id:localStorage.getItem("user_oilkart_id")
                },
                success:function(data) {
                  //console.log(data);
                }
            }); 
}
    