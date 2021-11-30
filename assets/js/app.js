var App = function () {

    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });

        /*Tooltips*/
        jQuery('.tooltips').tooltip();
        jQuery('.tooltips-show').tooltip('show');      
        jQuery('.tooltips-hide').tooltip('hide');       
        jQuery('.tooltips-toggle').tooltip('toggle');       
        jQuery('.tooltips-destroy').tooltip('destroy');       

        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');
    }

    function handleToggle() {
        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });
    }

    function handleBoxed() {
        jQuery('.boxed-layout-btn').click(function(){
            jQuery(this).addClass("active-switcher-btn");
            jQuery(".wide-layout-btn").removeClass("active-switcher-btn");
            jQuery("body").addClass("boxed-layout container");
        });
        jQuery('.wide-layout-btn').click(function(){
            jQuery(this).addClass("active-switcher-btn");
            jQuery(".boxed-layout-btn").removeClass("active-switcher-btn");
            jQuery("body").removeClass("boxed-layout container");
        });
    }

    function handleHeader() {
         jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop()>100){
                jQuery(".header-fixed .header-static").addClass("header-fixed-shrink");
            }
            else {
                jQuery(".header-fixed .header-static").removeClass("header-fixed-shrink");
            }
        });
    }

    function handleMegaMenu() {
        $(document).on('click', '.mega-menu .dropdown-menu', function(e) {
            e.stopPropagation()
        })
    }         

    return {
        init: function () {
            handleBootstrap();
            handleToggle();
            handleBoxed();
            handleHeader();
            handleMegaMenu();
        },

        initScrollBar: function () {
            jQuery('.mCustomScrollbar').mCustomScrollbar({
                theme:"minimal",
                scrollInertia: 300,
                scrollEasing: "linear"
            });
        },

        initCounter: function () {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },
    };

}();