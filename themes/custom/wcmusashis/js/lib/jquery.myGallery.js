(function ($) {

  var obj = {
    init: function(self) {
      this.list = self;
      this.list.wrapp = obj.list.parent();
      this.list.item = this.list.children('li');
      this.list.item.clone = this.list.item.clone();
      this.list.item.active = this.list.opts.startActiveItem;
      this.hideItem(this.list.item, this.list.opts.speed);
      this.addHtml();
      this.list.preview = this.list.wrapp.find('.preview-wrapp');
      this.addPreviewList();
      this.list.preview.item = this.list.preview.find('li');
      this.addStyle();
      if(this.list.opts.pager) {
        this.addPager();
        this.list.pager = this.list.wrapp.find('.pager');
        this.list.pager.prev = this.list.pager.find('.prev');
        this.list.pager.next = this.list.pager.find('.next');
      }
      this.initialActiveItem();
      this.setActiveItemAuto();
      this.setActiveItem();
      this.setActiveItemNext();
      this.setActiveItemPrev();
      return this;
    },
    addHtml: function() {
      obj.list.wrap('<div class="gallery-list-wrapp"></div>');
      obj.list.wrapp.prepend('<div class="preview-wrapp"></div>');
    },
    addPreviewList: function() {
      obj.list.preview.prepend('<ul>');
      obj.list.preview.find('ul').prepend(obj.list.item.clone);
    },
    addStyle: function() {
      if(obj.list.opts.animation == 'fade') {
        obj.list.preview.item.parent().css({
          margin: 0,
          padding: 0
        });
        obj.list.preview.item.css({
          position: 'absolute',
          listStyle: 'none',
          margin: 0,
          padding: 0,
          opacity: 0
        });
      }
    },
    addPager: function() {
      obj.list.wrapp.prepend('<div class="pager"><a href="#" class="prev">prev</a><a href="#" class="next">next</a></div>');
    },
    initialActiveItem: function() {
      obj.removeAllActiveClass();
      obj.addActiveClass(obj.list.item.active);
      obj.animatePreview(obj.list.item.active, obj.list.opts.speed);
    },
    setActiveItemAuto: function() {
      obj.list.timeout = setTimeout(function(){
        if(obj.list.item.active < (obj.list.item.size() - 1)) {
          obj.list.item.active++;
        }
        else {
          obj.list.item.active = 0;
        }
        obj.removeAllActiveClass();
        obj.addActiveClass(obj.list.item.active);
        obj.animatePreview(obj.list.item.active, obj.list.opts.speed);
        obj.hideItem(obj.list.item, obj.list.opts.speed);
        obj.showItem(obj.list.item.eq(obj.list.item.active), obj.list.opts.speed);
        obj.setActiveItemAuto();
      }, obj.list.opts.autoSlide.speed);
    },
    setActiveItem: function() {
      obj.list.item.click(function(e) {
        e.preventDefault();
        if(obj.list.opts.autoSlide.state) {
          clearTimeout(obj.list.timeout);
        }
        var $this = $(this);
        obj.list.item.active = $this.index();
        obj.removeAllActiveClass();
        obj.addActiveClass(obj.list.item.active);
        obj.animatePreview(obj.list.item.active, obj.list.opts.speed);
        obj.hideItem(obj.list.item, obj.list.opts.speed);
        obj.showItem(obj.list.item.eq(obj.list.item.active), obj.list.opts.speed);
        if(obj.list.opts.autoSlide.state) {
          obj.setActiveItemAuto();
        }
      });
    },
    setActiveItemNext: function() {
      obj.list.pager.next.click(function(e) {
        e.preventDefault();
        if(obj.list.opts.autoSlide.state) {
          clearTimeout(obj.list.timeout);
        }
        if(obj.list.item.active < (obj.list.item.size() - 1)) {
          obj.list.item.active++;
        }
        else {
          obj.list.item.active = 0;
        }
        obj.removeAllActiveClass();
        obj.addActiveClass(obj.list.item.active);
        obj.animatePreview(obj.list.item.active, obj.list.opts.speed);
        obj.hideItem(obj.list.item, obj.list.opts.speed);
        obj.showItem(obj.list.item.eq(obj.list.item.active), obj.list.opts.speed);
        if(obj.list.opts.autoSlide.state) {
          obj.setActiveItemAuto();
        }
      });
    },
    setActiveItemPrev: function() {
      obj.list.pager.prev.click(function(e) {
        e.preventDefault();
        if(obj.list.opts.autoSlide.state) {
          clearTimeout(obj.list.timeout);
        }
        if(obj.list.item.active > 0) {
          obj.list.item.active--;
        }
        else {
          obj.list.item.active = obj.list.item.size() - 1;
        }
        obj.removeAllActiveClass();
        obj.addActiveClass(obj.list.item.active);
        obj.animatePreview(obj.list.item.active, obj.list.opts.speed);
        obj.hideItem(obj.list.item, obj.list.opts.speed);
        obj.showItem(obj.list.item.eq(obj.list.item.active), obj.list.opts.speed);
        if(obj.list.opts.autoSlide.state) {
          obj.setActiveItemAuto();
        }
      });
    },
    removeAllActiveClass: function() {
      obj.list.preview.item.removeClass('active');
      obj.list.item.removeClass('active');
    },
    addActiveClass: function(index) {
      obj.list.preview.item.eq(index).addClass('active');
      obj.list.item.eq(index).addClass('active');
    },
    animatePreview: function(index, speed) {
      obj.list.preview.item.not(obj.list.preview.item.eq(index)).animate({
        opacity: 0
      }, speed);
      obj.list.preview.item.eq(index).animate({
        opacity: 1
      }, speed);
    },
    hideItem: function(el, speed) {
      el.not(el.eq(obj.list.item.active)).animate({
        opacity: obj.list.opts.listItemOpacityHide
      }, speed);
    },
    showItem: function(el, speed) {
      el.animate({
        opacity: 1
      }, speed);
    }
  }

  $.fn.myGallery = function(options) {

    if(this.length < 1) {
      return false;
    }

    var self = this;
    self.opts = $.extend({
      speed: 600,
      startActiveItem: 0,
      listItemOpacityHide: 0.4,
      animation: 'fade',
      pager: true,
      autoSlide: {
        state: true,
        speed: 4000
      }
    }, options);

    obj.init(self);
  };

})(jQuery);