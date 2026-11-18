<?php
require __DIR__ . '/app/config.php';
require __DIR__ . '/app/projects.php';
require __DIR__ . '/app/helpers.php';

$path = rtrim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/') ?: '/';

if ($path === '/') {
    render_page('home', [
        'page_title' => 'Des Touch | Photographer & Cinematographer in Bayelsa, Nigeria',
        'body_class' => 'page-home',
    ]);
} elseif ($path === '/work') {
    $active = $_GET['type'] ?? '';
    $active = is_string($active) && isset(PROJECT_TYPES[$active]) ? $active : '';
    render_page('work', [
        'active' => $active,
        'page_title' => ($active ? PROJECT_TYPES[$active]['label'] . ' | ' : 'Work | ') . SITE_NAME,
        'nav_current' => 'work',
        'whatsapp' => whatsapp_link($active ? PROJECT_TYPES[$active]['message'] : "Hi Des Touch, I'd like to enquire about a shoot."),
    ]);
} elseif (false && preg_match('#^/work/([a-z0-9-]+)$#', $path, $match) && isset(PROJECTS[$match[1]])) {
    // Old project pages are switched off: they used sample images that have been removed.
    // Remove "false &&" above to bring them back once they have real images.
    $project = PROJECTS[$match[1]];
    $type = PROJECT_TYPES[$project['type']];
    render_page('project', [
        'slug' => $match[1],
        'project' => $project,
        'type' => $type,
        'page_title' => $project['title'] . ' | ' . $type['label'] . ' | ' . SITE_NAME,
        'page_description' => $project['title'] . ': ' . $type['label'] . ' by Des Touch, the photography and cinematography of Teddy Sukpa.',
        'nav_current' => 'work',
        'whatsapp' => whatsapp_link($type['message']),
    ]);
} elseif ($path === '/about') {
    render_page('about', [
        'page_title' => 'About Teddy Sukpa | ' . SITE_NAME,
        'nav_current' => 'about',
    ]);
} elseif ($path === '/contact') {
    render_page('contact', [
        'page_title' => 'Book on WhatsApp | ' . SITE_NAME,
        'nav_current' => 'contact',
    ]);
} elseif ($path === '/credits' && SAMPLE_MODE) {
    render_page('credits', ['page_title' => 'Sample image credits | ' . SITE_NAME]);
} else {
    render_page('404', ['page_title' => 'Page not found | ' . SITE_NAME], 404);
}
