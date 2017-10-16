var appMaster = {
    
    // Smooth Scrolling---------------
    smoothScroll: function() {
        $('a[href*=#]:not([href=#myCarousel])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1500);
                    return false;
                }
            }
        });
    },

    // stickyFooter -----
    stickyFooter: function(){
        var footer = $('footer').innerHeight();
        $('.push').height(footer);
        $('.wrapper').css({'margin-bottom': -footer })
    },

    contact_form: function(){
        $('.submit').click(function() {
            var name    = $('#name');
            var email   = $('#email');
            var phone   = $('#phone');
            var message = $('#message');

            var error   = 0;
            $('#name, #email, #phone, #message').css({'border':'1px solid #0f0'});

            // First Name
            if($.trim($('#name').val()) == '') {
                name.css({'border':'1px solid #f00'});
                error = 1;
            }
            // E-mail
            if($('#email').val() == '') {
                email.css({'border':'1px solid #f00'});
                error = 1;
            }else {
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if(!emailPattern.test($('#email').val())) {
                    email.css({'border':'1px solid #f00'});
                    error = 1;
                }
            }
            // Phone Number
            if($.trim($('#phone').val()) == '') {
                phone.css({'border':'1px solid #f00'});
                error = 1;
            }
            // Massage
            if($.trim($('#message').val()) == '') {
                message.css({'border':'1px solid #f00'});
                error = 1;
            }

            if(error) {
                $('.errS').text('Required : valid info.');
                return false;
            }

            var str = 'name='+name.val()+'&email='+email.val()+'&phone='+phone.val()+'&message='+message.val();

            $.ajax({
                url: 'submit.php',
                type : 'POST',
                data : str,
                cache: false,
                
                success: function (data) {
                    $('.f_success').html(data);
                    $('.f_success').show();

                    $('#name, #email, #phone, #message').val('');
                }
            });
            return false;

        });
    }


}

$(window).on('load resize', function () {
    appMaster.stickyFooter(); // stickyFooter -----
});

$(document).ready(function() {
    appMaster.smoothScroll(); // Smoothe Scrooling-----
    appMaster.stickyFooter(); // StickyFooter -----
    appMaster.contact_form(); // Contact Form Validation-----
});


$(document).ready(function(){
$('#nav').affix({
      offset: {
        top: $('header').height()
      }
}); 
$('body').scrollspy({ target: '#nav' })
});