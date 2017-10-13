(function($) {
"use strict";
    $('.gva-offcanvas-content ul.gva-mobile-menu > li:has(ul)').addClass("has-sub");
    $('.gva-offcanvas-content ul.gva-mobile-menu > li:has(ul) > a').after('<span class="caret"></span>');
      $( document ).on('click', '.gva-offcanvas-content ul.gva-mobile-menu > li > .caret', function(){
        var checkElement = $(this).next();
        
        $('.gva-offcanvas-content ul.gva-mobile-menu > li').removeClass('menu-active');
        $(this).closest('li').addClass('menu-active'); 
        
        if((checkElement.is('.submenu-inner')) && (checkElement.is(':visible'))) {
          $(this).closest('li').removeClass('menu-active');
          checkElement.slideUp('normal');
        }
        
        if((checkElement.is('.submenu-inner')) && (!checkElement.is(':visible'))) {
          $('.gva-offcanvas-content ul.gva-mobile-menu .submenu-inner:visible').slideUp('normal');
          checkElement.slideDown('normal');
        }
        
        if (checkElement.is('.submenu-inner')) {
          return false;
        } else {
          return true;  
        }   
      });

       $( document ).on( 'click', '.canvas-menu.gva-offcanvas > a.dropdown-toggle', function() {
        var $style = $(this).data('canvas');
        if($('.gva-offcanvas-content' + $style).hasClass('open')){
          $('.gva-offcanvas-content' + $style).removeClass('open');
          $('#gva-overlay').removeClass('open');
        }else{
          $('.gva-offcanvas-content' + $style).addClass('open');
          $('#gva-overlay').addClass('open');
        }
        
      });
      $( document ).on( 'click', '#gva-overlay', function() {
        $(this).removeClass('open');
        $('.gva-offcanvas-content').removeClass('open');
      })
      $( document ).on( 'click', '.close-canvas', function() {
        $('.gva-offcanvas-content').removeClass('open');
        $('#gva-overlay').removeClass('open');
      })
       
    //------- OWL carousle init  ---------------
    jQuery(document).ready(function(){
      function init_carousel_owl(){
      $('.init-carousel-owl').each(function(){
        var items = $(this).data('items') ? $(this).data('items') : 5;
        var items_lg = $(this).data('items_lg') ? $(this).data('items_lg') : 4;
        var items_md = $(this).data('items_md') ? $(this).data('items_md') : 3;
        var items_sm = $(this).data('items_sm') ? $(this).data('items_sm') : 2;
        var items_xs = $(this).data('items_xs') ? $(this).data('items_xs') : 1;
        var loop = $(this).data('loop') ? $(this).data('loop') : false;
        var speed = $(this).data('speed') ? $(this).data('speed') : 200;
        var auto_play = $(this).data('auto_play') ? $(this).data('auto_play') : false;
        var auto_play_speed = $(this).data('auto_play_speed') ? $(this).data('auto_play_speed') : false;
        var auto_play_timeout = $(this).data('auto_play_timeout') ? $(this).data('auto_play_timeout') : 1000;
        var auto_play_hover = $(this).data('auto_play_hover') ? $(this).data('auto_play_hover') : false;
        var navigation = $(this).data('navigation') ? $(this).data('navigation') : false;
        var rewind_nav = $(this).data('rewind_nav') ? $(this).data('rewind_nav') : false;
        var pagination = $(this).data('pagination') ? $(this).data('pagination') : false;
        var mouse_drag = $(this).data('mouse_drag') ? $(this).data('mouse_drag') : false;
        var touch_drag = $(this).data('touch_drag') ? $(this).data('touch_drag') : false;

        $(this).owlCarousel({
            nav: navigation,
            autoplay: false,
            autoplayTimeout: auto_play_timeout,
            autoplaySpeed: auto_play_speed,
            autoplayHoverPause: auto_play_hover,
            navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
            autoHeight: false,
            loop: loop, 
            dots: pagination,
            rewind: rewind_nav,
            smartSpeed: speed,
            mouseDrag: mouse_drag,
            touchDrag: touch_drag,
            responsive : {
              0 : { items: 1 },
              640 : { items : items_xs },
              768 : { items : items_sm },
              992: { items : items_md },
              1200: { items: items_lg },
              1400: { items: items }
            }
        }); 
      }); 
    }  

    init_carousel_owl(); 

    $('[data-load="ajax"] a').on('click', function(){
      var $href = $(this).attr('href');
      var self = $(this);
      var main = $($href);
      var main_products = $($href).find('.tab-content-products');
      var height = self.parents('.widget-content').find('.tab-pane.active').height();
      var $attrs =  $($href).find('.data-attrs').val();
      var data = {
         action: 'decorpi_ajax_load_product_tab',
         attrs: $attrs
      };
      if ( main.length > 0 && main.data('loaded') == false ) {
        main.data('loaded', 'true');
        var loading = $('<div class="ajax-loading"></div>');
        loading.css('height', height);
        main_products.html(loading);
     
        $.ajax({
            url: ajaxurl,
            type:'POST',
            dataType: 'html',
            data:  data
        }).done(function(reponse) {
           main_products.html( reponse );
           init_carousel_owl();
          });
          return true;
       }
    });
});
   
$(document).ready(function () {
  
  $( document ).on( 'click', '.yith-wcwl-add-button.show a', function() {
    $(this).addClass('loading');
  });

  $(document).on('click', '.gva-search > a', function(){
    $('.gva-search-content').addClass('active');
  });
  $(document).on('click', 'a.close-search', function(){
    $('.gva-search-content').removeClass('active');
  });
  
  // Masonry Blogs
  if($.fn.masonry){
    var $container = $('.post-masonry-style');
    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector : '.item-masory',
            gutterWidth: 0,
            columnWidth: 1,
        }); 
    });
  }

  //Sidebar filter for shop
    $( document ).on( 'click', 'a.btn-shop-filter', function() {
    if($(this).hasClass('active')){
      $(this).removeClass('active');
      $('.filter-sidebar-inner').removeClass('active');
      if($(this).hasClass('offcavas')){
        $('#gva-filter-overlay').removeClass('open');
      }
    }else{
      $(this).addClass('active');
      $('.filter-sidebar-inner').addClass('active');
      if($(this).hasClass('offcavas')){
        $('#gva-filter-overlay').addClass('open');
      }
    }
  });
  
  $( document ).on( 'click', '.filter-sidebar-inner .filter-close, #gva-filter-overlay', function() {
    $('a.btn-shop-filter').removeClass('active');
    $('.filter-sidebar-inner').removeClass('active');
    $('#gva-filter-overlay').removeClass('open');
  });

  //Perfect Scrollbar
  $('.gva-offcanvas-content .sidebar, .mini-cart-header .dropdown .minicart-content').perfectScrollbar();

  $('.scrollable-init').scrollable();

  //Tooltip
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  // ============================================================================
  // Scroll to top
  // ============================================================================
  function scrolltop() {
  var offset = 300;
  var duration = 500;

  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.return-top').fadeIn(duration);
    } else {
      jQuery('.return-top').fadeOut(duration);
    }
  });

  jQuery('.return-top').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  });
}

