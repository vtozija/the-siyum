require('./bootstrap');
require('./stripe');

$(function () {
    $('#back').click(function () {
        $('.payment-block').toggle(1000);
        $('.order-block').toggle(1000);
    });

    $("#next").on("click", function () {
        if ($("#order-form")[0].checkValidity()) {
            var data = $("#order-form").serialize();
            $.ajax({
                type: "POST",
                url: "/order",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                },
                data: data,
                success: function () {
                    $('.order-block').toggle(1000);
                    $('.payment-block').toggle(1000);
                }
            });
        }
        else {
            $("#order-form")[0].reportValidity();
        }
    });

    $('#countries').on('change', function () {
        if (this.value == 'United States of America') {
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
            jQuery.get('/restart', function () {
                console.log('session cleared');
            });
            location.reload();
        }

        document.getElementById("timer").innerHTML = Math.floor(count / 60) + ":" + count % 60;
    }

});