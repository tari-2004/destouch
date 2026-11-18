<!-- =========================================================
     DESTOUCH — WORKS PAGE v2 (Tailwind) — ONE PASTE
     Cards: video + "Shot by Des Touch" only.
     Design touches: film-strip ticker, bento layout, 3D tilt,
     cursor spotlight, viewfinder corners on hover, scroll reveals.
     ========================================================= -->

<script>document.documentElement.classList.add('dt-js');</script>

<style>
    /* ---------- load + scroll animations ---------- */
    @keyframes dt-rise {
        from { opacity: 0; transform: translateY(36px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .dt-rise { opacity: 0; animation: dt-rise .9s cubic-bezier(.2, .7, .2, 1) forwards; animation-delay: var(--d, 0s); }

    @keyframes dt-line { from { transform: scaleX(0); } to { transform: scaleX(1); } }
    .dt-line { transform-origin: left; animation: dt-line 1.4s cubic-bezier(.2, .7, .2, 1) .8s both; }

    .dt-js .dt-reveal {
        opacity: 0; translate: 0 36px;
        transition: opacity .8s ease, translate .8s cubic-bezier(.2, .7, .2, 1);
        transition-delay: var(--d, 0s);
    }
    .dt-js .dt-reveal.is-in { opacity: 1; translate: 0 0; }

    @keyframes dt-drift {
        from { transform: translate(0, 0); }
        to   { transform: translate(50px, 36px); }
    }
    .dt-drift { animation: dt-drift 12s ease-in-out infinite alternate; }

    @keyframes dt-pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%      { opacity: .35; transform: scale(.7); }
    }
    .dt-rec { animation: dt-pulse 1.6s ease-in-out infinite; }

    /* ---------- film-strip ticker ---------- */
    @keyframes dt-marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    .dt-marquee-track { display: flex; width: max-content; animation: dt-marquee 40s linear infinite; }
    .dt-marquee:hover .dt-marquee-track { animation-play-state: paused; }
    .dt-marquee-mask {
        -webkit-mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
        mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
    }
    .dt-outline { color: transparent; -webkit-text-stroke: 1.5px rgba(255, 255, 255, .4); }

    /* sprocket holes running along the top and bottom edge */
    @keyframes dt-sprocket { from { background-position-x: 0; } to { background-position-x: 36px; } }
    .dt-sprockets::before, .dt-sprockets::after {
        content: ''; position: absolute; left: 0; right: 0; height: 9px; z-index: 2; pointer-events: none;
        background: repeating-linear-gradient(90deg, rgba(255, 255, 255, .2) 0 16px, transparent 16px 36px);
        animation: dt-sprocket 3s linear infinite;
    }
    .dt-sprockets::before { top: 9px; }
    .dt-sprockets::after  { bottom: 9px; }

    /* ---------- cards: tilt, spotlight, viewfinder ---------- */
    .dt-js .dt-item {
        transform: perspective(1000px) rotateX(var(--rx, 0deg)) rotateY(var(--ry, 0deg));
        transition: opacity .8s ease, translate .8s cubic-bezier(.2, .7, .2, 1), transform .25s ease-out;
        transition-delay: var(--d, 0s), var(--d, 0s), 0s;
    }
    .dt-spot {
        background: radial-gradient(420px circle at var(--mx, 50%) var(--my, 50%), rgba(210, 230, 90, .22), transparent 60%);
    }
    .dt-vf {
        background:
            linear-gradient(#d2e65a, #d2e65a) top left / 24px 3px no-repeat,
            linear-gradient(#d2e65a, #d2e65a) top left / 3px 24px no-repeat,
            linear-gradient(#d2e65a, #d2e65a) top right / 24px 3px no-repeat,
            linear-gradient(#d2e65a, #d2e65a) top right / 3px 24px no-repeat,
            linear-gradient(#d2e65a, #d2e65a) bottom left / 24px 3px no-repeat,
            linear-gradient(#d2e65a, #d2e65a) bottom left / 3px 24px no-repeat,
            linear-gradient(#d2e65a, #d2e65a) bottom right / 24px 3px no-repeat,
            linear-gradient(#d2e65a, #d2e65a) bottom right / 3px 24px no-repeat;
    }

    /* ---------- lime button (fill sweep + text roll + arrow chip + shine) ---------- */
    .dt-btn {
        position: relative; isolation: isolate; overflow: hidden;
        display: inline-flex; align-items: center; gap: 14px;
        height: 64px; padding: 0 8px 0 36px; border-radius: 999px;
        border: 1px solid #d2e65a; background: #d2e65a; color: #0b0b0b;
        font-family: 'Barlow Condensed', sans-serif; font-weight: 700;
        font-size: 20px; letter-spacing: .14em; text-transform: uppercase;
        line-height: 1; white-space: nowrap;
        transition: transform .3s ease, box-shadow .3s ease, color .4s ease;
    }
    .dt-btn:hover { transform: translateY(-2px); color: #d2e65a; box-shadow: 0 10px 30px rgba(210, 230, 90, .25); }
    .dt-fill {
        position: absolute; inset: 0; z-index: -1; border-radius: inherit; background: #0b0b0b;
        transform: translateY(101%); transition: transform .5s cubic-bezier(.7, 0, .2, 1);
    }
    .dt-btn:hover .dt-fill { transform: translateY(0); }
    .dt-roll { display: block; height: 1.2em; line-height: 1.2em; overflow: hidden; }
    .dt-roll-in { display: flex; flex-direction: column; transition: transform .45s cubic-bezier(.7, 0, .2, 1); }
    .dt-roll-in > span { display: block; height: 1.2em; }
    .dt-btn:hover .dt-roll-in { transform: translateY(-50%); }
    .dt-chip {
        position: relative; flex: none; width: 48px; height: 48px; border-radius: 50%; overflow: hidden;
        background: #0b0b0b; color: #d2e65a; transition: background-color .4s ease, color .4s ease;
    }
    .dt-btn:hover .dt-chip { background: #d2e65a; color: #0b0b0b; }
    .dt-chip svg { position: absolute; inset: 0; margin: auto; width: 18px; height: 18px; transition: transform .45s cubic-bezier(.7, 0, .2, 1); }
    .dt-chip .a2 { transform: translateX(-48px); }
    .dt-btn:hover .dt-chip .a1 { transform: translateX(48px); }
    .dt-btn:hover .dt-chip .a2 { transform: translateX(0); }
    .dt-btn::after {
        content: ''; position: absolute; top: 0; bottom: 0; left: -60%; width: 35%; z-index: -1;
        background: linear-gradient(100deg, transparent, rgba(255, 255, 255, .55), transparent);
        transform: skewX(-20deg); pointer-events: none; animation: dt-shine 4.5s ease-in-out infinite;
    }
    @keyframes dt-shine { 0%, 55% { left: -60%; } 100% { left: 130%; } }

    /* ---------- Films / Stills toggle ---------- */
    .dt-tabs-wrap { display: none; }
    .dt-js .dt-tabs-wrap { display: flex; }
    .dt-tabs { position: relative; display: grid; grid-template-columns: 1fr 1fr; padding: 6px; border-radius: 999px; border: 1px solid rgba(255, 255, 255, .15); background: rgba(255, 255, 255, .04); }
    .dt-tabs-pill {
        position: absolute; top: 6px; bottom: 6px; left: 6px; width: calc(50% - 6px);
        border-radius: 999px; background: #d2e65a; box-shadow: 0 6px 24px rgba(210, 230, 90, .25);
        transition: transform .5s cubic-bezier(.7, 0, .2, 1);
    }
    .dt-tabs[data-active="stills"] .dt-tabs-pill { transform: translateX(100%); }
    .dt-tab {
        position: relative; z-index: 1; display: flex; align-items: center; justify-content: center; gap: 10px;
        min-width: 140px; padding: 14px 26px; border-radius: 999px; cursor: pointer;
        font-family: 'Barlow Condensed', sans-serif; font-weight: 700; font-size: 18px;
        letter-spacing: .14em; text-transform: uppercase; line-height: 1; color: #d4d4d8;
        transition: color .4s ease;
    }
    .dt-tab:hover { color: #fff; }
    .dt-tab[aria-selected="true"] { color: #0b0b0b; }
    .dt-tab:focus-visible { outline: 2px solid #d2e65a; outline-offset: 3px; }
    .dt-tab-ico { width: 18px; height: 18px; flex: none; margin-top: -2px; }

    .dt-js .dt-panel:not(.is-active) { display: none; }
    @keyframes dt-panel-in { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }
    .dt-panel.is-entering { animation: dt-panel-in .6s cubic-bezier(.2, .7, .2, 1); }

    /* masonry for photos: keeps every photo's real shape */
    .dt-masonry { column-gap: 1.5rem; }
    .dt-masonry > * { break-inside: avoid; margin-bottom: 1.5rem; }
    @media (min-width: 1024px) {
        .dt-masonry { column-gap: 2rem; }
        .dt-masonry > * { margin-bottom: 2rem; }
    }

    /* ---------- lightbox ---------- */
    .dt-lb {
        width: 100vw; height: 100vh; height: 100dvh; max-width: none; max-height: none;
        margin: 0; padding: 0; border: 0; background: transparent; color: #fff; overflow: hidden;
    }
    .dt-lb[open] { display: flex; align-items: center; justify-content: center; animation: dt-lb-in .35s ease; }
    .dt-lb::backdrop { background: rgba(8, 8, 8, .94); -webkit-backdrop-filter: blur(6px); backdrop-filter: blur(6px); }
    @keyframes dt-lb-in { from { opacity: 0; } to { opacity: 1; } }
    .dt-lb-stage { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; padding: 72px 16px; touch-action: pan-y; }
    @media (min-width: 768px) { .dt-lb-stage { padding: 72px 104px; } }
    .dt-lb-img {
        max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 14px;
        box-shadow: 0 20px 80px rgba(0, 0, 0, .6); user-select: none; -webkit-user-drag: none;
        transition: opacity .25s ease, transform .35s cubic-bezier(.2, .7, .2, 1);
    }
    .dt-lb-img.is-loading { opacity: 0; transform: scale(.98); }
    .dt-lb-btn {
        position: absolute; z-index: 2; display: flex; align-items: center; justify-content: center;
        width: 52px; height: 52px; border-radius: 50%; cursor: pointer;
        border: 1px solid rgba(255, 255, 255, .25); background: rgba(255, 255, 255, .08); color: #fff;
        -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px);
        transition: background-color .25s ease, color .25s ease, border-color .25s ease;
    }
    .dt-lb-btn:hover { background: #d2e65a; border-color: #d2e65a; color: #0b0b0b; }
    .dt-lb-btn:focus-visible { outline: 2px solid #d2e65a; outline-offset: 3px; }
    .dt-lb-btn svg { width: 20px; height: 20px; }
    .dt-lb-close { top: 16px; right: 16px; }
    .dt-lb-prev, .dt-lb-next { top: 50%; translate: 0 -50%; }
    .dt-lb-prev { left: 24px; }
    .dt-lb-next { right: 24px; }
    @media (max-width: 767px) {
        .dt-lb-prev, .dt-lb-next { top: auto; bottom: 14px; translate: none; }
        .dt-lb-prev { left: 16px; }
        .dt-lb-next { right: 16px; }
    }
    .dt-lb-count {
        position: absolute; z-index: 2; top: 30px; left: 24px; margin: 0;
        font-family: 'Barlow Condensed', sans-serif; font-weight: 600; font-size: 15px;
        letter-spacing: .2em; text-transform: uppercase; color: #a1a1aa;
    }
    .dt-lb-count b { color: #d2e65a; font-weight: 700; }
    @media (max-width: 767px) { .dt-lb-count { top: auto; bottom: 32px; left: 50%; translate: -50% 0; } }

    @media (prefers-reduced-motion: reduce) {
        .dt-rise { animation: none; opacity: 1; }
        .dt-line { animation: none; }
        .dt-drift, .dt-rec, .dt-marquee-track, .dt-btn::after, .dt-sprockets::before, .dt-sprockets::after { animation: none; }
        .dt-js .dt-reveal { opacity: 1; translate: none; transition: none; }
        .dt-js .dt-item { transform: none; }
        .dt-btn, .dt-btn:hover { transform: none; }
        .dt-tabs-pill, .dt-lb-img { transition: none; }
        .dt-panel.is-entering, .dt-lb[open] { animation: none; }
    }
</style>

<!-- 1. PAGE HEADER -->
<section class="relative overflow-hidden bg-[#0b0b0b]">
    <div class="dt-drift pointer-events-none absolute -top-40 -left-32 w-[32rem] h-[32rem] rounded-full bg-[#d2e65a]/10 blur-3xl"></div>
    <div class="dt-drift pointer-events-none absolute -bottom-48 right-0 w-[30rem] h-[30rem] rounded-full bg-[#b07a3a]/15 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12 pt-20 pb-16 md:pt-28 md:pb-20">
        <span class="dt-rise block font-['Barlow_Condensed'] text-base font-bold uppercase tracking-[0.2em] text-[#d2e65a] mb-6" style="--d:.05s">The Archive</span>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-end">
            <h1 class="lg:col-span-8 font-['Bowlby_One'] uppercase tracking-tight leading-[0.95] text-[length:clamp(44px,8vw,118px)]">
                <span class="dt-rise block text-white" style="--d:.15s">our</span>
                <span class="dt-rise block text-[#d2e65a]" style="--d:.3s">Productions.</span>
            </h1>
            <p class="dt-rise lg:col-span-4 text-zinc-300 text-lg md:text-xl leading-relaxed font-['Barlow']" style="--d:.5s">
                Browse through our catalog of event coverage, commercial photography, cinematic video production, and visual storytelling projects.
            </p>
        </div>
    </div>

    <div class="dt-line h-px bg-gradient-to-r from-[#d2e65a]/70 via-white/15 to-transparent"></div>
</section>

<!-- 2. FILM-STRIP TICKER -->
<div class="dt-marquee dt-sprockets relative overflow-hidden border-b border-white/10 bg-white/[0.03]">
    <div class="pointer-events-none absolute inset-y-0 left-0 w-1/3 bg-gradient-to-r from-[#b07a3a]/25 via-[#b07a3a]/8 to-transparent"></div>
    <div class="dt-marquee-mask relative py-14">
        <div class="dt-marquee-track items-center font-['Bowlby_One'] uppercase leading-none text-[length:clamp(40px,6vw,84px)]">
            <div class="flex shrink-0 items-center gap-10 pr-10">
                <span class="dt-outline">Shot by</span><span class="text-[#d2e65a]">Des Touch</span><span class="text-[#c9955a] text-[0.5em]" aria-hidden="true">◆</span>
                <span class="dt-outline">Shot by</span><span class="text-[#d2e65a]">Des Touch</span><span class="text-[#c9955a] text-[0.5em]" aria-hidden="true">◆</span>
                <span class="dt-outline">Shot by</span><span class="text-[#d2e65a]">Des Touch</span><span class="text-[#c9955a] text-[0.5em]" aria-hidden="true">◆</span>
            </div>
            <div class="flex shrink-0 items-center gap-10 pr-10" aria-hidden="true">
                <span class="dt-outline">Shot by</span><span class="text-[#d2e65a]">Des Touch</span><span class="text-[#c9955a] text-[0.5em]">◆</span>
                <span class="dt-outline">Shot by</span><span class="text-[#d2e65a]">Des Touch</span><span class="text-[#c9955a] text-[0.5em]">◆</span>
                <span class="dt-outline">Shot by</span><span class="text-[#d2e65a]">Des Touch</span><span class="text-[#c9955a] text-[0.5em]">◆</span>
            </div>
        </div>
    </div>
</div>

<?php
// Stills shown in the photography tab: [file, width, height]
$dt_photos = [
    ['real1.jpeg', 1060, 1372], ['real2.jpeg', 1448, 1086], ['real3.jpeg', 1448, 1086],
    ['real4.jpeg', 1328, 1042], ['real5.jpeg', 960, 1100],  ['real6.jpeg', 1448, 1086],
    ['real7.jpeg', 1086, 1313], ['real8.jpeg', 1298, 1140], ['real9.jpeg', 1448, 860],
    ['real10.jpeg', 1119, 935], ['real11.jpeg', 1706, 2560], ['real12.jpeg', 1632, 2464],
    ['real13.jpeg', 1170, 643],
];
?>
<!-- 3. WORK: Films / Stills toggle -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 pt-16 md:pt-20 pb-24 md:pb-32 bg-[#0b0b0b]">

    <div class="dt-tabs-wrap dt-reveal justify-center mb-12 md:mb-16">
        <div class="dt-tabs" role="tablist" aria-label="Show work by type" data-active="films">
            <span class="dt-tabs-pill" aria-hidden="true"></span>
            <button type="button" class="dt-tab" role="tab" id="dt-tab-films" data-tab="films" aria-controls="dt-panel-films" aria-selected="true">
                <svg class="dt-tab-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="6" width="14" height="12" rx="2"/><path d="M16 10l6-3v10l-6-3"/></svg>
                Films
            </button>
            <button type="button" class="dt-tab" role="tab" id="dt-tab-stills" data-tab="stills" aria-controls="dt-panel-stills" aria-selected="false" tabindex="-1">
                <svg class="dt-tab-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 8a2 2 0 0 1 2-2h2.5l1.5-2h6l1.5 2H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><circle cx="12" cy="13" r="3.5"/></svg>
                Stills
            </button>
        </div>
    </div>

    <!-- FILMS (bento: first video is featured) -->
    <div id="dt-panel-films" class="dt-panel is-active" role="tabpanel" aria-labelledby="dt-tab-films">
    <div id="dt-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

        <!-- 1 · IMG_6170 (featured, 2x2 on desktop) -->
        <div class="dt-reveal dt-item lg:col-span-2 lg:row-span-2" style="--d:0s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6170.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Cinematic Showcase I (opens in a new tab)"
               class="dt-card group relative block h-full aspect-[3/4] lg:aspect-auto overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6170.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 2 · IMG_3248 -->
        <div class="dt-reveal dt-item" style="--d:.1s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_3248.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Cultural Gala (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_3248.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 3 · IMG_5767 -->
        <div class="dt-reveal dt-item" style="--d:.2s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_5767.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Brand Editorial (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_5767.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 4 · IMG_6172 -->
        <div class="dt-reveal dt-item" style="--d:0s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6172.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Identity Campaign (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6172.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 5 · IMG_6597 -->
        <div class="dt-reveal dt-item" style="--d:.1s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6597.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Documentary Film (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6597.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 6 · IMG_8471 -->
        <div class="dt-reveal dt-item" style="--d:.2s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_8471.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Corporate Summit (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_8471.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 7 · IMG_6635 -->
        <div class="dt-reveal dt-item" style="--d:0s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6635.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Commercial Motion (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6635.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 8 · IMG_6570 -->
        <div class="dt-reveal dt-item" style="--d:.1s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6570.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Music Video Reel (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6570.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

        <!-- 9 · IMG_6535 -->
        <div class="dt-reveal dt-item" style="--d:.2s">
            <a href="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6535.mp4" target="_blank" rel="noopener noreferrer" aria-label="Watch Anniversary Special (opens in a new tab)"
               class="dt-card group relative block aspect-[3/4] overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                <video class="dt-vid absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6535.mp4" autoplay loop muted playsinline preload="metadata"></video>
                <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                <span class="dt-rec absolute left-7 top-7 h-2.5 w-2.5 rounded-full bg-[#c8102e]" aria-hidden="true"></span>
                <span class="absolute right-7 top-7 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span>
                <p class="absolute bottom-7 left-7 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
            </a>
        </div>

    </div>
    </div>

    <!-- STILLS (masonry, opens in lightbox) -->
    <div id="dt-panel-stills" class="dt-panel" role="tabpanel" aria-labelledby="dt-tab-stills">
        <div class="dt-masonry columns-1 sm:columns-2 lg:columns-3">
            <?php foreach ($dt_photos as $i => [$file, $w, $h]): ?>
            <div class="dt-reveal dt-item" style="--d:<?= ($i % 3) / 10 ?>s">
                <a href="/assets/img/<?= $file ?>" data-lb-index="<?= $i ?>" aria-label="View photo <?= $i + 1 ?> of <?= count($dt_photos) ?> full screen"
                   class="dt-card dt-photo group relative block overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 transition duration-300 hover:-translate-y-1.5 hover:border-[#d2e65a]">
                    <img src="/assets/img/<?= $file ?>" width="<?= $w ?>" height="<?= $h ?>" alt="Photograph by Des Touch" loading="lazy" decoding="async"
                         class="block h-auto w-full transition-transform duration-700 ease-out group-hover:scale-105">
                    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="dt-spot pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                    <div class="dt-vf pointer-events-none absolute inset-3.5 scale-105 opacity-0 transition duration-300 group-hover:scale-100 group-hover:opacity-100"></div>
                    <span class="absolute right-6 top-6 flex h-11 w-11 scale-75 items-center justify-center rounded-full border border-white/25 bg-white/10 text-white opacity-0 backdrop-blur-md transition duration-300 group-hover:scale-100 group-hover:opacity-100" aria-hidden="true"><svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg></span>
                    <p class="absolute bottom-6 left-6 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.18em] text-zinc-200"><span class="h-px w-6 bg-[#d2e65a] transition-all duration-300 group-hover:w-12"></span>Shot by Des Touch</p>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- LIGHTBOX -->
<dialog id="dt-lb" class="dt-lb" aria-label="Photo viewer">
    <div class="dt-lb-stage">
        <img class="dt-lb-img" alt="Photograph by Des Touch">
    </div>
    <p class="dt-lb-count" aria-live="polite"><b>01</b> / <?= sprintf('%02d', count($dt_photos)) ?></p>
    <button type="button" class="dt-lb-btn dt-lb-close" aria-label="Close photo viewer"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg></button>
    <button type="button" class="dt-lb-btn dt-lb-prev" aria-label="Previous photo"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 6l-6 6 6 6"/></svg></button>
    <button type="button" class="dt-lb-btn dt-lb-next" aria-label="Next photo"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
</dialog>

<!-- 4. CLOSING CTA -->
<section class="relative overflow-hidden bg-[#0b0b0b] border-t border-zinc-900">
    <img src="/assets/img/hero11.jpeg" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover object-center">
    <div class="absolute inset-0 bg-[#0b0b0b]/50"></div>
    <div class="dt-drift pointer-events-none absolute -top-24 -left-24 h-96 w-96 rounded-full bg-[#d2e65a]/25 blur-3xl"></div>
    <div class="dt-drift pointer-events-none absolute -bottom-32 -right-24 h-[28rem] w-[28rem] rounded-full bg-[#b07a3a]/30 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12 py-24 md:py-32">
        <div class="dt-reveal max-w-3xl rounded-[32px] border border-white/20 bg-white/10 p-8 shadow-[0_8px_48px_rgba(0,0,0,0.45)] backdrop-blur-xl sm:p-12">
            <h2 class="font-['Bowlby_One'] uppercase tracking-tight leading-[0.96] text-white text-[length:clamp(32px,5vw,64px)]">
                Got a story? <span class="text-[#d2e65a]">Let's shoot it.</span>
            </h2>
            <div class="mt-10">
                <a href="#contact" class="dt-btn">
                    <span class="dt-fill" aria-hidden="true"></span>
                    <span class="dt-roll"><span class="dt-roll-in"><span>Book a Production</span><span aria-hidden="true">Book a Production</span></span></span>
                    <span class="dt-chip" aria-hidden="true">
                        <svg class="a1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        <svg class="a2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Scroll reveal ---------- */
    var items = document.querySelectorAll('.dt-reveal');
    if ('IntersectionObserver' in window) {
        var rio = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { e.target.classList.add('is-in'); rio.unobserve(e.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        items.forEach(function (el) { rio.observe(el); });
    } else {
        items.forEach(function (el) { el.classList.add('is-in'); });
    }

    /* ---------- Play videos only while on screen ---------- */
    var vids = document.querySelectorAll('.dt-vid');
    if ('IntersectionObserver' in window) {
        var vio = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { var p = e.target.play(); if (p && p.catch) p.catch(function () {}); }
                else e.target.pause();
            });
        }, { threshold: 0.1 });
        vids.forEach(function (v) { vio.observe(v); });
    }

    /* ---------- Films / Stills toggle (remembered in the URL hash) ---------- */
    var tablist = document.querySelector('.dt-tabs');
    var tabs = document.querySelectorAll('.dt-tab');

    function showTab(name, opts) {
        opts = opts || {};
        if (name !== 'films' && name !== 'stills') name = 'films';
        if (tablist.getAttribute('data-active') === name && !opts.force) return;
        tablist.setAttribute('data-active', name);
        tabs.forEach(function (t) {
            var on = t.getAttribute('data-tab') === name;
            t.setAttribute('aria-selected', on ? 'true' : 'false');
            t.tabIndex = on ? 0 : -1;
            var panel = document.getElementById(t.getAttribute('aria-controls'));
            panel.classList.toggle('is-active', on);
            if (on && !opts.instant) {
                panel.classList.remove('is-entering');
                void panel.offsetWidth;
                panel.classList.add('is-entering');
            }
        });
        if (name === 'stills') {
            vids.forEach(function (v) { v.pause(); });
        }
        if (opts.updateHash) history.replaceState(null, '', '#' + name);
    }

    if (tablist) {
        tabs.forEach(function (t) {
            t.addEventListener('click', function () { showTab(t.getAttribute('data-tab'), { updateHash: true }); });
            t.addEventListener('keydown', function (e) {
                if (e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') return;
                e.preventDefault();
                var next = t.getAttribute('data-tab') === 'films' ? 'stills' : 'films';
                showTab(next, { updateHash: true });
                document.getElementById('dt-tab-' + next).focus();
            });
        });
        if (location.hash === '#stills') showTab('stills', { instant: true });
        window.addEventListener('hashchange', function () {
            if (location.hash === '#stills' || location.hash === '#films') showTab(location.hash.slice(1));
        });
    }

    /* ---------- Lightbox for stills ---------- */
    var lb = document.getElementById('dt-lb');
    var photoLinks = Array.prototype.slice.call(document.querySelectorAll('.dt-photo'));
    if (lb && typeof lb.showModal === 'function' && photoLinks.length) {
        var lbImg = lb.querySelector('.dt-lb-img');
        var lbNum = lb.querySelector('.dt-lb-count b');
        var stage = lb.querySelector('.dt-lb-stage');
        var current = 0, opener = null;
        var srcs = photoLinks.map(function (a) { return a.getAttribute('href'); });
        var pad = function (n) { return (n < 10 ? '0' : '') + n; };

        function show(i) {
            current = (i + srcs.length) % srcs.length;
            lbNum.textContent = pad(current + 1);
            lbImg.classList.add('is-loading');
            var src = srcs[current];
            var pre = new Image();
            pre.onload = pre.onerror = function () {
                if (srcs[current] !== src) return;
                lbImg.src = src;
                lbImg.classList.remove('is-loading');
            };
            pre.src = src;
            // warm up the neighbours so arrows feel instant
            [current + 1, current - 1].forEach(function (n) {
                (new Image()).src = srcs[(n + srcs.length) % srcs.length];
            });
        }

        photoLinks.forEach(function (a, i) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                opener = a;
                show(i);
                document.documentElement.style.overflow = 'hidden';
                lb.showModal();
            });
        });

        lb.querySelector('.dt-lb-close').addEventListener('click', function () { lb.close(); });
        lb.querySelector('.dt-lb-prev').addEventListener('click', function () { show(current - 1); });
        lb.querySelector('.dt-lb-next').addEventListener('click', function () { show(current + 1); });
        lb.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight') { e.preventDefault(); show(current + 1); }
            else if (e.key === 'ArrowLeft') { e.preventDefault(); show(current - 1); }
        });
        // click on the dark area around the photo closes it
        stage.addEventListener('click', function (e) { if (e.target === stage) lb.close(); });
        lb.addEventListener('close', function () {
            document.documentElement.style.overflow = '';
            if (opener) opener.focus({ preventScroll: true });
        });

        // swipe left / right on touch screens
        var sx = null, sy = null;
        stage.addEventListener('pointerdown', function (e) { sx = e.clientX; sy = e.clientY; });
        stage.addEventListener('pointerup', function (e) {
            if (sx === null) return;
            var dx = e.clientX - sx, dy = e.clientY - sy;
            sx = sy = null;
            if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) show(current + (dx < 0 ? 1 : -1));
        });
    }

    /* ---------- 3D tilt + cursor spotlight (mouse devices only) ---------- */
    if (!reduce && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        document.querySelectorAll('.dt-item').forEach(function (item) {
            var card = item.querySelector('.dt-card');
            item.addEventListener('pointermove', function (e) {
                var r = item.getBoundingClientRect();
                var px = (e.clientX - r.left) / r.width;
                var py = (e.clientY - r.top) / r.height;
                item.style.setProperty('--ry', ((px - 0.5) * 8).toFixed(2) + 'deg');
                item.style.setProperty('--rx', ((0.5 - py) * 8).toFixed(2) + 'deg');
                if (card) {
                    card.style.setProperty('--mx', (e.clientX - r.left) + 'px');
                    card.style.setProperty('--my', (e.clientY - r.top) + 'px');
                }
            });
            item.addEventListener('pointerleave', function () {
                item.style.setProperty('--rx', '0deg');
                item.style.setProperty('--ry', '0deg');
            });
        });
    }
})();
</script>