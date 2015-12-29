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
    var fh = $('.basket__foot--wrap').height();
    var fhi = $('#basket__foot').innerHeight();

    console.log(fh);
    console.log(fhi);
    setRightBasket();
    $( window ).resize(function() {
        setRightBasket();
    });

     $('#demo').readmore({
      moreLink: '<div class="showmore--but"><a href="#">Показать все</a></div>',
      lessLink: '<a href="#" class="showmore--but--less">Скрыть</a>',
      collapsedHeight: 190,
      afterToggle: function(trigger, element, expanded) {
        if(! expanded) { // The "Close" link was clicked
          $('html, body').animate({scrollTop: element.offset().top}, {duration: 100});
        }
      }
    });

     $('.menutoggle--but').on('click', function (e) {
        e.preventDefault();
        $('.navigation--navline').toggleClass('navigation--navline--active');;
    });

     $('.showbasket--but').on('click', function (e) {
        e.preventDefault();
        $('.basket--width').toggleClass('basket--width--active');
        $('.navigation--box--topline').toggleClass('navigation--box--topline--basket');
    });

    // $('article').readmore({speed: 500});
});

function setRightBasket(){
    var basket_width = $('.basket--width').width();
    var basket__foot_height = $('.basket__foot').height() + 25 + 40;
    var basket__head_height = $('.basket__head').height();
    var doc_w = $(window).width();
    if (doc_w > 737) {
        $('.basket').width(basket_width);
         $('.basket').css({
            top: 0
        });
        $('.basket__content').height($(window).height() - basket__foot_height - basket__head_height);
        $('.main__wrapper').css({
            paddingRight: basket_width - 5,
            paddingTop: $('.navigation').height()
        } );
    }
    if (doc_w < 737) {
        $('.basket').css({
            top: $('.navigation').height()
        });
        
        $('.basket__content').height($(window).height() - 110 - 55);
    }
    
   
    
}

jQuery(function ($) {

    jQuery('.main__carousel').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        adaptiveHeight: false,
        arrows: true,        
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 770,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    jQuery('.reviews__carousel').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        adaptiveHeight: true,
        speed: 300,
        arrows: true,        
        slidesToShow: 3,
        slidesToScroll: 3,
        focusOnSelect: false,
        prevArrow: '<i class="fa fa-chevron-left"></i>',
        nextArrow: '<i class="fa fa-chevron-right"></i>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 770,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});

