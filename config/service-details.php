<?php

/*
|--------------------------------------------------------------------------
| Service detail pages
|--------------------------------------------------------------------------
| Long-form content for /services/{slug}. The list of services itself
| (slug, icon, label, blurb, description) lives in config/site.php; this
| file adds what each detail page needs, keyed by that slug.
|
| accent    — the closing words of the page heading, set in orange italic
| lead      — one-paragraph introduction under the heading
| includes  — what the engagement covers: [icon, title, body]
| for       — who typically buys this
| outcomes  — what the client walks away with
| process   — the three stages, tailored to the service
| faqs      — [question, answer]
*/

return [

    'enterprise-software' => [
        'heading'  => 'Software built around',
        'accent'   => 'how you actually work.',
        'lead'     => 'When off-the-shelf software stops fitting, we design and build the platform that does — payments, records, billing, reporting and the integrations that tie them to what you already run. Delivered to a fixed scope, documented for audit, and supported after launch.',
        'includes' => [
            ['architecture',  'Discovery & specification',  'Workshops with the people who will use the system, turned into a written scope you sign off before we build.'],
            ['database',      'Core platform build',        'Secure, role-based applications on Laravel, PHP and PostgreSQL or MySQL, built to be maintained by your own team later.'],
            ['sync_alt',      'Integrations',               'Payment gateways, identity, accounting, SMS and email, and the legacy systems you cannot switch off yet.'],
            ['bar_chart',     'Reporting & dashboards',     'The figures management and regulators ask for, produced by the system rather than assembled by hand each month.'],
            ['bug_report',    'Testing & user acceptance',  'Staged releases with checkpoints where you use the software, not just hear about it.'],
            ['handyman',      'Support & evolution',        'A named engineer, a response time in writing, and a roadmap for the changes you will need next year.'],
        ],
        'for'      => ['Government agencies and parastatals', 'Banks, microfinance and fintech operators', 'Universities and large institutions', 'Businesses replacing spreadsheets and paper'],
        'outcomes' => ['One system of record instead of many', 'Reports produced by the platform, not by hand', 'Documentation that survives a procurement audit', 'A team that still answers the phone after launch'],
        'process'  => [
            ['Scope',   'We map the current process, agree what the system must do, and price it as a fixed scope.'],
            ['Build',   'Sprints with working software at each checkpoint, tested with your users along the way.'],
            ['Run',     'Deployment, training, handover documentation, and a support agreement that keeps it running.'],
        ],
        'faqs'     => [
            ['Do we own the code?', 'Yes. Source code, documentation and hosting accounts are handed over at completion and remain yours.'],
            ['Can it integrate with our existing systems?', 'Almost always. We have integrated with payment switches, core banking systems, accounting packages and government identity services.'],
            ['How long does a build take?', 'A focused platform typically ships in three to six months. Larger multi-department systems are delivered in phases so value arrives early.'],
        ],
    ],

    'web-development' => [
        'heading'  => 'Websites and portals that are',
        'accent'   => 'fast, findable and yours.',
        'lead'     => 'Corporate websites, customer portals and web applications built to load quickly, rank well and be updated by your own staff without calling a developer. Accessible by default and hosted where you control it.',
        'includes' => [
            ['design_services', 'Design & content structure', 'A layout planned around what visitors come to do, with copy and imagery that says what you actually offer.'],
            ['code',            'Build',                      'Hand-coded on Laravel and modern front-end tooling, with no bloated themes to slow things down or break on update.'],
            ['edit_note',       'Content management',         'A simple editor for pages, news and documents so your team keeps the site current without technical help.'],
            ['speed',           'Performance & SEO',          'Fast load times, clean structure and proper metadata so the site is found and stays found.'],
            ['accessibility',   'Accessibility',              'Built to be usable by everyone, including people relying on screen readers or keyboard navigation.'],
            ['cloud_done',      'Hosting & maintenance',      'Secure hosting, SSL, backups and updates handled for you, with uptime monitoring in place.'],
        ],
        'for'      => ['Ministries, agencies and public bodies', 'Companies replacing an out-of-date website', 'Institutions needing a student or customer portal', 'Organisations that must publish documents reliably'],
        'outcomes' => ['A site your team can update themselves', 'Pages that load in under two seconds', 'Search visibility for the terms that matter', 'Hosting, backups and security handled'],
        'process'  => [
            ['Plan',   'We agree the site map, the audiences and what each page must achieve.'],
            ['Build',  'Design and development in the open, with a staging link you can review at every stage.'],
            ['Launch', 'Migration, go-live, training for your editors and ongoing maintenance.'],
        ],
        'faqs'     => [
            ['Can we edit the site ourselves?', 'Yes. Every site ships with a content editor and a short training session for your team.'],
            ['Do you handle hosting?', 'We can host and maintain the site, or deploy it to infrastructure you already own. Either way you keep the accounts.'],
            ['Will it work on phones?', 'Every site is designed for mobile first, since that is how most Nigerian visitors will reach it.'],
        ],
    ],

    'mobile-development' => [
        'heading'  => 'Mobile apps released',
        'accent'   => 'and supported properly.',
        'lead'     => 'Android and iOS applications for your customers and your field staff — from consumer payment apps to tools that let agents work offline and sync later. Designed, built, published to the stores and kept up to date as the platforms change.',
        'includes' => [
            ['phone_iphone',  'Native & cross-platform',    'Flutter or React Native for most products, Kotlin and Swift where the app needs it.'],
            ['wifi_off',      'Offline-first design',       'Apps that keep working where the network does not, then sync safely when it returns.'],
            ['api',           'Back-end & APIs',            'The secure services behind the app, built or integrated with your existing platform.'],
            ['payments',      'Payments & identity',        'Card, transfer and wallet flows, BVN and identity checks, built to the standards the regulators expect.'],
            ['storefront',    'Store publishing',           'Listing, review and release management on Google Play and the Apple App Store, in your own developer accounts.'],
            ['update',        'Updates & monitoring',       'Crash reporting, analytics and a release cadence that keeps the app working on new OS versions.'],
        ],
        'for'      => ['Fintechs and payment operators', 'Businesses with field or sales staff', 'Institutions offering services to the public', 'Companies extending a web platform to mobile'],
        'outcomes' => ['Live apps in both stores, under your accounts', 'Field staff working with or without signal', 'Secure payment and identity flows', 'A release plan for the year ahead'],
        'process'  => [
            ['Define',  'User journeys, screens and the back-end the app needs, agreed before any code is written.'],
            ['Build',   'Test builds on your own devices at every milestone, so you feel the app long before launch.'],
            ['Release', 'Store submission, launch support, and monitoring so problems are caught before users report them.'],
        ],
        'faqs'     => [
            ['Do you build for both Android and iOS?', 'Yes. Most projects use a single cross-platform codebase, which keeps both versions in step and lowers the cost of every update.'],
            ['Who owns the app store accounts?', 'You do. We publish through developer accounts registered in your organisation\'s name.'],
            ['What happens after launch?', 'A support agreement covers OS updates, bug fixes and small improvements, with larger features scoped separately.'],
        ],
    ],

    'cctv-installation' => [
        'heading'  => 'Surveillance you can',
        'accent'   => 'actually rely on.',
        'lead'     => 'Camera systems designed for the site, not sold from a catalogue — with the right coverage, clear recordings, remote access from your phone, and an installation that still works in two years. For offices, estates, schools, banks and public facilities.',
        'includes' => [
            ['map',            'Site survey & design',     'A walk-through of the premises to place cameras where they cover entrances, perimeters and blind spots, with a written plan.'],
            ['videocam',       'Cameras & recording',      'Hikvision and Dahua IP systems with NVR recording sized for the retention period you need.'],
            ['cable',          'Cabling & power',          'Structured cabling, PoE switching and surge protection, installed tidily and labelled.'],
            ['phone_android',  'Remote viewing',           'Secure access from phones and desktops for the people who should have it, and nobody else.'],
            ['badge',          'Access control',           'Door controllers, card and biometric readers integrated with the camera system where required.'],
            ['build',          'Maintenance',              'Scheduled checks, cleaning and firmware updates so the system is recording when you need the footage.'],
        ],
        'for'      => ['Offices and corporate premises', 'Residential estates and gated communities', 'Banks, branches and cash points', 'Schools, hospitals and public buildings'],
        'outcomes' => ['Coverage of every entrance and blind spot', 'Footage retained for the period you need', 'Remote access that is secured, not exposed', 'A documented system you can extend later'],
        'process'  => [
            ['Survey',   'We visit the site, understand the risks and produce a camera plan and fixed quotation.'],
            ['Install',  'Cabling, mounting, configuration and testing, scheduled around your operating hours.'],
            ['Handover', 'Training for your security team, documentation, and a maintenance schedule.'],
        ],
        'faqs'     => [
            ['Can I watch the cameras from my phone?', 'Yes. Remote viewing is configured securely for named users, with recordings available as well as live feeds.'],
            ['How long is footage kept?', 'That depends on storage. We size the recorder for the retention period you specify, commonly 30 to 90 days.'],
            ['Do you maintain systems you did not install?', 'Yes. We audit existing installations, fix what is wrong and take over ongoing maintenance.'],
        ],
    ],

    'network-implementation' => [
        'heading'  => 'Networks that are specified,',
        'accent'   => 'installed and documented.',
        'lead'     => 'Structured cabling, wireless coverage, switching and routing for offices, campuses and multi-site organisations. Designed to a written specification, installed to standard, and handed over with the documentation your next engineer will thank you for.',
        'includes' => [
            ['architecture', 'Network design',          'Capacity, segmentation and redundancy planned for how many users and what they do, not guessed.'],
            ['cable',        'Structured cabling',      'Cat6 and fibre, patch panels, racks and labelling to standard, with test certificates for every run.'],
            ['wifi',         'Wireless coverage',       'Ubiquiti and enterprise Wi-Fi surveyed and placed for coverage across floors, halls and grounds.'],
            ['router',       'Switching & routing',     'Cisco and MikroTik switching, VLANs, routing and internet failover configured and documented.'],
            ['security',     'Firewalls & security',    'Perimeter firewalls, VPN access for remote staff and segmentation that keeps guests off your servers.'],
            ['dns',          'Servers & services',      'Windows and Linux servers, directory services, file storage and backups where the network needs them.'],
        ],
        'for'      => ['New offices and fit-outs', 'University and school campuses', 'Hospitals, hotels and multi-building sites', 'Organisations connecting several branches'],
        'outcomes' => ['A network sized for the next five years', 'Wi-Fi that reaches every corner of the site', 'Labelled, tested, certified cabling', 'Documentation for whoever maintains it next'],
        'process'  => [
            ['Survey',   'Site survey, user count and application needs, turned into a design and bill of materials.'],
            ['Install',  'Cabling, hardware, configuration and testing, phased so your business keeps running.'],
            ['Document', 'As-built drawings, configurations and test results handed over, with a support agreement.'],
        ],
        'faqs'     => [
            ['Can you work while the office is in use?', 'Yes. We phase installations around working hours and cut over to the new network outside them.'],
            ['Do you supply the hardware?', 'We can supply, or install equipment you have procured yourself. Either way we specify it first.'],
            ['What about ongoing support?', 'Managed support covers monitoring, changes and faults, with response times agreed in writing.'],
        ],
    ],

    'it-consulting' => [
        'heading'  => 'Advice before you',
        'accent'   => 'build, buy or replace.',
        'lead'     => 'An honest assessment of where your technology stands, what it should do next, and how to procure it without being sold more than you need. We advise organisations deciding between building, buying and keeping what they have — including when the answer is that you do not need us.',
        'includes' => [
            ['fact_check',   'Technology assessment',      'A review of your systems, infrastructure, risks and costs, written in plain language for decision-makers.'],
            ['route',        'Strategy & roadmap',         'A prioritised plan for the next one to three years, tied to budget and to what the organisation needs to achieve.'],
            ['request_quote','Procurement support',        'Requirements, tender documents and evaluation criteria that get you the right vendor at a defensible price.'],
            ['policy',       'Policy & governance',        'Information security, data protection and acceptable use policies that fit how your organisation actually operates.'],
            ['verified_user','Security & compliance review','Practical assessment of exposure, with a fixed list of things to fix in order of risk.'],
            ['groups',       'Vendor & project oversight', 'An independent eye on projects other suppliers are delivering, so you are not relying on their own progress reports.'],
        ],
        'for'      => ['Boards and executives planning ICT spend', 'Public bodies preparing a tender', 'Organisations inheriting systems nobody documented', 'Businesses unsure whether to build or buy'],
        'outcomes' => ['A clear picture of what you have and what it costs', 'A roadmap the board can approve', 'Tender documents that attract the right bidders', 'A short list of risks, in order'],
        'process'  => [
            ['Listen',    'Interviews with leadership, staff and existing suppliers to understand the real situation.'],
            ['Assess',    'Review of systems, contracts and costs, producing findings and options with honest trade-offs.'],
            ['Recommend', 'A written roadmap and, where wanted, help executing it or overseeing whoever does.'],
        ],
        'faqs'     => [
            ['Will you recommend your own services?', 'Only where they are the right answer. Consulting engagements are priced on their own and our advice frequently is to keep what you have.'],
            ['How long does an assessment take?', 'A single-site assessment typically takes two to four weeks. Multi-site or multi-agency reviews are scoped separately.'],
            ['Can you help us run a tender?', 'Yes. We write requirements and evaluation criteria, answer bidder questions and score submissions alongside your team.'],
        ],
    ],

    'installation-supplies' => [
        'heading'  => 'The hardware behind it all,',
        'accent'   => 'from one vendor.',
        'lead'     => 'Sourcing, supply and installation of the equipment every other service depends on — servers, networking, computers, power protection, cameras and accessories — from a single point of contact who also knows how it will be used.',
        'includes' => [
            ['inventory_2',   'Sourcing & supply',     'Genuine equipment from authorised channels, with warranties that will be honoured.'],
            ['dns',           'Servers & storage',     'Rack and tower servers, storage and backup appliances sized for the workload.'],
            ['computer',      'Workstations & laptops','Fleet supply, imaging and setup so new machines arrive ready for the user.'],
            ['bolt',          'Power & protection',    'UPS, inverters, surge protection and rack power that keep systems running through outages.'],
            ['build',         'Installation & setup',  'Racking, mounting, configuration and testing by the same team that specified it.'],
            ['receipt_long',  'Asset documentation',   'Serial numbers, locations, warranties and licences recorded and handed to you.'],
        ],
        'for'      => ['Organisations opening or refitting an office', 'Public bodies procuring equipment to specification', 'Businesses standardising their fleet', 'Clients of our other services who want one invoice'],
        'outcomes' => ['Equipment that matches the specification', 'Warranties registered in your name', 'Installed and working, not left in boxes', 'An asset register from day one'],
        'process'  => [
            ['Specify', 'We confirm what is needed and produce a bill of materials with options at different price points.'],
            ['Supply',  'Procurement through authorised channels, with delivery scheduled to suit the site.'],
            ['Install', 'Installation, configuration and testing, then documentation and warranty handover.'],
        ],
        'faqs'     => [
            ['Can you supply against our own specification?', 'Yes. Send us the specification or tender document and we will quote against it, flagging anything we think is wrong.'],
            ['Do you offer financing or staged delivery?', 'Large orders can be delivered and invoiced in phases to match your project and budget schedule.'],
            ['What warranties apply?', 'Manufacturer warranties are registered in your organisation\'s name, with our installation work covered separately.'],
        ],
    ],

    'training' => [
        'heading'  => 'Skills that stay',
        'accent'   => 'after we leave.',
        'lead'     => 'Hands-on training for the people who will use, run and manage your systems — end-user onboarding, administrator courses and broader ICT skills programmes, delivered on site or online and adapted to what your team already knows.',
        'includes' => [
            ['school',             'End-user onboarding',       'Practical sessions on the systems we or others have deployed, so staff are productive from the first week.'],
            ['admin_panel_settings','Administrator training',   'Deeper courses for the people who will manage users, configuration and day-to-day operation.'],
            ['terminal',           'Technical skills',          'Networking, systems administration and software fundamentals for in-house ICT teams.'],
            ['security',           'Security awareness',        'Phishing, passwords, data handling and the habits that prevent most incidents.'],
            ['menu_book',          'Course materials',          'Manuals, quick-reference guides and recordings your team can return to later.'],
            ['workspace_premium',  'Assessment & certification', 'Evaluation at the end of each programme, with certificates of completion for participants.'],
        ],
        'for'      => ['Organisations rolling out a new system', 'Public bodies building internal ICT capacity', 'Schools and institutions upskilling staff', 'Teams inheriting systems from a previous vendor'],
        'outcomes' => ['Staff confident on the systems they use', 'An in-house team able to run the basics', 'Fewer support calls after go-live', 'Materials that outlast the course'],
        'process'  => [
            ['Assess',  'We find out what participants already know and what the organisation needs them to do.'],
            ['Deliver', 'Sessions on site or online, built around real tasks on your own systems rather than slides.'],
            ['Follow up','Assessment, certificates, and a check-in after a few weeks to close any gaps.'],
        ],
        'faqs'     => [
            ['Can training be delivered online?', 'Yes. Most programmes run well online, though hands-on hardware courses are best delivered on site.'],
            ['Do you train on systems you did not build?', 'Yes. We regularly train teams on platforms deployed by other vendors, once we have had access to learn them properly.'],
            ['How many people can attend?', 'Hands-on sessions work best with up to twelve participants. Larger groups are split into cohorts.'],
        ],
    ],

];
