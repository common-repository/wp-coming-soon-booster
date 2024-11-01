jQuery(window).load(function () {
   "use strict";
   setTimeout(function () {
      jQuery('#preloader').velocity({
         opacity: "0",
         complete: function () {
            jQuery("#loading").velocity("fadeOut", {
               duration: 1000,
               easing: [0.7, 0, 0.3, 1],
            });
         }
      })
   }, 1000);
   setTimeout(function () {
      jQuery('.global-overlay').velocity({
         translateX: "100%",
         opacity: "1",
      }, {
         duration: 1000,
         easing: [0.7, 0, 0.3, 1],
      })
   }, 1000);
   setTimeout(function () {
      jQuery('#left-side').velocity({
         opacity: "1",
         complete: function () {
            setTimeout(function () {
               jQuery('.text-intro').each(function (i) {
                  (function (self) {
                     setTimeout(function () {
                        jQuery(self).addClass('animated-middle fadeInUp').removeClass('opacity-0');
                     }, (i * 150) + 150);
                  })(this);
               });
            }, 0);
         }
      }, {
         duration: 1000,
         easing: [0.7, 0, 0.3, 1],
      })
   }, 1600);
})
jQuery(document).ready(function () {
   "use strict";
   jQuery('a#open-more-info').on("click", function () {
      jQuery(".overlay").toggleClass("skew-part");
      jQuery("#right-side").toggleClass("hide-right");
      jQuery("#close-more-info").toggleClass("hide-close");
      jQuery('.mCSB_scrollTools').toggleClass('mCSB_scrollTools-left');
      setTimeout(function () {
         jQuery("#mcs_container").mCustomScrollbar("scrollTo", "#right-side", {
            scrollInertia: 500,
            callbacks: false
         });
      }, 350);
   });
   jQuery('button#close-more-info').on("click", function () {
      jQuery(".overlay").addClass("skew-part");
      jQuery("#right-side").addClass("hide-right");
      jQuery("#close-more-info").addClass("hide-close");
      jQuery('.mCSB_scrollTools').removeClass('mCSB_scrollTools-left');
      setTimeout(function () {
         jQuery("#mcs_container").mCustomScrollbar("scrollTo", "#right-side", {
            scrollInertia: 500,
            callbacks: false
         });
      }, 350);
   });
   jQuery('.expand-player').on("click", function () {
      jQuery('#left-side').velocity({
         opacity: "0",
         complete: function () {
            jQuery('.global-overlay').velocity({
               translateX: "-100%",
               opacity: "0",
            }, {
               duration: 1000,
               easing: [0.7, 0, 0.3, 1],
               delay: 500,
            })
         }
      })
   });
   jQuery('.compress-player').on("click", function () {
      jQuery('.global-overlay').velocity({
         translateX: "100%",
         opacity: "1",
      }, {
         duration: 1000,
         easing: [0.7, 0, 0.3, 1],
         delay: 0,
         complete: function () {
            jQuery('#left-side').velocity({
               opacity: "1",
            })
         }
      })
   });
   jQuery(function () {
      jQuery('body').bind('mousewheel', function (event) {
         event.preventDefault();
         var scrollTop = this.scrollTop;
         this.scrollTop = (scrollTop + ((event.deltaY * event.deltaFactor) * -1));
      });
   });
   var ifTouchDevices = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/);

   function scrollbar() {
      if (ifTouchDevices) {
         jQuery('body').addClass('scroll-touch');
         jQuery('a#open-more-info').on("click", function () {
            event.preventDefault();
            var target = "#" + this.getAttribute('data-target');
            jQuery('body').animate({
               scrollTop: jQuery(target).offset().top
            }, 500);
         });
      } else {
         jQuery('body').mCustomScrollbar({
            scrollInertia: 150,
            axis: "y"
         });
      }
   }
   scrollbar();
   if (window.matchMedia("(min-width: 1025px)").matches) {
      jQuery(function () {
         jQuery("[data-toggle='tooltip']").tooltip();
      });
   }
   !function (s) {
      s.fn.notifyMe = function (a) {}
   }(jQuery);
   jQuery("#notifyMe").notifyMe();
   (function () {
      var dlgtrigger = document.querySelector('[data-dialog]'),
              somedialog = document.getElementById(dlgtrigger.getAttribute('data-dialog')),
              dlg = new DialogFx(somedialog);
      dlgtrigger.addEventListener('click', dlg.toggle.bind(dlg));
   })();
});