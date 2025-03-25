$(document).ready(function() {
    // Initialize theme
    function initTheme() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        $('body').attr('data-theme', savedTheme);
        updateThemeIcon(savedTheme);
    }

    // Update theme icon based on current theme
    function updateThemeIcon(theme) {
        const $icon = $('#themeToggle i');
        const $text = $('#themeToggle a');
        
        if (theme === 'dark') {
            $icon.removeClass('fa-moon').addClass('fa-sun');
            $text.html('<i class="fas fa-sun"></i> Light Mode');
        } else {
            $icon.removeClass('fa-sun').addClass('fa-moon');
            $text.html('<i class="fas fa-moon"></i> Dark Mode');
        }
    }

    // Toggle theme
    $('#themeToggle').click(function(e) {
        e.preventDefault();
        const currentTheme = $('body').attr('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        $('body').attr('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateThemeIcon(newTheme);
    });

    // Initialize on page load
    initTheme();

    // Rest of your existing script code...
});