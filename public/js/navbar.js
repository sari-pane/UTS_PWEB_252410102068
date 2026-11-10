const toggleButton = document.getElementById('navbar-toggle');
const navbarMenu = document.getElementById('navbar-menu');

if (toggleButton && navbarMenu) {

    toggleButton.addEventListener('click', function () {

        navbarMenu.classList.toggle('active');

        const isExpanded = navbarMenu.classList.contains('active');

        toggleButton.setAttribute('aria-expanded', isExpanded);

    });

    // Menutup menu setelah salah satu link dipilih
    navbarMenu.querySelectorAll('a').forEach(function (link) {

        link.addEventListener('click', function () {

            navbarMenu.classList.remove('active');

            toggleButton.setAttribute('aria-expanded', 'false');

        });

    });

}