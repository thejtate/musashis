(function ($) {

  if (typeof Drupal != 'undefined') {
    Drupal.behaviors.wcmusashisMobileTheme = {
      attach: function (context, settings) {
        init(settings);
      },

      completedCallback: function () {
        // Do nothing. But it's here in case other modules/themes want to override it.
      }
    }
  }

  $(function () {
    if (typeof Drupal == 'undefined') {
      init();
    }
  });

  function init(settings) {
    initCombobox();
    init_gallery();
    initPopup(settings);
    $('.btn-dd').once('btn-dd', function(){
      $(this).dropDown();
    });
  }

  function initPopup(settings) {
    var $wrapper = $('.b-popup'),
      $close = $wrapper.find('.close'),
      timer = ((typeof settings !== 'undefined') && (typeof settings.wcmusashis_popup !== 'undefined') &&
      (typeof settings.wcmusashis_popup.timer !== 'undefined')) ?
        parseInt(settings.wcmusashis_popup.timer) : 5;

    timer = timer * 1000;

    $close.on('click touch', function (e) {
      e.preventDefault();

      $wrapper.removeClass('active');
    });

    setTimeout(function(){ $wrapper.removeClass('active');}, timer);
  }

  function init_gallery() {
    $('.b-gallery .gallery-list').myGallery();
  }

  $.fn.dropDown = function() {
    return this.each(function() {
      var $btn = $(this),
        $wrapper = $btn.parents('.wrapper-drop-down'),
        $boxDD = $wrapper.find('.box-drop-down'),
        flag = 0;

      $btn.on('click', function(e) {
        e.preventDefault();
        if(flag == 0) {
          flag = 1;
          if($wrapper.hasClass('collapsed')) {
            $boxDD.slideDown('normal', function() {
              flag = 0;
              $wrapper.removeClass('collapsed');
            });
          } else {
            $boxDD.slideUp('normal', function() {
              flag = 0;
              $wrapper.addClass('collapsed');
            });
          }
        }
      });

      $(document).on('click', function(e) {
        if($(e.target).closest($wrapper).length) return;
        $boxDD.slideUp('normal');
        $wrapper.addClass('collapsed');
        e.stopPropagation();
      });
    });
  }

  function initCombobox() {
    $('.form-select').combobox({
      btnWidth: 0,
      height: 39,
      hoverEnabled: true,
      listMaxHeight: 264,
      forceScroll: true,
      width: 145
    });
  }

})(jQuery);