;(function($) {
    if ( ($(window).height() + 100) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top:500}
        });
    }

    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    }); 
    if ($('body').width() < 1000) {
        var owlItems = $(".owl-carousel .item");
        owlItems.first().remove();
        owlItems.last().remove();
        var owlItems2 = $(".owl-carousel2 .item"),
        owlLength2 = owlItems2.length;
        owlItems2.eq(0).remove();
        owlItems2.eq(1).remove();
        owlItems2.eq(owlLength2-1).remove();
        owlItems2.eq(owlLength2-2).remove();
    }


    var owl = $(".owl-carousel");

    if (owl.attr('id') == 'owl-chars') {
       var last = owl.children().last().clone();
       var first = owl.children().first().clone();
        last.prependTo(owl);
        first.appendTo(owl);

    }


    owl.owlCarousel({

        items : 3, //10 items above 1000px browser width
        itemsDesktop : [1000,1], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,1], // betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0
        itemsMobile : false,
        navigation: true,
        afterAction: function(el) {
            if ($('body').width() >= 1000) {
                //remove class active
                this
                    .$owlItems
                    .removeClass('active')

                //add class active
                this
                    .$owlItems //owl internal $ object containing items
                    .eq(this.currentItem + 1)
                    .addClass('active')
            } else {
                //remove class active
                this
                    .$owlItems
                    .removeClass('active')

                //add class active
                this
                    .$owlItems //owl internal $ object containing items
                    .eq(this.currentItem)
                    .addClass('active')
            }
        }
    });

    var owl2 = $(".owl-carousel2");


    if (owl2.attr('id') == 'owl-donghanh') {
        var last1 = owl2.children().last().clone();
        var prevLast = owl2.children().last().prev().clone();
        var first1 = owl2.children().first().clone();
        var nextFirst = owl2.children().first().next().clone();
        prevLast.prependTo(owl2);
        last1.prependTo(owl2);
        first1.appendTo(owl2);
        nextFirst.appendTo(owl2);

    }

    owl2.owlCarousel({

        items : 5,
        itemsDesktop : [1000,1], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,1], // betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0
        itemsMobile : false,  
        navigation: true,
        afterAction: function(el) {
            if ($('body').width() >= 1000) {
                //remove class active
                this
                    .$owlItems
                    .removeClass('active')

                //add class active
                this
                    .$owlItems //owl internal $ object containing items
                    .eq(this.currentItem + 2)
                    .addClass('active')
            } else {
                //remove class active
                this
                    .$owlItems
                    .removeClass('active')

                //add class active
                this
                    .$owlItems //owl internal $ object containing items
                    .eq(this.currentItem)
                    .addClass('active')
            }
        }
    });

})(jQuery);