scrolltop();

  // ============================================================================
  // Fixed top Menu Bar
  // ============================================================================
  
  function init_sticky(){
    if($('.gv-sticky-mobile').length > 0){
      var sticky = new Waypoint.Sticky({
        element: $('.gv-sticky-mobile')[0],
        wrapper: '<div class="sticky-wrapper-mobile" />',
      });
    } 

    if($('.gv-sticky-menu').length > 0){
      var sticky = new Waypoint.Sticky({
        element: $('.gv-sticky-menu')[0],
        offset: 30
      });
    } 
  }

  init_sticky();
 
  var _main_sticky = $('.sticky-wrapper, .sticky-wrapper-mobile');

  if ( _main_sticky.length > 0 ){
    _main_sticky.each(function(){
      var main_sticky = $(this);
      var gva_sticky = function() {
        if ( $(document).scrollTop() > main_sticky.outerHeight()) {
          main_sticky.removeClass('sticky-is-hidden');
          main_sticky.addClass('sticky-is-show');
        } else {
          main_sticky.removeClass('sticky-is-show');
          if ($(document).scrollTop() < main_sticky.outerHeight()) {
            main_sticky.removeClass('sticky-is-hidden');
            main_sticky.removeClass('sticky-is-show');
          }
        }
      }
      gva_sticky();
      var cs = 0;
      $(window).scroll(function(event) {
          var ns = $(this).scrollTop();
          if ( ns < cs ) {
              gva_sticky();
          } else {
            if ( ns > main_sticky.outerHeight() ) {
              main_sticky.addClass('sticky-is-hidden');
              main_sticky.removeClass('sticky-is-show');
            }
          }
          cs = ns;
      });
    })  
  }
})

$(window).load(function(){
  
  $('ul[data-load*="ajax"], ul.woocommerce-tab-product-info').each(function(){
    var width = 0;
    $(this).find('li').each(function(){
      width = width + $(this).outerWidth();
    })
  });

  $('.flex-control-nav.flex-control-thumbs').owlCarousel({
    nav: true,
    navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
    margin: 10,
    dots: false,
    responsive : {
      0 : {
        items: 1,
        nav: false
      },
      640 : {
        items : 3,
        nav: false
      },
      768 : {
        items : 3,
        nav: false
      },
      992: {
        items : 4
      },
      1200: {
        items: 4
      },
      1400: {
        items: 4
      }
    }
  });
})

})(jQuery);

