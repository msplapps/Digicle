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
           // $('#name, #email, #phone, #message').css({'border':'1px solid #0f0'});

            // First Name
            if($.trim($('#name').val()) == '') {
                name.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                name.css({'border':'1px solid #0f0'});
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
                else{
                    email.css({'border':'1px solid #0f0'});
                }
            }

            // Phone Number
            if($.trim($('#phone').val()) == '') {
                phone.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                phone.css({'border':'1px solid #0f0'});
            }
            // Massage
            if($.trim($('#message').val()) == '') {
                message.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                message.css({'border':'1px solid #0f0'});
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
    


        // Order Form--------
        $('#order_btn').click(function() {
            var fname    = $('#fname');
            var fphone   = $('#fphone');
            var femail   = $('#femail');
            var ftech    = $('#ftech');
            var fprice   = $('#fprice');
            var fmsg     = $('#fmsg');

            var error   = 0;

            // First Name
            if($.trim($('#fname').val()) == '') {
                fname.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                fname.css({'border':'1px solid #0f0'});
            }
            // Phone Number
            if($.trim($('#fphone').val()) == '') {
                fphone.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                fphone.css({'border':'1px solid #0f0'});
            }

            // E-mail
            if($('#femail').val() == '') {
                femail.css({'border':'1px solid #f00'});
                error = 1;
            }else {
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if(!emailPattern.test($('#femail').val())) {
                    femail.css({'border':'1px solid #f00'});
                    error = 1;
                }
                else{
                    femail.css({'border':'1px solid #0f0'});
                }
            }

            // technologies
            if($.trim($('#ftech').val()) == 'Project Type') {
                ftech.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                ftech.css({'border':'1px solid #0f0'});
            }

            // Pricing
            if($.trim($('#fprice').val()) == 'Budget') {
                fprice.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                fprice.css({'border':'1px solid #0f0'});
            }

            
            // Massage
            if($.trim($('#fmsg').val()) == '') {
                fmsg.css({'border':'1px solid #f00'});
                error = 1;
            }
            else{
                fmsg.css({'border':'1px solid #0f0'});
            }

            if(error) {
                $('.errS1').text('Required : valid info.');
                return false;
            }

            var fname    = $('#fname');
            var fphone   = $('#fphone');
            var femail   = $('#femail');
            var ftech    = $('#ftech');
            var fprice   = $('#fprice');
            var fmsg     = $('#fmsg');

            var str = 'fname='+fname.val()+'&fphone='+fphone.val()+'&femail='+femail.val()+'&ftech='+ftech.val()+'&fprice='+fprice.val()+'&fmsg='+fmsg.val();

            $.ajax({
                url: 'submit1.php',
                type : 'POST',
                data : str,
                cache: false,
                
                success: function (data) {
                    $('.f_success1').html(data);
                    $('.f_success1').show();

                    $('#fname, #fphone, #femail, #ftech, #fprice, #fmsg').val('');
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

    $(".get_text").click(function(){
        $(".touchpopup").slideToggle();
    });
    
    $(".close").click(function(){
        $(".touchpopup").slideToggle("slow");
        $('#fname, #fphone, #femail, #ftech, #fprice, #fmsg').val('').css({'border':''});
        $('#ftech').val('Project Type');
        $('#fprice').val('Budget');
        $('.errS1, .f_success1').text('');
    });

    $('#nav').affix({
      offset: {
        top: $('header').height()
      }
    }); 
    $('body').scrollspy({ target: '#nav' })

    $('.navbar-toggle').click(function(){
        $('#navbar').slideToggle();
    });

    $('.nav li a').click(function(){
        $('#navbar').slideUp();
    })

});

