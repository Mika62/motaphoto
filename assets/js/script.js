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

/*------------------------------------
    Lightbox
------------------------------------*/
    // Open
    jQuery('body').on('click', '.js-preview-btn', function () {
        jQuery('#lightbox').addClass('show').attr('aria-hidden', false)

        const img = jQuery('<img>', { id: 'lightbox-img', src: this.dataset.img })
        jQuery('#lightbox-content').prepend(img)

        setTimeout(() => {
            jQuery('#lightbox-loader').hide()
            jQuery('#lightbox-img').show()
        }, 1000)
    })

    // Close
    jQuery('#lightbox-close-btn').click(function () {
        jQuery('#lightbox').removeClass('show').attr('aria-hidden', false)
        jQuery('#lightbox-content').text('')
        jQuery('#lightbox-loader').show()
    })

})
