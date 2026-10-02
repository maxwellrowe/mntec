// Separate disclosure buttons preserve navigation to parent pages.
(function () {
    'use strict';

    function initializeNavigation() {
        document.querySelectorAll('#menu-primary-menu, #menu-secondary-menu').forEach(function (menu) {
            menu.querySelectorAll('li').forEach(function (item, index) {
                var submenu = Array.from(item.children).find(function (child) {
                    return child.matches('ul');
                });
                var link = Array.from(item.children).find(function (child) {
                    return child.matches('a');
                });
                if (!submenu || !link || item.classList.contains('mntec-has-toggle')) {
                    return;
                }

                var current = '.current-menu-item, .current-menu-parent, .current-menu-ancestor, .current_page_item, .current_page_parent, .current_page_ancestor';
                var expanded = item.matches(current) || !!submenu.querySelector(current + ', [aria-current="page"]');
                var button = document.createElement('button');
                var label = link.textContent.trim();
                submenu.id = submenu.id || menu.id + '-submenu-' + index;
                button.type = 'button';
                button.className = 'mntec-submenu-toggle';
                button.setAttribute('aria-controls', submenu.id);
                button.innerHTML = '<span class="fas fa-chevron-down" aria-hidden="true"></span>';
                var arrow = document.createElement('span');
                arrow.className = 'fas fa-arrow-right mntec-parent-arrow';
                arrow.setAttribute('aria-hidden', 'true');
                link.appendChild(arrow);
                var animation;

                function setExpanded(open, animate) {
                    var startHeight = submenu.hidden ? 0 : submenu.getBoundingClientRect().height;
                    if (animation) {
                        animation.cancel();
                        animation = null;
                    }
                    button.setAttribute('aria-expanded', String(open));
                    button.setAttribute('aria-label', (open ? 'Collapse ' : 'Expand ') + label + ' submenu');
                    submenu.inert = !open;
                    if (!animate || !submenu.animate || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                        submenu.hidden = !open;
                        return;
                    }
                    submenu.hidden = false;
                    animation = submenu.animate([
                        { height: startHeight + 'px', overflow: 'hidden' },
                        { height: (open ? submenu.scrollHeight : 0) + 'px', overflow: 'hidden' }
                    ], { duration: 220, easing: 'ease-in-out' });
                    animation.onfinish = function () {
                        submenu.hidden = !open;
                        animation = null;
                    };
                }

                button.addEventListener('click', function () {
                    setExpanded(button.getAttribute('aria-expanded') !== 'true', true);
                });
                item.classList.add('mntec-has-toggle');
                link.insertAdjacentElement('afterend', button);
                setExpanded(expanded);
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeNavigation);
    } else {
        initializeNavigation();
    }
}());
