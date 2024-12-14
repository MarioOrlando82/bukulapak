<li>
    <a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'en']) }}">
        @include('components.locale.EN')
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'id']) }}">
        @include('components.locale.ID')
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'jp']) }}">
        @include('components.locale.JP')
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'kr']) }}">
        @include('components.locale.KR')
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'ru']) }}">
        @include('components.locale.RU')
    </a>
</li>