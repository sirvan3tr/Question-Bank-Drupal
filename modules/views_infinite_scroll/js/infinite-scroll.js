(function ($) {
  "use strict";

  // Cached reference to $(window).
  var $window = $(window);

  // The threshold for how far to the bottom you should reach before reloading.
  var scroll_threshold = 200;

  // The selector for the automatic pager.
  var automatic_pager_selector = '.infinite-scroll-automatic-pager';

  // The selector for the automatic pager.
  var content_wrapper_selector = '.views-infinite-scroll-content-wrapper';

  // The event and namespace that is bound to window for automatic scrolling.
  var scroll_event = 'scroll.views_infinite_scroll';

  /**
   * Insert a views infinite scroll view into the document.
   */
  $.fn.infiniteScrollInsertView = function ($new_view) {
    console.log('hello world!');
    var $existing_view = this;
    var $existing_content = $existing_view.find(content_wrapper_selector).children();
    $existing_view.css('height', $existing_view.height() + 'px');
    $new_view.find(content_wrapper_selector).prepend($existing_content);
    $existing_view.replaceWith($new_view);
    $(document).trigger('infiniteScrollComplete', [$new_view, $existing_content]);
  };

  /**
   * Handle the automatic paging based on the scroll amount.
   */
   var count = 0;
   var posArr = [];
  Drupal.behaviors.views_infinite_scroll_automatic = {
    attach : function(context, settings) {
      $(automatic_pager_selector, context).once().each(function() {
        var $pager = $(this);
        $pager.addClass('visually-hidden');

        // this is only for first element since it's loaded sraight away
        if (count==0) {
          $('.view-row-sa').attr('id', 'view-row-sa-'+count);
          var articleurl = $('.sa-articletitle').find("a").attr('href');
          history.pushState('data', '', articleurl);
          var h_t = $('#view-row-sa-0').offset().top;
          var h_h = parseFloat($('#view-row-sa-0').height());
          var obj = {id:'view-row-sa-0', h_t:h_t, h_b:h_t+h_h};
          posArr.push(obj);
        }


        $window.on(scroll_event, function() {
          // a simple calculation to check which article is most visible on
          // the screen
          // need to add error detection for probabilities of equal sized
          // elements, although rare
          // need to add sophisticated sizing due to padding and window resizing
          var s_t = $(window).scrollTop(),
              s_b = s_t + $(window).height(),
              diffArr = [],
              diffArrid = [];
              $.each( posArr, function( i, obj ) {
if (s_t < obj.h_t && s_t > obj.h_b) {
  var diff = obj.h_b - s_t;
  diffArr.push(diff);
  diffArrid.push(obj.id);
} else if(s_t < obj.h_t && s_b > obj.h_t) {
  var diff = s_b - obj.h_t;
  diffArr.push(diff);
  diffArrid.push(obj.id);
}

});

var maxPos    = Math.max.apply( null, diffArr ),
    posInArr  = diffArr.indexOf( maxPos );
// finally change the url based on the calculation above
var articleurl = $('#'+diffArrid[posInArr]).find('.sa-articletitle a').attr('href');
history.pushState('data', '', articleurl);

          if (window.innerHeight + window.pageYOffset > $pager.offset().top - scroll_threshold) {
            ++count; // for our ids
            $pager.find('[rel=next]').click();
            setTimeout(function(){ // dynamically inserted elements
  $(".view-row-sa").each(function(){
    // new dynamically inserted element will  not have an id
    // thus this allows us to add an id and manipulate it easily
    // instead of each loop catch the new html coming in
    var idattr = $(this).attr('id');
    if (!$(this).is("[id]")) {
        $(this).attr('id', 'view-row-sa-'+count);
        var articleurl = $(this).find(".sa-articletitle a").attr('href');
        history.pushState('data', '', articleurl);

        // record position of each article in an array
        // this is when we scroll up we still want the the url to change
        var h_t = $('#view-row-sa-'+count).offset().top;
        var h_h = $('#view-row-sa-'+count).height();
        var obj = {id:'view-row-sa-'+count, h_t:h_t, h_b:h_t+h_h};
        posArr.push(obj);

        // count the new page loads as page views on googel analytics
        ga('set', 'page', articleurl);
        ga('send', 'pageview');
    }
    });
}, 50);
            $window.off(scroll_event);
          }
        });
      });
    },
    detach: function (context, settings, trigger) {
      // In the case where the view is removed from the document, remove it's
      // events. This is important in the case a view being refreshed for a reason
      // other than a scroll. AJAX filters are a good example of the event needing
      // to be destroyed earlier than above.
      if ($(automatic_pager_selector, context).length != 0) {
        $window.off(scroll_event);
      }
    }
  };

})(jQuery);
