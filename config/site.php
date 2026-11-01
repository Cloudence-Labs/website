<?php

/*
|--------------------------------------------------------------------------
| Site content
|--------------------------------------------------------------------------
| Shared across every page. Change a detail once here and it updates in the
| header, footer, contact section and WhatsApp links everywhere.
*/

/*
| Service lines. Drives the Services dropdown, the footer column and the
| homepage grid — add or reorder here and every surface follows.
*/
$products = require __DIR__ . '/products.php';

$services = [
    ['slug' => 'enterprise-software',    'icon' => 'terminal',           'short' => 'Enterprise software',    'label' => 'Enterprise software development', 'blurb' => 'Custom platforms for institutions', 'description' => 'Custom platforms for institutions that have outgrown off-the-shelf software — payments, records, billing, reporting, and integration with what you already run.', 'meta_description' => 'Custom enterprise platforms for Nigerian institutions that have outgrown off-the-shelf software: payments, records, billing, reporting and integration.'],
    ['slug' => 'web-development',        'icon' => 'language',           'short' => 'Web development',        'label' => 'Web development',                 'blurb' => 'Sites, portals and web apps', 'description' => 'Corporate sites, portals and web applications, built to be fast, accessible and maintainable by your own team.', 'meta_description' => 'Cloudence builds corporate websites, portals and web applications in Nigeria that are fast, accessible and maintainable by your own team.'],
    ['slug' => 'mobile-development',     'icon' => 'smartphone',         'short' => 'Mobile development',     'label' => 'Mobile development',              'blurb' => 'Android and iOS applications', 'description' => 'Android and iOS applications for customers and field staff, released and supported properly.', 'meta_description' => 'Android and iOS app development in Nigeria: applications for customers and field staff, built by Cloudence, released and supported properly.'],
    ['slug' => 'cctv-installation',      'icon' => 'videocam',           'short' => 'CCTV & surveillance',    'label' => 'CCTV installation',               'blurb' => 'Surveillance design and install', 'description' => 'Surveillance design and installation for offices, estates and public facilities, with recording and remote access configured.', 'meta_description' => 'CCTV design and installation in Nigeria for offices, estates and public facilities, with recording and remote access configured by Cloudence.'],
    ['slug' => 'network-implementation', 'icon' => 'lan',                'short' => 'Network implementation', 'label' => 'Network implementation',          'blurb' => 'Cabling, wireless and routing', 'description' => 'Structured cabling, wireless coverage, switching and routing — specified, installed and documented.', 'meta_description' => 'Structured cabling, wireless coverage, switching and routing for Nigerian organisations, specified, installed and documented by Cloudence.'],
    // Temporarily hidden — remove the leading // on the next line to bring IT consulting back.
    // ['slug' => 'it-consulting',          'icon' => 'insights',           'short' => 'IT consulting',          'label' => 'IT consulting',                   'blurb' => 'Assessment, strategy and procurement', 'description' => 'Assessment, strategy and procurement advice for organisations deciding what to build, buy or replace.'],
    ['slug' => 'installation-supplies',  'icon' => 'inventory_2',        'short' => 'Installation & supplies','label' => 'Installation & supplies',         'blurb' => 'Hardware from a single vendor', 'description' => 'Sourcing and installing the hardware behind all of the above, from one vendor with a single point of contact.', 'meta_description' => 'ICT hardware sourcing and installation in Nigeria from Cloudence: one vendor and a single point of contact for the equipment your systems run on.'],
    ['slug' => 'training',               'icon' => 'cast_for_education', 'short' => 'Training',               'label' => 'Training & capacity building',    'blurb' => 'Courses and skills for your team', 'description' => 'Hands-on training for your people — end-user onboarding, administrator courses and ICT skills programmes, delivered on site or online.', 'meta_description' => 'Hands-on ICT training in Nigeria: end-user onboarding, administrator courses and skills programmes from Cloudence, delivered on site or online.'],
];

