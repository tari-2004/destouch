<?php
$credits = json_decode((string) file_get_contents(dirname(__DIR__) . '/app/sample-credits.json'), true) ?: [];
?>
<section class="credits">
  <h1 class="display">Sample image credits</h1>
  <p>These openly licensed photos from Wikimedia Commons are stand-ins while the site is being built. They are not the work of Des Touch, and the project names shown with them are made up. They will all be replaced by Teddy's own work.</p>
  <ul class="credits__list">
    <?php foreach ($credits as $credit): ?>
      <li>
        <a href="<?= e($credit['source']) ?>" rel="noopener"><?= e($credit['title']) ?></a>
        <span>by <?= e($credit['artist']) ?>, <?= e($credit['license']) ?></span>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
