@props([
  'name',
  'class' => '',
  'sprite' => asset('static/sprite/sprite.svg'),

  'fill' => 'none',
  'stroke' => 'currentColor',
  'strokeWidth' => '2',
  'size' => null,
  'viewBox' => '0 0 24 24',

  'useAttrs' => [],
])
@php
    $svgAttrs = [];

    if (!is_null($fill))        $svgAttrs['fill'] = $fill;
    if (!is_null($stroke))      $svgAttrs['stroke'] = $stroke;
    if (!is_null($strokeWidth)) $svgAttrs['stroke-width'] = $strokeWidth;

    if (!is_null($size)) {
      $svgAttrs['width'] = $size;
      $svgAttrs['height'] = $size;
    }

    if (!is_null($viewBox)) $svgAttrs['viewBox'] = $viewBox;

    $symbolHref = url($sprite) . '#' . $name;

    $useBag = new \Illuminate\View\ComponentAttributeBag($useAttrs);
@endphp

<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $class])->merge($svgAttrs) }}>
    <use href="{{ $symbolHref }}" {{ $useBag }}></use>
</svg>
