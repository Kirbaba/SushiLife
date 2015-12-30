$(function () {
    $(document).ready(function(){
       updateCart();
    });

    $(document).on('click','.categoryitems__item--buybtn, .product--item--info__buybtn', function(){
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');

        jQuery.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=addToCart&id=" + id + "&price=" + price, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                console.log(data);
                updateCart();
            }
        });
        return false;
    })
});

function updateCart(){
    // console.log('updateCart');
    /*корзина*/
    jQuery.ajax({
        url: ajaxurl, //url, к которому обращаемся
        type: "POST",
        data: "action=getFromCart", //данные, которые передаем. Обязательно для action указываем имя нашего хука
        success: function (data) {
            console.log(data);
            //модалка если понадобится
            if(data != 0){
                $('.basket__content').html(data);
            }else{
                $('.basket__content').html("");
            }

            var total = 0;
            $('.cart_price').each(function(){
                total = total + parseInt($(this).text());
            });
            $('.total_price').text(total);
        }
    });
}
