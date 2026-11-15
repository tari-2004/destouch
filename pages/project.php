<?php
/** @var string $slug @var array $project @var array $type */
$slugs = array_keys(PROJECTS);
$next_slug = $slugs[(array_search($slug, $slugs, true) + 1) % count($slugs)];
$next = PROJECTS[$next_slug];

// Portrait images sit in pairs, and landscape images run the full width.
$rows = [];
$pair = [];
foreach ($project['gallery'] as $key) {
    if (is_portrait($key)) {
        $pair[] = $key;
        if (count($pair) === 2) {
            $rows[] = $pair;
            $pair = [];
        }
    } else {
        $rows[] = [$key];
    }
}
if ($pair) {
    $rows[] = $pair;
}
?>
<article class="feature">
  <header class="feature__head">
    <div class="poster poster--hero tone-<?= e($project['tone']) ?>" style="view-transition-name:poster-<?= e($slug) ?>">
      <span class="poster__image">
        <?= picture($project['poster'], project_alt($project), ['sizes' => '(min-width: 900px) 42vw, 92vw', 'pos' => $project['pos'], 'eager' => true]) ?>
        <?= !empty($project['sample']) ? sample_tag() : '' ?>
      </span>
      <span class="poster__band">
        <span class="poster__title lettering-<?= e($project['lettering']) ?>" style="--fit:<?= (float) $project['fit'] ?>" aria-hidden="true"><?= e($project['title']) ?></span>
        <span class="poster__credit">Shot by Des Touch</span>
      </span>
    </div>
    <div class="feature__info">
      <a class="feature__back" href="/work?type=<?= e($project['type']) ?>#wall"><?= e($type['label']) ?></a>
      <h1 class="feature__title"><?= e($project['title']) ?></h1>
      <p class="feature__story"><?= e($project['story']) ?></p>
      <a class="button-wa" href="<?= e(whatsapp_link($type['message'])) ?>" rel="noopener">Book something like this</a>
    </div>
  </header>

  <?php if (!empty($project['video'])): ?>
    <div class="feature__film">
      <?php
      $video = $project['video'];
      $key = $project['poster'];
      $title = $project['title'];
      $pos = $project['pos'];
      include dirname(__DIR__) . '/app/partials/video.php';
      ?>
    </div>
  <?php elseif ($project['type'] === 'film' && !empty($project['sample'])): ?>
    <div class="feature__film">
      <div class="film film--empty">
        <?= picture($project['poster'], '', ['sizes' => '100vw', 'pos' => $project['pos']]) ?>
        <span class="film__play"><span class="film__lens" aria-hidden="true"></span>The film will play here</span>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="gallery">
      <?php foreach ($rows as $row): ?>
        <div class="gallery__row gallery__row--<?= count($row) ?>">
          <?php foreach ($row as $key): ?>
            <figure>
              <?= picture($key, project_alt($project), ['sizes' => count($row) === 2 ? '(min-width: 700px) 48vw, 100vw' : '100vw']) ?>
              <?= !empty($project['sample']) ? sample_tag() : '' ?>
            </figure>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <a class="next-feature" href="/work/<?= e($next_slug) ?>">
    <span class="next-feature__label">Next feature</span>
    <span class="next-feature__title lettering-<?= e($next['lettering']) ?>"><?= e($next['title']) ?></span>
  </a>
</article>
