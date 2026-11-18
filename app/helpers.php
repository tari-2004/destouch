<?php

function e(?string $text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function asset(string $path): string
{
    $file = dirname(__DIR__) . '/assets/' . $path;
    $version = is_file($file) ? '?v=' . filemtime($file) : '';
    return '/assets/' . $path . $version;
}

function whatsapp_link(string $message = "Hi Des Touch, I'd like to enquire about a shoot."): string
{
    return 'https://wa.me/' . WHATSAPP_NUMBER . '?text=' . rawurlencode($message);
}

function image_info(string $key): ?array
{
    static $manifest = null;
    if ($manifest === null) {
        $file = dirname(__DIR__) . '/assets/img/manifest.json';
        $manifest = is_file($file) ? json_decode((string) file_get_contents($file), true) : [];
    }
    return $manifest[$key] ?? null;
}

function is_portrait(string $key): bool
{
    $info = image_info($key);
    return $info !== null && $info['h'] > $info['w'];
}

/**
 * Prints a responsive image. Options: sizes, pos, eager, class.
 */
function picture(string $key, string $alt, array $options = []): string
{
    $info = image_info($key);
    if ($info === null) {
        return '';
    }
    $srcset = implode(', ', array_map(
        fn ($w) => "/assets/img/$key-$w.webp {$w}w",
        $info['sizes']
    ));
    $fallback = $info['sizes'][min(1, count($info['sizes']) - 1)];
    $attributes = [
        'src' => "/assets/img/$key-$fallback.webp",
        'srcset' => $srcset,
        'sizes' => $options['sizes'] ?? '100vw',
        'width' => $info['w'],
        'height' => $info['h'],
        'alt' => $alt,
        'decoding' => 'async',
        'loading' => empty($options['eager']) ? 'lazy' : 'eager',
    ];
    if (!empty($options['eager'])) {
        $attributes['fetchpriority'] = 'high';
    }
    if (!empty($options['class'])) {
        $attributes['class'] = $options['class'];
    }
    if (!empty($options['pos'])) {
        $attributes['style'] = 'object-position:' . $options['pos'];
    }
    $html = '<img';
    foreach ($attributes as $name => $value) {
        $html .= ' ' . $name . '="' . e((string) $value) . '"';
    }
    return $html . '>';
}

function logo(string $class = ''): string
{
    $file = dirname(__DIR__) . '/assets/img/logo.svg';
    if (is_file($file)) {
        $svg = (string) file_get_contents($file);
        return $class === '' ? $svg : str_replace('<svg ', '<svg class="' . e($class) . '" ', $svg);
    }

    $brand_class = trim('brand-logo ' . $class);
    return '<span class="' . e($brand_class) . '"><img src="/images/logo-mark.png" width="577" height="391" alt=""></span>';
}

function project_alt(array $project): string
{
    return PROJECT_TYPES[$project['type']]['label'] . ' photograph from ' . $project['title'];
}

function sample_tag(): string
{
    return SAMPLE_MODE ? '<span class="sample-tag">Sample image</span>' : '';
}

function social_links(): array
{
    return array_filter(SOCIAL_LINKS);
}

function render_poster(string $slug, array $project, string $sizes, bool $eager = false): void
{
    include __DIR__ . '/partials/poster.php';
}

function render_page(string $page, array $data = [], int $status = 200): void
{
    http_response_code($status);
    extract($data);
    $page_title = $page_title ?? SITE_NAME;
    $page_description = $page_description ?? SITE_DESCRIPTION;
    $whatsapp = $whatsapp ?? whatsapp_link();
    $body_class = $body_class ?? '';
    $nav_current = $nav_current ?? '';
    include __DIR__ . '/partials/header.php';
    include dirname(__DIR__) . '/pages/' . $page . '.php';
    include __DIR__ . '/partials/footer.php';
}
