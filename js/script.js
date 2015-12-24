$(function() {

    $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function() {
        $('body,html').animate({scrollTop: 0}, 1000);
    });

    $('.smoothScroll').click(function(event) {
        event.preventDefault();
        var href=$(this).attr('href');
        var target=$(href);
        var top=target.offset().top;
        $('html,body').animate({
            scrollTop: top
        }, 1000);
    });
});
$( document ).ready(function() {
    setRightBasket();
    $( window ).resize(function() {
        setRightBasket();
    });

});
function setRightBasket(){
    var basket_width = $('.basket--width').width();
    $('.basket').width(basket_width);
    $('.basket__head').width(basket_width);
}
