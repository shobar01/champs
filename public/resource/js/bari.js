$(document).ready(function (e) {

    $('#test').scrollToFixed();
    $('.res-nav_click').click(function () {
        $('.main-nav').slideToggle();
        return false

    });

    $('.Portfolio-box').magnificPopup({
        delegate: 'a',
        type: 'image'
    });

});

wow = new WOW({
    animateClass: 'animated',
    offset: 100
});
wow.init();


$(window).load(function () {

    $('.main-nav li a, .servicelink').bind('click', function (event) {
        var $anchor = $(this);

        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 102
        }, 1500, 'easeInOutExpo');
        /*
         if you don't want to use the easing effects:
         $('html, body').stop().animate({
         scrollTop: $($anchor.attr('href')).offset().top
         }, 1000);
         */
        if ($(window).width() < 768) {
            $('.main-nav').hide();
        }
        event.preventDefault();
    });
})
$(window).load(function () {


    var $container = $('.portfolioContainer'),
        $body = $('body'),
        colW = 375,
        columns = null;


    $container.isotope({
        // disable window resizing
        resizable: true,
        masonry: {
            columnWidth: colW
        }
    });

    $(window).smartresize(function () {
        // check if columns has changed
        var currentColumns = Math.floor(($body.width() - 30) / colW);
        if (currentColumns !== columns) {
            // set new column count
            columns = currentColumns;
            // apply width to container manually, then trigger relayout
            $container.width(columns * colW)
                .isotope('reLayout');
        }

    }).smartresize(); // trigger resize to set container width
    $('.portfolioFilter a').click(function () {
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');

        var selector = $(this).attr('data-filter');
        $container.isotope({

            filter: selector,
        });
        return false;
    });

});

$(document).ready(function () {
    $("#simpan").click(function () {
        $("#simpan").hide();
        $("#timer").show();
    });
});

$(document).ready(function () {
    $("#simpan").click(function () {
        var detik = 60;

        function hitung() {
            var to = setTimeout(hitung, 1000);
            var peringatan = 'style = "color: red"';
            $('#timer').html('<h1 align="center" ' + peringatan + '>Please Wait<br />' + detik + '</h1>');
            detik--;
            if (detik < 0) {
                clearTimeout(to);
                detik = 60;
                $("#timer").hide();
                $("#simpan").show();
            }
        }

        hitung();
    });
});
