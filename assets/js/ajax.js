jQuery(document).ready(function () {

/*------------------------------------
    Apply default
------------------------------------*/
    jQuery('select').select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below',
    })

/*------------------------------------
    Picture filters
------------------------------------*/
    jQuery('#form-carousel').on('change', function () {
        // Parse params
        const params = jQuery.param({
            action: 'picture_pagination_filters',
            category: jQuery('[name="category"]').val(),
            format: jQuery('[name="format"]').val(),
            sort: jQuery('[name="sort"]').val(),
        })

        // Send
        jQuery.get(adminAjax, params).done(function (data) {
            // Insert data
            jQuery('#carousel-container').fadeOut('slow', function () {
                const html = jQuery.parseHTML(data.data.html)
                jQuery('#carousel-container').html(html).show()
            })

            // Load more
            if (!data.data.next) {
                jQuery('#load-more-btn').attr('disabled', true)
            } else {
                jQuery('#load-more-btn').attr('disabled', false)
            }

            // Params into Url
            window.history.replaceState(null, null, '?' + params);
        })
    })

/*------------------------------------
    Load more
------------------------------------*/
    jQuery('#load-more-btn').click(function () {
        // Current page
        const params = new URLSearchParams(window.location.search)

        // Set page
        if (params.has('paged')) {
            const nextPage = (parseInt(params.get('paged')) + 1)
            params.set('paged', nextPage)
        } else {
            params.set('action', 'picture_pagination_filters')
            params.set('paged', 2)
        }

        // Send
        jQuery.get(adminAjax, params.toString()).done(function (data) {
            // Append html
            const html = jQuery.parseHTML(data.data.html)
            jQuery('#carousel-container').append(html)

            // Load more
            if (!data.data.next) {
                jQuery('#load-more-btn').attr('disabled', true)
            }

            // Params into Url
            window.history.replaceState(null, null, '?' + params);
        })
    })

})
