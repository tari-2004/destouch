<section class="contact">
  <h1 class="display">Let's make your feature.</h1>
  <p class="contact__lead">Pick what you're planning and WhatsApp opens with your message started. Based in Bayelsa, travels for shoots.</p>
  <ul class="contact__list">
    <?php foreach (PROJECT_TYPES as $type): ?>
      <li><a href="<?= e(whatsapp_link($type['message'])) ?>" rel="noopener"><?= e($type['label']) ?></a></li>
    <?php endforeach; ?>
  </ul>
  <a class="button-wa" href="<?= e(whatsapp_link()) ?>" rel="noopener">Something else? Just say hello</a>
  <?php if (social_links()): ?>
    <ul class="contact__socials">
      <?php foreach (social_links() as $name => $link): ?>
        <li><a href="<?= e($link) ?>" rel="noopener"><?= e($name) ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>
