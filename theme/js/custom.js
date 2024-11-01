!function (t) {
   "use strict";
   var e = function (t, e) {
      this.init("tooltip", t, e)
   };
   e.prototype = {
      constructor: e,
      init: function (e, i, o) {
         var n, s;
         this.type = e, this.$element = t(i), this.options = this.getOptions(o), this.enabled = !0, "click" == this.options.trigger ? this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this)) : "manual" != this.options.trigger && (n = "hover" == this.options.trigger ? "mouseenter" : "focus", s = "hover" == this.options.trigger ? "mouseleave" : "blur", this.$element.on(n + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(s + "." + this.type, this.options.selector, t.proxy(this.leave, this))), this.options.selector ? this._options = t.extend({}, this.options, {
            trigger: "manual",
            selector: ""
         }) : this.fixTitle()
      },
      getOptions: function (e) {
         return e = t.extend({}, t.fn[this.type].defaults, e, this.$element.data()), e.delay && "number" == typeof e.delay && (e.delay = {
            show: e.delay,
            hide: e.delay
         }), e
      },
      enter: function (e) {
         var i = t(e.currentTarget)[this.type](this._options).data(this.type);
         return i.options.delay && i.options.delay.show ? (clearTimeout(this.timeout), i.hoverState = "in", void(this.timeout = setTimeout(function () {
            "in" == i.hoverState && i.show()
         }, i.options.delay.show))) : i.show()
      },
      leave: function (e) {
         var i = t(e.currentTarget)[this.type](this._options).data(this.type);
         return this.timeout && clearTimeout(this.timeout), i.options.delay && i.options.delay.hide ? (i.hoverState = "out", void(this.timeout = setTimeout(function () {
            "out" == i.hoverState && i.hide()
         }, i.options.delay.hide))) : i.hide()
      },
      show: function () {
         var t, e, i, o, n, s, h;
         if (this.hasContent() && this.enabled) {
            switch (t = this.tip(), this.setContent(), this.options.animation && t.addClass("fade"), s = "function" == typeof this.options.placement ? this.options.placement.call(this, t[0], this.$element[0]) : this.options.placement, e = /in/.test(s), t.detach().css( {
                  top: 0,
                  left: 0,
                  display: "block"
               }).insertAfter(this.$element), i = this.getPosition(e), o = t[0].offsetWidth, n = t[0].offsetHeight, e ? s.split(" ")[1] : s) {
               case "bottom":
                  h = {
                     top: i.top + i.height,
                     left: i.left + i.width / 2 - o / 2
                  };
                  break;
               case "top":
                  h = {
                     top: i.top - n,
                     left: i.left + i.width / 2 - o / 2
                  };
                  break;
               case "left":
                  h = {
                     top: i.top + i.height / 2 - n / 2,
                     left: i.left - o
                  };
                  break;
               case "right":
                  h = {
                     top: i.top + i.height / 2 - n / 2,
                     left: i.left + i.width
                  }
            }
            t.offset(h).addClass(s).addClass("in")
         }
      },
      setContent: function () {
         var t = this.tip(),
                 e = this.getTitle();
         t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e), t.removeClass("fade in top bottom left right")
      },
      hide: function () {
         function e() {
            var e = setTimeout(function () {
               i.off(t.support.transition.end).detach()
            }, 500);
            i.one(t.support.transition.end, function () {
               clearTimeout(e), i.detach()
            })
         }
         var i = this.tip();
         return i.removeClass("in"), t.support.transition && this.$tip.hasClass("fade") ? e() : i.detach(), this
      },
      fixTitle: function () {
         var t = this.$element;
         (t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
      },
      hasContent: function () {
         return this.getTitle()
      },
      getPosition: function (e) {
         return t.extend({}, e ? {
            top: 0,
            left: 0
         } : this.$element.offset(), {
            width: this.$element[0].offsetWidth,
            height: this.$element[0].offsetHeight
         })
      },
      getTitle: function () {
         var t, e = this.$element,
                 i = this.options;
         return t = e.attr("data-original-title") || ("function" == typeof i.title ? i.title.call(e[0]) : i.title)
      },
      tip: function () {
         return this.$tip = this.$tip || t(this.options.template)
      },
      validate: function () {
         this.$element[0].parentNode || (this.hide(), this.$element = null, this.options = null)
      },
      enable: function () {
         this.enabled = !0
      },
      disable: function () {
         this.enabled = !1
      },
      toggleEnabled: function () {
         this.enabled = !this.enabled
      },
      toggle: function (e) {
         var i = t(e.currentTarget)[this.type](this._options).data(this.type);
         i[i.tip().hasClass("in") ? "hide" : "show"]()
      },
      destroy: function () {
         this.hide().$element.off("." + this.type).removeData(this.type)
      }
   };
   var i = t.fn.tooltip;
   t.fn.tooltip = function (i) {
      return this.each(function () {
         var o = t(this),
                 n = o.data("tooltip"),
                 s = "object" == typeof i && i;
         n || o.data("tooltip", n = new e(this, s)), "string" == typeof i && n[i]()
      })
   }, t.fn.tooltip.Constructor = e, t.fn.tooltip.defaults = {
      animation: !0,
      placement: "top",
      selector: !1,
      template: '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
      trigger: "hover",
      title: "",
      delay: 0,
      html: !1
   }, t.fn.tooltip.noConflict = function () {
      return t.fn.tooltip = i, this
   }
}(jQuery);