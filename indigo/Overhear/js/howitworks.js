
$(document).ready(function() {
    // -------------------- begin features --------------------
    var $_feature = $('.feature');

    function setFeatures($_feat) {
        var thisCaption = $_feat.find('.feature-caption');

        // slide up other captions
        $('.feature-caption').not(thisCaption).slideUp(300);

        // slide down this caption
        thisCaption.slideDown(300);

        // this feature gets chevron-down
        var thisIcon = $_feat.find('.chevron');
        thisIcon
            .removeClass('chevron-right')
            .addClass('chevron-down');

        // other features get chevron-right
        $('.feature .chevron').not(thisIcon)
            .removeClass('chevron-down')
            .addClass('chevron-right');
    } // setFeatures()

    function setMobileFeatureTitles($_title) {
        // hide other titles
        $('.feature-mobile-title').not($_title).hide();

        // show this title
        $_title.show();
    } // setMobileFeatureTitles()

    function setMobileFeatureCaptions($_caption) {
        // hide other captions
        $('.feature-mobile-caption').not($_caption).hide();

        // show this caption
        $_caption.show();
    } // setMobileFeatureCaptions()

    // click handler for feature titles
    $_feature.on('click', function(e) {
        // expand this feature, collapse others
        setFeatures($(this));

        // extract number from end of feature class and go to slide
        // i.e. "feature feature_1 active" => "1"
        var slide = $(this).attr('class').
                        split("_").pop().split(' ').shift();
        $_slideshow1.cycle('goto', slide);
    }); // click
    // -------------------- end features --------------------

    // -------------------- begin slider1 --------------------
    const NUM_SLIDES = 4;
    var $_slide = $('#home-market .slideshow1 .slide');
    var $_slideshow1 = $('#home-market .slideshow1');
    var $_card  = $('#home-market .slideshow1 .card');
    var $_cardB = $('#home-market .slideshow1 .cardB');
    var $_cardC = $('#home-market .slideshow1 .cardC');
    var $_cardD = $('#home-market .slideshow1 .cardD');

    var file_lookup = {
        "0": "img/create-project-new.jpg",
        "1": "img/create-project-new.jpg",
        "2": "img/create-project-new.jpg",
        "3": "img/create-project-new.jpg"
    };

    // return next index in list
    function nextIndex(n) {
        n++;

        // wrap around to 0
        if (n == NUM_SLIDES) { n = 0; }

        return n;
    } // nextIndex()

    // draw other three cards behind current slide
    function drawCards(slide) {
        var n;

        // draw first card behind current slide
        n = nextIndex(slide);
        $_cardB.css('background-image', 'url(' + file_lookup[n] + ')');

        // draw second card behind current slide
        n = nextIndex(n);
        $_cardC.css('background-image', 'url(' + file_lookup[n] + ')');

        // draw third card behind current slide
        n = nextIndex(n);
        // $_cardD.attr('src', file_lookup[n]);
        $_cardD.css('background-image', 'url(' + file_lookup[n] + ')');
    } // drawCards()

    // click handlers for each background card
    $_card.on('click', function(e) {
        $_slideshow1.cycle('next');
        return false;
    });

    $_slide.on('click', function(e) {
        $_slideshow1.cycle('next');
        return false;
    });

    // triggered just before transition to new slide
    $_slideshow1.on('cycle-before', function(e, opts) {
        checkViewport();
        // use alternate title and caption fields for mobile
        if (viewport == 'portrait' || viewport == 'landscape') {
            setMobileFeatureTitles( $('.section-slider1').find('.feature-mobile-title_' + opts.nextSlide) );
            setMobileFeatureCaptions( $('.section-slider1').find('.feature-mobile-caption_' + opts.nextSlide) );
        }

        // expand feature associated with slide, collapse others
        if (viewport == 'tablet' || viewport == 'desktop') {
            $_slide_feature =
                $('.section-slider1').find('.feature_' + opts.nextSlide);
            setFeatures($_slide_feature);
        }
    }); // cycle-before

    // triggered just after transition to new slide
    $_slideshow1.on('cycle-after', function(e, opts) {
        drawCards(opts.nextSlide);
    }); // cycle-after

    // triggered after slideshow initialization
    $_slideshow1.on('cycle-post-initialize', function(e, opts) {
        drawCards(opts.currSlide);

        checkViewport();
        if (viewport == 'portrait' || viewport == 'landscape') {
            // show feature mobile title 0
            setMobileFeatureTitles( $('.section-slider1').find('.feature-mobile-title_0') );

            // show feature mobile caption 0
            setMobileFeatureCaptions( $('.section-slider1').find('.feature-mobile-caption_0') );
        }

        if (viewport == 'tablet' || viewport == 'desktop') {
            // expand feature 0
            setFeatures( $('.section-slider1').find('.feature_0') );
        }
    }); // cycle-post-initialize

    // start slideshow
    $_slideshow1.cycle({
        autoHeight: false,
        caption: '.cycle-caption',
        captionTemplate: '{{cycleTitle}}',
        fx: 'fade',
        log: false,
        height: 381,
        paused: false,
        slides: '> .slide',
        speed: 300,
        swipe: true,
        timeout: 10000
    });
    // -------------------- end slider1 --------------------


    // -------------------- begin resize() --------------------
    var _prevViewport;

    $(window).resize(function() {
        checkViewport();
        // skip most of this function if viewport hasn't changed
        if (viewport != _prevViewport) {
            _prevViewport = viewport;

            // reveal mobile title and caption for slideshow #1
            // when resizing from tablet to landscape
            if (viewport == 'portrait' || viewport == 'landscape') {
                setMobileFeatureTitles( $('.section-slider1').find('.feature-mobile-title_' + 
                    $_slideshow1.data('cycle.opts').currSlide ) );
                setMobileFeatureCaptions( $('.section-slider1').find('.feature-mobile-caption_' +
                    $_slideshow1.data('cycle.opts').currSlide ) );
            }
        }
    }); // resize()
    // -------------------- end resize() --------------------
}); // document.ready
