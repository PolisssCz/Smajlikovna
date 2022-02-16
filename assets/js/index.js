;(function($, window, document, undefined){
if ( $(location).attr('href') === "https://smajlikovna.php5.cz/" ) {
    window.location.replace("https://smajlikovna.php5.cz/all.php");
};

//correct display of shopping buttons
    $('.button').hide();
    $('.packed').show();
// creation of variables
var form = $('.box form'),
    count_icon = $('.scope'),
    items_count = $('.scope').text(),
    cart_icon = $('.cart-icon');
// hide red bubble in cart
if ( items_count == 0 ){
    count_icon.hide();  
};
//button Add to Cart
$('.packed').on('click', function (){
    var id = $(this).closest( "li" ).find("input.data").val();
    var li = $('#add-cart-'+id);
    $(this).hide();
    li.fadeIn()
        .css({'scale': '1'})
        .addClass('active');
    var quantity = $('.active .Qvalue').val();
    if (quantity == 0 || NaN) {
        $('.active .Qvalue').val(1);
    };
    if ( li.find('.reduce').on('click', function (){
        var quantity = li.find('input.Qvalue');
        var newQ = Math.max(1, Number(quantity.val()) - Number(1)); 
        quantity.val(newQ);
    }));
    if ( li.find('.increment').on('click', function (){
        var quantity = li.find('input.Qvalue');
        var newQ = Number(quantity.val()) + Number(1);
        quantity.val(newQ);
    }));
});
// hide product-title if product added to cart
(function () {
    $('.added').next().hide();
}());
//add product to cart
form.on('submit', function(event) {
    var title = $(this).closest( "li" ).find("h2");
    title.addClass("added animate__animated animate__heartBeat");
    event.preventDefault();
    var req = $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data:  $(this).serialize()
    });
    //in the icon to increase the number of items in the cart
    req.done(function(data){
        if (data.indexOf('success') > -1) {
            cart_icon.slideDown(150);
            items_count++;
            var span = $('<span class="scope">'+ items_count +'</span>');
            // highlighting the added item
            span.appendTo(cart_icon)
                .css({ backgroundColor: '#12d30c' })
                .delay(200)
                .animate({ backgroundColor: '#dc0030' },(50));
        } else { 
            // when the item is already in the cart, a is alert
            $.confirm({
                icon: 'fa fa-exclamation-triangle',
                title: 'This item is already in the cart!',
                content: 'if you want to add more pieces, you can edit the item in the cart :)',
                type: 'orange',
                animation: 'rotateXR ',
                animationSpeed: 500,
                typeAnimated: true,
                buttons:
                {
                    tryAgain: {
                        text: 'THANK YOU !',
                        btnClass: 'btn-green',
                        action: function(){
                        }
                    },
                    no:{
                        text: 'Goto cart',
                        btnClass: 'btn-red',
                        action: function(){
                            window.location.replace(''+ base_url +'/cart.php');
                        }
                    }
                }
            });
        }
    }); 
});
// scroll cart icon
(function () {
    var previousScroll = 0;
    $(window).scroll(function () {
        var currentScroll = $(this).scrollTop();
        
        if (currentScroll > previousScroll){
            if ($(cart_icon).is(':animated'))return;
            cart_icon.slideDown(350);
            $('#backgroundTop').slideDown(100);
        }
        else {
            if ($(cart_icon).is(':animated'))return;
            cart_icon.slideUp(250);
            $('#backgroundTop').slideUp(250);
        }   
        previousScroll = currentScroll;
    });
}());
// functions for show categories
var url = $(location).attr('href');
$('.menu li a').on('click', function () {
    var myArr = url.split(/[\\/]/g).pop().split('.')[0];
    
    if (url === ''+ base_url +'/all.php' || myArr == "") 
    {
        $('.box').show();
    }else
    {
        var height = $( window ).height();  
        $('article').height( height ); 
        $('.box').hide();
        $('.'+ myArr +'').show();
    } var products = $('.products').height(),
          article = $('article').height();
    if ( products > article )
    {
        $('article').height("inherit");
    }
    
}());
// toggle highlighting of the selected category
$('.menu li a').on('click', function () {
    $('.select').removeClass('select');
    $(this).addClass('select');
});
})(jQuery, window, document, undefined);