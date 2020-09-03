require('./bootstrap');
require('./stripe');

$(function() {
    $('.nav-btn').click(function() {
        $('.order-block').toggle(1000);
        $('.payment-block').toggle(1000);
    });

    $('#countries').on('change', function() {
        if(this.value == 'USA') {
            $('.states-block').show();
        } else {
            $('.states-block').hide();
        }
    });

    var count = 900;
    var counter = setInterval(timer, 1000);

    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            jQuery.get('/restart', function() {
                console.log('session cleared');
            });
            location.reload();
        }

        document.getElementById("timer").innerHTML = Math.floor(count / 60) + ":" + count % 60;
    }

});