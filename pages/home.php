<!-- =========================================================
     DESTOUCH — HOME SECTIONS v4 (Tailwind) — ONE PASTE, NOTHING ELSE TO ADD

     IMAGE MAP (all from /assets/img/):
       Hero slideshow ......... hero.jpeg, hero1, hero2, hero3, hero4, hero5
       About photo ............ hero6.jpeg
       Capability 01 .......... hero7.jpeg
       Capability 02 .......... hero8.jpeg
       Capability 03 .......... hero9.jpeg
       Capability 04 .......... hero10.jpeg
       Closing section bg ..... hero11.jpeg
     To swap a picture, just change the number in its src.
     ========================================================= -->

<script>document.documentElement.classList.add('dt-js');</script>

<style>
    /* ---------- BUTTONS: fill sweep + text roll + arrow chip + shine ---------- */
    .dt-btn {
        position: relative; isolation: isolate; overflow: hidden;
        display: inline-flex; align-items: center; gap: 14px;
        height: 56px; padding: 0 8px 0 30px; border-radius: 999px;
        border: 1px solid transparent;
        font-family: 'Barlow Condensed', sans-serif; font-weight: 700;
        font-size: 18px; letter-spacing: .14em; text-transform: uppercase;
        line-height: 1; white-space: nowrap;
        transition: transform .3s ease, box-shadow .3s ease, color .4s ease;
    }
    .dt-btn:hover { transform: translateY(-2px); }
    .dt-btn--lg { height: 64px; padding-left: 36px; font-size: 20px; }

    .dt-fill {
        position: absolute; inset: 0; z-index: -1; border-radius: inherit;
        transform: translateY(101%);
        transition: transform .5s cubic-bezier(.7, 0, .2, 1);
    }
    .dt-btn:hover .dt-fill { transform: translateY(0); }

    /* label rolls up and is replaced by its twin */
    .dt-roll { display: block; height: 1.2em; line-height: 1.2em; overflow: hidden; }
    .dt-roll-in { display: flex; flex-direction: column; transition: transform .45s cubic-bezier(.7, 0, .2, 1); }
    .dt-roll-in > span { display: block; height: 1.2em; }
    .dt-btn:hover .dt-roll-in { transform: translateY(-50%); }

    /* arrow chip: arrow slides out, a new one slides in */
    .dt-chip {
        position: relative; flex: none; width: 40px; height: 40px;
        border-radius: 50%; overflow: hidden;
        transition: background-color .4s ease, color .4s ease;
    }
    .dt-btn--lg .dt-chip { width: 48px; height: 48px; }
    .dt-chip svg {
        position: absolute; inset: 0; margin: auto; width: 18px; height: 18px;
        transition: transform .45s cubic-bezier(.7, 0, .2, 1);
    }
    .dt-chip .a2 { transform: translateX(-40px); }
    .dt-btn:hover .dt-chip .a1 { transform: translateX(40px); }
    .dt-btn:hover .dt-chip .a2 { transform: translateX(0); }

    /* LIME variant */
    .dt-btn--lime { background: #d2e65a; border-color: #d2e65a; color: #0b0b0b; }
    .dt-btn--lime .dt-fill { background: #0b0b0b; }
    .dt-btn--lime .dt-chip { background: #0b0b0b; color: #d2e65a; }
    .dt-btn--lime:hover { color: #d2e65a; box-shadow: 0 10px 30px rgba(210, 230, 90, .25); }
    .dt-btn--lime:hover .dt-chip { background: #d2e65a; color: #0b0b0b; }
    /* shine streak that passes over the lime button */
    .dt-btn--lime::after {
        content: ''; position: absolute; top: 0; bottom: 0; left: -60%; width: 35%; z-index: -1;
        background: linear-gradient(100deg, transparent, rgba(255, 255, 255, .55), transparent);
        transform: skewX(-20deg); pointer-events: none;
        animation: dt-shine 4.5s ease-in-out infinite;
    }
    @keyframes dt-shine {
        0%, 55% { left: -60%; }
        100%    { left: 130%; }
    }

    /* GLASS variant */
    .dt-btn--glass {
        background: rgba(255, 255, 255, .08); border-color: rgba(255, 255, 255, .28);
        color: #fff; -webkit-backdrop-filter: blur(12px); backdrop-filter: blur(12px);
    }
    .dt-btn--glass .dt-fill { background: #d2e65a; }
    .dt-btn--glass .dt-chip { background: rgba(255, 255, 255, .16); color: #fff; }
    .dt-btn--glass:hover { color: #0b0b0b; border-color: #d2e65a; }
    .dt-btn--glass:hover .dt-chip { background: #0b0b0b; color: #d2e65a; }

    /* ---------- HERO SLIDESHOW (crossfade + slow zoom) ---------- */
    .dt-slide {
        position: absolute; inset: 0; width: 100%; height: 100%;
        object-fit: cover; opacity: 0;
        animation: dt-slide 30s linear infinite;
    }
    @keyframes dt-slide {
        0%   { opacity: 0; transform: scale(1.02); }
        3%   { opacity: 1; }
        17%  { opacity: 1; }
        20%  { opacity: 0; transform: scale(1.14); }
        100% { opacity: 0; transform: scale(1.14); }
    }

    /* ---------- LOAD + SCROLL ANIMATIONS ---------- */
    @keyframes dt-rise {
        from { opacity: 0; transform: translateY(36px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .dt-rise { opacity: 0; animation: dt-rise .9s cubic-bezier(.2, .7, .2, 1) forwards; animation-delay: var(--d, 0s); }

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

    /* ---------- STRIP + REC ---------- */
    @keyframes dt-marquee {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }
    .dt-marquee-track { display: flex; width: max-content; animation: dt-marquee 32s linear infinite; }
    .dt-marquee:hover .dt-marquee-track { animation-play-state: paused; }
    .dt-marquee-mask {
        -webkit-mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
        mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
    }
    @keyframes dt-pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%      { opacity: .35; transform: scale(.7); }
    }
    .dt-rec { animation: dt-pulse 1.6s ease-in-out infinite; }

    @media (prefers-reduced-motion: reduce) {
        .dt-marquee-track, .dt-rec, .dt-drift, .dt-btn--lime::after { animation: none; }
        .dt-rise { animation: none; opacity: 1; }
        .dt-slide { animation: none; }
        .dt-slide:first-child { opacity: 1; }
        .dt-js .dt-reveal { opacity: 1; translate: none; transition: none; }
        .dt-btn, .dt-btn:hover { transform: none; }
    }
</style>

<!-- 1. HERO -->
<section class="relative bg-[#0b0b0b] border-b border-zinc-900 overflow-hidden">
    <div class="dt-drift pointer-events-none absolute -top-40 -left-32 w-[32rem] h-[32rem] rounded-full bg-[#d2e65a]/10 blur-3xl"></div>
    <div class="dt-drift pointer-events-none absolute -bottom-40 right-0 w-[30rem] h-[30rem] rounded-full bg-[#b07a3a]/15 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">

            <!-- Copy -->
            <div class="lg:col-span-6">
                <h1 class="font-['Bowlby_One'] uppercase tracking-tight leading-[0.95] text-[length:clamp(44px,6.6vw,96px)]">
                    <span class="dt-rise block text-white" style="--d:.1s">Every frame.</span>
                    <span class="dt-rise block text-[#d2e65a]" style="--d:.3s">On purpose.</span>
                </h1>

                <p class="dt-rise mt-8 max-w-xl text-zinc-300 text-lg sm:text-xl leading-relaxed font-['Barlow']" style="--d:.55s">
                    Event coverage, photography and video production from Bayelsa, built to make people feel the moment.
                </p>

                <div class="dt-rise mt-10 flex flex-wrap gap-4" style="--d:.75s">
                    <a href="#work" class="dt-btn dt-btn--lime">
                        <span class="dt-fill" aria-hidden="true"></span>
                        <span class="dt-roll"><span class="dt-roll-in"><span>Explore Our Work</span><span aria-hidden="true">Explore Our Work</span></span></span>
                        <span class="dt-chip" aria-hidden="true">
                            <svg class="a1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            <svg class="a2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </span>
                    </a>
                    <a href="/contact" class="dt-btn dt-btn--glass">
                        <span class="dt-fill" aria-hidden="true"></span>
                        <span class="dt-roll"><span class="dt-roll-in"><span>Book a Production</span><span aria-hidden="true">Book a Production</span></span></span>
                        <span class="dt-chip" aria-hidden="true">
                            <svg class="a1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            <svg class="a2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Framed slideshow with viewfinder corners -->
            <div class="dt-rise lg:col-span-6 relative aspect-[4/5] sm:aspect-[5/4] lg:aspect-[4/5] max-h-[640px] w-full rounded-3xl overflow-hidden border border-zinc-800 bg-zinc-900" style="--d:.35s">
                <div class="absolute inset-0">
                    <img class="dt-slide" style="animation-delay:0s"  src="/assets/img/hero.jpeg"  alt="DesTouch Production">
                    <img class="dt-slide" style="animation-delay:5s"  src="/assets/img/hero10.jpeg" alt="" loading="lazy">
                    <img class="dt-slide" style="animation-delay:10s" src="/assets/img/hero2.jpeg" alt="" loading="lazy">
                    <img class="dt-slide" style="animation-delay:15s" src="/assets/img/hero3.jpeg" alt="" loading="lazy">
                    <img class="dt-slide" style="animation-delay:20s" src="/assets/img/hero4.jpeg" alt="" loading="lazy">
                    <img class="dt-slide" style="animation-delay:25s" src="/assets/img/hero5.jpeg" alt="" loading="lazy">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#0b0b0b]/70 via-transparent to-[#0b0b0b]/30"></div>

                <span class="absolute top-5 left-5 w-7 h-7 border-t-[3px] border-l-[3px] border-[#d2e65a]"></span>
                <span class="absolute top-5 right-5 w-7 h-7 border-t-[3px] border-r-[3px] border-[#d2e65a]"></span>
                <span class="absolute bottom-5 left-5 w-7 h-7 border-b-[3px] border-l-[3px] border-[#d2e65a]"></span>
                <span class="absolute bottom-5 right-5 w-7 h-7 border-b-[3px] border-r-[3px] border-[#d2e65a]"></span>

                <div class="absolute top-7 left-16 flex items-center gap-2.5 font-['Barlow_Condensed'] text-sm font-semibold uppercase tracking-[0.16em] text-white">
                    <span class="dt-rec w-2.5 h-2.5 rounded-full bg-[#c8102e]"></span>
                    Rec <span id="dt-timecode" class="text-zinc-300 tabular-nums">00:00:00</span>
                </div>

                <div class="absolute bottom-9 left-9 right-9 flex flex-wrap gap-2.5">
                    <span class="rounded-full border border-white/20 bg-white/10 backdrop-blur-md px-4 py-2 font-['Barlow_Condensed'] text-sm font-bold uppercase tracking-[0.16em] text-white">Events</span>
                    <span class="rounded-full border border-white/20 bg-white/10 backdrop-blur-md px-4 py-2 font-['Barlow_Condensed'] text-sm font-bold uppercase tracking-[0.16em] text-white">Photography</span>
                    <span class="rounded-full border border-white/20 bg-white/10 backdrop-blur-md px-4 py-2 font-['Barlow_Condensed'] text-sm font-bold uppercase tracking-[0.16em] text-white">Video</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. GLASS SCROLLING STRIP -->
<div class="dt-marquee relative overflow-hidden border-y border-white/10 bg-white/[0.04] backdrop-blur-md">
    <div class="pointer-events-none absolute inset-y-0 left-0 w-1/3 bg-gradient-to-r from-[#b07a3a]/30 via-[#b07a3a]/10 to-transparent"></div>
    <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-[#d9a566]/60 via-white/20 to-transparent"></div>

    <div class="dt-marquee-mask relative py-5">
        <div class="dt-marquee-track font-['Barlow_Condensed'] text-xl font-bold uppercase tracking-[0.18em] text-white/90">
            <div class="flex shrink-0 items-center gap-10 pr-10">
                <span>Event Coverage</span><span class="text-[#c9955a]" aria-hidden="true">◆</span>
                <span>Photography</span><span class="text-[#c9955a]" aria-hidden="true">◆</span>
                <span>Videography</span><span class="text-[#c9955a]" aria-hidden="true">◆</span>
                <span>Video Production</span><span class="text-[#c9955a]" aria-hidden="true">◆</span>
                <span>Creative Design</span><span class="text-[#c9955a]" aria-hidden="true">◆</span>
            </div>
            <div class="flex shrink-0 items-center gap-10 pr-10" aria-hidden="true">
                <span>Event Coverage</span><span class="text-[#c9955a]">◆</span>
                <span>Photography</span><span class="text-[#c9955a]">◆</span>
                <span>Videography</span><span class="text-[#c9955a]">◆</span>
                <span>Video Production</span><span class="text-[#c9955a]">◆</span>
                <span>Creative Design</span><span class="text-[#c9955a]">◆</span>
            </div>
        </div>
    </div>
</div>

<!-- 3. ABOUT -->
<section id="about" class="max-w-7xl mx-auto px-6 lg:px-12 py-24 md:py-32 bg-[#0b0b0b]">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-24 items-center">

        <div class="dt-reveal lg:col-span-5 relative">
            <div class="relative aspect-[4/5] rounded-3xl overflow-hidden border border-zinc-800 bg-zinc-900">
                <img src="/assets/img/hero6.jpeg" alt="DesTouch on a shoot" loading="lazy"
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0b0b0b]/60 via-transparent to-transparent"></div>
            </div>

            <div class="relative -mt-24 mx-4 sm:mx-8 lg:absolute lg:mt-0 lg:mx-0 lg:-right-16 lg:bottom-10 lg:w-[88%] rounded-3xl border border-white/20 bg-white/10 backdrop-blur-xl shadow-[0_8px_40px_rgba(0,0,0,0.45)] p-7 md:p-8">
                <span class="block font-['Barlow_Condensed'] text-sm font-bold uppercase tracking-[0.18em] text-[#d2e65a] mb-3">The DesTouch Standard</span>
                <h3 class="font-['Alfa_Slab_One'] text-white leading-[1.08] text-[length:clamp(26px,2.8vw,36px)] mb-4">Precision Meets Emotion</h3>
                <p class="text-zinc-100 text-base leading-relaxed font-['Barlow']">
                    Whether capturing high-profile corporate event coverage or directing full-scale commercial video productions, we approach every project with meticulous technical craft and artistic vision.
                </p>
            </div>
        </div>

        <div class="dt-reveal lg:col-span-7 lg:pl-8" style="--d:.15s">
            <span class="text-[#d2e65a] font-['Barlow_Condensed'] text-base tracking-[0.16em] uppercase mb-5 block font-bold">Who We Are</span>
            <h2 class="font-['Bowlby_One'] uppercase tracking-tight leading-[1.02] text-white text-[length:clamp(32px,4.2vw,60px)] mb-8">
                Content that leaves a lasting impact long after the lights go down.
            </h2>
            <p class="text-zinc-300 text-lg md:text-xl leading-relaxed font-['Barlow'] mb-6">
                DesTouch is a professional creative media brand dedicated to capturing moments and telling meaningful stories. Based in Bayelsa and scaling wherever production takes us, we help organizations, businesses, and individuals connect deeply with their audience.
            </p>
            <p class="text-zinc-400 text-base md:text-lg leading-relaxed font-['Barlow']">
                Our goal goes beyond basic documentation. We deliver high-quality content that communicates the true energy, value, and emotion of your events and brand campaigns.
            </p>
        </div>
    </div>
</section>

<!-- 4. CAPABILITIES -->
<section id="services" class="border-t border-zinc-900 bg-[#0b0b0b]">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-24 md:py-32">
        <div class="dt-reveal">
            <span class="text-[#d2e65a] font-['Barlow_Condensed'] text-base tracking-[0.16em] uppercase mb-5 block font-bold">What We Do</span>
            <h2 class="font-['Bowlby_One'] uppercase tracking-tight leading-none text-white text-[length:clamp(36px,5.2vw,76px)] mb-14 md:mb-16">Our Services</h2>
        </div>

        <div class="flex flex-col gap-5">

            <div class="dt-reveal">
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-800 hover:border-[#d2e65a]/60 transition-colors">
                    <img src="/assets/img/hero5.jpeg" alt="" loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#0b0b0b]/95 via-[#0b0b0b]/80 to-[#0b0b0b]/60 group-hover:via-[#0b0b0b]/70 transition-colors duration-500"></div>
                    <span class="absolute bottom-0 left-0 h-[3px] w-0 bg-[#d2e65a] transition-all duration-500 group-hover:w-full"></span>
                    <div class="relative grid grid-cols-1 md:grid-cols-12 gap-3 md:gap-8 items-baseline p-8 md:p-10">
                        <span class="md:col-span-1 text-[#d2e65a] font-['Barlow_Condensed'] text-2xl font-bold tracking-widest">01</span>
                        <h3 class="md:col-span-5 font-['Alfa_Slab_One'] text-white leading-[1.1] text-[length:clamp(28px,3.4vw,46px)]">Event Coverage</h3>
                        <p class="md:col-span-6 text-zinc-200 text-lg leading-relaxed font-['Barlow']">Comprehensive documentation of corporate events, weddings, and cultural milestones with cinematic grace.</p>
                    </div>
                </div>
            </div>

            <div class="dt-reveal" style="--d:.1s">
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-800 hover:border-[#d2e65a]/60 transition-colors">
                    <img src="/assets/img/hero8.jpeg" alt="" loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#0b0b0b]/95 via-[#0b0b0b]/80 to-[#0b0b0b]/60 group-hover:via-[#0b0b0b]/70 transition-colors duration-500"></div>
                    <span class="absolute bottom-0 left-0 h-[3px] w-0 bg-[#d2e65a] transition-all duration-500 group-hover:w-full"></span>
                    <div class="relative grid grid-cols-1 md:grid-cols-12 gap-3 md:gap-8 items-baseline p-8 md:p-10">
                        <span class="md:col-span-1 text-[#d2e65a] font-['Barlow_Condensed'] text-2xl font-bold tracking-widest">02</span>
                        <h3 class="md:col-span-5 font-['Alfa_Slab_One'] text-white leading-[1.1] text-[length:clamp(28px,3.4vw,46px)]">Photography &amp; Videography</h3>
                        <p class="md:col-span-6 text-zinc-200 text-lg leading-relaxed font-['Barlow']">High-impact commercial photography, brand assets, fashion portraits, and cinematic motion.</p>
                    </div>
                </div>
            </div>

            <div class="dt-reveal" style="--d:.2s">
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-800 hover:border-[#d2e65a]/60 transition-colors">
                    <img src="/assets/img/hero13.jpeg" alt="" loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#0b0b0b]/95 via-[#0b0b0b]/80 to-[#0b0b0b]/60 group-hover:via-[#0b0b0b]/70 transition-colors duration-500"></div>
                    <span class="absolute bottom-0 left-0 h-[3px] w-0 bg-[#d2e65a] transition-all duration-500 group-hover:w-full"></span>
                    <div class="relative grid grid-cols-1 md:grid-cols-12 gap-3 md:gap-8 items-baseline p-8 md:p-10">
                        <span class="md:col-span-1 text-[#d2e65a] font-['Barlow_Condensed'] text-2xl font-bold tracking-widest">03</span>
                        <h3 class="md:col-span-5 font-['Alfa_Slab_One'] text-white leading-[1.1] text-[length:clamp(28px,3.4vw,46px)]">Video Production</h3>
                        <p class="md:col-span-6 text-zinc-200 text-lg leading-relaxed font-['Barlow']">End-to-end video production, creative direction, music videos, and storytelling brand films.</p>
                    </div>
                </div>
            </div>

            <div class="dt-reveal" style="--d:.3s">
                <div class="group relative overflow-hidden rounded-2xl border border-zinc-800 hover:border-[#d2e65a]/60 transition-colors">
                    <img src="/assets/img/hero1.jpeg" alt="" loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#0b0b0b]/95 via-[#0b0b0b]/80 to-[#0b0b0b]/60 group-hover:via-[#0b0b0b]/70 transition-colors duration-500"></div>
                    <span class="absolute bottom-0 left-0 h-[3px] w-0 bg-[#d2e65a] transition-all duration-500 group-hover:w-full"></span>
                    <div class="relative grid grid-cols-1 md:grid-cols-12 gap-3 md:gap-8 items-baseline p-8 md:p-10">
                        <span class="md:col-span-1 text-[#d2e65a] font-['Barlow_Condensed'] text-2xl font-bold tracking-widest">04</span>
                        <h3 class="md:col-span-5 font-['Alfa_Slab_One'] text-white leading-[1.1] text-[length:clamp(28px,3.4vw,46px)]">Creative Design &amp; Visual Direction</h3>
                        <p class="md:col-span-6 text-zinc-200 text-lg leading-relaxed font-['Barlow']">Crafting cohesive visual identities, campaign concepts, and design work that ensures your message resonates clearly.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 5. WORK -->
<section id="work" class="border-t border-zinc-900 bg-[#0b0b0b]">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-24 md:py-32">

        <div class="dt-reveal flex flex-col md:flex-row md:items-end justify-between gap-5 mb-14">
            <div>
                <span class="text-[#d2e65a] font-['Barlow_Condensed'] text-base tracking-[0.16em] uppercase mb-5 block font-bold">Selected Archive</span>
                <h2 class="font-['Bowlby_One'] uppercase tracking-tight leading-none text-white text-[length:clamp(36px,5.2vw,76px)]">Now Showing</h2>
            </div>
            <p class="text-zinc-400 text-lg font-['Barlow_Condensed'] font-semibold tracking-[0.14em] uppercase">Every project gets its own poster.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="dt-reveal">
                <a href="/work" class="group relative block rounded-3xl overflow-hidden aspect-[3/4] bg-zinc-900 border border-zinc-800 hover:border-[#d2e65a] hover:-translate-y-1.5 transition duration-300">
                    <video class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                           src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6597.mp4"
                           autoplay loop muted playsinline preload="metadata"></video>
                    <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/70 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                    <div class="absolute top-6 left-6 flex items-center gap-2.5 font-['Barlow_Condensed'] text-base font-bold uppercase tracking-[0.18em] text-white">
                        <span class="dt-rec w-2.5 h-2.5 rounded-full bg-[#c8102e]"></span>Reel 01
                    </div>
                    <p class="absolute bottom-6 left-6 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold tracking-[0.18em] uppercase text-zinc-200">
                        <span class="h-px w-6 bg-[#d2e65a] group-hover:w-12 transition-all duration-300"></span>Shot by Des Touch
                    </p>
                </a>
            </div>

            <div class="dt-reveal" style="--d:.15s">
                <a href="/work" class="group relative block rounded-3xl overflow-hidden aspect-[3/4] bg-zinc-900 border border-zinc-800 hover:border-[#d2e65a] hover:-translate-y-1.5 transition duration-300">
                    <video class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                           src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_8471.mp4"
                           autoplay loop muted playsinline preload="metadata"></video>
                    <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/70 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                    <div class="absolute top-6 left-6 flex items-center gap-2.5 font-['Barlow_Condensed'] text-base font-bold uppercase tracking-[0.18em] text-white">
                        <span class="dt-rec w-2.5 h-2.5 rounded-full bg-[#c8102e]"></span>Reel 02
                    </div>
                    <p class="absolute bottom-6 left-6 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold tracking-[0.18em] uppercase text-zinc-200">
                        <span class="h-px w-6 bg-[#d2e65a] group-hover:w-12 transition-all duration-300"></span>Shot by Des Touch
                    </p>
                </a>
            </div>

            <div class="dt-reveal" style="--d:.3s">
                <a href="/work" class="group relative block rounded-3xl overflow-hidden aspect-[3/4] bg-zinc-900 border border-zinc-800 hover:border-[#d2e65a] hover:-translate-y-1.5 transition duration-300">
                    <video class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                           src="https://res.cloudinary.com/seibntlw/video/upload/f_auto,q_auto/IMG_6635.mp4"
                           autoplay loop muted playsinline preload="metadata"></video>
                    <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/70 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black/85 to-transparent"></div>
                    <div class="absolute top-6 left-6 flex items-center gap-2.5 font-['Barlow_Condensed'] text-base font-bold uppercase tracking-[0.18em] text-white">
                        <span class="dt-rec w-2.5 h-2.5 rounded-full bg-[#c8102e]"></span>Reel 03
                    </div>
                    <p class="absolute bottom-6 left-6 flex items-center gap-3 font-['Barlow_Condensed'] text-sm font-semibold tracking-[0.18em] uppercase text-zinc-200">
                        <span class="h-px w-6 bg-[#d2e65a] group-hover:w-12 transition-all duration-300"></span>Shot by Des Touch
                    </p>
                </a>
            </div>

        </div>

        <div class="dt-reveal mt-14 flex justify-center">
            <a href="/work" class="dt-btn dt-btn--lime">
                <span class="dt-fill" aria-hidden="true"></span>
                <span class="dt-roll"><span class="dt-roll-in"><span>View All Works</span><span aria-hidden="true">View All Works</span></span></span>
                <span class="dt-chip" aria-hidden="true">
                    <svg class="a1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    <svg class="a2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- 6. CLOSING CTA -->
<section class="relative overflow-hidden bg-[#0b0b0b] border-t border-zinc-900">
    <img src="/assets/img/hero8.jpeg" alt="" loading="lazy"
         class="absolute inset-0 w-full h-full object-cover object-center">
    <div class="absolute inset-0 bg-[#0b0b0b]/45"></div>

    <div class="dt-drift pointer-events-none absolute -top-24 -left-24 w-96 h-96 rounded-full bg-[#d2e65a]/25 blur-3xl"></div>
    <div class="dt-drift pointer-events-none absolute -bottom-32 -right-24 w-[28rem] h-[28rem] rounded-full bg-[#b07a3a]/30 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-12 py-24 md:py-36">
        <div class="dt-reveal max-w-4xl rounded-[32px] border border-white/20 bg-white/10 backdrop-blur-xl shadow-[0_8px_48px_rgba(0,0,0,0.45)] p-8 sm:p-12 md:p-16">
            <span class="block font-['Barlow_Condensed'] text-base font-bold uppercase tracking-[0.2em] text-[#d2e65a] mb-6">Ready When You Are</span>
            <h2 class="font-['Bowlby_One'] uppercase tracking-tight leading-[0.96] text-white text-[length:clamp(34px,5.6vw,80px)]">
                Let's make something <span class="text-[#d2e65a]">worth watching.</span>
            </h2>
            <div class="mt-10">
                <a href="/contact" class="dt-btn dt-btn--lg dt-btn--lime">
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
    /* Scroll reveal */
    (function () {
        var items = document.querySelectorAll('.dt-reveal');
        if (!('IntersectionObserver' in window)) {
            items.forEach(function (el) { el.classList.add('is-in'); });
            return;
        }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        items.forEach(function (el) { io.observe(el); });
    })();

    /* Ticking REC timecode */
    (function () {
        var el = document.getElementById('dt-timecode');
        if (!el) return;
        var s = 0;
        setInterval(function () {
            s++;
            var h = String(Math.floor(s / 3600)).padStart(2, '0');
            var m = String(Math.floor((s % 3600) / 60)).padStart(2, '0');
            var sec = String(s % 60).padStart(2, '0');
            el.textContent = h + ':' + m + ':' + sec;
        }, 1000);
    })();
</script>