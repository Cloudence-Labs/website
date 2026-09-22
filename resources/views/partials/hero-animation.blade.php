{{-- Hero figure: an enterprise dashboard assembling itself (inline SVG, no binary asset). --}}
@php
  // Sample figures for the illustrated UI — not claims, swap freely.
  $tiles = [
    ['label' => 38, 'count' => 1284, 'suffix' => '',  'accent' => true],
    ['label' => 30, 'count' => 312,  'suffix' => '',  'accent' => false],
    ['label' => 34, 'count' => 98,   'suffix' => '%', 'accent' => false],
  ];
  $bars = [46, 62, 38, 74, 55, 86, 68];
@endphp

<div class="hero-figure relative lg:h-[400px] xl:h-[440px] lg:overflow-hidden">
  <svg id="heroDiagram" class="w-full h-auto lg:w-auto lg:h-[500px] xl:h-[560px] lg:max-w-none" viewBox="0 0 460 380" fill="none"
       xmlns="http://www.w3.org/2000/svg"
       role="img" aria-label="Animated illustration of an enterprise dashboard building itself: figures counting up, a chart growing and records posting.">

    <!-- ── Window frame ── -->
    <rect x="10" y="10" width="440" height="360" rx="16" stroke="#141414" stroke-opacity=".16" stroke-width="1.1"/>
    <path d="M11,46 H449" stroke="#141414" stroke-opacity=".12" stroke-width="0.9"/>
    <path d="M118,46 V369" stroke="#141414" stroke-opacity=".10" stroke-width="0.9"/>
    <circle cx="30" cy="28" r="4" fill="#F39A62" fill-opacity=".55"/>
    <circle cx="44" cy="28" r="4" fill="#141414" fill-opacity=".12"/>
    <circle cx="58" cy="28" r="4" fill="#141414" fill-opacity=".12"/>
    <rect x="170" y="20" width="140" height="16" rx="8" stroke="#141414" stroke-opacity=".12" stroke-width="0.9"/>

    <!-- ── Sidebar ── -->
    @for ($i = 0; $i < 6; $i++)
      @php $y = 68 + $i * 26; @endphp
      <rect x="28" y="{{ $y }}" width="11" height="11" rx="3"
            fill="{{ $i === 0 ? '#F39A62' : '#141414' }}" fill-opacity="{{ $i === 0 ? '.85' : '.16' }}"/>
      <rect x="47" y="{{ $y + 3 }}" width="{{ [56, 44, 62, 38, 50, 46][$i] }}" height="6" rx="3"
            fill="{{ $i === 0 ? '#F39A62' : '#141414' }}" fill-opacity="{{ $i === 0 ? '.5' : '.12' }}"/>
    @endfor
    <circle cx="35" cy="344" r="8" stroke="#141414" stroke-opacity=".16" stroke-width="0.9"/>
    <rect x="50" y="341" width="46" height="6" rx="3" fill="#141414" fill-opacity=".12"/>

    <!-- ── Page header ── -->
    <rect x="134" y="62" width="112" height="11" rx="3" fill="#141414" fill-opacity=".24"/>
    <rect x="134" y="81" width="74" height="6" rx="3" fill="#141414" fill-opacity=".12"/>
    <g>
      <rect x="372" y="61" width="66" height="22" rx="11" stroke="#F39A62" stroke-opacity=".35" stroke-width="0.9"/>
      <circle class="live-dot" cx="386" cy="72" r="3.6" fill="#F39A62"/>
      <rect x="396" y="69" width="30" height="5" rx="2.5" fill="#F39A62" fill-opacity=".45"/>
    </g>

    <!-- ── KPI tiles ── -->
    @foreach ($tiles as $i => $t)
      @php $x = 134 + $i * 103; @endphp
      <g class="tile" style="animation-delay:{{ $i * 0.18 }}s">
        <rect x="{{ $x }}" y="104" width="98" height="62" rx="9" stroke="#141414" stroke-opacity=".14" stroke-width="1.1"/>
        <rect x="{{ $x + 13 }}" y="117" width="{{ $t['label'] }}" height="5" rx="2.5" fill="#141414" fill-opacity=".18"/>
        <text x="{{ $x + 13 }}" y="144" font-family="Outfit, Satoshi, ui-sans-serif, system-ui, sans-serif" font-size="18" font-weight="100" letter-spacing="0"
              fill="#141414" fill-opacity=".72" data-count="{{ $t['count'] }}" data-suffix="{{ $t['suffix'] }}">0{{ $t['suffix'] }}</text>
        <path class="spark" d="M{{ $x + 13 }},156 l14,-7 l13,5 l14,-10 l15,4 l13,-9"
              stroke="{{ $t['accent'] ? '#F39A62' : '#141414' }}" stroke-opacity="{{ $t['accent'] ? '.8' : '.2' }}"
              stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round"
              style="animation-delay:{{ $i * 0.3 }}s"/>
      </g>
    @endforeach

    <!-- ── Chart ── -->
    <g>
      <rect x="134" y="178" width="198" height="110" rx="9" stroke="#141414" stroke-opacity=".14" stroke-width="1.1"/>
      <rect x="148" y="192" width="44" height="5" rx="2.5" fill="#141414" fill-opacity=".18"/>
      <path d="M146,274 H320" stroke="#141414" stroke-opacity=".12" stroke-width="0.9"/>
      @foreach ($bars as $i => $h)
        <rect class="bar" x="{{ 150 + $i * 24 }}" y="{{ 272 - $h }}" width="14" height="{{ $h }}" rx="3"
              fill="{{ $i === 5 ? '#F39A62' : '#141414' }}" fill-opacity="{{ $i === 5 ? '.8' : '.14' }}"
              style="animation-delay:{{ $i * 0.12 }}s; animation-duration:{{ 3.4 + ($i % 3) * 0.6 }}s"/>
      @endforeach
    </g>

    <!-- ── Completion ring ── -->
    <g>
      <rect x="340" y="178" width="98" height="110" rx="9" stroke="#141414" stroke-opacity=".14" stroke-width="1.1"/>
      <g transform="rotate(-90 389 222)">
        <circle cx="389" cy="222" r="27" stroke="#141414" stroke-opacity=".10" stroke-width="6"/>
        <circle class="ring" cx="389" cy="222" r="27" stroke="#F39A62" stroke-width="6" stroke-linecap="round"
                stroke-dasharray="169.6" stroke-dashoffset="169.6"/>
      </g>
      <rect x="360" y="262" width="58" height="5" rx="2.5" fill="#141414" fill-opacity=".16"/>
      <rect x="371" y="274" width="36" height="5" rx="2.5" fill="#141414" fill-opacity=".10"/>
    </g>

    <!-- ── Records posting ── -->
    <path d="M134,298 H438" stroke="#141414" stroke-opacity=".08" stroke-width="0.9"/>
    @for ($i = 0; $i < 3; $i++)
      @php $y = 308 + $i * 22; @endphp
      <g class="row" style="animation-delay:{{ $i * 0.45 }}s">
        <rect x="136" y="{{ $y }}" width="12" height="12" rx="3.5" fill="#141414" fill-opacity=".14"/>
        <rect x="158" y="{{ $y + 3 }}" width="{{ [104, 82, 94][$i] }}" height="6" rx="3" fill="#141414" fill-opacity=".18"/>
        <rect x="286" y="{{ $y + 3 }}" width="44" height="6" rx="3" fill="#141414" fill-opacity=".10"/>
        <rect class="{{ $i === 2 ? 'pill-live' : '' }}" x="384" y="{{ $y - 1 }}" width="50" height="16" rx="8"
              fill="{{ $i === 2 ? '#F39A62' : '#141414' }}" fill-opacity="{{ $i === 2 ? '.75' : '.10' }}"/>
      </g>
    @endfor
  </svg>
</div>
