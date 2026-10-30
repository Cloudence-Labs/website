{{--
  Line illustration for a service card or a method step: ink strokes, white surfaces,
  one solid ink accent. Params: $scene (service slug or step key), $bg (panel colour, used to mask).
--}}
@php
  $ink  = '#141416';
  $bg   = $bg ?? '#ffffff';
  $line = 'fill="none" stroke="' . $ink . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';
  $card = 'fill="#ffffff" stroke="' . $ink . '" stroke-width="2" stroke-linejoin="round"';
  $mask = 'fill="' . $bg . '" stroke="' . $ink . '" stroke-width="2" stroke-linejoin="round"';
  $wide = in_array($scene, ['listen', 'scope', 'team', 'stay']);
@endphp
<svg viewBox="0 0 {{ $wide ? '320 240' : '240 200' }}" class="v2-scene" role="img" aria-hidden="true">
  @switch($scene)

    @case('enterprise-software')
      <rect x="34" y="34" width="122" height="88" rx="10" {!! $mask !!}/>
      <path d="M34 52h122M48 70h40M48 84h60" {!! $line !!}/>
      <rect x="84" y="72" width="122" height="94" rx="10" {!! $card !!}/>
      <path d="M84 90h122" {!! $line !!}/>
      <circle cx="96" cy="81" r="2.5" fill="{{ $ink }}"/>
      <path d="M100 150h90" {!! $line !!}/>
      <rect x="106" y="124" width="12" height="20" rx="2" {!! $line !!}/>
      <rect x="126" y="112" width="12" height="32" rx="2" {!! $line !!}/>
      <rect x="146" y="118" width="12" height="26" rx="2" {!! $line !!}/>
      <rect x="166" y="102" width="12" height="42" rx="2" fill="{{ $ink }}"/>
      @break

    @case('web-development')
      <rect x="26" y="32" width="188" height="136" rx="12" {!! $card !!}/>
      <path d="M26 52h188" {!! $line !!}/>
      <circle cx="40" cy="42" r="2.5" fill="{{ $ink }}"/><circle cx="50" cy="42" r="2.5" {!! $line !!}/><circle cx="60" cy="42" r="2.5" {!! $line !!}/>
      <rect x="42" y="68" width="68" height="9" rx="4.5" fill="{{ $ink }}"/>
      <path d="M42 90h56M42 101h44" {!! $line !!}/>
      <rect x="126" y="66" width="72" height="44" rx="7" {!! $mask !!}/>
      <rect x="42" y="124" width="46" height="28" rx="6" {!! $line !!}/><rect x="97" y="124" width="46" height="28" rx="6" {!! $line !!}/><rect x="152" y="124" width="46" height="28" rx="6" {!! $line !!}/>
      @break

    @case('mobile-development')
      <rect x="38" y="44" width="112" height="132" rx="12" {!! $mask !!}/>
      <path d="M52 64h56M52 78h40M52 92h48" {!! $line !!}/>
      <rect x="122" y="26" width="72" height="144" rx="15" {!! $card !!}/>
      <path d="M150 38h16" {!! $line !!}/>
      <rect x="133" y="52" width="50" height="34" rx="7" {!! $mask !!}/>
      <path d="M133 100h40M133 112h28" {!! $line !!}/>
      <rect x="133" y="140" width="50" height="14" rx="7" fill="{{ $ink }}"/>
      @break

    @case('cctv-installation')
      <path d="M220 20v44M220 38h-30v14" {!! $line !!}/>
      <g transform="rotate(22 160 66)">
        <rect x="122" y="50" width="78" height="32" rx="9" {!! $card !!}/>
        <rect x="108" y="56" width="16" height="20" rx="4" {!! $card !!}/>
        <circle cx="186" cy="66" r="3" fill="{{ $ink }}"/>
      </g>
      <path d="M110 86L74 112M124 98l-14 14" {!! $line !!} stroke-dasharray="2 6"/>
      <rect x="26" y="112" width="112" height="66" rx="9" {!! $card !!}/>
      <path d="M76 132v26l20-13z" fill="{{ $ink }}"/>
      <circle cx="40" cy="125" r="3.5" fill="{{ $ink }}"/>
      @break

    @case('network-implementation')
      <path d="M50 48L104 92M190 48l-54 44M50 156l54-44M190 156l-54-44" {!! $line !!}/>
      @foreach ([[50, 48], [190, 48], [50, 156], [190, 156]] as [$x, $y])
        <circle cx="{{ $x }}" cy="{{ $y }}" r="17" {!! $card !!}/><circle cx="{{ $x }}" cy="{{ $y }}" r="4" fill="{{ $ink }}"/>
      @endforeach
      <rect x="88" y="84" width="64" height="36" rx="9" fill="{{ $ink }}"/>
      <circle cx="106" cy="102" r="3" fill="#fff"/><circle cx="120" cy="102" r="3" fill="#fff"/><circle cx="134" cy="102" r="3" fill="#fff"/>
      @break

    @case('installation-supplies')
      <g transform="translate(0 -14)">
      <rect x="30" y="106" width="86" height="66" rx="6" {!! $card !!}/>
      <path d="M30 126h86M73 106v20" {!! $line !!}/>
      <rect x="116" y="120" width="88" height="52" rx="6" {!! $mask !!}/>
      <path d="M116 138h88M160 120v18" {!! $line !!}/>
      <rect x="56" y="58" width="72" height="48" rx="6" {!! $mask !!}/>
      <path d="M56 76h72M92 58v18" {!! $line !!}/>
      <rect x="42" y="140" width="40" height="20" rx="4" fill="{{ $ink }}"/>
      <path d="M50 150h24" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
      </g>
      @break

    @case('training')
      <rect x="44" y="30" width="152" height="102" rx="9" {!! $card !!}/>
      <path d="M64 112l28-26 22 14 30-34 30 18" {!! $line !!}/>
      <circle cx="174" cy="84" r="5" fill="{{ $ink }}"/>
      <path d="M64 50h44" {!! $line !!}/>
      <path d="M90 132l-18 44M150 132l18 44M120 132v44" {!! $line !!}/>
      @break

    {{-- Method steps (wide stage) --}}
    @case('listen')
      <rect x="36" y="44" width="168" height="98" rx="16" {!! $card !!}/>
      <path d="M70 142l-6 26 30-26" {!! $card !!}/>
      <path d="M60 78h104M60 96h120M60 114h72" {!! $line !!}/>
      <rect x="166" y="128" width="120" height="66" rx="16" {!! $mask !!}/>
      <path d="M262 194l6 20-26-20" {!! $mask !!}/>
      <circle cx="202" cy="161" r="5" fill="{{ $ink }}"/><circle cx="226" cy="161" r="5" fill="{{ $ink }}"/><circle cx="250" cy="161" r="5" fill="{{ $ink }}"/>
      @break

    @case('scope')
      <rect x="60" y="36" width="140" height="176" rx="12" {!! $card !!}/>
      <rect x="102" y="26" width="56" height="22" rx="7" fill="{{ $ink }}"/>
      <path d="M82 84l7 7 13-14M118 84h60M82 122l7 7 13-14M118 122h60M82 160h20M118 160h44" {!! $line !!}/>
      <rect x="182" y="124" width="96" height="88" rx="12" {!! $mask !!}/>
      <path d="M182 148h96M206 116v16M254 116v16" {!! $line !!}/>
      @foreach ([[200, 166], [222, 166], [244, 166], [200, 188], [222, 188]] as [$x, $y])
        <rect x="{{ $x }}" y="{{ $y }}" width="12" height="10" rx="2" {!! $line !!}/>
      @endforeach
      <rect x="244" y="188" width="12" height="10" rx="2" fill="{{ $ink }}"/>
      @break

    @case('team')
      @foreach ([[96, 118, false], [224, 118, false], [160, 104, true]] as [$x, $y, $lead])
        <circle cx="{{ $x }}" cy="{{ $y }}" r="{{ $lead ? 26 : 21 }}" {!! $lead ? $card : $mask !!}/>
        <path d="M{{ $x - ($lead ? 50 : 40) }} {{ $lead ? 196 : 190 }}a{{ $lead ? 50 : 40 }} {{ $lead ? 48 : 40 }} 0 0 1 {{ $lead ? 100 : 80 }} 0z" {!! $lead ? $card : $mask !!}/>
      @endforeach
      @break

    @case('stay')
      <path d="M160 32l66 24v52c0 46-30 76-66 92-36-16-66-46-66-92V56z" {!! $card !!}/>
      <path d="M130 116l20 20 40-42" fill="none" stroke="{{ $ink }}" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
      <rect x="236" y="62" width="58" height="40" rx="10" {!! $mask !!}/><path d="M248 78h34M248 88h22" {!! $line !!}/>
      <rect x="26" y="140" width="58" height="40" rx="10" {!! $mask !!}/><path d="M38 156h34M38 166h22" {!! $line !!}/>
      @break

    @default
      <rect x="60" y="50" width="120" height="100" rx="12" {!! $card !!}/>
  @endswitch
</svg>
