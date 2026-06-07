import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// Notification dropdown toggle
const notifToggle = document.getElementById('notif-toggle');
const notifDropdown = document.getElementById('notif-dropdown');

notifToggle?.addEventListener('click', (e) => {
    e.stopPropagation();
    const isOpen = notifDropdown.classList.toggle('open');
    notifToggle.setAttribute('aria-expanded', isOpen);
});

// Close when clicking outside
document.addEventListener('click', (e) => {
    if (!notifDropdown?.contains(e.target) && !notifToggle?.contains(e.target)) {
        notifDropdown?.classList.remove('open');
        notifToggle?.setAttribute('aria-expanded', 'false');
    }
});
