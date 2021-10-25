jQuery(function ($) {
    $('.list-specialties').append('<span class="load-more"></span>');
    var button = $('.list-specialties .load-more');
    var offset_specialties = 20;
    var loading = false;
    var scrollHandling = {
        allow: true,
        reallow: function () {
            scrollHandling.allow = true;
        },
        delay: 400 //(milliseconds) adjust to the highest acceptable value
    };
    $('.menu__body__providers').scroll(function () {
        // console.log( 'scrolling' );
        if (!loading && scrollHandling.allow) {
            scrollHandling.allow = false;
            setTimeout(scrollHandling.reallow, scrollHandling.delay);
            var offset = $(button).offset().top - $('.menu__body__providers').scrollTop();
            if (2000 > offset) {
                loading = true;
                var data = {
                    action: 'be_ajax_load_more_specialties',
                    offset_specialties: offset_specialties,
                    query: beloadmorespecialties.query,
                };
                $.post(beloadmorespecialties.url, data, function (res) {
                    if (res.success) {
                        $('.list-specialties').append(res.data);
                        $('.list-specialties').append(button);
                        offset_specialties = offset_specialties + 20;
                        loading = false;
                    } else {
// console.log(res);
                    }
                }).fail(function (xhr, textStatus, e) {
// console.log(xhr.responseText);
                });
            }
        }
    });
});
