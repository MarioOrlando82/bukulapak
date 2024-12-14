<div class="dropdown d-inline lang">
    <button class="btn dropdown-toggle text-white" type="button" id="languageDropdown" data-bs-toggle="dropdown"
        aria-expanded="false">
        {{-- <span id="selectedLanguage" class="fw-semibold lang-text">English</span>
        <img src="https://flagcdn.com/20x15/gb.png" width="20" height="15"> --}}
        @include('components.locale.default')
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
        @include('components.locale.langdd')
    </ul>

</div>
