!function (i) {
   "use strict";

   function n(i) {
      return new RegExp("(^|\\s+)" + i + "(\\s+|$)")
   }

   function t(i, n) {
      var t = e(i, n) ? o : s;
      t(i, n)
   }
   var e, s, o;
   "classList" in document.documentElement ? (e = function (i, n) {
      return i.classList.contains(n)
   }, s = function (i, n) {
      i.classList.add(n)
   }, o = function (i, n) {
      i.classList.remove(n)
   }) : (e = function (i, t) {
      return n(t).test(i.className)
   }, s = function (i, n) {
      e(i, n) || (i.className = i.className + " " + n)
   }, o = function (i, t) {
      i.className = i.className.replace(n(t), " ")
   });
   var a = {
      hasClass: e,
      addClass: s,
      removeClass: o,
      toggleClass: t,
      has: e,
      add: s,
      remove: o,
      toggle: t
   };
   "function" == typeof define && define.amd ? define(a) : i.classie = a
}(window), !function (i) {
   "use strict";

   function n(i, n) {
      for (var t in n)
         n.hasOwnProperty(t) && (i[t] = n[t]);
      return i
   }

   function t(i, t) {
      this.el = i, this.options = n({}, this.options), n(this.options, t), this.ctrlClose = this.el.querySelector("[data-dialog-close]"), this.isOpen = !1, this._initEvents()
   }
   var e = {
      animations: Modernizr.cssanimations
   },
           s = {
              WebkitAnimation: "webkitAnimationEnd",
              OAnimation: "oAnimationEnd",
              msAnimation: "MSAnimationEnd",
              animation: "animationend"
           },
           o = s[Modernizr.prefixed("animation")],
           a = function (i, n) {
              var t = function (i) {
                 if (e.animations) {
                    if (i.target != this)
                       return;
                    this.removeEventListener(o, t)
                 }
                 n && "function" == typeof n && n.call()
              };
              e.animations ? i.addEventListener(o, t) : t()
           };
   t.prototype.options = {
      onOpenDialog: function () {
         return !1
      },
      onCloseDialog: function () {
         return !1
      }
   }, t.prototype._initEvents = function () {
      var i = this;
      this.ctrlClose.addEventListener("click", this.toggle.bind(this)), document.addEventListener("keydown", function (n) {
         var t = n.keyCode || n.which;
         27 === t && i.isOpen && i.toggle()
      }), this.el.querySelector(".dialog__overlay").addEventListener("click", this.toggle.bind(this))
   }, t.prototype.toggle = function () {
      var i = this;
      this.isOpen ? (classie.remove(this.el, "dialog--open"), classie.add(i.el, "dialog--close"), a(this.el.querySelector(".dialog__content"), function () {
         classie.remove(i.el, "dialog--close")
      }), this.options.onCloseDialog(this)) : (classie.add(this.el, "dialog--open"), this.options.onOpenDialog(this)), this.isOpen = !this.isOpen
   }, i.DialogFx = t
}(window);