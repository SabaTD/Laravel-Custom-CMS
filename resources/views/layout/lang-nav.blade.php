@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
  @if($localeCode == $lang)
    <li class="active"> {{ $properties['name'] }} </li>
  @else
    <li>
      <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['name'] }}</a>
    </li>
  @endif
@endforeach
