$(function () {
    $(document).ready(function(){
       updateCart();
        $('.basket__foot--order--success').html('<img class="preLoader" src="'+templateUrl+'/img/ajax-loader.gif">');
    });

    $(document).on('click','.categoryitems__item--buybtn, .product--item--info__buybtn', function(){
        var templateUrl = path.templateUrl;
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');

        $('.cartBody').html('<img class="preLoader" src="'+templateUrl+'/img/ajax-loader.gif">');

        jQuery.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=addToCart&id=" + id + "&price=" + price, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                updateCart();
            }
        });
        return false;
    });

    $(document).on('click','.plus, .minus', function(){
        var templateUrl = path.templateUrl;
        var block = $(this).parent();
        //var container = block.parent();

        var count = block.children('.counter').attr('data-value');
        var id = block.children('.counter').attr('data-id');
        //var price = container.children().children('.cart_price').text();

        //onePrice = parseInt(price)/parseInt(count);

        if($(this).attr('class') == 'plus'){
            count = parseInt(count)+1;
         //   price = onePrice*parseInt(count);

            block.children('.counter').attr('data-value', count);
            block.children('.counter').text(count);
         //   container.children().children('.cart_price').text(price);
        }else{
           // console.log('minus');
            if(count != 1){
                count = parseInt(count)-1;
               // price = onePrice*parseInt(count);

                block.children('.counter').attr('data-value', count);
                block.children('.counter').text(count);
              //  container.children().children('.cart_price').text(price);
            }
        }

        //preloader
        $('.cartBody').html('<img class="preLoader" src="'+templateUrl+'/img/ajax-loader.gif">');
        jQuery.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=updateCount&id=" + id + "&count=" + count, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                updateCart();
            }
        });
    });

    $(document).on('click','.basket__content--item--clear', function(){
        var templateUrl = path.templateUrl;
        var id = $(this).attr('data-id');

        $('.cartBody').html('<img class="preLoader" src="'+templateUrl+'/img/ajax-loader.gif">');

        jQuery.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=delFromCart&id=" + id, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                updateCart();
            }
        });
        return false;
    });

    $(document).on('click','.basket__foot--order', function(){
        var total = parseInt($('.total_price').text());

        if(total >= 90){
           // active( $(this),0);
           // $(this).removeClass('basket__foot--order--noactive');

            $('.cartBody').hide();
            $('.orderBody').show();

            if($('.orderBody').is(':visible')){
                $('.basket__foot--order--success').css('display','block');
                $('.basket__foot--order').hide();
            }

            if($('input[name="order-phone"]').val().length == 10){
                active($('.basket__foot--order--success'),0);
                $('.basket__foot--wrap--required').css('display','none');
            }else{
                active($('.basket__foot--order--success'),1);
                $('.basket__foot--wrap--required').html('<p>Для подтверждения заказа укажите свой телефон.</p>');
                $('.basket__foot--wrap--required').css('display','block');
            }

        }else{
            //active( $(this),1);
            //$(this).addClass('basket__foot--order--noactive');
        }
    });

    $(document).on('click', '.add-address-btn', function(){

        if($('.basket__content__order--advanced').is(':visible')){
            $('.basket__content__order--advanced').hide();
        }else{
            $('.basket__content__order--advanced').show();
        }

    });

    $(document).on('click','.basket__content__order--advanced--closeaddress', function(){
        if($('.basket__content__order--advanced').is(':visible')){
            $('.basket__content__order--advanced').hide();
        }else{
            $('.basket__content__order--advanced').show();
        }
    });

    $(document).on('click','.basket__foot--order--success',function(){
        var phone = $('input[name="order-phone"]').val();
        var total = $('.total_price').text();
        if( phone.length >=10 ){
            var data = 'action=sendOrder&phone='+phone+'&total='+total;

            if($('.basket__content__order--advanced').is(':visible')){
                var address = $('input[name="order-address"]').val();
                var homenum = $('input[name="order-homenum"]').val();
                var porchnum = $('input[name="order-porchnum"]').val();
                var housing = $('input[name="order-housing"]').val();
                var aptnum = $('input[name="order-aptnum"]').val();
                var floor = $('input[name="order-floor"]').val();
                var comment = $('textarea[name="order-comment"]').val();

                data += '&adv=1&address='+address+'&homenum='+homenum+'&porchnum='+porchnum+'&housing='+housing+'&aptnum='+aptnum+'&floor='+floor+'&comment='+comment;
            }

            active($('.basket__foot--order--success'),1);

            $('input[name="order-phone"]').val('');
            if($('.basket__content__order--advanced').is(':visible')) {
                $('input[name="order-address"]').val('');
                $('input[name="order-homenum"]').val('');
                $('input[name="order-porchnum"]').val('');
                $('input[name="order-housing"]').val('');
                $('input[name="order-aptnum"]').val('');
                $('input[name="order-floor"]').val('');
                $('textarea[name="order-comment"]').val('');
            }

            jQuery.ajax({
                url: ajaxurl, //url, к которому обращаемся
                type: "POST",
                data: data, //данные, которые передаем. Обязательно для action указываем имя нашего хука
                success: function (data) {
                    //console.log(data);
                    jQuery.ajax({
                        url: ajaxurl, //url, к которому обращаемся
                        type: "POST",
                        data: "action=delFromCart&all=1", //данные, которые передаем. Обязательно для action указываем имя нашего хука
                        success: function (data) {
                            updateCart();
                            updateButtons();

                            $('.orderBody').hide();
                            $('.basket__foot--order--success').css('display','none');
                            active($('.basket__foot--order--success'),0);
                            $('.basket__foot--order').show();
                            $('.cartBody').show();
                        }
                    });
                }
            });
            return false;
        }
    });

    $(document).on('input','input[name="order-phone"]',function(){
       if($(this).val().length == 10){
           active($('.basket__foot--order--success'),0);
           $('.basket__foot--wrap--required').css('display','none');
       }else{
           active($('.basket__foot--order--success'),1);
           $('.basket__foot--wrap--required').html('<p>Для подтверждения заказа укажите свой телефон.</p>');
           $('.basket__foot--wrap--required').css('display','block');
       }
    });

    $(document).on('click','.return', function(){
        $('.cartBody').show();
        $('.orderBody').hide();
        $('.basket__foot--order--success').hide();
        $('.basket__foot--order').show();

        updateCart();
        return false;
    });
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
                $('.cartBody').html(data);
            }else{
                $('.cartBody').html("");
            }
            updateCount();
            updateButtons();
        }
    });
}

function updateCount(){
    //total price
    var total = 0;
    $('.cart_price').each(function(){
        var price =  parseInt($(this).text());
        var container = $(this).parent().parent();
        var count = parseInt(container.children().children('.counter').attr('data-value'));

        total += price*count;
    });
    $('.total_price').text(total);

    //total count
    var count = 0;
    $('.counter').each(function(){
        count = count + parseInt($(this).text());
    });
    $('.total__count').text(count);
}

function active(obj,attr){
    if(attr){
        obj.addClass('basket__foot--order--noactive');
    }else{
        obj.removeClass('basket__foot--order--noactive');
    }
}

function updateButtons(){

    var total = parseInt($('.total_price').text());

    if(total >= 80){
        active( $('.basket__foot--order'),0);
        $('.basket__foot--wrap--required').css('display','none');
    }else{
        active( $('.basket__foot--order'),1);
        $('.basket__foot--wrap--required').html('<p>Минимальный заказ 80 грн.</p>');
        $('.basket__foot--wrap--required').css('display','block');
    }
}


