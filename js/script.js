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
    var basket__foot_height = $('.basket__foot').height() + 25 + 40;
    var basket__head_height = $('.basket__head').height();
    $('.basket').width(basket_width);
    $('.basket__content').height($(window).height() - basket__foot_height - basket__head_height);
    
}
