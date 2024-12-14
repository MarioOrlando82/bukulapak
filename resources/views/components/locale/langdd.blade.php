<li>
    <a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'en']) }}">
        {{-- <a class="dropdown-item" href="?lang=en" data-lang="en"> --}}
        @include('components.locale.EN')
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'id']) }}">
        {{-- <a class="dropdown-item" href="?lang=id" data-lang="id"> --}}
        @include('components.locale.ID')
    </a>
</li>