$(document).ready(function () {
    $("li").click(function () {
        $("li.active").removeClass("active");
        $(this).addClass("active");
    });

    $('a[href^="#"]').on('click', function (event) {

        var target = $($(this).attr('href'));

        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 2000);
        }
    });

});



