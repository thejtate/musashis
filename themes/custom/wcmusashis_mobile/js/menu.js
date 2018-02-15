(function ($) {
    Drupal.behaviors.wcmusashisMobileThemeMenu = {
      attach: function (context, settings) {
        $(".menu-select-list", ".content-menu").change(function(){
            var url = $( "option:selected", this).val();
            window.location = url;
        });
      },

      completedCallback: function () {
        // Do nothing. But it's here in case other modules/themes want to override it.
      }
    }


})(jQuery);