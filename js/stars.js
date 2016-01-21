$(function(){
    $(document).ready(function(){
        // ADD RATING WIDGET
        var ratingElement = $('.c-rating').get(0);
        var callback = function(rating) { $('input[name="reviewer-rating"]').val(rating); };
        var r = rating(ratingElement, 0, 5, callback);


        $(document).on('click','.js-send-review', function(){
            var name = $('input[name="reviewer-name"]').val();
            var phone = $('input[name="reviewer-phone"]').val();
            var mail = $('input[name="reviewer-mail"]').val();
            var rating = $('input[name="reviewer-rating"]').val();
            var message = $('textarea[name="reviewer-message"]').val();
            var photo = $('input[name="reviewer-photo"]')[0].files[0];

           // if(name == '' || phone == '' || mail == '' || rating == '' || photo == ''){
                // не все введено
           // }else{
                //data to be sent to server
            var m_data = new FormData();
            m_data.append( 'action', 'addreview');
            m_data.append( 'name', name);
            m_data.append( 'mail', mail);
            m_data.append( 'rating', rating);
            m_data.append( 'phone', phone);
            m_data.append( 'message', message);
            m_data.append( 'file_attach', photo);

            jQuery.ajax({
                url: ajaxurl, //url, к которому обращаемся
                contentType: false,
                processData: false,
                type: "POST",
                dataType:'json',
                data: m_data, //данные, которые передаем. Обязательно для action указываем имя нашего хука
                success: function (data) {
                    //alert('done');
                    //load json data from server and output message
                   console.log(data.text);
                }
            });
            return false;
          //  }
        });
    });
});
