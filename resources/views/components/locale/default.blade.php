@if (\Illuminate\Support\Facades\App::getLocale() === 'id')
    @include('components.locale.ID')
@elseif (\Illuminate\Support\Facades\App::getLocale() === 'en')
    @include('components.locale.EN')
@endif
