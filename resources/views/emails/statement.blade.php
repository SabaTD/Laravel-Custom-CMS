@component('mail::message')

<h1 style="text-align:center">@lang('site.statment')</h1>

@component('mail::panel',['url' => ''])
  @lang('placeholder.name') : {{$for_blade['name']}} <br>

  @lang('placeholder.mail') : {{$for_blade['email']}} <br>

  @lang('placeholder.phone') : {{$for_blade['phone']}} <br>

  @lang('placeholder.id_num') : {{$for_blade['id_num']}} <br>

  @lang('placeholder.mark') : {{\App\Make::find($for_blade['mark'])->title}} <br>

  @lang('placeholder.model') : {{\App\Models::find($for_blade['model'])->title}} <br>

  @lang('placeholder.run') : {{$for_blade['run']}} <br>

  @lang('placeholder.rule') : {{$for_blade['rule']}} <br>

  @lang('placeholder.year') : {{$for_blade['year']}} <br>

  @lang('placeholder.engine') : {{$for_blade['engine']}} <br>

  @lang('placeholder.transmision') : {{$for_blade['transmision']}} <br>

  @lang('placeholder.engine_type') : {{$for_blade['engine_type']}} <br>

  @lang('placeholder.gos_number') : {{$for_blade['gos_number']}} <br>

  @lang('placeholder.link') : {{$for_blade['link']}} <br>

  @lang('site.money') : {{$for_blade['currency']}} <br>

  @lang('site.time') : {{$for_blade['month']}} <br>
@endcomponent

@endcomponent
