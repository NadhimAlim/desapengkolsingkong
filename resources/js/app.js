import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-nav-toggle]');
    const menu = document.querySelector('[data-nav-menu]');

    toggle?.addEventListener('click', () => {
        menu?.classList.toggle('open');
    });
});
