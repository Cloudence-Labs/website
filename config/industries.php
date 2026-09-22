<?php

/*
|--------------------------------------------------------------------------
| Industries
|--------------------------------------------------------------------------
| Drives /industries and /industries/{slug}. Each entry carries the summary
| used in listings plus the detail-page content.
|
| heading / accent — page heading, accent set in orange italic
| lead             — introduction under the heading
| challenges       — what makes the sector different: [icon, title, body]
| solutions        — systems and apps we build or can build: [icon, name, body, service slug]
| services         — service-line slugs (config/site.php) that apply
| outcomes         — what the client walks away with
| faqs             — [question, answer]
*/

return [

    'government' => [
        'icon'        => 'account_balance',
        'label'       => 'Government & public sector',
        'short'       => 'Government',
        'blurb'       => 'Public sector and agencies',
        'description' => 'Systems that satisfy procurement, reporting and audit, delivered to a fixed scope for ministries, agencies and parastatals.',
        'heading'     => 'Technology that survives',
        'accent'      => 'procurement and audit.',
        'lead'        => 'Ministries, agencies, commissions and parastatals run on systems that must be procured properly, documented for audit and kept running through changes of leadership. We build and support those systems, and we understand the paperwork that comes with them.',
        'challenges'  => [
            ['gavel',         'Procurement rules',        'Every engagement has to fit a tender process, a fixed scope and a defensible price, with documentation to match.'],
            ['fact_check',    'Audit and reporting',      'Systems must produce the figures oversight bodies ask for, on demand, without a developer assembling them.'],
            ['swap_horiz',    'Continuity',               'Leadership changes and the system has to keep working. Knowledge cannot live in one vendor\'s head.'],
            ['security',      'Data protection',          'Citizen data carries obligations, and the infrastructure it sits on has to be secured accordingly.'],
        ],
        'solutions'   => [
            ['payments',        'Revenue & payment collection',   'Assessment, billing and collection platforms for internally generated revenue, integrated with banks and payment switches.', 'enterprise-software'],
            ['folder_shared',   'Records & document management',  'Digitised registries, case files and approvals with audit trails, replacing paper and lost files.',                      'enterprise-software'],
            ['badge',           'Staff & payroll systems',        'Personnel records, verification, attendance and payroll integration for ministries and agencies.',                     'enterprise-software'],
            ['language',        'Official websites & portals',    'Accessible public websites and citizen service portals that publish reliably and are updated by your own staff.',       'web-development'],
            ['phone_android',   'Citizen-facing mobile apps',     'Apps for applications, payments, reporting and notifications, built for low bandwidth and older devices.',             'mobile-development'],
            ['lan',             'Secretariat networks',           'Structured cabling, Wi-Fi and secure networks across secretariats, with segmented access for departments.',            'network-implementation'],
            ['videocam',        'Surveillance & access control',  'CCTV and access control for public buildings, with retention and remote viewing configured to policy.',                'cctv-installation'],
            ['school',          'Staff training',                 'End-user and administrator training so the systems are used properly after the project team leaves.',               'training'],
        ],
        'services'    => ['enterprise-software', 'web-development', 'mobile-development', 'network-implementation', 'cctv-installation', 'it-consulting', 'installation-supplies', 'training'],
        'outcomes'    => ['A system of record that stands up to audit', 'Reports produced on demand, not assembled by hand', 'Documentation and training that outlast the project', 'A vendor who understands the tender process'],
        'faqs'        => [
            ['Can you work within a public tender?', 'Yes. We respond to tenders, provide the documentation procurement units require, and deliver to the fixed scope and price agreed.'],
            ['Who owns the system afterwards?', 'The institution does. Source code, documentation and accounts are handed over, so a change of vendor never means starting again.'],
            ['Do you handle both the software and the infrastructure?', 'Yes. The same team builds the platform and installs the network, servers and security it runs on.'],
        ],
    ],

    'education' => [
        'icon'        => 'school',
        'label'       => 'Education',
        'short'       => 'Education',
        'blurb'       => 'Universities and colleges',
        'description' => 'Student records, portals and campus networks for universities, polytechnics, colleges and schools.',
        'heading'     => 'Campus systems built for',
        'accent'      => 'thousands of users at once.',
        'lead'        => 'Universities, polytechnics, colleges and schools need systems that handle admissions, records, fees and results for large numbers of students, on networks that reach every lecture hall and hostel. We have built and run exactly that, including for the University of Education & Entrepreneurship, Akamkpa.',
        'challenges'  => [
            ['groups',        'Scale and peaks',           'Registration, results and fee deadlines bring thousands of users at the same time. The system has to hold.'],
            ['account_tree',  'Many departments, one record', 'Admissions, bursary, academic affairs and hostels all need the same student data, without duplicating it.'],
            ['wifi',          'Campus coverage',           'Networks must reach lecture halls, labs, libraries and hostels across large grounds.'],
            ['savings',       'Budget discipline',         'Institutional budgets are fixed and scrutinised. Scope and cost have to be agreed up front.'],
        ],
        'solutions'   => [
            ['how_to_reg',    'Admissions & student portal',     'Online applications, screening, admission letters and a portal where students register courses and see results.',      'enterprise-software'],
            ['receipt_long',  'Fees & bursary',                  'Fee schedules, online payment, receipts and reconciliation integrated with the institution\'s banks.',                  'enterprise-software'],
            ['grading',       'Results & transcripts',           'Lecturer score entry, computation, approvals and transcript generation with a full audit trail.',                    'enterprise-software'],
            ['menu_book',     'Learning management',             'Course materials, assignments and assessments online, integrated with student records.',                            'web-development'],
            ['phone_android', 'Student & staff mobile apps',     'Timetables, results, notices and payments on the phone, built for low data usage.',                                  'mobile-development'],
            ['lan',           'Campus network & Wi-Fi',          'Fibre backbone, structured cabling and wireless coverage across faculties, libraries and hostels.',                 'network-implementation'],
            ['videocam',      'Campus security',                 'CCTV across gates, halls and hostels with central monitoring for the security unit.',                              'cctv-installation'],
            ['computer',      'Labs & equipment',                'Computer laboratories, servers and power protection supplied, installed and documented.',                          'installation-supplies'],
            ['cast_for_education', 'ICT training',               'Training for registry, bursary and ICT staff, and skills programmes for students.',                                'training'],
        ],
        'services'    => ['enterprise-software', 'web-development', 'mobile-development', 'network-implementation', 'cctv-installation', 'installation-supplies', 'training'],
        'outcomes'    => ['One student record shared by every department', 'Registration and results that hold up under peak load', 'Wi-Fi that reaches every corner of the campus', 'Staff trained to run the system themselves'],
        'faqs'        => [
            ['Have you worked with a university before?', 'Yes. We delivered portals and campus systems for the University of Education & Entrepreneurship, Akamkpa, and continue to support them.'],
            ['Can the system handle results and transcripts?', 'Yes. Score entry, computation, approvals and transcript generation are core features, with audit trails on every change.'],
            ['Can students pay fees online?', 'Yes. Fee payment is integrated with Nigerian payment gateways and reconciled automatically against student accounts.'],
        ],
    ],

    'healthcare' => [
        'icon'        => 'medical_services',
        'label'       => 'Healthcare',
        'short'       => 'Healthcare',
        'blurb'       => 'Clinics and hospitals',
        'description' => 'Records, scheduling and facility infrastructure for hospitals, clinics, laboratories and health agencies.',
        'heading'     => 'Systems that keep',
        'accent'      => 'care moving.',
        'lead'        => 'Hospitals, clinics, laboratories and health agencies depend on records being available at the point of care and infrastructure that does not go down mid-shift. We build the systems and install the networks and power protection behind them.',
        'challenges'  => [
            ['schedule',     'Always on',              'A ward does not close at five. Systems and networks need redundancy, power protection and fast response.'],
            ['lock',         'Confidentiality',        'Patient data has to be controlled by role, logged and protected on every device and link.'],
            ['sync_alt',     'Many moving parts',      'Registration, consultation, lab, pharmacy and billing all need to talk to each other.'],
            ['payments',     'Billing and insurance',  'Cash, HMO and government schemes each need their own billing flows and reconciliation.'],
        ],
        'solutions'   => [
            ['clinical_notes', 'Electronic medical records',    'Patient registration, consultation notes, prescriptions and history, available at every point of care with role-based access.', 'enterprise-software'],
            ['event',          'Appointments & queues',         'Online booking, queue management and SMS reminders that cut waiting times and no-shows.',                                  'enterprise-software'],
            ['biotech',        'Laboratory & pharmacy',         'Test ordering, results, stock control and dispensing linked to the patient record.',                                        'enterprise-software'],
            ['receipt_long',   'Billing, HMO & claims',         'Charges captured at the point of service, with HMO and insurance claims prepared and tracked.',                             'enterprise-software'],
            ['phone_android',  'Patient & staff apps',          'Appointment booking, results and reminders for patients; ward rounds and tasks for clinical staff.',                       'mobile-development'],
            ['lan',            'Facility networks',             'Cabling, Wi-Fi and segmented networks across wards, theatres and offices, with redundancy where it matters.',              'network-implementation'],
            ['videocam',       'Security & access control',     'CCTV and access control for entrances, pharmacies and restricted areas.',                                                 'cctv-installation'],
            ['bolt',           'Servers & power protection',    'Servers, storage, UPS and backup arrangements sized for a facility that cannot stop.',                                     'installation-supplies'],
        ],
        'services'    => ['enterprise-software', 'mobile-development', 'network-implementation', 'cctv-installation', 'installation-supplies', 'it-consulting', 'training'],
        'outcomes'    => ['Records available at every point of care', 'Shorter queues and fewer missed appointments', 'Billing captured at the point of service', 'Infrastructure that stays up through outages'],
        'faqs'        => [
            ['Is patient data secure?', 'Access is controlled by role, every change is logged, and the network and servers are configured so data is protected in storage and in transit.'],
            ['Can the system work during power or internet outages?', 'Yes. We design for local operation with UPS-backed servers and synchronisation when connectivity returns.'],
            ['Do you support HMO billing?', 'Yes. Cash, HMO and scheme billing are handled separately, with claims prepared from the record of care.'],
        ],
    ],

    'financial-services' => [
        'icon'        => 'payments',
        'label'       => 'Financial services',
        'short'       => 'Financial services',
        'blurb'       => 'Banks and fintechs',
        'description' => 'Payment platforms, banking channels and distribution systems for banks, microfinance institutions and fintechs.',
        'heading'     => 'Payment and banking platforms',
        'accent'      => 'that regulators sign off.',
        'lead'        => 'Banks, microfinance institutions and fintechs need platforms that move money correctly, reconcile to the kobo and satisfy the regulator. We have built consumer payment apps, bill payment and airtime distribution platforms, and banking channels for clients including Toprate Microfinance Bank, Toprate Pay, Billerhub and Recharge Fusion.',
        'challenges'  => [
            ['verified_user', 'Regulation',            'CBN requirements, KYC and BVN checks, transaction limits and reporting shape every feature.'],
            ['balance',       'Reconciliation',        'Every transaction has to match across your ledger, the switch and the bank, automatically.'],
            ['speed',         'Uptime and speed',      'Customers notice a failed transfer immediately. Platforms need resilience and monitoring.'],
            ['shield',        'Fraud and security',    'Authentication, device binding, velocity checks and audit trails are not optional.'],
        ],
        'solutions'   => [
            ['account_balance_wallet', 'Consumer payment apps',       'Wallets, transfers, bill payments and airtime on Android and iOS, with KYC, BVN and tiered limits built in.', 'mobile-development'],
            ['receipt_long',   'Bill payment & aggregation',    'Platforms that connect billers, agents and channels, with settlement and reconciliation across all of them.',      'enterprise-software'],
            ['sim_card',       'Airtime & data distribution',   'VTU and distribution systems for dealers and sub-dealers, with wallet funding, commissions and reporting.',        'enterprise-software'],
            ['account_balance','Banking channels',              'Internet and mobile banking, agent banking and USSD integrated with the core banking system.',                    'enterprise-software'],
            ['handshake',      'Agent & merchant networks',     'Onboarding, POS integration, float management and commission payout for agent and merchant operations.',           'enterprise-software'],
            ['analytics',      'Reconciliation & reporting',    'Automated matching across ledger, switch and bank, with the reports the regulator and the board expect.',          'enterprise-software'],
            ['dns',            'Secure infrastructure',         'Networks, servers, firewalls and access control for branches and head office, built to the standard auditors check.', 'network-implementation'],
            ['videocam',       'Branch security',               'CCTV and access control for branches, vaults and cash points, with retention configured to policy.',              'cctv-installation'],
        ],
        'services'    => ['enterprise-software', 'mobile-development', 'web-development', 'network-implementation', 'cctv-installation', 'it-consulting', 'training'],
        'outcomes'    => ['Platforms that reconcile automatically', 'KYC, limits and reporting built to regulation', 'Apps live in both stores under your accounts', 'Infrastructure that passes the audit'],
        'faqs'        => [
            ['Have you built payment platforms before?', 'Yes. Toprate Pay, Billerhub and Recharge Fusion are live platforms we built, and we deliver banking systems and channels for Toprate Microfinance Bank.'],
            ['Can you integrate with our core banking system?', 'Yes. We have integrated with core banking systems, payment switches and gateways, and identity services such as BVN verification.'],
            ['How do you handle security?', 'Authentication, device binding, velocity checks, encryption and audit logging are part of every build, alongside secured infrastructure.'],
        ],
    ],

    'hospitality' => [
        'icon'        => 'hotel',
        'label'       => 'Hospitality',
        'short'       => 'Hospitality',
        'blurb'       => 'Hotels and estates',
        'description' => 'Property networks, guest connectivity, booking systems and surveillance for hotels, resorts and residential estates.',
        'heading'     => 'Connectivity and systems',
        'accent'      => 'your guests never think about.',
        'lead'        => 'Hotels, resorts, event venues and residential estates are judged on things that should be invisible: Wi-Fi that just works, check-in that takes a minute, security that is present without being intrusive. We design and install the infrastructure and build the systems behind that experience.',
        'challenges'  => [
            ['wifi',          'Coverage everywhere',      'Guests expect Wi-Fi in every room, by the pool and in the car park, at the speed they get at home.'],
            ['groups',        'Guest and staff networks', 'Guests, staff systems and payment devices must be kept apart on the same infrastructure.'],
            ['schedule',      '24-hour operation',        'Front desk, restaurant and security run around the clock. Failures are noticed immediately.'],
            ['shield',        'Safety and security',      'Surveillance and access control that protect guests and property without spoiling the atmosphere.'],
        ],
        'solutions'   => [
            ['wifi',          'Guest Wi-Fi & property network',  'Surveyed wireless coverage across rooms, grounds and public areas, with guest, staff and payment networks separated.', 'network-implementation'],
            ['hotel',         'Booking & property management',   'Reservations, front desk, housekeeping and billing in one system, with online booking on your own website.',         'enterprise-software'],
            ['language',      'Website & direct booking',        'A fast, mobile-first website that takes bookings directly, cutting commission paid to third-party platforms.',       'web-development'],
            ['restaurant',    'Restaurant & point of sale',      'Ordering, kitchen tickets and billing linked to the guest folio, with stock control behind it.',                     'enterprise-software'],
            ['phone_android', 'Guest & staff apps',              'Mobile check-in, room service and requests for guests; tasks and housekeeping status for staff.',                   'mobile-development'],
            ['videocam',      'CCTV & access control',           'Discreet surveillance across entrances, corridors and grounds, with card or code access for rooms and gates.',    'cctv-installation'],
            ['apartment',     'Estate management',               'Resident records, service charges, visitor access and facility bookings for residential estates.',              'enterprise-software'],
            ['bolt',          'Power & equipment',               'UPS, servers, workstations and networking hardware supplied and installed for continuous operation.',             'installation-supplies'],
        ],
        'services'    => ['network-implementation', 'cctv-installation', 'enterprise-software', 'web-development', 'mobile-development', 'installation-supplies'],
        'outcomes'    => ['Wi-Fi that reaches every room and the grounds', 'Guest, staff and payment traffic kept apart', 'Direct bookings on your own website', 'Security that is present but not intrusive'],
        'faqs'        => [
            ['Can you cover a large property with Wi-Fi?', 'Yes. We survey the site, plan access point placement for full coverage and install the cabling and switching to support it.'],
            ['Can guests book directly on our website?', 'Yes. We build websites with integrated booking and payment, connected to your property management system.'],
            ['Do you work on occupied properties?', 'Yes. Installation is phased and scheduled around occupancy so guests are not disturbed.'],
        ],
    ],

    'media' => [
        'icon'        => 'podcasts',
        'label'       => 'Media',
        'short'       => 'Media',
        'blurb'       => 'Broadcasters and publishers',
        'description' => 'Platforms, websites and infrastructure for broadcasters, publishers, studios and media agencies.',
        'heading'     => 'Platforms built for',
        'accent'      => 'audiences that arrive all at once.',
        'lead'        => 'Broadcasters, publishers, studios and agencies live on deadlines and traffic spikes. A breaking story or a live event brings the whole audience at the same moment, and the platform, the newsroom systems and the network behind them all have to cope. We build and install for exactly that.',
        'challenges'  => [
            ['trending_up',  'Traffic spikes',        'Audiences arrive in bursts. Sites and apps must scale without falling over or slowing down.'],
            ['timer',        'Deadlines',             'Publishing tools have to be fast and reliable, because the newsroom will not wait for IT.'],
            ['movie',        'Large files',           'Video and audio need fast internal networks, storage and backup that keep up with production.'],
            ['paid',         'Monetisation',          'Advertising, subscriptions and sponsorship each need their own systems and reporting.'],
        ],
        'solutions'   => [
            ['newspaper',     'Publishing platforms',           'Fast, scalable news and content websites with editorial workflows, scheduling and multi-author publishing.',        'web-development'],
            ['live_tv',       'Streaming & on-demand',          'Live streaming and catch-up platforms for radio and TV, on web and mobile, with analytics on what people watch.',    'enterprise-software'],
            ['phone_android', 'Audience mobile apps',           'News, radio and TV apps with notifications, offline reading and low data usage for Nigerian networks.',           'mobile-development'],
            ['campaign',      'Advertising & subscriptions',    'Ad booking, scheduling and invoicing systems, and subscription management with online payment.',                  'enterprise-software'],
            ['lan',           'Studio & newsroom networks',     'High-throughput cabling and switching for production, with storage and backup for large media files.',           'network-implementation'],
            ['videocam',      'Studio security',                'CCTV and access control for studios, transmitter sites and offices.',                                             'cctv-installation'],
            ['computer',      'Workstations & storage',         'Editing workstations, servers, storage arrays and power protection supplied and installed.',                       'installation-supplies'],
            ['insights',      'Digital strategy',               'Advice on platform choices, monetisation and the infrastructure needed to move from broadcast to digital.',       'it-consulting'],
        ],
        'services'    => ['web-development', 'enterprise-software', 'mobile-development', 'network-implementation', 'cctv-installation', 'installation-supplies', 'it-consulting'],
        'outcomes'    => ['A site that stays up when the story breaks', 'Publishing tools the newsroom actually likes', 'Apps that work on low-data connections', 'Networks and storage that keep up with production'],
        'faqs'        => [
            ['Can the website handle a traffic spike?', 'Yes. Platforms are built with caching and scalable hosting so a breaking story or live event does not take the site down.'],
            ['Can you build a streaming app?', 'Yes. We build live and on-demand streaming for web, Android and iOS, with analytics on audience behaviour.'],
            ['Do you handle the newsroom network too?', 'Yes. The same team builds the platform and installs the network, storage and workstations behind production.'],
        ],
    ],

];
