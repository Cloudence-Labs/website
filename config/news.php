<?php

/*
|--------------------------------------------------------------------------
| News
|--------------------------------------------------------------------------
| Cloudence news and activity updates. Keyed by URL slug, newest first is
| worked out from 'date', so posts can be added in any order.
|
|   'date'     YYYY-MM-DD
|   'category' Short label: Company, Products, Projects, Training, Events…
|   'image'    Path under public/ (optional; posts without one get a branded panel)
|   'image_position'  Optional CSS object-position for the wide article header crop
|   'gallery'  Optional [[path, caption], …] shown as a photo grid after the body
|   'excerpt'  One or two sentences for cards and search results
|   'body'     Markdown
|   'seo_title' / 'seo_description'  Optional shorter versions for search results
|              (aim for under 60 and 155 characters)
*/

return [

    'bakassi-deep-seaport-groundbreaking-stream' => [
        'title'    => 'Cloudence streams the groundbreaking ceremony of the Bakassi Deep Seaport',
        'date'     => '2026-11-19',
        'category' => 'Projects',
        'image'    => 'images/news/bakassi-seaport-team-jetty.webp',
        'image_position' => 'center 65%',
        'gallery'  => [
            ['images/news/bakassi-seaport-stage.webp',  'The stage for the Presidential Groundbreaking Ceremony'],
            ['images/news/bakassi-seaport-camera.webp', 'A Cloudence camera position at the ceremony grounds'],
            ['images/news/bakassi-seaport-crew.webp',   'Cameras on the floor during the ceremony'],
            ['images/news/bakassi-seaport-team.webp',   'A member of the Cloudence crew at the venue'],
        ],
        'seo_title'       => 'Bakassi Deep Seaport groundbreaking, streamed live',
        'seo_description' => 'Cloudence streamed the Bakassi Deep Seaport groundbreaking live for the Cross River Special Agro-Industrial Processing Zone (SAPZ).',
        'excerpt'  => 'The Cross River Special Agro-Industrial Processing Zone (SAPZ) awarded Cloudence the live streaming of the Presidential Groundbreaking Ceremony of the Bakassi Deep Seaport. Our crew covered the ceremony and streamed it live.',
        'body'     => <<<'MD'
Cloudence has delivered the live stream of the Presidential Groundbreaking Ceremony of the Bakassi Deep Seaport in Cross River State. The job was awarded to Cloudence by the Cross River Special Agro-Industrial Processing Zone (SAPZ).

The groundbreaking marks the start of work on the deep seaport at Bakassi, a project presented at the ceremony as "Africa's next maritime frontier". With guests, officials and the public following from far beyond the venue, the stream had to run reliably for the whole ceremony.

**On the ground.** Our crew set up camera positions across the ceremony grounds, covered proceedings from the stage and the floor, and streamed the event live from start to finish so that people who could not be there could follow it as it happened.

**Why it matters.** Large public ceremonies are often held at sites without the infrastructure of a studio or a city venue. Streaming them well depends on careful planning, dependable equipment and connectivity, and a crew that can work alongside the organisers and other media on the day.

The project adds to Cloudence's work for government and institutions across Cross River State, from [Starlink connectivity for SUBEB schools](/news/subeb-starlink-computer-hubs) to [CBT examinations](/news/uee-cbt-examinations) at the University of Education and Entrepreneurship, Akamkpa.

Organisers planning a ceremony, conference or event that needs to reach an audience online can [contact us](/contact) to discuss their requirements.
MD,
    ],

    'introducing-chatlify' => [
        'title'    => 'Introducing Chatlify: track sales and win repeat customers on WhatsApp',
        'date'     => '2026-11-10',
        'category' => 'Products',
        'image'    => 'images/news/chatlify-launch.webp',
        'seo_title'       => 'Introducing Chatlify: WhatsApp sales and retention',
        'seo_description' => 'Chatlify records the sales you confirm on WhatsApp, shows who buys and who has gone quiet, and follows up for you. Free 7-day trial, no card needed.',
        'excerpt'  => 'Chatlify, our new product for businesses that sell on WhatsApp, records every sale you confirm in chat, shows who buys and who has gone quiet, and follows up for you, from the number you already have.',
        'body'     => <<<'MD'
Cloudence has launched [Chatlify](https://chatlify.xyz), a product for businesses that sell on WhatsApp. It records every sale a business confirms in chat, shows who buys and who has gone quiet, and follows up with customers automatically. It also posts HD statuses, sends broadcasts and replies to customers day and night.

Chatlify links to the WhatsApp number a business already has, the same way WhatsApp Web does, as a linked device. There is no API approval, no template review and no fee per message, and the owner keeps chatting from their phone as normal.

**Sales tracking from the messages you already send.** Vendors already tell customers when a payment lands: "Payment of ₦18,500 received, thank you!" Chatlify learns each business's own wording and records every confirmation as a sale against the right customer, with no extra typing and no spreadsheet. The same amount confirmed twice within a few minutes is flagged rather than counted twice, anything unclear waits for the owner to check, and sales already in the chat history are picked up when the number is linked. The dashboard shows the month's revenue, buyers and repeat buyers. The figures come from the owner's messages, not their bank, and Chatlify keeps only the confirmation message for each sale, not an archive of chats.

**Turning first-time buyers into regulars.** Because every sale lands on a customer, Chatlify can group buyers with one tap: first-time, repeat, recent, lapsed and VIP. Automations can start the moment a payment is confirmed: send a thank-you, tag the customer, then wait up to 30 days for the next order and send a nudge if it does not come.

**Statuses seen by thousands.** A status posted from a phone reaches a few hundred contacts at best. Chatlify posts photos, videos, text and voice statuses in full quality to everyone who has saved the number, in batches, up to 50,000 contacts on the largest plan. Long videos are split into parts, statuses can be scheduled and repeated, and the owner sees who viewed and reacted.

**Automations, broadcasts and contacts.** Flows are built as connected steps on a canvas, started from a template, or described in plain words for the AI builder to draft. Broadcasts go to many groups or people one message at a time with random pauses, and anyone who replies STOP is opted out of everything. Every chat, saved contact and group member lands in one list, ready to tag, segment and export, and new chats can be saved to Google Contacts automatically.

**Built to keep the number safe.** Every number has daily limits of 150 DMs and 60 group posts, the same on every plan. New numbers warm up over two weeks, a ban-risk badge warns before sending gets risky, and a business whose number is banned within 7 days of its first payment can ask for that payment back.

**Pricing.** Every plan has every feature. Starter, Growth and Pro differ only in how many numbers can be linked, how far statuses reach and how many automations run at once. Payment is in naira, by card or bank transfer, monthly or yearly, with two months free on a yearly plan. The first 200 subscribers get launch prices, from ₦20,000 a month, kept for as long as they stay subscribed. Every account starts with a 7-day free trial, and no card is needed.

Chatlify is built for online vendors, food businesses, churches and communities, schools, wholesalers, salons and anyone else whose customers already message them on WhatsApp. Start a free trial at [chatlify.xyz](https://chatlify.xyz), read more on the [Chatlify product page](/products/chatlify), or [contact us](/contact) for help setting up automations for your business.

Chatlify is not affiliated with WhatsApp or Meta.
MD,
    ],

    'subeb-starlink-computer-hubs' => [
        'title'    => 'Cloudence completes Starlink installation in 10 Cross River schools for SUBEB',
        'date'     => '2026-10-31',
        'category' => 'Projects',
        'image'    => 'images/news/subeb-starlink-dish.jpg',
        'image_position' => 'center 15%',
        'gallery'  => [
            ['images/news/subeb-starlink-mount.jpg',   'Fixing a dish mount to the roof edge'],
            ['images/news/subeb-starlink-cabling.jpg', 'Running cable into a computer hub'],
            ['images/news/subeb-starlink-wiring.jpg',  'Connecting the line through the hub window'],
        ],
        'seo_title'       => 'Starlink installed in 10 Cross River schools',
        'seo_description' => 'Cloudence has installed Starlink internet in 10 Cross River schools for SUBEB under the 2025 UBEC/SUBEB Computer Hubs Intervention.',
        'excerpt'  => 'Cloudence has completed the installation of Starlink satellite internet in 10 schools across Cross River State, under a contract from the State Universal Basic Education Board (SUBEB) for the 2025 UBEC/SUBEB Computer Hubs Intervention.',
        'body'     => <<<'MD'
Cloudence has completed the installation of Starlink satellite internet in 10 schools across Cross River State, under a contract awarded by the Cross River State Universal Basic Education Board (SUBEB). The project is part of the 2025 UBEC/SUBEB Computer Hubs Intervention, under which selected schools receive computer hubs.

**Why Starlink.** A computer hub needs a dependable internet connection to be useful, and many schools outside the major towns are beyond the reach of fibre and reliable mobile data. Starlink connects over satellite, so a school in Obanliku or Bekwarra now gets the same service as one in Calabar.

**The work.** At each school, Cloudence engineers mounted the Starlink dish, ran cable into the computer hub and connected the hub to the internet.

**The schools.** The 10 schools span nine local government areas, from Calabar in the south to Obanliku in the north:

1. Army Day Secondary School, Eburutu Barracks (Calabar Municipal)
2. PCN Primary School, Eyamba Street, Duke Town (Calabar South)
3. Government Secondary School, Adiabo (Odukpani)
4. Creek Town Secondary School (Odukpani)
5. RCM Primary School, Begiagba, Bendi II (Obanliku)
6. St Paul's Primary School, Ovunum, Obubra (Obubra)
7. PCN Primary School, Nde II, Ikom (Ikom)
8. Federal Model Primary School, Anyikang, Alilan, Bekwarra (Bekwarra)
9. Lutheran Primary School, Ekumtak-Mbube (Ogoja)
10. PCN Primary School, Obioko Ijiman, Ugep (Yakurr)

The project adds to Cloudence's work with SUBEB and with schools and institutions across Cross River State, including our [CBT](/news/uee-cbt-examinations) and [school portal](/news/uee-akamkpa-school-portal) projects at the University of Education and Entrepreneurship, Akamkpa.

Schools and agencies planning connectivity or computer labs can [contact us](/contact) to discuss their requirements.
MD,
    ],

    'uee-cbt-examinations' => [
        'title'    => 'Cloudence deploys CBT software for student examinations at the University of Education and Entrepreneurship',
        'date'     => '2025-08-18',
        'category' => 'Projects',
        'image'    => 'images/news/uee-cbt-lab.jpg',
        'seo_title'       => 'UEE Akamkpa moves exams to CBT with Cloudence',
        'seo_description' => 'Cloudence has deployed computer-based testing (CBT) for student examinations at the University of Education and Entrepreneurship, Akamkpa.',
        'excerpt'  => 'Students of the University of Education and Entrepreneurship, Akamkpa, now sit their examinations on computer, using a computer-based testing (CBT) system deployed by Cloudence in the university\'s ICT centre.',
        'body'     => <<<'MD'
Cloudence has deployed computer-based testing (CBT) software for student examinations at the University of Education and Entrepreneurship (UEE), Akamkpa, Cross River State. Students now sit their examinations at workstations in the university's computer laboratory instead of on paper.

**How it works.** Each student signs in at a workstation with their own details and answers questions on screen within a set time. When the time runs out, the paper is submitted automatically. Objective questions are marked as soon as the paper is submitted, so results are ready for departments to review without days of manual marking and collation.

**Why it matters.** Paper examinations for large classes take time to print, invigilate, mark and record, and every step leaves room for error. CBT gives the university faster results, consistent marking and a clear record of who sat which paper and when.

**Set up for exam day.** Cloudence installed and configured the software across the laboratory's workstations, tested it under examination conditions with the university's ICT staff, and was on site to support the first examination sessions.

The deployment builds on our [school portal project](/news/uee-akamkpa-school-portal) with UEE's ICT Directorate earlier this year, and on our wider work with institutions across Cross River State and Nigeria.

Institutions planning to move examinations to computer can [contact us](/contact) to discuss their requirements.
MD,
    ],

    'uee-akamkpa-school-portal' => [
        'title'    => 'Cloudence partners with UEE ICT Directorate to deploy robust school portal',
        'date'     => '2025-06-14',
        'category' => 'Projects',
        'image'    => 'images/news/uee-portal.jpg',
        'seo_title'       => 'New UEE Akamkpa school portal by Cloudence',
        'seo_description' => 'Cloudence and UEE\'s ICT Directorate deployed a school portal for admissions, course registration, fees and results at uee-akamkpa.edu.ng.',
        'excerpt'  => 'Working with the ICT Directorate of the University of Education and Entrepreneurship, Akamkpa, Cloudence has deployed a new school portal for admissions, registration, fees and results at uee-akamkpa.edu.ng.',
        'body'     => <<<'MD'
Cloudence has partnered with the ICT Directorate of the University of Education and Entrepreneurship (UEE), Akamkpa, Cross River State, to design and deploy a new school portal for the institution. The portal is live at [www.uee-akamkpa.edu.ng](https://www.uee-akamkpa.edu.ng).

The portal brings the university's core student and academic processes into one place. Prospective students apply and check admission status online. Admitted students register courses, pay fees and print receipts, and view their results from any device. Lecturers upload scores, and the registry and bursary work from the same records rather than reconciling spreadsheets.

**Built with the Directorate, not just for it.** The ICT Directorate set the requirements, tested each release and now administers the portal day to day. Cloudence trained the Directorate's staff on administration and reporting, and remains on hand for support and further development.

**Built to hold up.** The system runs on infrastructure sized for peak periods such as registration and results release, with regular backups and role-based access so that each office sees only what it needs.

The deployment is part of Cloudence's wider work with institutions in Cross River State and across Nigeria, where we design, deploy and maintain the software and infrastructure that schools, agencies and businesses depend on.

Institutions planning a portal or campus system can [contact us](/contact) to discuss their requirements.
MD,
    ],

    'a-new-look-for-cloudence' => [
        'title'    => 'A new look for Cloudence',
        'date'     => '2026-10-30',
        'category' => 'Company',
        'image'    => null,
        'seo_description' => 'Cloudence has refreshed its brand with a redrawn wordmark, a new star mark, a single blue replacing the old orange and a lighter, clearer website.',
        'excerpt'  => 'We have refreshed our brand: a new wordmark, a new star mark and a lighter, clearer website.',
        'body'     => <<<'MD'
Cloudence has a new identity. The wordmark has been redrawn and is joined by a new star mark, and both now carry a single blue that replaces our old orange.

The website has been rebuilt around the same idea. Every service we offer, from enterprise software to CCTV and network installation, is now one click from the home page, and this news section is where we will share what the team is working on.

Nothing about how we work has changed. The same team still plans, builds and supports every project.
MD,
    ],

    'introducing-accountra' => [
        'title'    => 'Introducing Accountra: public-sector accounting and Treasury payments',
        'date'     => '2026-10-03',
        'category' => 'Products',
        'image'    => 'images/products/accountra/dashboard.webp',
        'seo_title'       => 'Introducing Accountra: public-sector accounting',
        'seo_description' => 'Accountra runs Treasury vouchers, votebook, cashbook, budget control and IPSAS cash-basis statements for ministries, agencies and councils.',
        'excerpt'  => 'Accountra keeps the books of a ministry, agency, tertiary institution or council: Treasury vouchers, votebook, cashbook, budget control, approvals and IPSAS cash-basis statements in one system.',
        'body'     => <<<'MD'
Accountra, our public-sector accounting platform, now has its own page on this site. It keeps the books of a ministry, agency, tertiary institution or local government council, following the Treasury payment cycle from the moment a voucher is raised to the moment cash leaves the bank.

**Why we built it.** The votebook, the cashbook and the advance ledger were designed for paper, and paper records what happened after it happened. By the time the votebook shows a vote is exhausted, the voucher has already been raised, approved and paid. Accountra checks the budget before the voucher exists, and refuses one that would exceed its line.

**What it does.** Officers raise T27 contractor vouchers, TF1 payment vouchers and staff advances, with PV numbers generated and amounts written out in words. VAT, withholding tax, stamp duty and admin charges are computed as the voucher is typed and gathered into schedules ready to remit. Each voucher passes through checked, audited and approved stages, with amount limits by role. Every cashbook entry posts a balanced cash-basis journal, so the trial balance and the IPSAS Statement of Receipts and Payments are available on any day of the year, not only at month end. Bank statements import from CSV or Excel and reconcile against the cashbook automatically.

Also included are revenue receipts, imprest, deposits, contracts and commitments, payroll with PAYE, pension, NHF and NHIS for organisations not on IPPIS, store vouchers and a tagged fixed asset register.

Accountra is built around Nigerian Treasury practice and adapts to ministries, agencies, tertiary institutions and councils. Read more and request a demo on the [Accountra page](/products/accountra).
MD,
    ],

    'introducing-e-memo' => [
        'title'    => 'Introducing E-Memo: the electronic memo registry',
        'date'     => '2026-10-01',
        'category' => 'Products',
        'image'    => 'images/products/e-memo/dashboard.webp',
        'seo_title'       => 'Introducing E-Memo: electronic memo registry',
        'seo_description' => 'E-Memo replaces paper memos in ministries and agencies: drafted on your letterhead, routed in order, numbered and traceable to every reader.',
        'excerpt'  => 'E-Memo replaces paper memos in ministries, agencies and institutions. Memos are drafted on your letterhead, routed through the proper offices in order, numbered at dispatch and traceable to every reader.',
        'body'     => <<<'MD'
E-Memo, our electronic memo registry, now has its own page on this site. It replaces paper memos inside ministries, agencies and institutions while keeping the formality of the registry intact.

**Why we built it.** A memo that travels by hand depends on who is at their desk. It waits in file trays, it gets lost, and when it finally arrives nobody can show who held it or what they wrote on it. E-Memo removes the waiting without removing the record.

**What it does.** Staff draft internal memos, external letters and circulars on the official letterhead, with the organisation's crest and structure. Each memo is routed through the chain of offices it must pass through, and every office acts strictly in order, forwarding it with a minute or returning it with a reason. A reference number is assigned at dispatch and never reused. Minutes, forwards and return reasons sit in one chronological thread, each with a name and a time, and every view, print and download is logged against a named reader.

Offices are separate from the people who hold them, so a substantive or acting holder can be appointed and the mailbox and history pass to the successor. Four handling levels run from Public to Secret: every reader has a personal tracking code watermarked across each copy they open, and Secret memos need a password and cannot be printed. An append-only audit trail records everything done in the portal.

E-Memo runs in the browser with nothing to install. Read more and request a demo on the [E-Memo page](/products/e-memo).
MD,
    ],

];
