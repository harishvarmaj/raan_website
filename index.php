<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/mdb.min.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/jquery.slide.css" />
  <link rel="stylesheet" href="assets/css/productCarausel.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <?php include("assets/misc/header.php"); ?>

    <script>
     document.title = title;
 
  </script>
    <style>
        .allprodImg {
            max-width: 100%;
    max-height: 100%;
    display: inline-block;
    position: absolute;
    bottom: 0;
    margin: 0 auto;
    left: 0;
    right: 0;
        }
    </style>
</head>
<body>
    <div class="main-content">

      <div class="bannerSlider">
          <ul style="margin-bottom: 0rem;">
<!--
            <li data-bg="assets/imgs/img1.jpg"></li>
            <li data-bg="assets/imgs/img1.jpg"></li>
            <li data-bg="assets/imgs/img1.jpg"></li>
-->

          </ul>
      </div>
      <div class="row bestSelling">
        <div class="col-md-9" style="padding-left: 10px;">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;">
              <h5 class="card-title" style="margin: 0;">Best Selling</h5>
              <?php include("assets/misc/productSliders/bestSelling.php"); ?>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="padding-right: 1px;padding-left:0px">
          <img src="assets/imgs/img-invite.jpg" style="float:right;width:100%;cursor:pointer" onclick="goToReferral()"/>
        </div>
      </div>
      <div class="row image2">
          <div class="col-md-6"><img src="assets/imgs/static-image-1.jpg"/></div>
          <div class="col-md-6"><img src="assets/imgs/static-image-2.jpg"/></div>
      </div>
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
      <div class="row banner_image2">
          <div class="col-md-6"><img src="assets/imgs/static-image-3.jpg"/></div>
          <div class="col-md-6"><img src="assets/imgs/static-image-4.jpg"/></div>
      </div>
      <div class="row bestSelling" style="padding-left: 10px;padding-right: 10px;">
        <div class="col-md-12">
          <div class="card" style="height:100%">
            <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;">
              <h5 class="card-title" style="padding: 0% 1% 0% 0%;">All Products<a class="btn btn-primary" style="color:#201e1e !important;float:right;background: #ff8f03 !important;border: 1px solid #ff8f03;" href="productList.php">View All</a></h5>
                <div id="allProductPanel" class="row productcarousel">
                    
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
<script src="assets/js/mdb.min.js"></script>
<script src="assets/js/jquery.slide.js"></script>
<script src="assets/js/productCarousal.js"></script>
<script src="assets/js/main.js"></script>

<script>
    loadFeatured();
    loadBestSelling();
    loadAllProducts();
   $(function() {
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
                      for(var i=0;i<data.data.length;i++) {
                          if(data.data[i].slug == "SlideBanner-both" || data.data[i].slug == "SlideBanner-web") {
                             $(".bannerSlider ul").append('<li id="banner'+(i+1)+'" class="mainBanner" style="cursor:pointer" onclick="viewProductDetail('+data.data[i].product_id+');" data-bg="'+BASE_IMAGE_URL+''+data.data[i].images[0].path+'"></li>');
                            }
                      }  
                    $('.bannerSlider').slide({
                      'slideSpeed': 6000,
                      'isShowArrow': true,
                      'dotsEvent': 'mouseenter',
                      'isLoadAllImgs': true
                    });
                    } else {
                        alert("Something went wrong !!");
                    }
                    /*$(".arrow").click(function() {
                        for(var i=0;i<$(".mainBanner").length;i++) {
                            if($("#banner"+(i+1)).css("opacity")=="1") {
                                $("#banner"+(i+1)).click();
                               }
                        }
                    });*/
                }
            });
      });
    
    function goToReferral() {
        if(localStorage.getItem("user_oilkart_loggedIn") == "true") {
            window.location.href="myaccount.php";
            sessionStorage.setItem("isFromReferral","true");
        } else {
            $("#loginModal").modal("show");
        }
    }
</script>
</body>
</html>
