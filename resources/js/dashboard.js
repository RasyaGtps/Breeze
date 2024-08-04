
document.addEventListener('DOMContentLoaded', function() {
    const menuContainers = document.querySelectorAll('.menu-container');
    
    menuContainers.forEach(container => {
        const menuItems = container.querySelectorAll('.menu-item');
        const menuBackground = container.querySelector('.menu-background');
        let isFirstHover = true;

        menuItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                const itemRect = this.getBoundingClientRect();
                const containerRect = container.getBoundingClientRect();

                if (isFirstHover) {
                    menuBackground.style.transition = 'none';
                    isFirstHover = false;
                } else {
                    menuBackground.style.transition = 'all 0.3s ease';
                }

                menuBackground.style.width = `${itemRect.width}px`;
                menuBackground.style.transform = `translateX(${itemRect.left - containerRect.left}px)`;
                menuBackground.style.opacity = '1';
            });
        });

        container.addEventListener('mouseleave', function() {
            menuBackground.style.opacity = '0';
            isFirstHover = true;
        });
    });

    // Add animation on link click
    const links = document.querySelectorAll('a');
    links.forEach(link => {
        if (link.href.includes('/menu5') || link.href.includes('/register')) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                document.body.classList.add('fade-out');
                setTimeout(() => {
                    window.location.href = link.href;
                }, 500); // Time matches the animation duration
            });
        }
    });

    // Remove the fade-out class after the page has fully loaded
    window.addEventListener('pageshow', function() {
        document.body.classList.remove('fade-out');
    });
});