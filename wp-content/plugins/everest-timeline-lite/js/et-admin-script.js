(function($) {

    /**
     * Add blog functionality
     */
    $(function() {

        /*
         * Fetch list of taxonomy from post type
         */
        $('.et-post-type').on('change', function() {
            var select_post = $(this).val();
            $.ajax({
                url: etlak_backend_js_params.ajax_url,
                data: {
                    select_post: select_post,
                    _wpnonce: etlak_backend_js_params.ajax_nonce,
                    action: 'etlak_selected_post_taxonomy',
                    beforeSend: function() {
                        // $(".et-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    $(".et-select-taxonomy").html(response);
                    $(".et-filter-taxonomy").html(response);
//                    $(".et-loader-preview").hide();
                }
            });
        });
        /*
         * Fetch list of terms from taxonomy
         */
        $('.et-select-taxonomy').on('change', function() {
            var select_tax = $(this).val();
            var tax_type = $('.et-taxonomy-queries-type').val();
            $.ajax({
                url: etlak_backend_js_params.ajax_url,
                data: {
                    select_tax: select_tax,
                    tax_type: tax_type,
                    _wpnonce: etlak_backend_js_params.ajax_nonce,
                    action: 'etlak_selected_taxonomy_terms',
                    beforeSend: function() {
                        // $(".et-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    if (tax_type == 'multiple-taxonomy') {
                        $(".et-multiple-taxonomy-term").html(response);
                    } else if (tax_type == 'simple-taxonomy') {
                        $(".et-simple-taxonomy-term").html(response);
//                    $(".et-loader-preview").hide();
                    }
                }
            });
        });
        /*
         * Fetch list of terms for multiple taxonomy condition
         */
        $('body').on('change', '.et-multiple-taxonomy', function() {
            var select_tax = $(this).val();
            var nam = $(this);
            //alert(select_tax);
            $.ajax({
                url: etlak_backend_js_params.ajax_url,
                data: {
                    select_tax: select_tax,
                    _wpnonce: etlak_backend_js_params.ajax_nonce,
                    action: 'etlak_hierarchy_terms',
                    beforeSend: function() {
                        // $(".et-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {

                    $(nam).closest('.et-each-taxonomy-wrap').find(".et-hierarchy-taxonomy-term").html(response);
                }
            });
        });


        /*
         * Insert multiple taxonomy condition
         */
        $('.et-add-tax-condition').click(function() {
            var post_type = $('.et-post-type').val();
            $.ajax({
                url: etlak_backend_js_params.ajax_url,
                data: {
                    _wpnonce: etlak_backend_js_params.ajax_nonce,
                    action: 'etlak_add_tax_condition',
                    post_type: post_type

                },
                type: "POST",
                success: function(response) {
                    $(".et-tax-inner-wrap").append(response);
                }
            });
        });

//radio button show and hide for post type's post
        $('.et-select-post-type').click(function() {
            var value = $(this).val();
            if (value == 'single_post_type') {
                $('.et-single-post-type-wrap').show();
                $('.et-multiple-post-type-wrap').hide();
            } else {
                $('.et-single-post-type-wrap').hide();
                $('.et-multiple-post-type-wrap').show();
            }
        });
        //radio button show and hide for button link
        $('body').on('click', '.et-select-post-link', function() {
            var value = $(this).val();
            if (value === 'post_link')
            {
                $(this).closest('.et-blog-wrap').find('.et-custom-link').hide();
            } else
            {
                $(this).closest('.et-blog-wrap').find('.et-custom-link').show();
            }
        });

        /*
         * Menu Tab
         */
        $('.et-tab-tigger').click(function() {
            $('.et-tab-tigger').removeClass('et-active');
            $(this).addClass('et-active');
            var active_tab_key = $('.et-tab-tigger.et-active').data('menu');
            $('.et-settings-wrap').removeClass('et-active-container');
            $('.et-settings-wrap[data-menu-ref="' + active_tab_key + '"]').addClass('et-active-container');
        });

        /*
         * Post Menu Tab
         */
        $('.et-query-tigger').click(function() {
            $('.et-query-tigger').removeClass('et-query-active');
            $(this).addClass('et-query-active');
            var active_post_key = $('.et-query-tigger.et-query-active').data('menu');
            $('.et-query-setting-wrap').removeClass('et-active-field');
            $('.et-query-setting-wrap[data-menu-ref="' + active_post_key + '"]').addClass('et-active-field');
        });

        /*
         * Usage Tab
         */
        $('.et-usage-trigger').click(function() {
            $('.et-usage-trigger').removeClass('et-usage-active');
            $(this).addClass('et-usage-active');
            var active_tab_key = $('.et-usage-trigger.et-usage-active').data('usage');
            $('.et-usage-post').hide();
            $('.et-usage-post[data-usage-ref="' + active_tab_key + '"]').show();
        });
        /*
         * Checked button for metadata
         */

        $('.et-show-category').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-tag').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-author').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-comment').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-date').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.et-date-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.et-date-wrapper').hide();
            }
        });
        $('.et-show-read-more').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.et-read-more-wrap').show();
            } else
            {
                $(this).val('0');
                $('.et-read-more-wrap').hide();
            }
        });


        $('.et-show-taxonomy-relation').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.et-taxonomy-main-wrap').show();
            } else
            {
                $(this).val('0');
                $('.et-taxonomy-main-wrap').hide();
            }
        });

        $('body').on('click', '.et-show-operator', function() {
            if ($(this).is(':checked'))
            {
                $(this).closest('.et-post-field-wrap').find('.et-show-operator').val('1');
                $(this).closest('.et-post-field-wrap').find('.et-operator-inner-wrap').show();
            } else

            {
                $(this).closest('.et-post-field-wrap').find('.et-show-operator').val('0');
                $(this).closest('.et-post-field-wrap').find('.et-operator-inner-wrap').hide();
            }

        });


        /*
         * Show && hide taxonomy query  value type
         */
        $('.et-taxonomy-queries-type').change(function() {
            if ($(this).val() === "simple-taxonomy") {
                $('.et-select-taxonomy').val('select');
                $('.et-terms-wrap').show();
                $('.et-multiple-terms-wrap').hide();
                $('.et-simple-terms-wrap').show();
            } else {
                $('.et-select-taxonomy').val('select');
                $('.et-terms-wrap').show();
                $('.et-multiple-terms-wrap').show();
                $('.et-simple-terms-wrap').hide();
            }

        });
        var query_type = $(".et-taxonomy-queries-type option:selected").val();
        if (query_type === "simple-taxonomy") {
            $('.et-terms-wrap').show();
            $('.et-multiple-terms-wrap').hide();
            $('.et-simple-terms-wrap').show();
        } else {
            $('.et-terms-wrap').show();
            $('.et-multiple-terms-wrap').show();
            $('.et-simple-terms-wrap').hide();
        }

        /**
         * blog query remove
         *
         */

        $('body').on('click', '.et-delete-query', function() {
            var delete_term = confirm('Are you sure you want to delete this taxonomy condition?');
            if (delete_term) {
                $(this).closest('.et-each-taxonomy-wrap').fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });

        //radio button show and hide for meta keys
        $('.et-post-content').click(function() {
            var value = $(this).val();
            if (value === 'full-text') {
                $('.et-excerpt-wrap').hide();
            } else {
                $('.et-excerpt-wrap').show();
            }
        });

        //ajax call in post type thickbox
        $('.et-filter-taxonomy').on('change', function() {
            var select_type = $(this).val();
            var term_type = $('.et-filter-terms-type:checked').val();
            $.ajax({
                url: etlak_backend_js_params.ajax_url,
                data: {
                    select_type: select_type,
                    //  term_type: term_type,
                    _wpnonce: etlak_backend_js_params.ajax_nonce,
                    action: 'etlak_filter_tax_terms'

                },
                type: "POST",
                success: function(response) {
                    //alert(response);
                    if (term_type == 'specific') {
                        $(".et-specific-wrap").html(response);
                    } else {

                    }

                }
            });
        });



//radio button show and hide for post type's post
        $('.et-post-link').click(function() {
            var value = $(this).val();
            if (value == 'post_link') {
                $('.et-custom-link-wrap').hide();
            } else {
                $('.et-custom-link-wrap').show();
            }
        });


        /*
         * Show and hide timeline template
         */
        $('.et-timeline-layout').change(function() {
            if ($(this).val() === "vertical") {
                $('.et-vertical-wrap').show();

                $('.et-one-side-wrap').hide();

            } else {
                $('.et-vertical-wrap').hide();

                $('.et-one-side-wrap').show();

            }
        });
        var timeline_type = $(".et-timeline-layout option:selected").val();
        if (timeline_type === "vertical") {
            $('.et-vertical-wrap').show();

            $('.et-one-side-wrap').hide();

        } else {
            $('.et-vertical-wrap').hide();

            $('.et-one-side-wrap').show();

        }

        $('.et-show-social-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.et-social-container').show();
            } else
            {
                $(this).val('0');
                $('.et-social-container').hide();
            }
        });
        $('.et-show-facebook-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-twitter-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-google-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-linkedin-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-mail-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.et-show-pinterest-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });


        //vertical timeline preview
        $(".et-vertical-timeline-common").first().addClass("vertical-active");
        $('.et-vertical-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.et-vertical-timeline-common').hide();
            $('#et-vertical-timeline-demo-' + current_id).show();
        });
        if ($(".et-vertical-template option:selected").length > 0) {
            var grid_view = $(".et-vertical-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.et-vertical-timeline-common').hide();
            $('#et-vertical-timeline-demo-' + current_id1).show();
        }


        //one-side timeline preview
        $(".et-one-side-timeline-common").first().addClass("horizontal-active");
        $('.et-one-side-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.et-one-side-timeline-common').hide();
            $('#et-one-side-timeline-demo-' + current_id).show();
        });
        if ($(".et-one-side-template option:selected").length > 0) {
            var grid_view = $(".et-one-side-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.et-one-side-timeline-common').hide();
            $('#et-one-side-timeline-demo-' + current_id1).show();
        }

    });
}(jQuery));
