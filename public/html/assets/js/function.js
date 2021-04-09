$(document).ready(function () {
    var win = $(window);
    var html = $('html');
    var body = $('body');
    var menu = $('.m-nav');
    var ct = menu.find('.nav-ct');
    var open = $('.nav-open');
    var close = $('.nav-close');
    ct.append($('.c-site-head__menu').clone());
    open.click(function (e) {
        e.preventDefault();
        if (win.width() < 1025) {
            menu.addClass('act');
            body.addClass('stage-open');
        }
    });
    close.click(function (e) {
        e.preventDefault();
        if (win.width() < 1025) {
            menu.removeClass('act');
            body.removeClass('stage-open');
        }
    });

    $(".list-banner").slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $(".list-hightlight-pj").slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    $('.slide-place-action').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 9,
        variableWidth: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    $(".project-list .row").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerPadding: '10px',
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    $('.slider-for-pj').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav-pj'
    });
    $('.slider-nav-pj').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for-pj',
        dots: false,
        arrows: false,
        centerPadding: '10px',
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    $('.slider-for-pj-detail').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav-pj-detail'
    });
    $('.slider-nav-pj-detail').slick({
        slidesToShow: 8,
        slidesToScroll: 1,
        asNavFor: '.slider-for-pj-detail',
        dots: false,
        arrows: false,
        centerPadding: '10px',
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });

    $('.slider-for-mb').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav-mb'
    });
    $('.slider-nav-mb').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.slider-for-mb',
        dots: false,
        arrows: false,
        centerPadding: '10px',
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $(".slide-news-small").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dot: false
    });

    $(".top-right-header .has-dropdown")
        .mouseover(function () {
            $(this).addClass("hover-item");
        })
        .mouseout(function () {
            $(this).removeClass("hover-item");
        });

    // $(".show-advance-action").click(function () {
    //     $(".show-content-advance").slideToggle();
    // });

    // filter slick
    $(".list-place-slide a").click(function () {
        $(this).parents('.slick-track').find('.active').removeClass('active')
        $(this).addClass("active");
    });

    $(".list-place-slide li").click(function () {
        var filter = $(this).data('filter');
        let slider = $(this).parents('.place-slide').next().find('.slick-slider');
        if(filter=='all'){
            slider.slick('slickUnfilter');
        }
        else {
            slider.slick('slickUnfilter');
            slider.slick('slickFilter','.' + filter);
        }
    })

    //
    $(".list-button a").click(function () {
        $(".list-button a").removeClass("active");
        $(this).addClass("active");
    });

    // $("li.has-dropdown a").click(function () {
    //     $(this).closest("li").find(".dropdown-menu").slideToggle();
    // });

    $(".line-bottom .favorite").click(function () {
        $(this).toggleClass("active");
    });

    $('.DatePicker').datepicker();

    //backt-to-top
    // back to top buttom show and hidde after scroll
    var amountScrolled = 480;
    $(window).scroll(function () {
        if ($(this).scrollTop() > amountScrolled) {
            $(".back-top-btn").addClass("is-show");
        } else {
            $(".back-top-btn").removeClass("is-show  is-actived");
        }
    });
    $(".back-top-btn").on('click', function () {
        $("html, body").animate(
            {scrollTop: 0}, 600
        );
        return false;
    });

//add and remove animation with mouse
    $('.back-top-btn').on('mouseleave', function () {
        $(this).removeClass('is-actived');
    });
    $('.back-top-btn').on('mouseenter', function () {
        $(this).addClass('is-actived');
    });

    //  tab click
    $(".nav-item").click(function () {
        $(".nav-item").removeClass("active");
        $(this).addClass("active");
    });


    //mobile ====
    //menu

    var heightScreen = $(window).height();
    var heightBanner = $(".banner-menu").height();
    var heightMenu = heightScreen - heightBanner;
    $(".list-link-outer").css('max-height', heightMenu);

    $(window).resize(function () {
        var heightScreen = $(window).height();
        var heightBanner = $(".banner-menu").height();
        var heightMenu = heightScreen - heightBanner;
        $(".list-link-outer").css('max-height', heightMenu);
    });

    //footer ====
    $("footer .title-block").click(function () {
        $(this).toggleClass("active");
        $(this).closest("div").find("ul").toggleClass("active");
    });

    //chart=====
