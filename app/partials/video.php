<?php
/** @var array $video ['youtube'|'vimeo', id] @var string $key @var string $title @var string $pos */
[$host, $id] = $video;
$watch = $host === 'youtube' ? "https://www.youtube.com/watch?v=$id" : "https://vimeo.com/$id";
$embed = $host === 'youtube'
    ? "https://www.youtube-nocookie.com/embed/$id?autoplay=1&rel=0"
    : "https://player.vimeo.com/video/$id?autoplay=1";
?>
<a class="film" href="<?= e($watch) ?>" rel="noopener" data-embed="<?= e($embed) ?>" data-title="<?= e($title) ?>">
  <?= picture($key, 'Still from ' . $title, ['sizes' => '100vw', 'pos' => $pos]) ?>
  <span class="film__play"><span class="film__lens" aria-hidden="true"></span>Play the film</span>
</a>
