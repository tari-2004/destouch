<?php /** @var string $slug @var array $project @var string $sizes @var bool $eager */ ?>
<article class="poster tone-<?= e($project['tone']) ?>" style="view-transition-name:poster-<?= e($slug) ?>">
  <a class="poster__link" href="/work/<?= e($slug) ?>">
    <span class="poster__image">
      <?= picture($project['poster'], project_alt($project), ['sizes' => $sizes, 'pos' => $project['pos'], 'eager' => $eager]) ?>
      <?= !empty($project['sample']) ? sample_tag() : '' ?>
    </span>
    <span class="poster__band">
      <span class="poster__title lettering-<?= e($project['lettering']) ?>" style="--fit:<?= (float) $project['fit'] ?>"><?= e($project['title']) ?></span>
      <span class="poster__credit">Shot by Des Touch</span>
    </span>
  </a>
</article>