//bar chart =========
    var color = Chart.helpers.color;
    var barChartData = {
        labels: ['Mặt tiền', 'nhà phố', 'Căn hộ', 'Hẻm, ngõ', 'Đất nền'],
        datasets: [{
            label: 'Giá nhà đất tháng 01/2021',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [
                600,
                0,
                0,
                0,
                0
            ]
        }]
    };

    //line chart====
    var config = {
        type: 'line',
        data: {
            labels: ['1/2019', '2/2019', '3/2019', '4/2019', '5/2019', '6/2019', '7/2019', '8/2019', '9/2019', '10/2019', '11/2019', '12/2019'],
            datasets: [{
                label: 'Mặt tiền, nhà phố',
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.blue,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                fill: false,
            }, {
                label: 'Hẻm, ngỏ',
                fill: false,
                backgroundColor: window.chartColors.yellow,
                borderColor: window.chartColors.yellow,
                data: [
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                },
                y: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }
            }
        }
    };

    //line chart===
    var config1 = {
        type: 'line',
        data: {
            labels: ['1/2019', '2/2019', '3/2019', '4/2019', '5/2019', '6/2019', '7/2019', '8/2019', '9/2019', '10/2019', '11/2019', '12/2019'],
            datasets: [{
                label: 'Đường',
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.blue,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                fill: false,
            }, {
                label: 'Quận',
                fill: false,
                backgroundColor: window.chartColors.yellow,
                borderColor: window.chartColors.yellow,
                data: [
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10,
                    10
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                },
                y: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }
            }
        }
    };
    // window.onload = function() {
    //     var ctx = document.getElementById('canvas').getContext('2d');
    //     window.myBar = new Chart(ctx, {
    //         type: 'bar',
    //         data: barChartData,
    //         options: {
    //             responsive: true,
    //             plugins: {
    //                 legend: {
    //                     position: 'bottom',
    //                 }
    //             }
    //         }
    //     });
    //     var ctx1 = document.getElementById('canvas-line').getContext('2d');
    //     window.myLine = new Chart(ctx1, config);
    //     var ctx2 = document.getElementById('canvas-line1').getContext('2d');
    //     window.myLine = new Chart(ctx2, config1);
    // };


    function Timer(duration, display) {
        var timer = duration, hours, minutes, seconds;
        setInterval(function () {
            hours = parseInt((timer / 3600) % 24, 10)
            minutes = parseInt((timer / 60) % 60, 10)
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.html("<span class='hours time'>" + hours + "</span>" + ":" + "<span class='minutes time'>" + minutes + "</span>" + ":" + "<span class='seconds time'>" + seconds + "</span>");

            --timer;
        }, 1000);
    }

    jQuery(function ($) {
        var twentyFourHours = 24 * 60 * 60;
        var display = $('#remainingTime');
        Timer(twentyFourHours, display);
    })

    // load multiple images
    function handleFileSelect(evt) {
        var files = evt.target.files;

        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {

            // Only process image files.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML =
                        [
                            '<img style="height: 110px; border-radius: 4px; margin: 7px" src="',
                            e.target.result,
                            '" title="', escape(theFile.name),
                            '"/>'
                        ].join('');

                    span.addEventListener('click', function (e) {
                        if (e.offsetX > span.offsetWidth - 15) {
                            $(this).hide();
                        }
                    });
                    document.getElementById('list').insertBefore(span, null);
                };

            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    var el = document.getElementById('files');
    if (el) {
        el.addEventListener('change', handleFileSelect, false);
    }

    // load multiple images
    function handleFileSelect(evt) {
        var files = evt.target.files;

        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {

            // Only process image files.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML =
                        [
                            '<img style="height: 110px; border-radius: 4px; margin: 7px" src="',
                            e.target.result,
                            '" title="', escape(theFile.name),
                            '"/>'
                        ].join('');

                    span.addEventListener('click', function (e) {
                        if (e.offsetX > span.offsetWidth - 15) {
                            $(this).hide();
                        }
                    });
                    document.getElementById('list1').insertBefore(span, null);
                };

            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    var el = document.getElementById('files1');
    if (el) {
        el.addEventListener('change', handleFileSelect, false);
    }

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah1')
                .attr('src', e.target.result)
                .width(118)
                .height(118);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function project_list(elm){
    if($(elm).hasClass('slick-initialized')){
        $(elm).slick('unslick');
    }
    $(elm).slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
}

function add_rule_phone_number() {
    jQuery.validator.addMethod("rgphone", function (value, element) {
        return this.optional(element) || /^(056|058|059|032|033|034|035|036|037|038|039|070|076|077|078|079|081|082|083|084|085|098|095|097|096|0169|0168|0167|0166|0165|0164|0163|0162|090|093|0122|0126|0128|0121|0120|091|094|0123|0124|0125|0127|0129|092|0188|0186|099|0199|086|088|089|087)[0-9]{7}$/.test(value);
    }, "Số điện thoại không đúng định dạng");
}

function ajax_loading(show) {
    if ($('.loading-page').length == 0) {
        $('body').append('<div class="loading-page">\n' +
            '    <div class="loader"><div class="box"></div><div class="box"></div></div>' +
            '</div>');
    }

    if (show) {
        $('.loading-page').show();
    } else {
        $('.loading-page').hide();
    }
}

function logout(el) {
    ajax_loading(1);
    $.post($(el).attr('href'), {}, function(){
        location.reload();
    }).error(() => {
        location.reload();
    });
    return false;
}

function init_select2(element) {
    $(element).select2({allowClear: true, width: "100%" });
}

function get_provinces(destination) {
    destination = destination || '#province_id';
    var id = $(destination).attr('data-id');
    var select2 = $(destination).hasClass('select2');

    $.get(_base_url+'/location/get-provinces', function (res) {
        var html = '<option value="">Chọn Tỉnh / Thành phố</option>';
        if(select2) {
            html = '<option value=""></option>';
        }
        $.each(res.data, function( id, name ) {
            html += '<option value="'+id+'">'+name+'</option>';
        });
        $(destination).html(html).val(id).trigger('change');
    }, 'json');
}
function get_districts_by_province(obj_province, select2) {
    select2 = select2 || false;
    var destination = $(obj_province).attr('data-destination');
    var id = $(destination).attr('data-id');

    $.get('/location/get-districts', {province_id: $(obj_province).val()}, function (res) {
        var html = '<option value="">Chọn Quận / Huyện</option>';
        $.each(res.data, function( id, name ) {
            html += '<option value="'+id+'">'+name+'</option>';
        });
        $(destination).html(html).val(id).trigger('change');

        if (select2) init_select2(obj_province);

    }, 'json');
}
function get_wards_by_district(obj_district) {
    var destination = $(obj_district).attr('data-destination');
    var id = $(destination).attr('data-id');

    $.get('/location/get-wards', {district_id: $(obj_district).val()}, function (res) {
        var html = '<option value="">Chọn Phường / Xã</option>';
        $.each(res.data, function( id, name ) {
            html += '<option value="'+id+'">'+name+'</option>';
        });
        $(destination).html(html).val(id);
    }, 'json');
}

function normalizeAmpersand(string) {
    return string.replace(/&amp;/g, "&").replace(/amp%3B/g, "");
}

function updateUrlParameter(key, value, url){
    if (!url) url = window.location.href;

    url = normalizeAmpersand(url);

    url = URI(url);//.normalizeQuery();

    if (url.hasQuery('page')) {
        url.removeQuery('page');
    }
    if (url.hasQuery(key)) {
        url.removeQuery(key);
    }
    url = url.toString();
    if(!value){
        return url;
    }
    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
        hash;

    if (re.test(url)) {
        if (typeof value !== 'undefined' && value !== null && value !== '') {
            return url.replace(re, '$1' + key + "=" + value + '$2$3');
        } else {
            hash = url.split('#');
            url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
            if (typeof hash[1] !== 'undefined' && hash[1] !== null)
                url += '#' + hash[1];
            return url;
        }
    }
    else {
        if (typeof value !== 'undefined' && value !== null && value !== '') {
            var separator = url.indexOf('?') !== -1 ? '&' : '?';
            hash = url.split('#');
            url = hash[0] + separator + key + '=' + value;
            if (typeof hash[1] !== 'undefined' && hash[1] !== null)
                url += '#' + hash[1];
            return url;
        }
        else
            return url;
    }
    return false;
}

function replaceQueryParam(key, value, uri) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
        return uri + separator + key + "=" + value;
    }
}
