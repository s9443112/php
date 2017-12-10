/*
 Phantom by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

 skel.breakpoints({
  xlarge: '(max-width: 1680px)',
  large: '(max-width: 1280px)',
  medium: '(max-width: 980px)',
  small: '(max-width: 736px)',
  xsmall: '(max-width: 480px)'
 });

 $(function() {

  var $window = $(window),
   $body = $('body');

  // Disable animations/transitions until the page has loaded.
   $body.addClass('is-loading');

   $window.on('load', function() {
    window.setTimeout(function() {
     $body.removeClass('is-loading');
    }, 100);
   });

  // Touch?
   if (skel.vars.mobile)
    $body.addClass('is-touch');

  // Forms.
   var $form = $('form');

   // Auto-resizing textareas.
    $form.find('textarea').each(function() {

     var $this = $(this),
      $wrapper = $('<div class="textarea-wrapper"></div>'),
      $submits = $this.find('input[type="submit"]');

     $this
      .wrap($wrapper)
      .attr('rows', 1)
      .css('overflow', 'hidden')
      .css('resize', 'none')
      .on('keydown', function(event) {

       if (event.keyCode == 13
       && event.ctrlKey) {

        event.preventDefault();
        event.stopPropagation();

        $(this).blur();

       }

      })
      .on('blur focus', function() {
       $this.val($.trim($this.val()));
      })
      .on('input blur focus --init', function() {

       $wrapper
        .css('height', $this.height());

       $this
        .css('height', 'auto')
        .css('height', $this.prop('scrollHeight') + 'px');

      })
      .on('keyup', function(event) {

       if (event.keyCode == 9)
        $this
         .select();

      })
      .triggerHandler('--init');

     // Fix.
      if (skel.vars.browser == 'ie'
      || skel.vars.mobile)
       $this
        .css('max-height', '10em')
        .css('overflow-y', 'auto');

    });

   // Fix: Placeholder polyfill.
    $form.placeholder();

  // Prioritize "important" elements on medium.
   skel.on('+medium -medium', function() {
    $.prioritize(
     '.important\\28 medium\\29',
     skel.breakpoint('medium').active
    );
   });

  // Menu.
   var $menu = $('#menu');

   $menu.wrapInner('<div class="inner"></div>');

   $menu._locked = false;

   $menu._lock = function() {

    if ($menu._locked)
     return false;

    $menu._locked = true;

    window.setTimeout(function() {
     $menu._locked = false;
    }, 350);

    return true;

   };

   $menu._show = function() {

    if ($menu._lock())
     $body.addClass('is-menu-visible');

   };

   $menu._hide = function() {

    if ($menu._lock())
     $body.removeClass('is-menu-visible');

   };

   $menu._toggle = function() {

    if ($menu._lock())
     $body.toggleClass('is-menu-visible');

   };

   $menu
    .appendTo($body)
    .on('click', function(event) {
     event.stopPropagation();
    })
    .on('click', 'a', function(event) {

     var href = $(this).attr('href');

     event.preventDefault();
     event.stopPropagation();

     // Hide.
     //*********************************
      //$menu._hide();

      var s="<a class=\"close\" href='#' onclick=\"$('body').removeClass('is-menu-visible');\">Close</a><div class=\"inner\">"+
       "<h2><span> <img src=\"../../../圖檔/back.png\"   width=\"30\" height=\"30\" onclick=\"Back()\" style=\"cursor:pointer;\"/>";
       
       
      switch($(this).text()){
       case "女性穿搭":
       s+="</span> 女性穿搭</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">背心</a></li>"+
        "<li><a href=\"generic.html\">T恤</a></li>"+
        "<li><a href=\"generic.html\">帽T</a></li>"+
        "<li><a href=\"generic.html\">襯衫</a></li>"+
        "<li><a href=\"generic.html\">針織</a></li>"+
        "<li><a href=\"generic.html\">洋裝</a></li>"+
        "<li><a href=\"generic.html\">短褲</a></li>"+
        "<li><a href=\"generic.html\">長褲</a></li>"+
        "<li><a href=\"generic.html\">裙子</a></li>"+
        "<li><a href=\"generic.html\">其他</a></li>"+
       "</ul></div>";
       
       break;
       
       case "男性穿搭":
       s+="</span> 男性穿搭</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">背心</a></li>"+
        "<li><a href=\"generic.html\">襪子</a></li>"+
       "</ul></div>";
       
       break;
       case "戶外與運動用品":
       s+="</span> 戶外與運動用品</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">帳篷</a></li>"+
       "</ul></div>";
       
       break;
       case "寵物":
       s+="</span> 寵物</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">飼料</a></li>"+
       "</ul></div>";
       
       break;
       case "娛樂":
       s+="</span> 娛樂</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">專輯</a></li>"+
       "</ul></div>";
       
       break;
       case "3C":
       s+="</span> 3C</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">DVD</a></li>"+
       "</ul></div>";
       
       break;
       case "居家用品":
       s+="</span> 居家用品</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">美妝</a></li>"+
       "</ul></div>";
       
       break;
       case "美妝":
       s+="</span> 美妝</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">唇部彩妝</a></li>"+
       "</ul></div>";
       
       break;
       case "美食":
       s+="</span> 美食</h2>"+
       "<ul>"+
        "<li><a href=\"generic.html\">泡麵</a></li>"+
       "</ul></div>";
       
       break;
       
       }
      
      
      $($menu).html(s);
      
      
      
      
      
      
     //*********************************

     // Redirect.
      if (href == '#menu')
       return;

      window.setTimeout(function() {
       window.location.href = href;
      }, 350);

    })
    .append("<a class=\"close\" href=\"#\" onclick=\"$('body').removeClass('is-menu-visible');\">Close</a>");

   $body
    .on('click', 'a[href="#menu"]', function(event) {

     event.stopPropagation();
     event.preventDefault();
      Back();
     // Toggle.
      $menu._toggle();

    })
    .on('click', function(event) {

     // Hide.
      $menu._hide();

    })
    .on('keydown', function(event) {

     // Hide on escape.
      if (event.keyCode == 27)
       $menu._hide();

    });

 });

})(jQuery);


function Back(){
 var MENUTEXT="<a class=\"close\" href='#' onclick=\"$('body').removeClass('is-menu-visible');\">Close</a><div class=\"inner\"><h2>Menu</h2>"+
      "<ul>"+
       "<li><a href=\"#\">女性穿搭</a></li>"+
       "<li><a href=\"#\">男性穿搭</a></li>"+
       "<li><a href=\"#\">戶外與運動用品</a></li>"+
       "<li><a href=\"#\">寵物</a></li>"+
       "<li><a href=\"#\">娛樂</a></li>"+
       "<li><a href=\"#\">3C</a></li>"+
       "<li><a href=\"#\">居家用品</a></li>"+
       "<li><a href=\"#\">美妝</a></li>"+
       "<li><a href=\"#\">美食</a></li>"+
      "</ul></div>";
  $('#menu').html(MENUTEXT);
      
 }