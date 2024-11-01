!function () {
   function e() {
      n(), r(), o(), a(), l(), t(k.offsetWidth, k.offsetHeight), c()
   }

   function t() {
      m.setSize(screen.availWidth, k.offsetHeight)
   }

   function n() {
      V = new FSS.WebGLRenderer, v = new FSS.CanvasRenderer, x = new FSS.SVGRenderer, i(H.renderer)
   }

   function i(e) {
      switch (m && E.removeChild(m.element), e) {
         case w:
            m = V;
            break;
         case R:
            m = v;
            break;
         case N:
            m = x
      }
      m.setSize(k.offsetWidth, k.offsetHeight), E.appendChild(m.element)
   }

   function r() {
      g = new FSS.Scene
   }

   function o() {
      g.remove(F), m.clear(), p = new FSS.Plane(y.width * m.width, y.height * m.height, y.segments, y.slices), b = new FSS.Material(y.ambient, y.diffuse), F = new FSS.Mesh(p, b), g.add(F);
      var e, t;
      for (e = p.vertices.length - 1; e >= 0; e--)
         t = p.vertices[e], t.anchor = FSS.Vector3.clone(t.position), t.step = FSS.Vector3.create(Math.randomInRange(.2, 1), Math.randomInRange(.2, 1), Math.randomInRange(.2, 1)), t.time = Math.randomInRange(0, Math.PIM2)
   }

   function a() {
      var e, t;
      for (e = g.lights.length - 1; e >= 0; e--)
         t = g.lights[e], g.remove(t);
      for (m.clear(), e = 0; e < M.count; e++)
         t = new FSS.Light(M.ambient, M.diffuse), t.ambientHex = t.ambient.format(), t.diffuseHex = t.diffuse.format(), g.add(t), t.mass = Math.randomInRange(.5, 1), t.velocity = FSS.Vector3.create(), t.acceleration = FSS.Vector3.create(), t.force = FSS.Vector3.create(), t.ring = document.createElementNS(FSS.SVGNS, "circle"), t.ring.setAttributeNS(null, "stroke", t.ambientHex), t.ring.setAttributeNS(null, "stroke-width", "0.5"), t.ring.setAttributeNS(null, "fill", "none"), t.ring.setAttributeNS(null, "r", "10"), t.core = document.createElementNS(FSS.SVGNS, "circle"), t.core.setAttributeNS(null, "fill", t.diffuseHex), t.core.setAttributeNS(null, "r", "4")
   }

   function t(e, t) {
      m.setSize(e, t), FSS.Vector3.set(A, m.halfWidth, m.halfHeight), o()
   }

   function c() {
      h = Date.now() - I, s(), S(), requestAnimationFrame(c)
   }

   function s() {
      var e, t, n, i, r, o, a, c = y.depth / 2;
      for (FSS.Vector3.copy(M.bounds, A), FSS.Vector3.multiplyScalar(M.bounds, M.xyScalar), FSS.Vector3.setZ(z, M.zOffset), M.autopilot && (e = Math.sin(M.step[0] * h * M.speed), t = Math.cos(M.step[1] * h * M.speed), FSS.Vector3.set(z, M.bounds[0] * e, M.bounds[1] * t, M.zOffset)), i = g.lights.length - 1; i >= 0; i--) {
         r = g.lights[i], FSS.Vector3.setZ(r.position, M.zOffset);
         var s = Math.clamp(FSS.Vector3.distanceSquared(r.position, z), M.minDistance, M.maxDistance),
                 S = M.gravity * r.mass / s;
         FSS.Vector3.subtractVectors(r.force, z, r.position), FSS.Vector3.normalise(r.force), FSS.Vector3.multiplyScalar(r.force, S), FSS.Vector3.set(r.acceleration), FSS.Vector3.add(r.acceleration, r.force), FSS.Vector3.add(r.velocity, r.acceleration), FSS.Vector3.multiplyScalar(r.velocity, M.dampening), FSS.Vector3.limit(r.velocity, M.minLimit, M.maxLimit), FSS.Vector3.add(r.position, r.velocity)
      }
      for (o = p.vertices.length - 1; o >= 0; o--)
         a = p.vertices[o], e = Math.sin(a.time + a.step[0] * h * y.speed), t = Math.cos(a.time + a.step[1] * h * y.speed), n = Math.sin(a.time + a.step[2] * h * y.speed), FSS.Vector3.set(a.position, y.xRange * p.segmentWidth * e, y.yRange * p.sliceHeight * t, y.zRange * c * n - c), FSS.Vector3.add(a.position, a.anchor);
      p.dirty = !0
   }

   function S() {
      if (m.render(g), M.draw) {
         var e, t, n, i;
         for (e = g.lights.length - 1; e >= 0; e--)
            switch (i = g.lights[e], t = i.position[0], n = i.position[1], H.renderer) {
               case R:
                  m.context.lineWidth = .5, m.context.beginPath(), m.context.arc(t, n, 10, 0, Math.PIM2), m.context.strokeStyle = i.ambientHex, m.context.stroke(), m.context.beginPath(), m.context.arc(t, n, 4, 0, Math.PIM2), m.context.fillStyle = i.diffuseHex, m.context.fill();
                  break;
               case N:
                  t += m.halfWidth, n = m.halfHeight - n, i.core.setAttributeNS(null, "fill", i.diffuseHex), i.core.setAttributeNS(null, "cx", t), i.core.setAttributeNS(null, "cy", n), m.element.appendChild(i.core), i.ring.setAttributeNS(null, "stroke", i.ambientHex), i.ring.setAttributeNS(null, "cx", t), i.ring.setAttributeNS(null, "cy", n), m.element.appendChild(i.ring)
            }
      }
   }

   function l() {
      window.addEventListener("resize", f), k.addEventListener("click", d), k.addEventListener("mousemove", u)
   }

   function d(e) {
      FSS.Vector3.set(z, e.x, m.height - e.y), FSS.Vector3.subtract(z, A), M.autopilot = !M.autopilot
   }

   function u(e) {
      FSS.Vector3.set(z, e.x, m.height - e.y), FSS.Vector3.subtract(z, A)
   }

   function f(e) {
      t(k.offsetWidth, k.offsetHeight), S()
   }
   var h, m, g, F, p, b, V, v, x, y = {
      width: 1.7,
      height: 1.4,
      depth: 10,
      segments: 8,
      slices: 7,
      xRange: .5,
      yRange: .2,
      zRange: 1,
      ambient: "#444444",
      diffuse: "#FFFFFF",
      speed: 4e-4
   },
           M = {
              count: 3,
              xyScalar: 1,
              zOffset: 100,
              ambient: ambient_value,
              diffuse: diffuse_value,
              speed: .001,
              gravity: 1200,
              dampening: .95,
              minLimit: 10,
              maxLimit: null,
              minDistance: 20,
              maxDistance: 400,
              autopilot: !0,
              draw: !1,
              bounds: FSS.Vector3.create(),
              step: FSS.Vector3.create(Math.randomInRange(.2, 1), Math.randomInRange(.2, 1), Math.randomInRange(.2, 1))
           },
           w = "webgl",
           R = "canvas",
           N = "svg",
           H = {
              renderer: R
           },
           I = Date.now(),
           A = FSS.Vector3.create(),
           z = FSS.Vector3.create(),
           k = document.getElementById("container"),
           E = (document.getElementById("controls"), document.getElementById("output"));
   document.getElementById("ui");
   e()
}();