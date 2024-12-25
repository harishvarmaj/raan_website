function processConstants() {
    var CONSTANT_OILKART_WEBADDR = "www.3bstores.in";
    var CONSTANT_OILKART_NAME_CAPS = "CLIPSHOPPERS";
    var CONSTANT_OILKART_NAME_CAMEL = "Clipshoppers";
    var CONSTANT_OILKART_NAME_SMALL = "clipshoppers";
    
    var CONSTANT_OILKART_PHONE = "+91 12345 67890";
    var CONSTANT_OILKART_EMAIL = "clipshoppers@gmail.com";
    var CONSTANT_OILKART_ADDRESS =  'Erode <br>'+
                                    'Tamilnadu<br>'+
                                    'Contact : 1234567890<br>'+
                                    'Email : clipshoppers@gmail.com<br>';
    
    $(".constant_oilkart_name_caps").text(CONSTANT_OILKART_NAME_CAPS);
    $(".constant_oilkart_name_camel").text(CONSTANT_OILKART_NAME_CAMEL);
    $(".constant_oilkart_name_small").text(CONSTANT_OILKART_NAME_SMALL);
    $(".constant_oilkart_phone").text(CONSTANT_OILKART_PHONE);
    $(".constant_oilkart_email").text(CONSTANT_OILKART_EMAIL);
    $(".constant_oilkart_address").html(CONSTANT_OILKART_ADDRESS);
    $(".constant_oilkart_webaddr").html(CONSTANT_OILKART_WEBADDR);
}
processConstants();