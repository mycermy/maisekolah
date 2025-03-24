document.addEventListener('DOMContentLoaded', () => {
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');
    const openIcon = document.querySelector('[aria-controls="mobile-menu"] .block');
    const closeIcon = document.querySelector('[aria-controls="mobile-menu"] .hidden');

    mobileMenuButton?.addEventListener('click', () => {
        const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';

        mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
        mobileMenu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    // User menu toggle
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    userMenuButton?.addEventListener('click', () => {
        const isExpanded = userMenuButton.getAttribute('aria-expanded') === 'true';

        userMenuButton.setAttribute('aria-expanded', !isExpanded);
        userMenu.classList.toggle('hidden');
    });

    // Close user menu when clicking outside
    document.addEventListener('click', (event) => {
        if (userMenu && !userMenuButton?.contains(event.target) && !userMenu?.contains(event.target)) {
            userMenu.classList.add('hidden');
            userMenuButton?.setAttribute('aria-expanded', 'false');
        }
    });
});