return [

    'name'     => 'Cloudence',
    'services' => $services,
    'legal'   => 'Cloudence Limited',
    'tagline' => 'Empowering growth through smart technology.',

    'phone1'  => '+234 911 836 4438',
    'mail'    => 'hello@cloudence.com.ng',
    'mail2'   => 'cloudenceltd@gmail.com',
    'whatsapp' => 'https://wa.me/2349118364438',

    'offices' => [
        ['city' => 'Abuja',   'address' => 'FHA Apo-Guzape Estate, Guzape Hills, Abuja', 'phone' => '+234 911 836 4438'],
        ['city' => 'Calabar', 'address' => '1, Elder Chief Effiom Edem Orok, Off Jehovah Witness Road, Calabar, Cross River State, Nigeria', 'phone' => '+234 911 836 4438'],
    ],

    // Primary navigation — every page now lives at its own URL.
    // Items with 'children' render as a dropdown on desktop and an
    // expandable group in the mobile menu.
    'nav' => [
        ['url' => '/', 'label' => 'Home'],
        ['url' => '/about', 'label' => 'Company', 'children' => [
            ['url' => '/about',        'label' => 'About us',   'icon' => 'apartment', 'blurb' => 'Who we are and how we work'],
            ['url' => '/products',     'label' => 'Products',   'icon' => 'deployed_code', 'blurb' => 'Platforms we build and run'],
        ]],
        ['url' => '/services', 'label' => 'Services', 'children' => array_map(fn ($s) => [
            'url' => '/services/' . $s['slug'], 'label' => $s['short'], 'icon' => $s['icon'], 'blurb' => $s['blurb'],
        ], $services)],
        ['url' => '/industries', 'label' => 'Industries', 'children' => [
            ['url' => '/industries/government',         'label' => 'Government',         'icon' => 'account_balance',  'blurb' => 'Public sector and agencies'],
            ['url' => '/industries/education',          'label' => 'Education',          'icon' => 'school',           'blurb' => 'Universities and colleges'],
            ['url' => '/industries/healthcare',         'label' => 'Healthcare',         'icon' => 'medical_services', 'blurb' => 'Clinics and hospitals'],
            ['url' => '/industries/financial-services', 'label' => 'Financial services', 'icon' => 'payments',         'blurb' => 'Banks and fintechs'],
            ['url' => '/industries/hospitality',        'label' => 'Hospitality',        'icon' => 'hotel',            'blurb' => 'Hotels and estates'],
            ['url' => '/industries/media',              'label' => 'Media',              'icon' => 'podcasts',         'blurb' => 'Broadcasters and publishers'],
        ]],
        ['url' => '/products', 'label' => 'Products', 'children' => array_map(fn ($slug, $p) => [
            'url' => '/products/' . $slug, 'label' => $p['name'], 'icon' => $p['icon'], 'blurb' => $p['blurb'], 'group' => $p['category'],
        ], array_keys($products), $products)],
        ['url' => '/contact',  'label' => 'Contact'],
    ],

    'footer' => [
        'Company' => [
            ['url' => '/about',            'label' => 'About us'],
            ['url' => '/products',         'label' => 'Products'],
            ['url' => '/about#values',     'label' => 'Our values'],
            ['url' => '/contact',          'label' => 'Contact'],
        ],
        'Services' => array_map(fn ($s) => ['url' => '/services/' . $s['slug'], 'label' => $s['short']], $services),
        'Industries' => [
            ['url' => '/industries/government', 'label' => 'Government'],
            ['url' => '/industries/education',  'label' => 'Education'],
            ['url' => '/industries/healthcare', 'label' => 'Healthcare'],
            ['url' => '/industries/financial-services', 'label' => 'Financial services'],
            ['url' => '/industries/hospitality', 'label' => 'Hospitality'],
            ['url' => '/industries/media',      'label' => 'Media'],
        ],
    ],

    'social' => [
        ['url' => '#', 'label' => 'LinkedIn',  'icon' => 'linkedin'],
        ['url' => '#', 'label' => 'X',         'icon' => 'x'],
        ['url' => '#', 'label' => 'Facebook',  'icon' => 'facebook'],
        ['url' => '#', 'label' => 'Instagram', 'icon' => 'instagram'],
    ],

];
