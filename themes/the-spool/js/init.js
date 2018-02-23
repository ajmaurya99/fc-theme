$(document).ready(function () {

    $("[data-fancybox]").fancybox({
        margin: [0, 0]
    });

    /*
     *  https://stackoverflow.com/questions/19068812/set-a-cookie-expire-after-2-hours
     *  https://github.com/js-cookie/js-cookie/tree/v1.5.1
     * */

    setTimeout(function () {
        $("#fancy-btn-click").trigger('click');
    }, 3000);



    if ($(".single").length > 0) {
        $relatedHeight = $('.related-articles').outerHeight(true);
        $footerHeight = $('.site-footer').outerHeight(true);
        $totalHeight = $footerHeight + $relatedHeight;
        $topoffset = $('.sidebar-offset').outerHeight(true);

        //     console.log($('.site-footer').outerHeight(true));
        $pos = $(".add-top-height");
        $position = $pos.offset();
        $emailScroll = $position.top -50;
        console.log($emailScroll);

        $('#secondary').affix({
            offset: {
                top: $emailScroll,
                bottom: $totalHeight
            }
        });
    }

    /* Scroll to Top */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 250) {
            $(".scrolltotop").show();
        } else {
            $(".scrolltotop").hide();
        }
    });

    $(".scrolltotop").click(function () {
        0
        $('html,body').animate({
            scrollTop: "0px"
        }, 800);
    });


    /* Scroll down */
    $('.scroll-down > a').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500, 'linear'
        );
    });


    /*
     http://www.programming-free.com/2013/12/increase-decrease-font-size-jquery.html
     Change Font Sizes
     */
    $incfont = 1;
    $decfont = 1;
    $('#incfont').click(function (event) {
        event.preventDefault();
        if ($incfont <= 3) {
            $decfont--;

            pSize = parseInt($('.post-content article >  p').css('font-size')) + 2;
            $('.post-content article >  p').css('font-size', pSize);

            aSize = parseInt($('.post-content article >  a').css('font-size')) + 2;
            $('.post-content article > a').css('font-size', aSize);

            h1Size = parseInt($('.post-content article > h1').css('font-size')) + 2;
            $('.post-content article > h1').css('font-size', h1Size);

            h2Size = parseInt($('.post-content article > h2').css('font-size')) + 2;
            $('.post-content article > h2').css('font-size', h2Size);

            h3Size = parseInt($('.post-content article > h3').css('font-size')) + 2;
            $('.post-content article > h3').css('font-size', h3Size);

            h4Size = parseInt($('.post-content article > h4').css('font-size')) + 2;
            $('.post-content article > h4').css('font-size', h4Size);

            h5Size = parseInt($('.post-content article > h5').css('font-size')) + 2;
            $('.post-content article > h5').css('font-size', h5Size);

            h6Size = parseInt($('.post-content article > h6').css('font-size')) + 2;
            $('.post-content article > h6').css('font-size', h6Size);

            blockpSize = parseInt($('.post-content article > blockquote p').css('font-size')) + 2;
            $('.post-content article > blockquote p').css('font-size', blockpSize);


            // blockSize = parseInt($('.post-content article > blockquote').css('font-size')) + 2;
            // $('.post-content article > blockquote').css('font-size', blockSize);


            fontChange = parseInt($('.font-change').css('font-size')) + 2;
            $('.font-change').css('font-size', fontChange);
        }
        $incfont++;
    });
    $('#decfont').click(function (event) {
        event.preventDefault();
        if ($decfont <= 3) {
            $incfont--;

            pSize = parseInt($('.post-content article > p').css('font-size')) - 2;
            $('.post-content article > p').css('font-size', pSize);

            aSize = parseInt($('.post-content article > a').css('font-size')) - 2;
            $('.post-content article > a').css('font-size', aSize);

            h1Size = parseInt($('.post-content article > h1').css('font-size')) - 2;
            $('.post-content article > h1').css('font-size', h1Size);

            h2Size = parseInt($('.post-content article > h2').css('font-size')) - 2;
            $('.post-content article > h2').css('font-size', h2Size);

            h3Size = parseInt($('.post-content article > h3').css('font-size')) - 2;
            $('.post-content article > h3').css('font-size', h3Size);

            h4Size = parseInt($('.post-content article > h4').css('font-size')) - 2;
            $('.post-content article > h4').css('font-size', h4Size);

            h5Size = parseInt($('.post-content article > h5').css('font-size')) - 2;
            $('.post-content article > h5').css('font-size', h5Size);

            h6Size = parseInt($('.post-content article > h6').css('font-size')) - 2;
            $('.post-content article > h6').css('font-size', h6Size);

            blockpSize = parseInt($('.post-content article > blockquote p').css('font-size')) - 2;
            $('.post-content article > blockquote p').css('font-size', blockpSize);


            fontChange = parseInt($('.font-change').css('font-size')) - 2;
            $('.font-change').css('font-size', fontChange);

        }
        $decfont++;
    });

    $('#deffont').click(function (event) {
        event.preventDefault();

        $('.post-content article > p').css({'font-size': ''});
        $('.post-content article > a').css({'font-size': ''});
        $('.post-content article > h1').css({'font-size': ''});
        $('.post-content article > h2').css({'font-size': ''});
        $('.post-content article > h3').css({'font-size': ''});
        $('.post-content article > h4').css({'font-size': ''});
        $('.post-content article > h5').css({'font-size': ''});
        $('.post-content article > h6').css({'font-size': ''});
        $('.post-content article > blockquote p').css({'font-size': ''});
        $('.font-change').css({'font-size': ''});
        $incfont = 1;
        $decfont = 1;
    });

    /* Menu toggle overlay */

    $('#toggle').click(function () {
        $(this).toggleClass('active');
        $('#overlay').toggleClass('open');
        $('.heading.logo').toggleClass('active');
        $('.fontsizes').toggleClass('hide');
    });


    /* Menu change color on scroll */
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 75) {
            $(".main-menu").addClass("active");

        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $(".main-menu").removeClass("active");
        }
    });


    /* Change Logo iImage on home page */
    if ($('.home').length > 0) {
        $(window).on("scroll", function () {
            if ($(window).scrollTop() > 75) {
                $(".main-menu").addClass("active");

                $('.black-logo').css({'display': 'block'});
                $('.white-logo').css({'display': 'none'});
            } else {
                //remove the background property so it comes transparent again (defined in your css)
                $(".main-menu").removeClass("active");
                $('.black-logo').css({'display': 'none'});
                $('.white-logo').css({'display': 'block'});
            }
        });
    }


});