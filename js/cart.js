$(function () {
    $(document).ready(function(){
       updateCart();
    });

    $(document).on('click','.categoryitems__item--buybtn, .product--item--info__buybtn', function(){
        var templateUrl = path.templateUrl;
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');

        $('.basket__content').html('<img class="preLoader" src="'+templateUrl+'/img/ajax-loader.gif">');

        jQuery.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=addToCart&id=" + id + "&price=" + price, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                updateCart();
            }
        });
        return false;
    })

    $(document).on('click','.plus, .minus', function(){
        var templateUrl = path.templateUrl;
        var block = $(this).parent();
        var container = block.parent();

        var count = block.children('.counter').attr('data-value');
        var id = block.children('.counter').attr('data-id');
        var price = container.children().children('.cart_price').text();


        onePrice = parseInt(price)/parseInt(count);

        if($(this).attr('class') == 'plus'){
            count = parseInt(count)+1;
            price = onePrice*parseInt(count);

            block.children('.counter').attr('data-value', count);
            block.children('.counter').text(count);
            container.children().children('.cart_price').text(price);
        }else{
            console.log('minus');
            if(count != 1){
                count = parseInt(count)-1;
                price = onePrice*parseInt(count);

                block.children('.counter').attr('data-value', count);
                block.children('.counter').text(count);
                container.children().children('.cart_price').text(price);
            }
        }

        //preloader
        $('.basket__content').html('<img class="preLoader" src="'+templateUrl+'/img/ajax-loader.gif">');
        jQuery.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=updateCount&id=" + id + "&price=" + price + "&count=" + count, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                updateCart();
            }
        });
    });

    $(document).on('click','.basket__content--item--clear', function(){
        var templateUrl = path.templateUrl;
        var id = $(this).attr('data-id');

        $('.basket__content').html('<img class="preLoader" src="'+templateUrl+'/img/ajax-loader.gif">');

        jQuery.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=delFromCart&id=" + id, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
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
           // console.log(data);
            //модалка если понадобится
            if(data != 0){
                $('.basket__content').html(data);
            }else{
                $('.basket__content').html("");
            }
            updateCount();
        }
    });
}

function updateCount(){
    //total price
    var total = 0;
    $('.cart_price').each(function(){
        total = total + parseInt($(this).text());
    });
    $('.total_price').text(total);

    //total count
    var count = 0;
    $('.counter').each(function(){
        count = count + parseInt($(this).text());
    });
    $('.total__count').text(count);
}


