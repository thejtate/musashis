(function ($) {

  if (typeof Drupal != 'undefined') {
    Drupal.behaviors.wcportalTheme = {
      attach: function (context, settings) {
        init(settings);
      },

      completedCallback: function () {
        // Do nothing. But it's here in case other modules/themes want to override it.
      }
    }

    init_on_load();
  }


  $(function () {
    if (typeof Drupal == 'undefined') {
      init();
      init_on_load();
    }
  });


  function init_on_load() {
    $(window).load(function () {
      init_gallery();
      init_slider();
    });
  }


  function init(settings) {
    init_select();
    initPopup(settings);
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

  function init_slider() {
    $('.b-slider .slides-wrapper').flexslider({
      animation: "slide",
      slideshow: false,
      pauseOnHover: true,
      animationDuration: 1000,
      start: function (slider) {
        var wEl = 27;
        var w = slider.controlNav.size() * wEl;
        $('.b-slider').find('.flex-direction-nav').width(w).show();
      }
    });
  }

  function init_gallery() {
    $('.b-gallery .gallery-list').myGallery({});
  }

  function init_select() {
    $('.form-select').combobox({
      hoverEnabled: true,
      listMaxHeight: 200,
      forceScroll: true,
      height: 35,
      width: 65
    });
  };

})(jQuery);

