<?php
/* Nav items: slug => [href, label]
   Work / Services / About scroll to sections on the home page ("/#id" works from any page).
   Contact stays a normal page. */
$nav_items = [
    'home'     => ['/',          'Home'],
    'about'    => ['/#about',    'About'],
    'services' => ['/#services', 'Services'],
    'work'     => ['/work',      'Work'],
];
// On the home page, "Home" starts highlighted (scroll-spy takes over as you scroll)
if ($nav_current === '' && $body_class === 'page-home') {
    $nav_current = 'home';
}
?>
<!doctype html>
<html lang="en-NG" class="bg-[#0b0b0b] text-white scroll-smooth">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page_title) ?></title>
<meta name="description" content="<?= e($page_description) ?>">
<?php if (SAMPLE_MODE): ?>
<meta name="robots" content="noindex">
<?php endif; ?>
<meta name="theme-color" content="#0b0b0b">
<link rel="icon" href="/assets/img/logo-mark.png" type="image/png">
<link rel="preload" href="/assets/fonts/BowlbyOne-400.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/fonts/AlfaSlabOne-400.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/fonts/BarlowCondensed-700.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/fonts/Barlow-400.woff2" as="font" type="font/woff2" crossorigin>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="<?= e(asset('css/site.css')) ?>">
<script src="<?= e(asset('js/site.js')) ?>" defer></script>
<script>document.documentElement.classList.add('has-entrance-loader');</script>

