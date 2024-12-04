document.addEventListener('DOMContentLoaded', function () {
    const dropdownItems = document.querySelectorAll('#languageDropdown + .dropdown-menu .dropdown-item');
    const selectedLanguage = document.getElementById('selectedLanguage');
    // const selectedFlag = selectedLanguage.nextElementSibling;
    const selectedFlag = document.querySelector('#languageDropdown img');


    const languageFlags = {
        en: "https://flagcdn.com/20x15/gb.png",
        id: "https://flagcdn.com/20x15/id.png"
    };

    const savedLanguage = localStorage.getItem('selectedLanguage');
    const savedLangCode = localStorage.getItem('selectedLangCode');

    if (savedLanguage && savedLangCode) {
        selectedLanguage.textContent = savedLanguage;
        selectedFlag.src = languageFlags[savedLangCode];
        selectedFlag.alt = savedLanguage;
    }

    dropdownItems.forEach(item => {
        const langCode = item.getAttribute('data-lang');
        const language = item.textContent.trim();

        if (!langCode || !languageFlags[langCode]) return;

        item.addEventListener('click', function () {
            selectedLanguage.textContent = language;
            selectedFlag.src = languageFlags[langCode];
            selectedFlag.alt = language;

            localStorage.setItem('selectedLanguage', language);
            localStorage.setItem('selectedLangCode', langCode);
        });
    });
});
