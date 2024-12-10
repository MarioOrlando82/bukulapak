document.addEventListener('DOMContentLoaded', function () {
    const dropdownItems = document.querySelectorAll('#languageDropdown + .dropdown-menu .dropdown-item');
    const selectedLanguage = document.getElementById('selectedLanguage');
    const selectedFlag = document.querySelector('#languageDropdown img');

    // Map language codes to flags
    const languageFlags = {
        en: "https://flagcdn.com/20x15/gb.png",
        id: "https://flagcdn.com/20x15/id.png"
    };

    // Load saved language and flag from localStorage
    const savedLanguage = localStorage.getItem('selectedLanguage');
    const savedLangCode = localStorage.getItem('selectedLangCode');

    if (savedLanguage && savedLangCode && languageFlags[savedLangCode]) {
        selectedLanguage.textContent = savedLanguage;
        selectedFlag.src = languageFlags[savedLangCode];
        selectedFlag.alt = savedLanguage;
    }

    // Attach event listeners to dropdown items
    dropdownItems.forEach(item => {
        const langCode = item.getAttribute('data-lang');
        const language = item.querySelector('span').textContent.trim();

        if (!langCode || !languageFlags[langCode]) return;

        item.addEventListener('click', function (event) {
            event.preventDefault();

            selectedLanguage.textContent = language;
            selectedFlag.src = languageFlags[langCode];
            selectedFlag.alt = language;

            localStorage.setItem('selectedLanguage', language);
            localStorage.setItem('selectedLangCode', langCode);
        });
    });
});
