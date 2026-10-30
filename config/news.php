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
|   'excerpt'  One or two sentences for cards and search results
|   'body'     Markdown
|   'seo_title' / 'seo_description'  Optional shorter versions for search results
|              (aim for under 60 and 155 characters)
*/

return [

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
