@extends('layouts.app')

@section('title', 'Cloudence — Empowering growth through smart technology')
@section('description', 'Cloudence builds enterprise software, networks and ICT infrastructure for businesses and government institutions across Nigeria. Offices in Abuja and Calabar.')

@php
  $wa     = config('site.whatsapp');
  $mail   = config('site.mail');
  $phone1 = config('site.phone1');
  $phone2 = config('site.phone2');
  $waBook = $wa . '?text=' . rawurlencode("Hello Cloudence, I'd like to book a consultation.");

  /* ────────────────────────────────────────────────────────────────
   | PLACEHOLDER CONTENT — replace with real figures, dates, quotes
   | and posts. Nothing below is verified; it is here so the sections
   | render. Everything else on this page is real Cloudence content.
   ──────────────────────────────────────────────────────────────── */

  // PLACEHOLDER: stat counters
  $stats = [
    ['value' => 8,   'suffix' => '+', 'label' => 'Years delivering ICT'],
    ['value' => 25,  'suffix' => '+', 'label' => 'Engineers & technicians'],
    ['value' => 40,  'suffix' => '+', 'label' => 'Projects delivered'],
    ['value' => 6,   'suffix' => '',  'label' => 'Industries served'],
  ];

  // PLACEHOLDER: testimonials — swap in real, approved quotes before launch
  $testimonials = [
    ['quote' => 'They scoped the work honestly, delivered to the timeline we agreed, and stayed on after handover. The system has run without drama since.', 'name' => 'Placeholder name', 'role' => 'Operations lead, financial services client'],
    ['quote' => 'What stood out was that one team handled the software and the infrastructure behind it. No finger-pointing between vendors when something needed fixing.', 'name' => 'Placeholder name', 'role' => 'Director of ICT, public institution'],
  ];

  // PLACEHOLDER: insights / blog posts
  $posts = [
    ['category' => 'Infrastructure', 'date' => '12 Aug 2025', 'title' => 'What structured cabling actually costs over ten years', 'excerpt' => 'Why the cheapest install is rarely the cheapest network once you count the callouts.'],
    ['category' => 'Government',     'date' => '28 Jul 2025', 'title' => 'Building software that survives a procurement audit', 'excerpt' => 'Documentation, scope control and the paperwork that keeps a public project on track.'],
    ['category' => 'Enterprise',     'date' => '04 Jul 2025', 'title' => 'When to replace off-the-shelf software — and when not to', 'excerpt' => 'A practical checklist for institutions weighing a custom build against another licence renewal.'],
  ];

  /* ──────────────── End of placeholder content ──────────────── */

  $clients = [
    ['uee-akamkpa.png',   'University of Education & Entrepreneurship, Akamkpa'],
    ['ncaa.png',          'Nigerian Civil Aviation Authority'],
    ['topratemfbank.png', 'Toprate Microfinance Bank'],
    ['billerhub.png',     'Billerhub'],
    ['bulwark.png',       'Bulwark Intelligence'],
    ['hskoncepts.png',    'HS Konceptz International'],
  ];

  // [number, icon, title, slug, description] — sourced from config/site.php
  $services = array_values(array_map(
    fn ($s, $i) => [sprintf('%02d', $i + 1), $s['icon'], $s['label'], $s['slug'], $s['description']],
    config('site.services'), array_keys(config('site.services'))
  ));

  $projects = [
    ['uee.png',           'University of Education & Entrepreneurship, Akamkpa', 'Portals and campus systems',     'Education'],
    ['topratepay.png',    'Toprate Pay',                                         'Consumer payments platform',     'Fintech'],
    ['billerhub.png',     'Billerhub',                                           'Bill payments and distribution', 'Digital payments'],
    ['toprate-bank.png',  'Toprate Microfinance Bank',                           'Banking systems and channels',   'Banking'],
    ['rechargefusion.png','Recharge Fusion',                                     'Airtime and data distribution',  'Digital payments'],
    ['ehs.png',           'Emmanuel Haulage Services',                           'Operations and fleet systems',   'Logistics & transport'],
  ];

  $industries = [
    ['account_balance',  'Government & public sector', 'government',         'Systems that satisfy procurement, reporting and audit, delivered to a fixed scope.'],
    ['school',           'Education',                  'education',          'Student records, portals and campus networks for universities and colleges.'],
    ['medical_services', 'Healthcare',                 'healthcare',         'Records, scheduling and facility infrastructure for clinics and hospitals.'],
    ['hotel',            'Hospitality',                'hospitality',        'Property networks, guest connectivity and surveillance across sites.'],
    ['podcasts',         'Media',                      'media',              'Platforms and infrastructure for broadcasters and publishers.'],
    ['payments',         'Financial services',         'financial-services', 'Payment platforms and core systems for banks and fintechs.'],
  ];

  $stack = [
    'Software'       => ['Laravel', 'PHP', 'Node.js', 'React', 'Vue', 'Tailwind CSS', 'PostgreSQL', 'MySQL'],
    'Mobile'         => ['Flutter', 'Kotlin', 'Swift', 'React Native', 'Firebase', 'REST & GraphQL'],
    'Infrastructure' => ['Cisco', 'MikroTik', 'Ubiquiti', 'Cat6 / fibre', 'VLAN & routing', 'Windows Server', 'Linux'],
    'Security'       => ['Hikvision', 'Dahua', 'Access control', 'NVR & remote access', 'Backup & recovery', 'Firewalls'],
  ];
