  function productSlideRight(idValue) {
        var next = $("#"+idValue).find(".carousel-item.active").next(".carousel-item");
        if(next.length>0) {
            $("#"+idValue).find(".carousel-item.active").hide();
            $("#"+idValue).find(".carousel-item.active").next(".carousel-item").show();
            $("#"+idValue).find(".carousel-item.active").removeClass("active");
            next.addClass("active");
        }
    }

    function productSlideLeft(idValue) {
        var prev = $("#"+idValue).find(".carousel-item.active").prev(".carousel-item");
        if(prev.length>0) {
            $("#"+idValue).find(".carousel-item.active").hide();
            $("#"+idValue).find(".carousel-item.active").prev(".carousel-item").show();
            $("#"+idValue).find(".carousel-item.active").removeClass("active");
            prev.addClass("active");
        }
    }

    function toggleWishlist() {
        if($("#wishlistIcon_ns:visible").length>0) {
            $.ajax({
                url  : BASE_URL+"wishlist", 
                type : "POST",
                dataType: 'json',
                crossDomain:true,
                data:{
                    product_variant_combination_id:sessionStorage.getItem("current_productViewID"),
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                  $("#wishlistIcon_ns:visible").hide();
                  $("#wishlistIcon_s").show();
                    productDetails();
                }
            });
        } else if($("#wishlistIcon_s:visible").length>0) {
            $.ajax({
                url  : BASE_URL+"wishlist/"+sessionStorage.getItem("wid"), 
                type : "DELETE",
                dataType: 'json',
                crossDomain:true,
                data : {
                    api_token:localStorage.getItem("api_token")
                },
                success:function(data) {
                   $("#wishlistIcon_s:visible").hide();
                   $("#wishlistIcon_ns").show();
                }
            });
        }
    }