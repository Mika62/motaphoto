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

/*------------------------------------
    Modal
------------------------------------*/
    // Open
    jQuery('a[href="#modal"]').click(function () {
        jQuery('body').addClass('stop-scroll')
        jQuery('#modal').addClass('show').attr('aria-hidden', false)

        // Entries
        if (this.dataset.entries) {
            const entries = JSON.parse(this.dataset.entries)

            for (const key in entries) {
                jQuery(`input[name="${key}"]`).val(entries[key])
            }
        }
    })

    // Close
    jQuery('html').click(function (e) {
        if (e.target.id === 'modal') {
            location.hash = ''
            jQuery('body').removeClass('stop-scroll')
            jQuery('#modal').removeClass('show').attr('aria-hidden', true)
        }
    })

/*------------------------------------
    Preview
------------------------------------*/
    jQuery.each(['prev', 'next'], function (key, value) {
        // Show
        jQuery(`#preview-${value}-btn`).mouseover(function () {
            jQuery(`#preview-${value}-img`).show()
        })

        // Hide
        jQuery(`#preview-${value}-btn`).mouseout(function () {
            jQuery(`#preview-${value}-img`).hide()
        })
    })

})
