@component('mail::message')

  <h1 style="text-align:center">@lang('site.statment')</h1>

  @component('mail::panel',['url' => ''])

    @lang('placeholder.name') : {{$for_blade['name']}}

    @lang('placeholder.mail') : {{$for_blade['email']}}

    @lang('placeholder.phone') : {{$for_blade['phone']}}

    @lang('placeholder.text') : {{$for_blade['text']}}

  @endcomponent

@endcomponent
