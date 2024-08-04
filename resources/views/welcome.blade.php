<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('4f112d015268679f8c4fded850669870.ico') }}" type="image/x-icon">
        <title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-zinc-700 text-white fade-in">
    <style>
            .menu-container {
                position: relative;
            }
            .menu-item {
                position: relative;
                z-index: 1;
                transition: color 0.3s ease;
            }
            .menu-item:hover {
                color: white;
            }
            .menu-background {
                position: absolute;
                height: 100%;
                top: 0;
                left: 0;
                background-color: #52525b; /* bg-zinc-600 */
                transition: all 0.3s ease;
                z-index: 0;
                opacity: 0;
                border-radius: 10px;
                border-bottom: 3px solid red; /* Menambahkan garis merah di bawah */
            }
            .fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

.fade-out {
    animation: fadeOut 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}
        </style>
    <nav class="bg-zinc-700 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
                </div>
                <!-- Menu Items -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex menu-container">
                    <div class="menu-background"></div>
                        <a href="{{ url('/menu1') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 1</a>
                        <a href="{{ url('/menu2') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 2</a>
                        <a href="{{ url('/menu3') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 3</a>
                        <a href="{{ url('/menu4') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 4</a>
                        <a href="{{ url('/menu5') }}" class="menu-item text-white px-3 py-6 rounded-md text-sm font-medium">Menu 5</a>
                    </div>
              </div>
              <div class="flex items-center space-x-4 menu-container">
                    <div class="menu-background"></div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="menu-item rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="menu-item rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                        <a href="{{ route('login') }}" class="menu-item rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>
                    @endauth
                </div>
        </div>
    </div>
</nav>

<script>
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
    </script>
</body>
</html>
