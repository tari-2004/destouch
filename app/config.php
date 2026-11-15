<?php
/**
 * Site settings. Everything Teddy may need to change lives here or in projects.php.
 */

const SITE_NAME = 'Des Touch';
const SITE_OWNER = 'Teddy Sukpa';
const SITE_DESCRIPTION = 'Des Touch is the photography and cinematography of Teddy Sukpa. Based in Bayelsa, Nigeria, and travels for shoots.';

// Full address of the live site, with no slash at the end. Fill in when the domain is chosen.
const SITE_URL = '';

// WhatsApp number in international format with digits only, e.g. 2348012345678.
// While this is empty, WhatsApp buttons open WhatsApp without a recipient.
const WHATSAPP_NUMBER = '';

// Leave a link empty to hide it. These appear on the Contact page and in the footer.
const SOCIAL_LINKS = [
    'Instagram' => '',
    'YouTube' => '',
    'TikTok' => '',
];

// Keep true while the site uses sample images. It labels them, adds the credits page
// and hides the site from search engines. Set to false once all samples are replaced.
const SAMPLE_MODE = true;

// The showreel on the home page. Add a YouTube or Vimeo video to 'video' when it is ready.
const SHOWREEL = [
    'video' => null, // e.g. ['youtube', 'VIDEO_ID'] or ['vimeo', 'VIDEO_ID']
    'frames' => [
        ['key' => 'sample-travel-a', 'pos' => '50% 40%'],
        ['key' => 'sample-couple-b', 'pos' => '50% 22%'],
        ['key' => 'sample-cam-b', 'pos' => '38% 30%'],
        ['key' => 'sample-dance', 'pos' => '50% 25%'],
    ],
];
