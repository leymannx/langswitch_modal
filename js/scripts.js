(function($, Drupal, settings) {

  "use strict";

  Drupal.behaviors.LangswitchModal = {
    attach: function(context, settings) {

      $(document).ajaxComplete(function() {
        var $link = $('a.language-link');
        $link.each(function(i, el) {
          $(el).attr('href', $(el).attr('href').split('?')[0]);
        });
      });

    }
  };
})(jQuery, Drupal, drupalSettings);
