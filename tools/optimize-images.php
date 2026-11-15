<?php
/**
 * Turns the large files in /originals into small web images in /assets/img.
 *
 *   php tools/optimize-images.php
 *
 * Each image is saved at up to three widths as WebP, and its size is recorded in
 * assets/img/manifest.json so pages can reserve space before the image loads.
 * The name of the original becomes the image's key: originals/ada-1.jpg is "ada-1".
 */

const WIDTHS = [640, 1280, 1920];
const QUALITY = 78;

$root = dirname(__DIR__);
$sources = glob("$root/originals/*.{jpg,jpeg,png,JPG,JPEG,PNG}", GLOB_BRACE) ?: [];
$manifest = [];

foreach ($sources as $source) {
    $key = strtolower(pathinfo($source, PATHINFO_FILENAME));
    $image = @imagecreatefromstring((string) file_get_contents($source));
    if (!$image) {
        echo "Skipped $key: could not read this file as an image\n";
        continue;
    }
    if (function_exists('exif_read_data') && preg_match('/\.jpe?g$/i', $source)) {
        $turns = [3 => 180, 6 => -90, 8 => 90][@exif_read_data($source)['Orientation'] ?? 1] ?? 0;
        if ($turns) {
            $image = imagerotate($image, $turns, 0);
        }
    }
    $width = imagesx($image);
    $height = imagesy($image);
    $sizes = array_values(array_filter(WIDTHS, fn ($w) => $w <= $width)) ?: [$width];

    foreach ($sizes as $w) {
        $resized = imagescale($image, $w, -1, IMG_BICUBIC);
        imagewebp($resized, "$root/assets/img/$key-$w.webp", QUALITY);
        imagedestroy($resized);
    }
    $manifest[$key] = ['w' => $width, 'h' => $height, 'sizes' => $sizes];
    imagedestroy($image);
    echo "Done $key: " . implode(', ', $sizes) . "\n";
}

ksort($manifest);
file_put_contents("$root/assets/img/manifest.json", json_encode($manifest, JSON_PRETTY_PRINT));
echo count($manifest) . " images ready\n";
