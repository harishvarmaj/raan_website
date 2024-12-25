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
</head>
<body>
    <div class="main-content">

 <!-- Whole sale Enquiry -->
 <div class="row mainPanel" style="padding:1%">
 <div class="col-md-12" style="padding-left: 10px;">
 <div class="card">
   <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
     <h5 class="card-title">Promotional Offers (<span class="promoOfferCount"></span>)<hr></h5>
     <div class="promoOffersDiv" style="padding: 0% 0% 2% 2%;">
       
     </div>
    <!-- <div class="row" style="padding: 0% 3% 2% 3%;">
       <div class="col-md-8" style="margin: auto;font-size: 14px;">
         Once you place enquiry, Our executive will contact soon
         Need Help? Contact <b>+91 98765 43210</b>
       </div>
       <div class="col-md-4" style="text-align: right;">

       </div>
     </div>-->
   </div>
 </div>
 </div>
 </div>
<!-- End of Whole sale Enquiry -->
<!-- Confirmation -->
<div class="row enqConfirm" style="padding:1%;display:none">
<div class="col-md-12" style="padding-left: 10px;">
<div class="card">
  <div class="card-body" style="padding:0;padding-top: 1.25rem;padding-left: 1rem;padding-right: 1rem;">
    <h5 class="card-title">Order Confirmation<hr></h5>
    <div class="orderConfirmDiv" style="padding: 2% 0% 2% 2%;text-align:center">
      <div class="row" style="text-align:center;height: 216px;">
          <img src="assets/imgs/site/confirmation.png" style="margin: auto;width: 10%;"/>
      </div>
      <div class="row" style="text-align:center;">
            <h3 style="margin:auto;color:#2b617d">Thank you! Your Enquiry Sent Successfully</h3>
      </div>
      <div class="row" style="padding-top:1%">
        <p style="margin:auto;">Our Executive will contact you soon to your mail/mobile : <b>john.dae@gmail.com / +91 9876543210</b></p>
      </div>
      <div class="row" style="padding-top:2%;padding-bottom:2%">
        <p style="margin:auto;color:grey">Click continue to browse products</p>
      </div>
      <div class="row" style="padding-top:1%">
        <div class="btn btn-primary" tabindex="0" style="margin:auto;width:15%;background: #feb81c !important;border: 1px solid #feb81c;color:#2b617d">Continue</div>
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
<script>
   function sendEnq(){
       $(".mainPanel").hide();
       $(".enqConfirm").show();
   }
    getPromoOffers();
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
                                                                +'MAX AMOUNT : <b> &nbsp;'+data.data[i].offers[0].max_amount
                                                                +'</b></div>'
                                                                 +'<div class="row">'
                                                                +'MIN CART AMOUNT : <b> &nbsp;'+data.data[i].offers[0].min_cart_amount
                                                                +'</b></div>'
                                                             +'</div>'
                                                         +'</div>');
                              totalOffers++;
                            }
                      }  
                    } else {
                        alert("Something went wrong !!");
                    }
                    $(".promoOfferCount").text(totalOffers);
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
          <label for="inputIconEx2" style="color:#2b617d">Name</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#2b617d">Mobile No</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#2b617d">Pincode</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#2b617d">Address</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#2b617d">Locality</label>
        </div>
        <div class="md-form">
          <input type="text" id="inputIconEx2" class="form-control">
          <label for="inputIconEx2" style="color:#2b617d">City</label>
        </div>
        <div class="md-form">
          <p style="color:#2b617d">Type of Address</p>
          <p>
          <input type="radio" name="type"/> Home &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="type"/> Office
        </p>
          <p style="color:#2b617d">
          <input type="checkbox"/> Make this Default Address
        </p>

        </div>
        <div class="md-form" style="text-align: center;">
            <div class="btn btn-primary" tabindex="0" style="margin:auto;width:50%;background: #feb81c !important;border: 1px solid #feb81c;color:#2b617d">Add Address</div>
        </div>
      </div>
    </div>

  </div>
</div>
