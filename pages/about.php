<section class="about">
  <div class="poster poster--hero tone-ink about__poster">
    <span class="poster__image poster__image--empty">
      <?php if (SAMPLE_MODE): ?><span class="about__placeholder">Teddy's photo goes here</span><?php endif; ?>
    </span>
    <span class="poster__band">
      <span class="poster__title lettering-block" style="--fit:.72">Teddy Sukpa</span>
      <span class="poster__credit">Starring as Des Touch</span>
    </span>
  </div>
  <div class="about__text">
    <h1 class="display">The eyes behind Des Touch</h1>
    <p class="about__lead">Teddy Sukpa is a photographer and cinematographer, and Des Touch is his brand.</p>
    <p>He is based in Bayelsa, Nigeria, and travels for shoots.</p>
    <?php if (SAMPLE_MODE): ?><p class="about__note">Teddy's own story will replace this short introduction.</p><?php endif; ?>

    <h2>What he shoots</h2>
    <ul class="about__list">
      <?php foreach (PROJECT_TYPES as $key => $type): ?>
        <li><a href="/work?type=<?= e($key) ?>"><?= e($type['label']) ?></a></li>
      <?php endforeach; ?>
    </ul>
    <a class="button-wa" href="<?= e(whatsapp_link()) ?>" rel="noopener">Message Teddy on WhatsApp</a>
  </div>
</section>
