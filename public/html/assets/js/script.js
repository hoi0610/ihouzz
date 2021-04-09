$(document).ready(function() {
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
      slidesToScroll: 1,
      responsive: [
          {
              breakpoint: 1200,
              settings: {
                  slidesToShow: 6,
                  slidesToScroll: 6,
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



    $( ".top-right-header .has-dropdown" )
        .mouseover(function() {
            $( this ).addClass("hover-item");
        })
        .mouseout(function() {
            $( this ).removeClass("hover-item");
        });

    // $(".show-advance-action").click(function () {
    //     $(".show-content-advance").slideToggle();
    // });

    $(".list-place-slide a").click(function () {
        $(".list-place-slide a").removeClass("active");
        $(this).addClass("active");
    });

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
    $(window).scroll(function() {
        if ($(this).scrollTop() > amountScrolled) {
            $(".back-top-btn").addClass("is-show");
        } else {
            $(".back-top-btn").removeClass("is-show  is-actived");
        }
    });
    $(".back-top-btn").on('click',function() {
        $("html, body").animate(
            {scrollTop: 0},600
        );
        return false;
    });

//add and remove animation with mouse
    $('.back-top-btn').on('mouseleave', function() {
        $(this).removeClass('is-actived');
    });
    $('.back-top-btn').on('mouseenter', function() {
        $(this).addClass('is-actived');
    });

  //  tab click
    $(".nav-item").click(function () {
        $(".nav-item").removeClass("active");
        $(this).addClass("active");
    });


  //mobile ====
    //menu

    var heightScreen = $( window ).height();
    var heightBanner = $(".banner-menu").height();
    var heightMenu = heightScreen - heightBanner;
    $(".list-link-outer").css('max-height', heightMenu);

    $( window ).resize(function() {
        var heightScreen = $( window ).height();
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
            labels: ['1/2019', '2/2019', '3/2019', '4/2019', '5/2019', '6/2019', '7/2019','8/2019', '9/2019', '10/2019', '11/2019', '12/2019'],
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
            labels: ['1/2019', '2/2019', '3/2019', '4/2019', '5/2019', '6/2019', '7/2019','8/2019', '9/2019', '10/2019', '11/2019', '12/2019'],
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
    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
        var ctx1 = document.getElementById('canvas-line').getContext('2d');
        window.myLine = new Chart(ctx1, config);
        var ctx2 = document.getElementById('canvas-line1').getContext('2d');
        window.myLine = new Chart(ctx2, config1);
    };



    function Timer(duration, display)
    {
        var timer = duration, hours, minutes, seconds;
        setInterval(function () {
            hours = parseInt((timer /3600)%24, 10)
            minutes = parseInt((timer / 60)%60, 10)
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.html("<span class='hours time'>"+hours+"</span>"  +":"+"<span class='minutes time'>"+minutes+"</span>" + ":" + "<span class='seconds time'>"+seconds+"</span>");

            --timer;
        }, 1000);
    }

    jQuery(function ($)
    {
        var twentyFourHours = 24 * 60 * 60;
        var display = $('#remainingTime');
        Timer(twentyFourHours, display);
    });

    //range data===
    $(".js-range-slider-money").ionRangeSlider({
        skin: "round",
        min: 0,
        max: 1000,
        from: 400,
        step: 1,            // default 1 (set step)
        grid: true,         // default false (enable grid)
        postfix: "triệu"
    });

    $(".js-range-slider-percent").ionRangeSlider({
        skin: "round",
        min: 0,
        max: 100,
        from: 75,
        step: 1,            // default 1 (set step)
        grid: true,         // default false (enable grid)
        postfix: "%"
    });

    $(".js-range-slider-year").ionRangeSlider({
        skin: "round",
        min: 0,
        max: 25,
        from: 5,
        step: 1,            // default 1 (set step)
        grid: true,         // default false (enable grid)
        postfix: "năm"
    });

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
            reader.onload = (function(theFile) {
                return function(e) {
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
                        if (e.offsetX > span.offsetWidth-15) {
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
    if(el){
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
            reader.onload = (function(theFile) {
                return function(e) {
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
                        if (e.offsetX > span.offsetWidth-15) {
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
    if(el){
        el.addEventListener('change', handleFileSelect, false);
    }

});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah1')
                .attr('src', e.target.result)
                .width(118)
                .height(118);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
