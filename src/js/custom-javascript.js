// Add your JS customizations here
jQuery( document ).ready( function( $ ) {
    $(document).on('click', '.js-header-search', function(e) {
        e.preventDefault();

        $(this).parent('.js-searchform').find('input').focus();
        if($(this).parent('.js-searchform').hasClass('active')) {
            $(this).parent('.js-searchform').submit();
        } else {
            $(this).parent('.js-searchform').addClass('active');
        }

        $(document).on('click', function(e) {
            if (!$(e.target).is('.js-searchform, .js-searchform *')) {
                $('.js-searchform').removeClass('active');
            }
        });
    });

    // Insights load more
    var insightsPageNumber = 1;
    $('.js-insights-load-more').on('click', function(e) {
        e.preventDefault();
        var $topic = $('.js-insights-form').find('.js-topic').val(),
            $type = $('.js-insights-form').find('.js-type').val(),
            $keyword = $('.js-insights-form').find('.js-keyword').val();
        $(this).hide();
        insightsPageNumber++;
        $.ajax({
            url : wpAjax.ajaxUrl,
            data : { 
                action: 'cbtu_insights_load_more',
                pageNumber: insightsPageNumber,
                topic: $topic,
                type: $type,
                keyword: $keyword
            },
            type : 'post',
            dataType: 'json',
            success : function( posts ) {
                $('.js-insights-list').append(posts.content);
                if(posts.page == posts.max_page) {
                    $('.js-insights-load-more').hide();
                } else {
                    $('.js-insights-load-more').show();
                }
            }
        });
    });

    $('.js-insight-submit').on('click', function(e) {
        e.preventDefault();
        var $topic = $('.js-insights-form').find('.js-topic').val(),
        $type = $('.js-insights-form').find('.js-type').val(),
        $keyword = $('.js-insights-form').find('.js-keyword').val();
        $.ajax({
            url : wpAjax.ajaxUrl,
            data : { 
                action: 'cbtu_insights_load_more',
                topic: $topic,
                type: $type,
                keyword: $keyword
            },
            type : 'post',
            dataType: 'json',
            success : function( posts ) {
                console.log(posts.page + ' = ' + posts.max_page);
                $('.js-insights-list').html(posts.content);
                if(posts.page == posts.max_page) {
                    $('.js-insights-load-more').hide();
                } else {
                    $('.js-insights-load-more').show();
                }
            }
        });
    });

    // Resources load more
    var mresourcesPageNumber = 1;
    $('.js-member-resources-load-more').on('click', function(e) {
        e.preventDefault();
        var $topic = $('.js-member-resources-form').find('.js-topic').val(),
            $type = $('.js-member-resources-form').find('.js-type').val(),
            $keyword = $('.js-member-resources-form').find('.js-keyword').val();
        $(this).hide();
        mresourcesPageNumber++;
        $.ajax({
            url : wpAjax.ajaxUrl,
            data : { 
                action: 'cbtu_member_resources_load_more',
                pageNumber: mresourcesPageNumber,
                topic: $topic,
                type: $type,
                keyword: $keyword
            },
            type : 'post',
            dataType: 'json',
            success : function( posts ) {
                $('.js-member-resources-list').append(posts.content);
                if(posts.page == posts.max_page) {
                    $('.js-member-resources-load-more').hide();
                } else {
                    $('.js-member-resources-load-more').show();
                }
            }
        });
    });
    $('.js-member-resources-submit').on('click', function(e) {
        e.preventDefault();
        var $topic = $('.js-member-resources-form').find('.js-topic').val(),
        $type = $('.js-member-resources-form').find('.js-type').val(),
        $keyword = $('.js-member-resources-form').find('.js-keyword').val();
        $.ajax({
            url : wpAjax.ajaxUrl,
            data : { 
                action: 'cbtu_member_resources_load_more',
                topic: $topic,
                type: $type,
                keyword: $keyword
            },
            type : 'post',
            dataType: 'json',
            success : function( posts ) {
                console.log(posts.page + ' = ' + posts.max_page);
                $('.js-member-resources-list').html(posts.content);
                if(posts.page == posts.max_page) {
                    $('.js-member-resources-load-more').hide();
                } else {
                    $('.js-member-resources-load-more').show();
                }
            }
        });
    });

    //Letter Writing form
    if($('#single-wrapper').length > 0 && $('.letter-writing').length > 0) {
        $('.letter-writing').insertBefore('#single-wrapper');
    }

    let parallax_sections = document.querySelectorAll('.wp-block-group, .section-hero');
    for (let parallax_section of parallax_sections) {
      let instance = basicScroll.create({
        elem: parallax_section,
        from: 'top-middle',
        to: 'bottom-middle',
        direct: true,
        props: {
          '--ty': {
            from: '0',
            to: '50px',
          },
          '--scale': {
            from: '1',
            to: '1.5'
          },
          '--r': {
            from: '0',
            to: '1turn'
          },
          '--tx': {
            from: '0',
            to: '50px'
         }
        }
      })
      instance.start();
    }
} );