/**
 * Created by n0m4dz on 4/13/16.
 */

import './../../../../node_modules/bootstrap-sass/assets/stylesheets/_bootstrap.scss'
import './../../../../node_modules/simple-line-icons/scss/simple-line-icons.scss'
import './../../../../node_modules/font-awesome/scss/font-awesome.scss'

import '../../../../node_modules/jquery-slimscroll/jquery.slimscroll.js'
import '../../../../node_modules/jquery-touchswipe/jquery.touchSwipe'
import '../../../../node_modules/jquery-placeholder/jquery.placeholder'

import 'bootstrap-sass'

$(function ($) {

    var windowHeight;
    var windowWidth;
    var contentHeight;
    var contentWidth;
    var isDevice = true;

    // calculations for elements that changes size on window resize
    var windowResizeHandler = function () {
        windowHeight = window.innerHeight;
        windowWidth = $(window).width();
        contentHeight = windowHeight - $('#header').height();
        contentWidth = $('#content').width();

        console.log(contentHeight);

        $('#leftSide').height(contentHeight - 28);
        $('.closeLeftSide').height(contentHeight);
        $('#wrapper').height(contentHeight);
        $('#mapView').height(contentHeight);
        $('#content').height(contentHeight);

        setTimeout(function () {
            $('.commentsFormWrapper').width(contentWidth);
        }, 300);


        // Add custom scrollbar for left side navigation
        if (windowWidth > 767) {
            $('.bigNav').slimScroll({
                height: contentHeight - $('.leftUserWraper').height()
            });
        } else {
            $('.bigNav').slimScroll({
                height: contentHeight
            });
        }
        if ($('.bigNav').parent('.slimScrollDiv').size() > 0) {
            $('.bigNav').parent().replaceWith($('.bigNav'));
            if (windowWidth > 767) {
                $('.bigNav').slimScroll({
                    height: contentHeight - $('.leftUserWraper').height()
                });
            } else {
                $('.bigNav').slimScroll({
                    height: contentHeight
                });
            }
        }

        // reposition of prices and area reange sliders tooltip
        var priceSliderRangeLeft = parseInt($('.priceSlider .ui-slider-range').css('left'));
        var priceSliderRangeWidth = $('.priceSlider .ui-slider-range').width();
        var priceSliderLeft = priceSliderRangeLeft + ( priceSliderRangeWidth / 2 ) - ( $('.priceSlider .sliderTooltip').width() / 2 );
        $('.priceSlider .sliderTooltip').css('left', priceSliderLeft);

        var areaSliderRangeLeft = parseInt($('.areaSlider .ui-slider-range').css('left'));
        var areaSliderRangeWidth = $('.areaSlider .ui-slider-range').width();
        var areaSliderLeft = areaSliderRangeLeft + ( areaSliderRangeWidth / 2 ) - ( $('.areaSlider .sliderTooltip').width() / 2 );
        $('.areaSlider .sliderTooltip').css('left', areaSliderLeft);
    }

    var repositionTooltip = function (e, ui) {
        var div = $(ui.handle).data("bs.tooltip").$tip[0];
        var pos = $.extend({}, $(ui.handle).offset(), {
            width: $(ui.handle).get(0).offsetWidth,
            height: $(ui.handle).get(0).offsetHeight
        });
        var actualWidth = div.offsetWidth;

        var tp = {left: pos.left + pos.width / 2 - actualWidth / 2}
        $(div).offset(tp);

        $(div).find(".tooltip-inner").text(ui.value);
    }

    windowResizeHandler();
    $(window).resize(function () {
        windowResizeHandler();
    });


    setTimeout(function () {
        $('body').removeClass('notransition');
    }, 500);

    if (!(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch)) {
        $('body').addClass('no-touch');
        isDevice = false;
    }

    // Header search icon transition
    $('.search input').focus(function () {
        $('.searchIcon').addClass('active');
    });
    $('.search input').blur(function () {
        $('.searchIcon').removeClass('active');
    });

    // Notifications list items pulsate animation
    $('.notifyList a').hover(
        function () {
            $(this).children('.pulse').addClass('pulsate');
        },
        function () {
            $(this).children('.pulse').removeClass('pulsate');
        }
    );


    // Expand left side navigation
    var navExpanded = false;
    $('.navHandler, .closeLeftSide').click(function () {
        if (!navExpanded) {
            $('.logo').addClass('expanded');
            $('#leftSide').addClass('expanded');
            if (windowWidth < 768) {
                $('.closeLeftSide').show();
            }
            $('.hasSub').addClass('hasSubActive');
            $('.leftNav').addClass('bigNav');
            if (windowWidth > 767) {
                $('#wrapper').addClass('m-full');
            }
            windowResizeHandler();
            navExpanded = true;
        } else {
            $('.logo').removeClass('expanded');
            $('#leftSide').removeClass('expanded');
            $('.closeLeftSide').hide();
            $('.hasSub').removeClass('hasSubActive');
            $('.bigNav').slimScroll({destroy: true});
            $('.leftNav').removeClass('bigNav');
            $('.leftNav').css('overflow', 'visible');
            $('#wrapper').removeClass('m-full');
            navExpanded = false;
        }
    });

    //Expand right panel


    // functionality for map manipulation icon on mobile devices
    $('.mapHandler').click(function () {
        if ($('#mapView').hasClass('mob-min') ||
            $('#mapView').hasClass('mob-max') ||
            $('#content').hasClass('mob-min') ||
            $('#content').hasClass('mob-max')) {
            $('#mapView').toggleClass('mob-max');
            $('#content').toggleClass('mob-min');
        } else {
            $('#mapView').toggleClass('min');
            $('#content').toggleClass('max');
        }

        setTimeout(function () {
            var priceSliderRangeLeft = parseInt($('.priceSlider .ui-slider-range').css('left'));
            var priceSliderRangeWidth = $('.priceSlider .ui-slider-range').width();
            var priceSliderLeft = priceSliderRangeLeft + ( priceSliderRangeWidth / 2 ) - ( $('.priceSlider .sliderTooltip').width() / 2 );
            $('.priceSlider .sliderTooltip').css('left', priceSliderLeft);

            var areaSliderRangeLeft = parseInt($('.areaSlider .ui-slider-range').css('left'));
            var areaSliderRangeWidth = $('.areaSlider .ui-slider-range').width();
            var areaSliderLeft = areaSliderRangeLeft + ( areaSliderRangeWidth / 2 ) - ( $('.areaSlider .sliderTooltip').width() / 2 );
            $('.areaSlider .sliderTooltip').css('left', areaSliderLeft);

            if (map) {
                // google.maps.event.trigger(map, 'resize');
            }

            $('.commentsFormWrapper').width($('#content').width());
        }, 300);

    });


    // Expand left side sub navigation menus
    $(document).on("click", '.hasSubActive', function () {
        $(this).toggleClass('active');
        $(this).children('ul').toggleClass('bigList');
        $(this).children('a').children('.arrowRight').toggleClass('fa-angle-down');
    });

    if (isDevice) {
        $('.hasSub').click(function () {
            $('.leftNav ul li').not(this).removeClass('onTap');
            $(this).toggleClass('onTap');
        });
    }

    // functionality for custom dropdown select list
    $('.dropdown-select li a').click(function () {
        if (!($(this).parent().hasClass('disabled'))) {
            $(this).prev().prop("checked", true);
            $(this).parent().siblings().removeClass('active');
            $(this).parent().addClass('active');
            $(this).parent().parent().siblings('.dropdown-toggle').children('.dropdown-label').html($(this).text());
        }
    });

    //$('.priceSlider').slider({
    //    range: true,
    //    min: 0,
    //    max: 2000000,
    //    values: [500000, 1500000],
    //    step: 10000,
    //    slide: function (event, ui) {
    //        $('.priceSlider .sliderTooltip .stLabel').html(
    //            '$' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
    //            ' <span class="fa fa-arrows-h"></span> ' +
    //            '$' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
    //        );
    //        var priceSliderRangeLeft = parseInt($('.priceSlider .ui-slider-range').css('left'));
    //        var priceSliderRangeWidth = $('.priceSlider .ui-slider-range').width();
    //        var priceSliderLeft = priceSliderRangeLeft + ( priceSliderRangeWidth / 2 ) - ( $('.priceSlider .sliderTooltip').width() / 2 );
    //        $('.priceSlider .sliderTooltip').css('left', priceSliderLeft);
    //    }
    //});
    //$('.priceSlider .sliderTooltip .stLabel').html(
    //    '$' + $('.priceSlider').slider('values', 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
    //    ' <span class="fa fa-arrows-h"></span> ' +
    //    '$' + $('.priceSlider').slider('values', 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
    //);
    //var priceSliderRangeLeft = parseInt($('.priceSlider .ui-slider-range').css('left'));
    //var priceSliderRangeWidth = $('.priceSlider .ui-slider-range').width();
    //var priceSliderLeft = priceSliderRangeLeft + ( priceSliderRangeWidth / 2 ) - ( $('.priceSlider .sliderTooltip').width() / 2 );
    //$('.priceSlider .sliderTooltip').css('left', priceSliderLeft);
    //
    //$('.areaSlider').slider({
    //    range: true,
    //    min: 0,
    //    max: 20000,
    //    values: [5000, 10000],
    //    step: 10,
    //    slide: function (event, ui) {
    //        $('.areaSlider .sliderTooltip .stLabel').html(
    //            ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' Sq Ft' +
    //            ' <span class="fa fa-arrows-h"></span> ' +
    //            ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' Sq Ft'
    //        );
    //        var areaSliderRangeLeft = parseInt($('.areaSlider .ui-slider-range').css('left'));
    //        var areaSliderRangeWidth = $('.areaSlider .ui-slider-range').width();
    //        var areaSliderLeft = areaSliderRangeLeft + ( areaSliderRangeWidth / 2 ) - ( $('.areaSlider .sliderTooltip').width() / 2 );
    //        $('.areaSlider .sliderTooltip').css('left', areaSliderLeft);
    //    }
    //});
    //$('.areaSlider .sliderTooltip .stLabel').html(
    //    $('.areaSlider').slider('values', 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' Sq Ft' +
    //    ' <span class="fa fa-arrows-h"></span> ' +
    //    $('.areaSlider').slider('values', 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' Sq Ft'
    //);
    //var areaSliderRangeLeft = parseInt($('.areaSlider .ui-slider-range').css('left'));
    //var areaSliderRangeWidth = $('.areaSlider .ui-slider-range').width();
    //var areaSliderLeft = areaSliderRangeLeft + ( areaSliderRangeWidth / 2 ) - ( $('.areaSlider .sliderTooltip').width() / 2 );
    //$('.areaSlider .sliderTooltip').css('left', areaSliderLeft);

    $('.volume .btn-round-right').click(function () {
        var currentVal = parseInt($(this).siblings('input').val());
        if (currentVal < 10) {
            $(this).siblings('input').val(currentVal + 1);
        }
    });
    $('.volume .btn-round-left').click(function () {
        var currentVal = parseInt($(this).siblings('input').val());
        if (currentVal > 1) {
            $(this).siblings('input').val(currentVal - 1);
        }
    });

    $('.handleFilter').click(function () {
        $('.filterForm').slideToggle(200);
    });

    //Enable swiping
    $(".carousel-inner").swipe({
        swipeLeft: function (event, direction, distance, duration, fingerCount) {
            $(this).parent().carousel('next');
        },
        swipeRight: function () {
            $(this).parent().carousel('prev');
        }
    });

    $(".carousel-inner .card").click(function () {
        window.open($(this).attr('data-linkto'), '_self');
    });

    $('#content').scroll(function () {
        if ($('.comments').length > 0) {
            var visible = $('.comments').visible(true);
            if (visible) {
                $('.commentsFormWrapper').addClass('active');
            } else {
                $('.commentsFormWrapper').removeClass('active');
            }
        }
    });

    $('.btn').click(function () {
        if ($(this).is('[data-toggle-class]')) {
            $(this).toggleClass('active ' + $(this).attr('data-toggle-class'));
        }
    });

    $('.tabsWidget .tab-scroll').slimScroll({
        height: '235px',
        size: '5px',
        position: 'right',
        color: '#939393',
        alwaysVisible: false,
        distance: '5px',
        railVisible: false,
        railColor: '#222',
        railOpacity: 0.3,
        wheelStep: 10,
        allowPageScroll: true,
        disableFadeOut: false
    });

    $('.progress-bar[data-toggle="tooltip"]').tooltip();
    $('.tooltipsContainer .btn').tooltip();

    //$("#slider1").slider({
    //    range: "min",
    //    value: 50,
    //    min: 1,
    //    max: 100,
    //    slide: repositionTooltip,
    //    stop: repositionTooltip
    //});
    //$("#slider1 .ui-slider-handle:first").tooltip({
    //    title: $("#slider1").slider("value"),
    //    trigger: "manual"
    //}).tooltip("show");
    //
    //$("#slider2").slider({
    //    range: "max",
    //    value: 70,
    //    min: 1,
    //    max: 100,
    //    slide: repositionTooltip,
    //    stop: repositionTooltip
    //});
    //$("#slider2 .ui-slider-handle:first").tooltip({
    //    title: $("#slider2").slider("value"),
    //    trigger: "manual"
    //}).tooltip("show");
    //
    //$("#slider3").slider({
    //    range: true,
    //    min: 0,
    //    max: 500,
    //    values: [190, 350],
    //    slide: repositionTooltip,
    //    stop: repositionTooltip
    //});
    //$("#slider3 .ui-slider-handle:first").tooltip({
    //    title: $("#slider3").slider("values", 0),
    //    trigger: "manual"
    //}).tooltip("show");
    //$("#slider3 .ui-slider-handle:last").tooltip({
    //    title: $("#slider3").slider("values", 1),
    //    trigger: "manual"
    //}).tooltip("show");

    //$('#autocomplete').autocomplete({
    //    source: ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"],
    //    focus: function (event, ui) {
    //        var label = ui.item.label;
    //        var value = ui.item.value;
    //        var me = $(this);
    //        setTimeout(function () {
    //            me.val(value);
    //        }, 1);
    //    }
    //});
    //
    //$('#tags').tagsInput({
    //    'height': 'auto',
    //    'width': '100%',
    //    'defaultText': 'Add a tag',
    //});

    //$('#datepicker').datepicker();

    // functionality for autocomplete address field
    //if ($('#address').length > 0) {
    //    var address = document.getElementById('address');
    //    var addressAuto = new google.maps.places.Autocomplete(address);
    //
    //    google.maps.event.addListener(addressAuto, 'place_changed', function () {
    //        var place = addressAuto.getPlace();
    //
    //        if (!place.geometry) {
    //            return;
    //        }
    //        if (place.geometry.viewport) {
    //            map.fitBounds(place.geometry.viewport);
    //        } else {
    //            map.setCenter(place.geometry.location);
    //        }
    //        newMarker.setPosition(place.geometry.location);
    //        newMarker.setVisible(true);
    //        $('#latitude').text(newMarker.getPosition().lat());
    //        $('#longitude').text(newMarker.getPosition().lng());
    //
    //        return false;
    //    });
    //}

    $('input, textarea').placeholder();

});
