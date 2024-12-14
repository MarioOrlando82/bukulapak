@if (\Illuminate\Support\Facades\App::getLocale() === 'en')
    <span class="fw-semibold lang-text">English</span>
    <img src="https://flagcdn.com/20x15/gb.png" width="20" height="15" alt="United Kingdom">
@elseif (\Illuminate\Support\Facades\App::getLocale() === 'id')
    <span class="fw-semibold lang-text">Bahasa Indonesia</span>
    <img src="https://flagcdn.com/20x15/id.png" width="20" height="15" alt="Indonesia">
@elseif (\Illuminate\Support\Facades\App::getLocale() === 'jp')
    <span class="fw-semibold lang-text">日本語</span>
    <img src="https://flagcdn.com/20x15/jp.png" width="20" height="15" alt="Japan">
@elseif (\Illuminate\Support\Facades\App::getLocale() === 'kr')
    <span class="fw-semibold lang-text">한국어</span>
    <img src="https://flagcdn.com/20x15/kr.png" width="20" height="15" alt="Korea">
@elseif (\Illuminate\Support\Facades\App::getLocale() === 'ru')
    <span class="fw-semibold lang-text">Русский</span>
    <img src="https://flagcdn.com/16x12/ru.png" width="20" height="15" alt="Russia">
@endif
