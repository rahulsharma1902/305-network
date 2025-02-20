document.addEventListener("DOMContentLoaded", () => {
    const menu = document.querySelector(".select-menu"),
          btn = document.querySelector(".select-btn");

    if (menu && btn) {
        btn.addEventListener("click", e => {
            e.stopPropagation();
            menu.classList.toggle("active");
        });

        document.addEventListener("click", e => {
            if (!menu.contains(e.target) && !btn.contains(e.target)) menu.classList.remove("active");
        });
    }
});

$(document).ready(function () {
    $(".navbar-toggler").click(function () {
        $(this).toggleClass("active");
        $("#navbarSupportedContent").slideToggle(300);
    });

    // Close menu when clicking outside
    $(document).click(function (event) {
        if (!$(event.target).closest(".navbar-toggler, #navbarSupportedContent").length) {
            $("#navbarSupportedContent").slideUp(300);
            $(".navbar-toggler").removeClass("active");
        }
    });

    // Close menu when clicking a menu item
    $('#navbarSupportedContent a').on('click', function () {
        $("#navbarSupportedContent").slideUp(300);
        $(".navbar-toggler").removeClass("active");
    });
});

$(document).ready(function() {
    if ($(window).width() < 1025) {
        $('.dropdown-btn').click(function(event) {
            event.stopPropagation(); // Prevents the event from bubbling up

            let $currentDropdown = $(this).siblings('.dropdown-content');
            let $parentLi = $(this).closest('li');

            // Close other open dropdowns in the same parent ul
            $parentLi.siblings().find('.dropdown-content').slideUp();

            // Toggle the clicked dropdown
            $currentDropdown.slideToggle();
        });

        $('.toggle-dropdown').click(function(event) {
            event.preventDefault();
            let $submenu = $(this).siblings('.sub_menus');

            // Close other submenus
            $('.sub_menus').not($submenu).slideUp();

            // Toggle current submenu
            $submenu.slideToggle();
        });

        // Close dropdown when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.dropdown').length) {
                $('.dropdown-content, .sub_menus').slideUp();
            }
        });
    }
});

// for search box select and redirect js 
document.getElementById('searchIcon').addEventListener('click', function() {
    var selectedUrl = document.getElementById('coachSelect').value;
    if (selectedUrl) {
        window.location.href = selectedUrl; // Redirect to the selected URL
    }
});