<style>
    /* Smooth scroll that lands BELOW the sticky header */
    html { scroll-padding-top: 80px; }
    @media (min-width: 768px) { html { scroll-padding-top: 96px; } }
    @media (prefers-reduced-motion: reduce) { html.scroll-smooth { scroll-behavior: auto; } }

    /* Desktop link: lime dot under the active item */
    .dt-nav-link { position: relative; }
    .dt-nav-link::after {
        content: ''; position: absolute; left: 50%; bottom: -4px;
        width: 6px; height: 6px; border-radius: 50%; background: #d2e65a;
        transform: translateX(-50%) scale(0); transition: transform .25s ease;
    }
    .dt-nav-link.is-active { color: #fff; }
    .dt-nav-link.is-active::after { transform: translateX(-50%) scale(1); }

    /* Hamburger -> X */
    .dt-burger span {
        position: absolute; left: 11px; right: 11px; height: 2px;
        background: #fff; border-radius: 2px;
        transition: transform .3s ease, opacity .2s ease, top .3s ease;
    }
    .dt-burger span:nth-child(1) { top: 15px; }
    .dt-burger span:nth-child(2) { top: 21px; }
    .dt-burger span:nth-child(3) { top: 27px; }
    .dt-burger[aria-expanded="true"] span:nth-child(1) { top: 21px; transform: rotate(45deg); }
    .dt-burger[aria-expanded="true"] span:nth-child(2) { opacity: 0; }
    .dt-burger[aria-expanded="true"] span:nth-child(3) { top: 21px; transform: rotate(-45deg); }

    /* Mobile menu panel */
    #mobile-menu {
        opacity: 0; visibility: hidden; transform: translateY(-8px);
        transition: opacity .3s ease, transform .3s ease, visibility .3s;
    }
    #mobile-menu.is-open { opacity: 1; visibility: visible; transform: none; }
    .dt-mlink.is-active { color: #fff; }
    .dt-mlink.is-active .dt-mdot { opacity: 1; }
</style>
</head>
<body class="<?= e($body_class) ?> bg-[#0b0b0b] text-white font-['Barlow'] antialiased selection:bg-[#d2e65a] selection:text-black">

<div class="entrance-loader" data-entrance-loader aria-hidden="true">
  <div class="entrance-loader__content">
    <span class="entrance-loader__eyebrow">DES TOUCH <span aria-hidden="true">/</span> VISUAL STORYTELLING</span>
    <div class="entrance-loader__mark"><?= logo() ?></div>
    <p class="entrance-loader__caption">Every frame tells a story.</p>
    <div class="entrance-loader__track"><span></span></div>
  </div>
</div>

<a class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:p-4 focus:bg-[#d2e65a] focus:text-black rounded-full" href="#main">Skip to content</a>

<!-- Navbar -->
<header class="sticky top-0 z-50 bg-[#0b0b0b]/85 backdrop-blur-md border-b border-zinc-900">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 h-20 md:h-24 flex items-center justify-between">

    <!-- Brand Logo -->
    <a class="site-head__logo flex items-center hover:opacity-90 transition-opacity" href="/" aria-label="Des Touch, home">
      <?= logo() ?>
    </a>

    <!-- Desktop navigation -->
    <nav class="hidden md:flex items-center gap-10" aria-label="Main">
      <div class="flex items-center gap-8 text-sm font-['Barlow_Condensed'] uppercase tracking-widest text-zinc-400">
        <?php foreach ($nav_items as $slug_nav => [$href, $label]): ?>
          <a href="<?= $href ?>" data-spy="<?= $slug_nav ?>" class="dt-nav-link py-2 transition hover:text-white font-bold<?= $nav_current === $slug_nav ? ' is-active' : '' ?>"<?= $nav_current === $slug_nav ? ' aria-current="page"' : '' ?>>
            <?= $label ?>
          </a>
        <?php endforeach; ?>
      </div>

      <a href="#contact" class="inline-flex items-center bg-[#d2e65a] hover:bg-[#b8cc4d] text-black px-5 py-2.5 rounded-full font-['Barlow_Condensed'] text-xs uppercase tracking-widest font-bold transition">
        Book a Shoot
      </a>
    </nav>

    <!-- Hamburger (mobile) -->
    <button id="nav-toggle" type="button"
            class="dt-burger md:hidden relative w-11 h-11 rounded-full border border-zinc-800 hover:border-zinc-600 transition"
            aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
      <span></span><span></span><span></span>
    </button>
  </div>

  <!-- Mobile menu panel -->
  <nav id="mobile-menu" class="md:hidden absolute top-full inset-x-0 bg-[#0b0b0b] border-b border-zinc-800 shadow-[0_24px_48px_rgba(0,0,0,0.6)]" aria-label="Mobile">
    <div class="px-6 pt-2 pb-8">
      <?php foreach ($nav_items as $slug_nav => [$href, $label]): ?>
        <a href="<?= $href ?>" data-spy="<?= $slug_nav ?>" class="dt-mlink flex items-center justify-between py-5 border-b border-zinc-800/80 font-['Barlow_Condensed'] text-3xl font-bold uppercase tracking-widest text-zinc-300 hover:text-white transition<?= $nav_current === $slug_nav ? ' is-active' : '' ?>"<?= $nav_current === $slug_nav ? ' aria-current="page"' : '' ?>>
          <span><?= $label ?></span>
          <span class="dt-mdot w-2.5 h-2.5 rounded-full bg-[#d2e65a] opacity-0 transition-opacity" aria-hidden="true"></span>
        </a>
      <?php endforeach; ?>

      <a href="#contact" class="mt-8 flex items-center justify-center w-full h-14 bg-[#d2e65a] hover:bg-[#b8cc4d] text-black rounded-full font-['Barlow_Condensed'] text-lg uppercase tracking-[0.14em] font-bold transition">
        Book a Shoot
      </a>
    </div>
  </nav>
</header>

<script>
(function () {
    /* ---------- Mobile menu ---------- */
    var btn  = document.getElementById('nav-toggle');
    var menu = document.getElementById('mobile-menu');

    function setOpen(open) {
        menu.classList.toggle('is-open', open);
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        btn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    }

    if (btn && menu) {
        btn.addEventListener('click', function () {
            setOpen(btn.getAttribute('aria-expanded') !== 'true');
        });
        menu.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () { setOpen(false); });
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
        document.addEventListener('click', function (e) {
            if (!menu.contains(e.target) && !btn.contains(e.target)) setOpen(false);
        });
        window.matchMedia('(min-width: 768px)').addEventListener('change', function (e) {
            if (e.matches) setOpen(false);
        });
    }

    /* ---------- Logo: smooth back to top when already on home ---------- */
    document.querySelectorAll('.site-head__logo, [data-spy="home"]').forEach(function (logo) {
        logo.addEventListener('click', function (e) {
            if (location.pathname === '/') {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    });

    /* ---------- Scroll-spy: highlight the section you're in (home page) ---------- */
    var ids   = ['home', 'about', 'services', 'work'];
    var secs  = ids.map(function (id) { return document.getElementById(id); }).filter(Boolean);
    var links = document.querySelectorAll('[data-spy]');

    function setActive(id) {
        links.forEach(function (l) {
            if (ids.indexOf(l.dataset.spy) > -1) l.classList.toggle('is-active', l.dataset.spy === id);
        });
    }

    if (secs.length && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) { if (en.isIntersecting) setActive(en.target.id); });
        }, { rootMargin: '-45% 0px -50% 0px' });
        secs.forEach(function (s) { io.observe(s); });

        // back up in the hero, "Home" is the active one
        var firstTop = Math.min.apply(null, secs.map(function (s) { return s.offsetTop; }));
        window.addEventListener('scroll', function () {
            if (window.scrollY + 200 < firstTop) setActive('home');
        }, { passive: true });
    }
})();
</script>

<main id="main">