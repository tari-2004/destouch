</main> <!-- End Main Content -->

<script>document.documentElement.classList.add('ft-js');</script>

<style>
    /* ---------- footer animations (prefixed ft- so they never clash with page styles) ---------- */
    .ft-js .ft-reveal {
        opacity: 0; translate: 0 32px;
        transition: opacity .8s ease, translate .8s cubic-bezier(.2, .7, .2, 1);
        transition-delay: var(--d, 0s);
    }
    .ft-js .ft-reveal.is-in { opacity: 1; translate: 0 0; }

    @keyframes ft-drift {
        from { transform: translate(0, 0); }
        to   { transform: translate(50px, 36px); }
    }
    .ft-drift { animation: ft-drift 12s ease-in-out infinite alternate; }

    /* big outlined wordmark */
    .ft-outline {
        color: transparent; -webkit-text-stroke: 1.5px rgba(255, 255, 255, .16);
        -webkit-mask-image: linear-gradient(to bottom, #000 25%, transparent 95%);
        mask-image: linear-gradient(to bottom, #000 25%, transparent 95%);
    }

    /* links: a lime line grows in on hover */
    .ft-link { display: inline-flex; align-items: center; transition: color .3s ease; }
    .ft-link::before {
        content: ''; width: 0; height: 2px; margin-right: 0; background: #d2e65a;
        transition: width .3s ease, margin .3s ease;
    }
    .ft-link:hover { color: #d2e65a; }
    .ft-link:hover::before { width: 18px; margin-right: 10px; }

    /* CTA button: fill sweep + text roll + chip + shine */
    .ft-btn {
        position: relative; isolation: isolate; overflow: hidden;
        display: inline-flex; align-items: center; gap: 14px;
        height: 64px; padding: 0 8px 0 36px; border-radius: 999px;
        border: 1px solid #d2e65a; background: #d2e65a; color: #0b0b0b;
        font-family: 'Barlow Condensed', sans-serif; font-weight: 700;
        font-size: 20px; letter-spacing: .14em; text-transform: uppercase;
        line-height: 1; white-space: nowrap;
        transition: transform .3s ease, box-shadow .3s ease, color .4s ease;
    }
    .ft-btn:hover { transform: translateY(-2px); color: #d2e65a; box-shadow: 0 10px 30px rgba(210, 230, 90, .25); }
    .ft-fill {
        position: absolute; inset: 0; z-index: -1; border-radius: inherit; background: #0b0b0b;
        transform: translateY(101%); transition: transform .5s cubic-bezier(.7, 0, .2, 1);
    }
    .ft-btn:hover .ft-fill { transform: translateY(0); }
    .ft-roll { display: block; height: 1.2em; line-height: 1.2em; overflow: hidden; }
    .ft-roll-in { display: flex; flex-direction: column; transition: transform .45s cubic-bezier(.7, 0, .2, 1); }
    .ft-roll-in > span { display: block; height: 1.2em; }
    .ft-btn:hover .ft-roll-in { transform: translateY(-50%); }
    .ft-chip {
        display: flex; align-items: center; justify-content: center; flex: none;
        width: 48px; height: 48px; border-radius: 50%;
        background: #0b0b0b; color: #d2e65a; transition: background-color .4s ease, color .4s ease;
    }
    .ft-btn:hover .ft-chip { background: #d2e65a; color: #0b0b0b; }
    .ft-btn::after {
        content: ''; position: absolute; top: 0; bottom: 0; left: -60%; width: 35%; z-index: -1;
        background: linear-gradient(100deg, transparent, rgba(255, 255, 255, .55), transparent);
        transform: skewX(-20deg); pointer-events: none; animation: ft-shine 4.5s ease-in-out infinite;
    }
    @keyframes ft-shine { 0%, 55% { left: -60%; } 100% { left: 130%; } }

    /* floating WhatsApp button: soft pulse ring */
    .ft-wa::before {
        content: ''; position: absolute; inset: 0; border-radius: 9999px;
        background: rgba(11, 122, 59, .55); z-index: -1;
        animation: ft-ring 2.6s ease-out infinite;
    }
    @keyframes ft-ring { 0% { transform: scale(1); opacity: .7; } 100% { transform: scale(1.7); opacity: 0; } }

    @media (prefers-reduced-motion: reduce) {
        .ft-js .ft-reveal { opacity: 1; translate: none; transition: none; }
        .ft-drift, .ft-btn::after, .ft-wa::before { animation: none; }
        .ft-btn, .ft-btn:hover { transform: none; }
    }
</style>

<!-- Footer Section (id="contact" is the target for every Contact / Book a Shoot link) -->
<footer id="contact" class="relative overflow-hidden bg-[#0b0b0b] border-t border-zinc-900 text-zinc-400 pt-20 md:pt-28 pb-28 md:pb-16 px-6 lg:px-12">

    <!-- soft glows -->
    <div class="ft-drift pointer-events-none absolute -top-32 -left-24 h-96 w-96 rounded-full bg-[#d2e65a]/10 blur-3xl"></div>
    <div class="ft-drift pointer-events-none absolute -bottom-40 right-0 h-[28rem] w-[28rem] rounded-full bg-[#b07a3a]/15 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto">

        <!-- Big call to action -->
        <div class="ft-reveal grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-end pb-16 md:pb-20 border-b border-zinc-900">
            <h2 class="lg:col-span-7 font-['Bowlby_One'] uppercase tracking-tight leading-[0.95] text-white text-[length:clamp(40px,7vw,104px)]">
                Let's <span class="text-[#d2e65a]">talk.</span>
            </h2>
            <div class="lg:col-span-5 flex flex-col items-start gap-8">
                <p class="text-zinc-300 text-lg leading-relaxed font-['Barlow'] max-w-md">
                    Based in Bayelsa, Nigeria. Available worldwide for high-end productions. Tell us about your event or project and we'll take it from there.
                </p>
                <a href="https://wa.me/2348144146103?text=Hello%20DesTouch,%20I%20want%20to%20book%20a%20production."
                   target="_blank" rel="noopener noreferrer" class="ft-btn">
                    <span class="ft-fill" aria-hidden="true"></span>
                    <span class="ft-roll"><span class="ft-roll-in"><span>Contact Studio</span><span aria-hidden="true">Contact Studio</span></span></span>
                    <span class="ft-chip" aria-hidden="true">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </span>
                </a>
            </div>
        </div>

        <!-- Link columns -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 py-16 md:py-20">

            <!-- Brand Info -->
            <div class="ft-reveal md:col-span-5">
                <a class="inline-block mb-6 hover:opacity-90 transition-opacity" href="/" aria-label="Des Touch, home">
                    <?= logo() ?>
                </a>
                <p class="text-zinc-400 text-sm leading-relaxed max-w-sm font-['Barlow']">
                    Creative media, event coverage, photography, videography, and visual storytelling. Preserving your milestones with a bold cinematic lens.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="ft-reveal md:col-span-3" style="--d:.1s">
                <h4 class="font-['Barlow_Condensed'] text-white text-sm uppercase tracking-widest font-bold mb-5">Navigation</h4>
                <ul class="space-y-3.5 font-['Barlow_Condensed'] text-base uppercase tracking-wider">
                    <li><a href="/" class="ft-link">Home</a></li>
                    <li><a href="/#services" class="ft-link">Services</a></li>
                    <li><a href="/work" class="ft-link">Work Archive</a></li>
                    <li><a href="/#about" class="ft-link">About Us</a></li>
                    <li><a href="https://wa.me/2348144146103?text=Hello%20DesTouch,%20I%20want%20to%20book%20a%20production." target="_blank" rel="noopener noreferrer" class="ft-link">Book a Shoot</a></li>
                </ul>
            </div>

            <!-- Connect -->
            <div class="ft-reveal md:col-span-4" style="--d:.2s">
                <h4 class="font-['Barlow_Condensed'] text-white text-sm uppercase tracking-widest font-bold mb-5">Get in Touch</h4>
                <p class="text-sm font-['Barlow'] mb-5 text-zinc-400">Reach the studio directly on WhatsApp.</p>
                <a href="https://wa.me/2348144146103?text=Hello%20DesTouch,%20I%20want%20to%20book%20a%20production."
                   target="_blank" rel="noopener noreferrer"
                   class="ft-link font-['Barlow_Condensed'] text-2xl font-bold tracking-wider text-white">+234 814 414 6103</a>

                <div class="mt-10">
                    <a href="#top" id="ft-top" class="ft-link font-['Barlow_Condensed'] text-sm uppercase tracking-widest text-zinc-500">
                        Back to top
                        <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5M6 11l6-6 6 6"/></svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- Big outlined wordmark -->
        <div class="ft-outline pointer-events-none select-none overflow-hidden whitespace-nowrap text-center font-['Bowlby_One'] uppercase leading-[0.9] text-[length:clamp(44px,13vw,190px)]" aria-hidden="true">
            DesTouch
        </div>

        <!-- Bottom Copyright & Credit -->
        <div class="mt-8 pt-8 border-t border-zinc-900 flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-10 text-xs font-['Barlow_Condensed'] tracking-widest uppercase text-zinc-500">
            <p>&copy; <?= date('Y') ?> DesTouch. All rights reserved.</p>
            <p>CREATIVITY WITH CONSEQUENCES.</p>
        </div>
    </div>
</footer>

<!-- Fixed WhatsApp Floating Button -->
<a href="https://wa.me/2348144146103?text=Hello%20DesTouch,%20I%20want%20to%20book%20a%20production."
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Chat on WhatsApp"
   class="ft-wa fixed bottom-6 right-6 z-50 bg-[#0b7a3b] hover:bg-[#096330] text-white p-4 rounded-full shadow-2xl flex items-center justify-center transition-transform hover:scale-110">
    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
    </svg>
</a>

<script>
(function () {
    /* Footer scroll reveal */
    var items = document.querySelectorAll('.ft-reveal');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        items.forEach(function (el) { io.observe(el); });
    } else {
        items.forEach(function (el) { el.classList.add('is-in'); });
    }

    /* Back to top */
    var top = document.getElementById('ft-top');
    if (top) {
        top.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
})();
</script>

</body>
</html>