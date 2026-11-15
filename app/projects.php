<?php
/**
 * The types of work, and every project on the site.
 *
 * To add a project, copy one block below and change its details. See README.md.
 *
 * title      The name on the poster.
 * type       One of the keys in PROJECT_TYPES.
 * tone       Colour of the poster's title band: red, blue, marigold or ink.
 * lettering  Style of the title: romance, block or slab.
 * fit        Makes a long title smaller or a short title bigger. 1 is the normal size.
 * poster     The image on the poster, from assets/img/manifest.json.
 * pos        Which part of the image stays in view when cropped: 'across down'.
 * gallery    The other images in the project.
 * video      Optional: ['youtube', 'VIDEO_ID'] or ['vimeo', 'VIDEO_ID'].
 * story      A few lines about the shoot.
 * sample     Remove from a project once it uses real work.
 */

const PROJECT_TYPES = [
    'weddings' => [
        'label' => 'Weddings & Events',
        'message' => "Hi Des Touch, I'd like to enquire about wedding or event coverage.",
    ],
    'brands' => [
        'label' => 'Brands',
        'message' => "Hi Des Touch, I'd like to enquire about a shoot for my brand.",
    ],
    'film' => [
        'label' => 'Film & Music',
        'message' => "Hi Des Touch, I'd like to enquire about a film or music video.",
    ],
    'portraits' => [
        'label' => 'Portraits & Fashion',
        'message' => "Hi Des Touch, I'd like to enquire about a portrait or fashion shoot.",
    ],
    'professionals' => [
        'label' => 'Professionals',
        'message' => "Hi Des Touch, I'd like personal coverage of my travel or speaking work.",
    ],
];

const PROJECTS = [
    'ada-and-tari' => [
        'title' => 'Ada & Tari',
        'type' => 'weddings',
        'tone' => 'red',
        'lettering' => 'romance',
        'fit' => 1.05,
        'poster' => 'sample-couple-a',
        'pos' => '50% 12%',
        'gallery' => ['sample-couple-b', 'sample-bride', 'sample-ceremony'],
        'story' => "Sample project. Teddy's words about this wedding will go here.",
        'sample' => true,
    ],
    'first-take' => [
        'title' => 'First Take',
        'type' => 'film',
        'tone' => 'ink',
        'lettering' => 'block',
        'fit' => 0.92,
        'poster' => 'sample-cam-a',
        'pos' => '46% 50%',
        'gallery' => ['sample-cam-c'],
        'story' => "Sample project. Teddy's words about this film will go here, with the film itself above.",
        'sample' => true,
    ],
    'blue-season' => [
        'title' => 'Blue Season',
        'type' => 'brands',
        'tone' => 'blue',
        'lettering' => 'slab',
        'fit' => 0.88,
        'poster' => 'sample-run-blue',
        'pos' => '50% 40%',
        'gallery' => ['sample-run-gold'],
        'story' => "Sample project. Teddy's words about this brand shoot will go here.",
        'sample' => true,
    ],
    'daughter-of-the-soil' => [
        'title' => 'Daughter of the Soil',
        'type' => 'portraits',
        'tone' => 'marigold',
        'lettering' => 'romance',
        'fit' => 0.72,
        'poster' => 'sample-portrait',
        'pos' => '50% 20%',
        'gallery' => [],
        'story' => "Sample project. Teddy's words about this portrait session will go here.",
        'sample' => true,
    ],
    'the-keynote' => [
        'title' => 'The Keynote',
        'type' => 'professionals',
        'tone' => 'blue',
        'lettering' => 'block',
        'fit' => 0.82,
        'poster' => 'sample-talk-a',
        'pos' => '42% 50%',
        'gallery' => ['sample-talk-b'],
        'story' => "Sample project. Teddy's words about covering this speaker will go here.",
        'sample' => true,
    ],
    'far-from-home' => [
        'title' => 'Far From Home',
        'type' => 'professionals',
        'tone' => 'red',
        'lettering' => 'slab',
        'fit' => 0.78,
        'poster' => 'sample-travel-a',
        'pos' => '50% 45%',
        'gallery' => ['sample-travel-b'],
        'story' => "Sample project. Teddy's words about this travel coverage will go here.",
        'sample' => true,
    ],
    'homecoming' => [
        'title' => 'Homecoming',
        'type' => 'weddings',
        'tone' => 'marigold',
        'lettering' => 'block',
        'fit' => 0.66,
        'poster' => 'sample-dance',
        'pos' => '48% 40%',
        'gallery' => [],
        'story' => "Sample project. Teddy's words about this event will go here.",
        'sample' => true,
    ],
    'the-chief' => [
        'title' => 'The Chief',
        'type' => 'portraits',
        'tone' => 'ink',
        'lettering' => 'slab',
        'fit' => 1,
        'poster' => 'sample-chief',
        'pos' => '50% 15%',
        'gallery' => [],
        'story' => "Sample project. Teddy's words about this portrait will go here.",
        'sample' => true,
    ],
    'runway-nights' => [
        'title' => 'Runway Nights',
        'type' => 'portraits',
        'tone' => 'red',
        'lettering' => 'block',
        'fit' => 0.76,
        'poster' => 'sample-run-red',
        'pos' => '50% 35%',
        'gallery' => [],
        'story' => "Sample project. Teddy's words about this fashion show will go here.",
        'sample' => true,
    ],
];

// The projects shown on the home page, in order.
const FEATURED_PROJECTS = ['ada-and-tari', 'first-take', 'blue-season', 'daughter-of-the-soil', 'the-keynote', 'far-from-home'];