@endphp

@section('content')

  <!-- ═══════════════ HERO ═══════════════ -->
  <section class="relative grain overflow-hidden pt-32 pb-20 lg:pt-36 lg:pb-24">
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-end">
        <div class="lg:col-span-7 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span>
            <span class="eyebrow">ICT solutions &nbsp;·&nbsp; Nigeria</span>
          </div>

          <h1 class="mt-7 text-[clamp(2.4rem,5.9vw,4.5rem)] leading-[1.02] tracking-tightest font-bold">
            Empowering growth through<br>
            <span class="serif-it font-normal text-[1.06em] text-accent">smart technology.</span>
          </h1>

          <p class="mt-7 max-w-lg text-[17px] leading-relaxed text-graphite">
            Cloudence designs, deploys and maintains the software and infrastructure that businesses
            and government institutions run on — from enterprise systems to the cabling behind them.
          </p>

          <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
            <a href="{{ $waBook }}" target="_blank" rel="noopener"
               class="group inline-flex items-center gap-2.5 text-[15px] font-semibold text-ivory bg-ink hover:bg-black pl-7 pr-6 py-4 rounded-full transition-all active:scale-[.98]">
              Book a consultation
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-1">arrow_forward</span>
            </a>
            <a href="{{ url('/work') }}" class="group inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
              <span class="link-underline">See our work</span>
              <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
            </a>
          </div>
        </div>

        <!-- Figure -->
        <div class="lg:col-span-5 reveal reveal-fade" style="transition-delay:.12s">
          @include('partials.hero-animation')
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ TRUSTED BY ═══════════════ -->
  <section class="border-t border-mist bg-paper/60 overflow-hidden">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10 py-12 lg:py-14">
      <div class="grid lg:grid-cols-12 gap-8 lg:gap-8 items-center">
        <div class="lg:col-span-3">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Trusted by</span>
          </div>
          <p class="mt-5 text-[14.5px] leading-relaxed text-graphite max-w-xs">
            Businesses, institutions and public bodies rely on us for the systems they run on.
          </p>
        </div>

        <div class="lg:col-span-9 lg:border-l lg:border-mist lg:pl-12 min-w-0">
          <div class="edge-fade overflow-hidden">
            <div class="flex w-max marquee items-center">
              @for ($i = 0; $i < 2; $i++)
                @foreach ($clients as $c)
                  <div class="shrink-0 w-[144px] sm:w-[165px] h-[42px] sm:h-[46px] mr-6 sm:mr-9 flex items-center justify-center"
                       @if ($i) aria-hidden="true" @endif>
                    <img src="{{ asset('images/clients/' . $c[0]) }}" alt="{{ $i ? '' : $c[1] }}" loading="lazy"
                         class="max-h-full max-w-full object-contain grayscale opacity-70 transition-all duration-500 hover:grayscale-0 hover:opacity-100">
                  </div>
                @endforeach
              @endfor
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ COMPANY ═══════════════ -->
  <section id="company" class="py-24 lg:py-32 bg-paper border-b border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12">
        <div class="lg:col-span-4 reveal lg:flex lg:flex-col lg:justify-between">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">The company</span>
          </div>
          <div class="hidden lg:block w-full max-w-[360px] mt-16">
            @include('partials.handshake')
          </div>
        </div>
        <div class="lg:col-span-8 reveal" style="transition-delay:.08s">
          <h2 class="text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold max-w-2xl">
            Your partner in digital <span class="serif-it font-normal text-[1.06em] text-accent">transformation.</span>
          </h2>
          <p class="mt-7 max-w-xl text-[16.5px] leading-relaxed text-graphite">
            We deliver innovative, reliable ICT solutions that let government and organisations scale with confidence.
            From infrastructure to enterprise software, we work closely with each client to understand
            what they actually need, then build technology around it — efficient, productive, and
            sustainable well past handover.
          </p>

          <a href="{{ url('/about') }}" class="group mt-8 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
            <span class="link-underline">More about Cloudence</span>
            <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
          </a>

          <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-4 gap-px bg-mist border border-mist rounded-2xl overflow-hidden">
            @foreach ([
              ['Innovation', 'Solutions designed for the problem in front of us, not last year\'s template.'],
              ['Reliability', 'Systems that hold up in production, with support that continues after launch.'],
              ['Transparency', 'Honest scope, honest pricing, and progress you can see rather than hear about.'],
              ['Partnership', 'One accountable team across software and infrastructure, for the long term.'],
            ] as $v)
              <div class="bg-paper px-7 py-8">
                <div class="text-[18px] font-bold tracking-tight">{{ $v[0] }}</div>
                <div class="mt-3 text-[13.5px] leading-relaxed text-graphite">{{ $v[1] }}</div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ STATS ═══════════════ -->
  <section class="py-20 lg:py-24 border-b border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal grid grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8 divide-mist lg:divide-x">
        @foreach ($stats as $s)
          <div class="lg:px-10 lg:first:pl-0">
            <div class="text-[clamp(2.6rem,5vw,3.75rem)] leading-none font-bold tracking-tightest">
              <span class="counter" data-target="{{ $s['value'] }}">0</span>{{ $s['suffix'] }}
            </div>
            <div class="mt-4 text-[13.5px] leading-relaxed text-graphite max-w-[10rem]">{{ $s['label'] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ SERVICES ═══════════════ -->
  <section id="services" class="py-24 lg:py-32 border-b border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-end reveal">
        <div class="lg:col-span-7">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">What we do</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Eight service lines. One <span class="serif-it font-normal text-[1.06em]">accountable team.</span>
          </h2>
        </div>
        <div class="lg:col-span-5 lg:pb-1.5">
          <p class="text-[15.5px] leading-relaxed text-graphite max-w-md">
            Most clients start with one engagement and keep us on for the rest. Everything below is
            delivered in-house, by the same people who planned it.
          </p>
          <a href="{{ url('/services') }}" class="group mt-6 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
            <span class="link-underline">View all services</span>
            <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
          </a>
        </div>
      </div>

      <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($services as $i => $s)
          @if ($i === 0)
            {{-- Featured: the flagship line --}}
            <a href="{{ url('/services/' . $s[3]) }}"
               class="reveal group relative md:col-span-2 flex flex-col rounded-[22px] bg-ink text-ivory p-8 lg:p-9 overflow-hidden transition-all duration-500 hover:shadow-[0_30px_70px_-40px_rgba(20,20,20,.6)]">
              <div class="pointer-events-none absolute -top-24 -right-16 w-72 h-72 rounded-full bg-accent/20 blur-3xl"></div>
              <div class="relative flex items-start justify-between">
                <span class="w-12 h-12 rounded-xl bg-accent flex items-center justify-center text-ivory">
                  <span class="material-symbols-outlined text-[22px]">{{ $s[1] }}</span>
                </span>
                <span class="eyebrow text-ivory/40">{{ $s[0] }}</span>
              </div>
              <h3 class="relative mt-7 text-[clamp(1.5rem,2.4vw,1.9rem)] leading-tight tracking-tightest font-bold max-w-md">{{ $s[2] }}</h3>
              <p class="relative mt-4 text-[15px] leading-relaxed text-ivory/65 max-w-lg flex-1">{{ $s[4] }}</p>
              <div class="relative mt-6 flex flex-wrap gap-2">
                @foreach (['Payments', 'Records', 'Billing', 'Reporting', 'Integrations'] as $chip)
                  <span class="text-[12px] font-semibold tracking-wide border border-ivory/15 rounded-full px-3 py-1.5 text-ivory/75">{{ $chip }}</span>
                @endforeach
              </div>
              <span class="relative mt-7 inline-flex items-center gap-2 text-[14px] font-semibold text-ivory">
                Learn more
                <span class="material-symbols-outlined text-[18px] text-accent transition-transform group-hover:translate-x-1">arrow_forward</span>
              </span>
            </a>
          @else
            <a href="{{ url('/services/' . $s[3]) }}"
               class="reveal group flex flex-col rounded-[22px] border border-mist bg-paper p-7 transition-all duration-500 hover:border-ink/25 hover:-translate-y-1 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
               style="transition-delay:{{ ($i % 3) * 0.06 }}s">
              <div class="flex items-start justify-between">
                <span class="w-11 h-11 rounded-xl bg-accent/10 flex items-center justify-center text-accent transition-colors group-hover:bg-accent group-hover:text-ivory">
                  <span class="material-symbols-outlined text-[21px]">{{ $s[1] }}</span>
                </span>
                <span class="eyebrow text-graphite/50">{{ $s[0] }}</span>
              </div>
              <h3 class="mt-7 text-[18px] leading-snug tracking-tight font-bold">{{ $s[2] }}</h3>
              <p class="mt-3 text-[14px] leading-relaxed text-graphite flex-1">{{ $s[4] }}</p>
              <span class="mt-7 inline-flex items-center gap-2 text-[13.5px] font-semibold text-ink">
                <span class="link-underline">Learn more</span>
                <span class="material-symbols-outlined text-[16px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
              </span>
            </a>
          @endif
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ WORK ═══════════════ -->
  <section id="work" class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
        <div class="max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Selected work</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Built, shipped, still <span class="serif-it font-normal text-[1.06em] text-accent">running.</span>
          </h2>
        </div>
        <div class="flex items-center justify-between lg:justify-end gap-6 shrink-0">
          <a href="{{ url('/work') }}" class="group inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
            <span class="link-underline">View all work</span>
            <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
          </a>
          <div class="flex items-center gap-2">
            <button type="button" id="workPrev" aria-label="Previous projects"
                    class="w-11 h-11 rounded-full border border-mist bg-paper flex items-center justify-center text-ink transition-all duration-300 hover:border-ink/40 hover:bg-ink hover:text-ivory disabled:opacity-30 disabled:cursor-not-allowed disabled:hover:bg-paper disabled:hover:text-ink disabled:hover:border-mist">
              <span class="material-symbols-outlined text-[20px]">arrow_back</span>
            </button>
            <button type="button" id="workNext" aria-label="Next projects"
                    class="w-11 h-11 rounded-full border border-mist bg-paper flex items-center justify-center text-ink transition-all duration-300 hover:border-ink/40 hover:bg-ink hover:text-ivory disabled:opacity-30 disabled:cursor-not-allowed disabled:hover:bg-paper disabled:hover:text-ink disabled:hover:border-mist">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </div>
      </div>

      <div class="mt-16 reveal">
        <div id="workTrack"
             class="flex overflow-x-auto no-scrollbar snap-x snap-mandatory scroll-smooth -mx-6 px-6 scroll-pl-6 lg:mx-0 lg:px-0 lg:scroll-pl-0 pb-1">
          @foreach ($projects as $i => $p)
            <article class="group shrink-0 snap-start w-[82%] sm:w-1/2 lg:w-1/3 bg-paper overflow-hidden">
              <a href="{{ url('/work') }}" class="block relative aspect-[16/10] overflow-hidden bg-ivory" aria-label="View {{ $p[1] }}">
                <img src="{{ asset('images/main/clients/' . $p[0]) }}" alt="{{ $p[1] }}" loading="lazy"
                     class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-[1.05]">
                <div class="absolute inset-0 bg-gradient-to-t from-ink/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              </a>
              <div class="px-7 pt-6 pb-7">
                <div class="eyebrow text-accent">{{ $p[3] }}</div>
                <h3 class="mt-3 text-[17px] font-bold tracking-tight leading-snug">{{ $p[1] }}</h3>
                <p class="mt-1.5 text-[13.5px] text-graphite">{{ $p[2] }}</p>
                <a href="{{ url('/work') }}" class="group/link mt-5 inline-flex items-center gap-2 text-[14px] font-semibold text-ink">
                  <span class="link-underline">View project</span>
                  <span class="material-symbols-outlined text-[18px] text-accent transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                </a>
              </div>
            </article>
          @endforeach
        </div>

        <div class="mt-8 relative h-px bg-mist overflow-hidden" aria-hidden="true">
          <span id="workProgress" class="absolute left-0 top-0 h-px bg-ink transition-transform duration-300 ease-out"></span>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ INDUSTRIES ═══════════════ -->
  <section id="industries" class="py-24 lg:py-32 bg-ink text-ivory relative grain overflow-hidden">
    <div class="pointer-events-none absolute -bottom-52 -left-20 w-[42rem] h-[42rem] rounded-full bg-accent/15 blur-3xl"></div>
    <div class="relative mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12">
        <div class="lg:col-span-5 reveal">
          <div class="flex items-center gap-3 text-ivory/50">
            <span class="w-9 h-px bg-ivory/25"></span><span class="eyebrow">Industries</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.08] tracking-tightest font-bold">
            We know the sector <span class="serif-it font-normal text-[1.06em]">you work in.</span>
          </h2>
          <p class="mt-7 text-[16px] leading-relaxed text-ivory/65 max-w-md">
            Procurement rules, audit requirements, uptime obligations — the constraints differ by
            sector, and they shape the solution more than the technology does.
          </p>
          <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
            <a href="{{ url('/industries') }}"
               class="group inline-flex items-center gap-2.5 text-[15px] font-semibold text-ink bg-ivory hover:bg-white pl-7 pr-6 py-4 rounded-full transition-all active:scale-[.98]">
              Explore industries
              <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-1">arrow_forward</span>
            </a>
            <a href="{{ url('/contact') }}" class="group inline-flex items-center gap-2 text-[15px] font-semibold text-ivory/80 hover:text-ivory transition-colors">
              <span class="link-underline">Discuss your project</span>
            </a>
          </div>
        </div>

        <div class="lg:col-span-7 lg:pl-8 reveal" style="transition-delay:.1s">
          <div class="grid sm:grid-cols-2 gap-x-12 gap-y-10">
            @foreach ($industries as $b)
              <a href="{{ url('/industries/' . $b[2]) }}" class="group border-t border-ivory/15 pt-6 block">
                <span class="material-symbols-outlined text-[24px] text-accent">{{ $b[0] }}</span>
                <h3 class="mt-4 text-[17px] font-bold tracking-tight flex items-center gap-2">
                  {{ $b[1] }}
                  <span class="material-symbols-outlined text-[16px] text-ivory/0 transition-all group-hover:text-ivory/70 group-hover:translate-x-0.5">arrow_forward</span>
                </h3>
                <p class="mt-2.5 text-[14.5px] leading-relaxed text-ivory/60">{{ $b[3] }}</p>
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ TECH STACK ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12">
        <div class="lg:col-span-5 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Our tech stack</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            The tools behind the <span class="serif-it font-normal text-[1.06em]">work.</span>
          </h2>
          <p class="mt-7 text-[16px] leading-relaxed text-graphite max-w-md">
            We pick technology for how well it fits the job and how easily your team can live with it
            afterwards — not for novelty.
          </p>
        </div>

        <div class="lg:col-span-7 reveal min-w-0" style="transition-delay:.1s">
          <div class="rounded-[25px] border border-mist bg-paper p-7 lg:p-9">
            <div class="flex gap-2 overflow-x-auto no-scrollbar border-b border-mist pb-5" role="tablist">
              @foreach (array_keys($stack) as $i => $group)
                <button type="button" role="tab" data-stack-tab="{{ $i }}"
                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        class="stack-tab shrink-0 px-5 py-2.5 rounded-full text-[13.5px] font-semibold transition-colors
                               {{ $i === 0 ? 'bg-ink text-ivory' : 'text-graphite hover:text-ink hover:bg-ink/[.04]' }}">
                  {{ $group }}
                </button>
              @endforeach
            </div>

            @foreach ($stack as $i => $items)
              <div data-stack-panel="{{ $loop->index }}" class="stack-panel pt-8 {{ $loop->index === 0 ? '' : 'hidden' }}">
                <div class="flex flex-wrap gap-2.5">
                  @foreach ($items as $t)
                    <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-ink border border-mist rounded-full px-4 py-2.5">
                      <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>{{ $t }}
                    </span>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ TESTIMONIALS ═══════════════ -->
  <section class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="reveal max-w-2xl">
        <div class="flex items-center gap-3 text-graphite">
          <span class="w-9 rule"></span><span class="eyebrow">Testimonials</span>
        </div>
        <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
          What partners say <span class="serif-it font-normal text-[1.06em] text-accent">about us.</span>
        </h2>
      </div>

      <div class="mt-16 grid lg:grid-cols-2 gap-5">
        @foreach ($testimonials as $i => $t)
          <figure class="reveal rounded-[22px] border border-mist bg-ivory p-8 lg:p-10 flex flex-col" style="transition-delay:{{ $i * 0.08 }}s">
            <span class="serif-it text-[3.5rem] leading-[0.6] text-accent">&ldquo;</span>
            <blockquote class="mt-6 text-[18px] lg:text-[19px] leading-relaxed tracking-tight text-ink">
              {{ $t['quote'] }}
            </blockquote>
            <figcaption class="mt-8 pt-6 border-t border-mist">
              <div class="text-[15px] font-bold tracking-tight">{{ $t['name'] }}</div>
              <div class="mt-1 text-[13.5px] text-graphite">{{ $t['role'] }}</div>
            </figcaption>
          </figure>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ INSIGHTS ═══════════════ -->
  <section class="py-24 lg:py-32">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 reveal">
        <div class="max-w-2xl">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Insights</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Blog
          </h2>
        </div>
        <a href="{{ url('/insights') }}" class="group shrink-0 inline-flex items-center gap-2 text-[15px] font-semibold text-ink">
          <span class="link-underline">All insights</span>
          <span class="material-symbols-outlined text-[18px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
        </a>
      </div>

      <div class="mt-16 grid md:grid-cols-3 gap-5">
        @foreach ($posts as $i => $p)
          <a href="{{ url('/insights') }}"
             class="reveal group rounded-[22px] border border-mist bg-paper p-8 flex flex-col transition-all duration-500 hover:border-ink/25 hover:shadow-[0_30px_70px_-45px_rgba(20,20,20,.45)]"
             style="transition-delay:{{ $i * 0.07 }}s">
            <div class="flex items-center gap-3 text-[11px]">
              <span class="eyebrow text-accent">{{ $p['category'] }}</span>
              <span class="w-1 h-1 rounded-full bg-mist"></span>
              <span class="text-graphite">{{ $p['date'] }}</span>
            </div>
            <h3 class="mt-6 text-[19px] leading-snug font-bold tracking-tight">{{ $p['title'] }}</h3>
            <p class="mt-3 text-[14.5px] leading-relaxed text-graphite">{{ $p['excerpt'] }}</p>
            <span class="mt-7 inline-flex items-center gap-2 text-[13.5px] font-semibold text-ink">
              <span class="link-underline">Read article</span>
              <span class="material-symbols-outlined text-[16px] text-graphite transition-transform group-hover:translate-x-1">arrow_forward</span>
            </span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════ CONTACT & OFFICES ═══════════════ -->
  <section id="contact" class="py-24 lg:py-32 bg-paper border-y border-mist">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-10">
      <div class="grid lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-6 reveal">
          <div class="flex items-center gap-3 text-graphite">
            <span class="w-9 rule"></span><span class="eyebrow">Let's partner</span>
          </div>
          <h2 class="mt-7 text-[clamp(1.9rem,3.6vw,3rem)] leading-[1.1] tracking-tightest font-bold">
            Ready to build something <span class="serif-it font-normal text-[1.06em]">that lasts?</span>
          </h2>
          <p class="mt-7 max-w-lg text-[16px] leading-relaxed text-graphite">
            Tell us what you are trying to solve. We will come back with an honest view of scope,
            timeline and cost — including when the answer is that you don't need us.
          </p>

          <form id="briefForm" class="mt-10 max-w-lg">
            <label for="brief" class="eyebrow text-graphite">In one line, what do you need?</label>
            <div class="mt-3 flex flex-col sm:flex-row gap-3">
              <input id="brief" name="brief" type="text" required placeholder="e.g. campus network for 400 users"
                     class="flex-1 h-14 px-5 rounded-full bg-ivory border border-mist text-[15px] placeholder:text-graphite/50 focus:border-ink focus:ring-0 outline-none transition-colors">
              <button type="submit"
                      class="h-14 shrink-0 inline-flex items-center justify-center gap-2 px-7 rounded-full text-[14.5px] font-semibold text-ivory bg-ink hover:bg-black transition-all active:scale-[.98]">
                Book a consultation
                <span class="material-symbols-outlined text-[17px]">arrow_forward</span>
              </button>
            </div>
            <p class="mt-3 text-[12.5px] text-graphite">
              Opens WhatsApp with your brief ready to send, or
              <a href="{{ url('/contact') }}" class="link-underline font-semibold text-ink">use the full contact form</a>.
            </p>
          </form>
        </div>

        <div class="lg:col-span-6 reveal" style="transition-delay:.1s">
          <div class="rounded-[25px] border border-mist bg-ivory p-8 lg:p-10">
            <div class="eyebrow text-graphite">Visit our offices</div>
            <div class="mt-7 grid sm:grid-cols-2 gap-7">
              @foreach (config('site.offices') as $o)
                <div>
                  <div class="flex items-center gap-2 text-accent">
                    <span class="material-symbols-outlined text-[18px]">location_on</span>
                    <span class="text-[15px] font-bold tracking-tight text-ink">{{ $o['city'] }}</span>
                  </div>
                  <p class="mt-2 text-[14px] leading-relaxed text-graphite">{{ $o['address'] }}</p>
                  <a href="tel:{{ str_replace(' ', '', $o['phone']) }}" class="mt-2 inline-block link-underline text-[13.5px] font-semibold">{{ $o['phone'] }}</a>
                </div>
              @endforeach
            </div>

            <div class="mt-9 pt-7 border-t border-mist space-y-5">
              <div class="flex items-start gap-4">
                <span class="w-11 h-11 shrink-0 rounded-full border border-mist flex items-center justify-center text-ink/70">
                  <span class="material-symbols-outlined text-[20px]">call</span>
                </span>
                <div>
                  <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="link-underline text-[16px] font-semibold tracking-tight">{{ $phone1 }}</a>
                  <div class="mt-1"><a href="tel:{{ str_replace(' ', '', $phone2) }}" class="link-underline text-[14px] text-graphite">{{ $phone2 }}</a></div>
                </div>
              </div>
              <div class="flex items-start gap-4">
                <span class="w-11 h-11 shrink-0 rounded-full border border-mist flex items-center justify-center text-ink/70">
                  <span class="material-symbols-outlined text-[20px]">mail</span>
                </span>
                <div>
                  <a href="mailto:{{ $mail }}" class="link-underline text-[16px] font-semibold tracking-tight">{{ $mail }}</a>
                  <div class="mt-1 text-[13.5px] text-graphite">We reply within one working day</div>
                </div>
              </div>
            </div>

            <div class="mt-9 pt-7 border-t border-mist">
              <a href="{{ $wa }}" target="_blank" rel="noopener"
                 class="inline-flex items-center gap-2 text-[13.5px] font-semibold border border-mist rounded-full px-5 py-3 hover:border-ink transition-colors">
                <svg class="w-4 h-4 fill-[#25D366]" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                Message us on WhatsApp
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════ CLOSING CTA ═══════════════ -->
  <section class="py-28 lg:py-36 text-center relative grain overflow-hidden">
    <div class="relative mx-auto max-w-[900px] px-6 reveal">
      <div class="eyebrow text-graphite">Ready when you are</div>
      <h2 class="mt-7 text-[clamp(2.2rem,5.6vw,4rem)] leading-[1.03] tracking-tightest font-bold">
        Let's create impactful solutions <span class="serif-it font-normal text-[1.06em]">together.</span>
      </h2>
      <div class="mt-11 flex flex-wrap items-center justify-center gap-4">
        <a href="{{ $waBook }}" target="_blank" rel="noopener"
           class="group inline-flex items-center gap-2.5 text-[15px] font-semibold text-ivory bg-ink hover:bg-black pl-8 pr-7 py-4 rounded-full transition-all active:scale-[.98]">
          Book a consultation
          <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-1">arrow_forward</span>
        </a>
        <a href="mailto:{{ $mail }}"
           class="inline-flex items-center gap-2.5 text-[15px] font-semibold text-ink border border-mist hover:border-ink px-7 py-4 rounded-full transition-colors">
          <span class="material-symbols-outlined text-[18px]">mail</span>
          {{ $mail }}
        </a>
      </div>
    </div>
  </section>

@endsection

@push('styles')
<style>
  /* Hero diagram — enterprise dashboard */
  #heroDiagram { opacity: .62; }
  #heroDiagram text { font-family: 'Outfit', 'Satoshi', ui-sans-serif, system-ui, sans-serif; }

  #heroDiagram .tile { animation: dashTile 7s ease-in-out infinite; }
  @keyframes dashTile {
    0%       { opacity: 0; transform: translateY(6px); }
    10%, 86% { opacity: 1; transform: translateY(0); }
    97%, 100% { opacity: 0; transform: translateY(0); }
  }

  #heroDiagram .spark {
    stroke-dasharray: 96; stroke-dashoffset: 96;
    animation: dashDraw 7s cubic-bezier(.16,1,.3,1) infinite;
  }
  @keyframes dashDraw {
    0%, 12%  { stroke-dashoffset: 96; }
    40%, 86% { stroke-dashoffset: 0; }
    100%     { stroke-dashoffset: 96; }
  }

  #heroDiagram .bar {
    transform-box: fill-box; transform-origin: bottom;
    animation-name: dashBar; animation-timing-function: cubic-bezier(.16,1,.3,1);
    animation-iteration-count: infinite;
  }
  @keyframes dashBar {
    0%, 100% { transform: scaleY(.55); }
    50%      { transform: scaleY(1); }
  }

  #heroDiagram .ring { animation: dashRing 7s cubic-bezier(.16,1,.3,1) infinite; }
  @keyframes dashRing {
    0%, 14%  { stroke-dashoffset: 169.6; }
    52%, 86% { stroke-dashoffset: 46; }
    100%     { stroke-dashoffset: 169.6; }
  }

  #heroDiagram .row { animation: dashRow 7s ease-in-out infinite; }
  @keyframes dashRow {
    0%, 32%   { opacity: 0; transform: translateX(-8px); }
    46%, 86%  { opacity: 1; transform: translateX(0); }
    97%, 100% { opacity: 0; transform: translateX(0); }
  }

  #heroDiagram .pill-live { animation: dashPill 7s ease-in-out infinite; }
  @keyframes dashPill {
    0%, 62%  { fill: #141414; fill-opacity: .10; }
    70%, 86% { fill: #F39A62; fill-opacity: .7; }
    100%     { fill: #F39A62; fill-opacity: .7; }
  }

  #heroDiagram .live-dot { animation: dashDot 2s ease-in-out infinite; }
  @keyframes dashDot {
    0%, 100% { opacity: .25; }
    50%      { opacity: 1; }
  }

  @media (prefers-reduced-motion: reduce) {
    #heroDiagram .tile, #heroDiagram .spark, #heroDiagram .bar,
    #heroDiagram .ring, #heroDiagram .row, #heroDiagram .pill-live,
    #heroDiagram .live-dot { animation: none; }
    #heroDiagram .spark { stroke-dashoffset: 0; }
    #heroDiagram .ring { stroke-dashoffset: 46; }
  }
</style>
@endpush

@push('scripts')
<script>
  // Latest projects carousel
  (function () {
    var track = document.getElementById('workTrack'),
        prev  = document.getElementById('workPrev'),
        next  = document.getElementById('workNext'),
        bar   = document.getElementById('workProgress');
    if (!track || !prev || !next) return;

    function step() {
      var card = track.querySelector('article');
      var gap = parseFloat(getComputedStyle(track).columnGap);
      if (isNaN(gap)) gap = 0;
      return card ? card.getBoundingClientRect().width + gap : track.clientWidth;
    }

    function update() {
      var max = track.scrollWidth - track.clientWidth;
      prev.disabled = track.scrollLeft <= 2;
      next.disabled = track.scrollLeft >= max - 2;
      if (bar) {
        var ratio = max > 0 ? track.clientWidth / track.scrollWidth : 1;
        bar.style.width = (ratio * 100) + '%';
        bar.style.transform = 'translateX(' + (max > 0 ? (track.scrollLeft / max) * (100 / ratio - 100) : 0) + '%)';
      }
    }

    prev.addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: 'smooth' }); });
    next.addEventListener('click', function () { track.scrollBy({ left:  step(), behavior: 'smooth' }); });
    track.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
  })();

  // Brief → WhatsApp with the request prefilled
  (function () {
    var form = document.getElementById('briefForm');
    if (!form) return;
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var brief = document.getElementById('brief').value.trim();
      if (!brief) return;
      var text = encodeURIComponent('Hello Cloudence, I would like a consultation about: ' + brief);
      window.open('{{ $wa }}?text=' + text, '_blank', 'noopener');
    });
  })();

  // Hero dashboard: count the KPI figures up on each loop
  (function () {
    var svg = document.getElementById('heroDiagram');
    if (!svg) return;
    var nums = svg.querySelectorAll('[data-count]');
    if (!nums.length) return;

    function paint(el, value) {
      el.textContent = value.toLocaleString('en-US') + (el.getAttribute('data-suffix') || '');
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      nums.forEach(function (el) { paint(el, parseInt(el.getAttribute('data-count'), 10) || 0); });
      return;
    }

    function run() {
      nums.forEach(function (el, i) {
        var target = parseInt(el.getAttribute('data-count'), 10) || 0;
        var start = null, duration = 1600;
        setTimeout(function () {
          requestAnimationFrame(function step(now) {
            if (!start) start = now;
            var p = Math.min((now - start) / duration, 1);
            paint(el, Math.round(target * (1 - Math.pow(1 - p, 3))));
            if (p < 1) requestAnimationFrame(step);
          });
        }, 500 + i * 220);
      });
    }

    // Drive the count from the CSS loop itself so figures and tiles never drift apart
    var firstTile = svg.querySelector('.tile');
    if (firstTile) firstTile.addEventListener('animationiteration', run);
    run();
  })();

  // Tech stack tabs
  (function () {
    var tabs = document.querySelectorAll('.stack-tab');
    var panels = document.querySelectorAll('.stack-panel');
    if (!tabs.length) return;
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var index = tab.getAttribute('data-stack-tab');
        tabs.forEach(function (t) {
          var on = t === tab;
          t.setAttribute('aria-selected', on ? 'true' : 'false');
          t.classList.toggle('bg-ink', on);
          t.classList.toggle('text-ivory', on);
          t.classList.toggle('text-graphite', !on);
          t.classList.toggle('hover:text-ink', !on);
          t.classList.toggle('hover:bg-ink/[.04]', !on);
        });
        panels.forEach(function (p) {
          p.classList.toggle('hidden', p.getAttribute('data-stack-panel') !== index);
        });
      });
    });
  })();
</script>
@endpush
