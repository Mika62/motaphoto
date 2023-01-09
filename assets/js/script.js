jQuery(document).ready(function () {

/*------------------------------------
    Menu mobile
------------------------------------*/
    jQuery('#menu-btn').on('click', function () {
        jQuery('#menu').toggleClass('open')

        // Open
        if (jQuery('#menu').hasClass('open')) {
            jQuery('#menu-open-icon').css('display', 'none')
            jQuery('#menu-close-icon').css('display', 'inline-block')
            jQuery('#header').addClass('sticky')
            jQuery('body').addClass('stop-scroll')
        }
        
        // Close
        else {
            jQuery('#menu-close-icon').css('display', 'none')
            jQuery('#menu-open-icon').css('display', 'inline-block')
            jQuery('#header').removeClass('sticky')
            jQuery('body').removeClass('stop-scroll')
        }
    })

})
