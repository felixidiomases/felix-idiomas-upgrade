(function () {
  "use strict";

  /* Menu mobile */
  var burger = document.querySelector("[data-fx-burger]");
  var mobile = document.querySelector("[data-fx-mobile-nav]");

  if (burger && mobile) {
    burger.addEventListener("click", function () {
      var open = mobile.classList.toggle("is-open");
      burger.setAttribute("aria-expanded", open ? "true" : "false");
    });

    mobile.addEventListener("click", function (e) {
      if (e.target.tagName === "A") {
        mobile.classList.remove("is-open");
        burger.setAttribute("aria-expanded", "false");
      }
    });
  }

  /* Rolagem suave com compensacao do menu fixo */
  var header = document.querySelector(".fx-header");

  document.addEventListener("click", function (e) {
    var link = e.target.closest('a[href*="#"]');
    if (!link) return;

    var url = link.getAttribute("href") || "";
    var hashIndex = url.indexOf("#");
    if (hashIndex < 0) return;

    var hash = url.slice(hashIndex);
    if (hash.length < 2) return;

    var samePage =
      url.charAt(0) === "#" ||
      url.split("#")[0] === "" ||
      url.split("#")[0] === window.location.pathname ||
      url.split("#")[0] === window.location.origin + window.location.pathname ||
      url.split("#")[0] === window.location.href.split("#")[0];

    if (!samePage) return;

    var target = document.querySelector(hash);
    if (!target) return;

    e.preventDefault();
    var offset = header ? header.offsetHeight + 12 : 0;
    var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
    var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    window.scrollTo({ top: top, behavior: reduce ? "auto" : "smooth" });
    history.replaceState(null, "", hash);
  });

  /* Carrosseis */
  document.querySelectorAll("[data-fx-carousel]").forEach(function (car) {
    var track = car.querySelector("[data-fx-track]");
    var prev = car.querySelector("[data-fx-prev]");
    var next = car.querySelector("[data-fx-next]");
    var dotsBox = car.querySelector("[data-fx-dots]");
    if (!track) return;

    var items = Array.prototype.slice.call(track.children);
    if (items.length < 2) {
      if (prev) prev.style.display = "none";
      if (next) next.style.display = "none";
      return;
    }

    var dots = [];
    if (dotsBox) {
      items.forEach(function (item, i) {
        var b = document.createElement("button");
        b.type = "button";
        b.setAttribute("aria-label", "Ir para o item " + (i + 1));
        b.addEventListener("click", function () {
          track.scrollTo({ left: item.offsetLeft - track.offsetLeft, behavior: "smooth" });
        });
        dotsBox.appendChild(b);
        dots.push(b);
      });
    }

    function step() {
      return items[0].getBoundingClientRect().width + 20;
    }

    if (prev) prev.addEventListener("click", function () {
      track.scrollBy({ left: -step(), behavior: "smooth" });
    });
    if (next) next.addEventListener("click", function () {
      track.scrollBy({ left: step(), behavior: "smooth" });
    });

    function sync() {
      var center = track.scrollLeft + track.clientWidth / 2;
      var active = 0;
      var best = Infinity;
      items.forEach(function (item, i) {
        var c = item.offsetLeft - track.offsetLeft + item.offsetWidth / 2;
        var d = Math.abs(c - center);
        if (d < best) {
          best = d;
          active = i;
        }
      });
      dots.forEach(function (d, i) {
        d.classList.toggle("is-active", i === active);
      });
      if (prev) prev.disabled = track.scrollLeft <= 2;
      if (next) next.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 2;
    }

    track.addEventListener("scroll", function () {
      window.requestAnimationFrame(sync);
    });
    window.addEventListener("resize", sync);
    sync();
  });

  /* Animacao de entrada dos blocos */
  var reveals = document.querySelectorAll(".fx-reveal");

  if (!("IntersectionObserver" in window)) {
    reveals.forEach(function (el) {
      el.classList.add("is-visible");
    });
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: "0px 0px -8% 0px" }
  );

  reveals.forEach(function (el, i) {
    el.style.transitionDelay = Math.min(i % 6, 5) * 70 + "ms";
    observer.observe(el);
  });
})();
