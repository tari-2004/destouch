// Showreel frames on the home page.
(function () {
  var loader = document.querySelector('[data-entrance-loader]');
  if (!loader) return;

  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  window.setTimeout(function () {
    loader.classList.add('is-leaving');
    window.setTimeout(function () {
      loader.hidden = true;
      document.documentElement.classList.remove('has-entrance-loader');
    }, reducedMotion ? 0 : 400);
  }, reducedMotion ? 0 : 2100);
})();

(function () {
  var reel = document.querySelector('[data-reel]');
  if (!reel) return;

  var frames = reel.querySelectorAll('.reel__frame');
  var toggle = reel.querySelector('[data-reel-toggle]');
  var still = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (frames.length < 2 || still) return;

  var current = 0;
  var timer = null;

  function advance() {
    frames[current].classList.remove('is-on');
    current = (current + 1) % frames.length;
    frames[current].classList.add('is-on');
  }

  function play() {
    timer = window.setInterval(advance, 4800);
    toggle.textContent = 'Pause';
    reel.classList.remove('is-paused');
  }

  function pause() {
    window.clearInterval(timer);
    timer = null;
    toggle.textContent = 'Play';
    reel.classList.add('is-paused');
  }

  toggle.hidden = false;
  toggle.addEventListener('click', function () {
    if (timer) {
      pause();
    } else {
      play();
    }
  });
  play();
})();

// Films load only when someone presses play, which keeps project pages fast.
document.addEventListener('click', function (event) {
  var link = event.target.closest('[data-embed]');
  if (!link) return;
  event.preventDefault();

  var frame = document.createElement('iframe');
  frame.src = link.dataset.embed;
  frame.title = link.dataset.title;
  frame.allow = 'autoplay; fullscreen; picture-in-picture';
  frame.allowFullscreen = true;
  frame.className = 'film__frame';
  link.replaceWith(frame);
  frame.focus();
});
