import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//
document.querySelectorAll('#collapsible').forEach((collapsible) => {
    collapsible.addEventListener('click', function() {
        const container = document.getElementById('container');
        container.classList.toggle('expanded');
        
        const paragraph = this.querySelector('p');
        paragraph.classList.toggle('line-clamp-3');
    });
});