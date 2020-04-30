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

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    var width = $(window).width();

    if (width > 768) {
        if (scroll < 1) {
            $('ul li').first().attr('style', 'font-size: 15px');
            $('ul li').not(':first-child').attr('style', 'font-size: 15px');
        }
        else if (scroll > 601 && scroll < 2800) {
            $('ul li').eq(1).attr('style', 'font-size: 25px');
            $('ul li').not(':eq(1)').attr('style', 'font-size: 10px');
        }
        else if (scroll > 2801 && scroll < 3400) {
            $('ul li').eq(2).attr('style', 'font-size: 25px');
            $('ul li').not(':eq(2)').attr('style', 'font-size: 10px');
        }
        else if (scroll > 3401) {
            $('ul li').eq(3).attr('style', 'font-size: 25px');
            $('ul li').not(':eq(3)').attr('style', 'font-size: 10px');
        }
    }

});

$(document).ready(function () {
    $("input, textarea")
        .focusout(function () {
            $("label").not().attr('style', 'font-size: 20px;');
        })
        .focusin(function () {
            $("label").not().attr('style', 'font-size: 10px;');
        });
});


