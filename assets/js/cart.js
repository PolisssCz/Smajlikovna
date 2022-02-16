;(function($, window, document, undefined){
// recalculation of the total price
updateBill();
// add quantity
$(".plus").on("click", function (event) 
{
  event.preventDefault();
  $.ajax({
    url:   $(this).attr('href'),
    type:  'POST',
    data:  $(this).serialize()
  });
  var product = $(this).closest(".product");
  var q = product.data("quantity") + 1;
  product.data("quantity", q);
  updateProduct(product);
});
// subtract quantity
$(".minus").on("click", function (event) 
{
  event.preventDefault();
  var product = $(this).closest(".product");
  var req = Math.max(0, product.data("quantity") - 1);
  var q = Math.max(1, product.data("quantity") - 1);
  product.data("quantity", q);
  updateProduct(product);
  if (req > 0){
    $.ajax({
      url:   $(this).attr('href'),
      type:  'POST',
      data:  $(this).serialize()
    });
  }
});
// remove product from cart
var form = $(".del");
form.on("click", function (event) 
{ 
  event.preventDefault();
  var req = $.ajax({
    url:   $(this).attr('href'),
    type:  'POST',
    data:  $(this).serialize()
  });
  req.done(function(data){
    if (data > -1) {
      $('#id-'+data+'').hide( 550, function()
      {
        $(this).remove();
        updateBill();
      });
    };
  });
});
// adjustment of the price, number of pieces of the product
function updateProduct(product) {
  var quantity = product.data("quantity");
  var price = product.data("price");  
  $(".product-quantity", product).text("x" + quantity);
  $(".product-price", product).text( formatNum (price * quantity) );
  updateBill();
}
// function for calculating the total price
function updateBill() {
  var subtotal = 0;
  var salestax = 0;
  var shipping = 1500;
  var total = 0;
  $(".product").each(function () {
    subtotal += $(this).data("quantity") * $(this).data("price");
  });
  salestax = subtotal * 0.21;
  total = subtotal + salestax + shipping;
  //number formatting
  $(".subtotal .value").text( formatNum(subtotal) );
  $(".salestax .value").text( formatNum(salestax) );
  $(".total .value").text( formatNum(total) );
  // adjust the view if the cart is empty
  if ($(".product").length == 0) {
    $(".total .value").text("0.00 Kč");
    $(".cart-container").css(
      "margin", "0 auto"
    );
    $(".cart-container .cart").hide();
    $(".cart-container .empty").show();
    $(".salestax .value").text( "21 %" );
  };
}
// number editing function
function formatNum(data) {
  Round_dec= data.toFixed(1);
  number = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).formatToParts( Round_dec ).map(({type, value}) => {
    switch (type) {
      case 'currency': return `Kč`;
      default : return value;
    }
}).reduce((string, part) => string + part);
return(number);
}
})(jQuery, window, document, undefined);