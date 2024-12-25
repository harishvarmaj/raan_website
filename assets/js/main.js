function viewProductDetail(idValue) {
    sessionStorage.setItem("current_productViewID",idValue);
    window.location.href="productView.php";
}

function loadBestSelling() {
    $.ajax({
            url  : BASE_URL+"special-product/best-selling", 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            data:{
                api_token:localStorage.getItem("api_token")
            },
            success:function(data) {
                var html='';
                var idClass;
                var parsed = data.data;
                
            
                var dataLength= parsed.length;
                for(var i=0;i<Math.round(dataLength/4);i++){
                    
                    idClass = (i==0)?'active':''; 
                    html = html + '<div class="item carousel-item '+idClass+'" style="width: 98%;">'
					+'<div class="row">';
                    var j=0;
                    var prodLength=(parsed.length<6)?parsed.length:6;
                     
                    for(var k=0;k<prodLength;k++) {
                        var product = data.data[k].product_combinations;
                            html = html +' <div class="col-sm-2">'
							+' <div class="thumb-wrapper" onclick="viewProductDetail('+product.enabled_products.id+');">'
								+' <div class="img-box">'
									+' <img src="'+BASE_IMAGE_URL+''+product.enabled_products.images[0].path+'" class="img-responsive img-fluid" alt="">'
								+' </div>'
								+' <div class="thumb-content">'
									+' <h4 style="text-transform:capitalize">'+product.enabled_products.name+'</h4>'
									+' <p class="item-price" style="color:#feb81c">'+product.enabled_products.brand+'</p>'
									+' <p class="item-price"><span style="color:#222">Rs. '+product.price+'</span> <br><strike>Rs. '+product.mrp+'</strike> </p>'
								+' </div>'
							+' </div>'
						+' </div>';
                    }
                    parsed.splice(0,6);
                    html = html +'</div>'
                    +'</div>';    
                }
                $("#bestSellingProductPanel").html(html);
            }
            
            });
}

function loadFeatured() {
    
    
    $.ajax({
            url  : BASE_URL+"special-product/featured", 
            type : "GET",
            dataType: 'json',
            crossDomain:true,
            data:{
                api_token:localStorage.getItem("api_token")
            },
            success:function(data) {
                 var html='';
                var idClass;
                var parsed = data.data;
                
                var dataLength= parsed.length;
                
                for(var i=0;i<Math.round(dataLength/4);i++){
                    
                    idClass = (i==0)?'active':''; 
                    html = html + '<div class="item carousel-item '+idClass+'" style="width: 98%;">'
					+'<div class="row">';
                    var j=0;
                    var prodLength=(parsed.length<6)?parsed.length:6;
                     
                    for(var k=0;k<prodLength;k++) {
                        var product = data.data[k].product_combinations;
                            html = html +' <div class="col-sm-2">'
							+' <div class="thumb-wrapper" onclick="viewProductDetail('+product.enabled_products.id+');">'
								+' <div class="img-box">'
									+' <img src="'+BASE_IMAGE_URL+''+product.enabled_products.images[0].path+'" class="img-responsive img-fluid" alt="">'
								+' </div>'
								+' <div class="thumb-content">'
									+' <h4 style="text-transform:capitalize">'+product.enabled_products.name+'</h4>'
									+' <p class="item-price" style="color:#feb81c">'+product.enabled_products.brand+'</p>'
									+' <p class="item-price"><span style="color:#222">Rs. '+product.price+'</span> <br><strike>Rs. '+product.mrp+'</strike> </p>'
								+' </div>'
							+' </div>'
						+' </div>';
                    }
                    parsed.splice(0,6);
                    html = html +'</div>'
                    +'</div>';    
                }
                $("#featureProductPanel").html(html);
            }
            
            });
}

function loadAllProducts() {
    $.ajax({
            url  : BASE_URL+"product/customer", 
            type : "POST",
            dataType: 'json',
            crossDomain:true,
            data:{
                api_token:localStorage.getItem("api_token")
            },
            success:function(data) {
                var html='';
                var idClass;
                for(var i=0;i<data.data.length;i++){
                    if(i<=11) {
                        idClass = (i==0)?'active':''; 
                        html = html + ' <div class="col-sm-2">'
                                +' <div class="thumb-wrapper" style="cursor: pointer;" onclick="viewProductDetail('+data.data[i].id+');">'
                                    +' <div class="img-box" style="height: 160px;width: 100%;position: relative;">'
                                        +' <img src="'+BASE_IMAGE_URL+''+data.data[i].images[0].path+'" class="img-responsive img-fluid allprodImg" alt="">'
                                    +' </div>'
                                    +' <div class="thumb-content" style="padding: 15px">'
                                        +' <h4 style="text-transform:capitalize;font-size: 14px;margin: 10px 0;color: #2b617d;">'+data.data[i].name+'</h4>'
                                        +' <p class="item-price" style="color:#feb81c">'+data.data[i].brand+'</p>'
                                        +' <p class="item-price"><span style="color:#222">Rs. '+data.data[i].variant_combinations[0].price+'</span> <br><strike>Rs. '+data.data[i].variant_combinations[0].mrp+'</strike> </p>'
                                    +' </div>'
                                +' </div>'
                            +' </div>';     
                    }
                }
                $("#allProductPanel").html(html);
            }
            
            });
}