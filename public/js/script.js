

// header script start
$(document).ready(function () {
    $('.slick-slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 800,
        speed: 1000,
        responsive: [
            {
                breakpoint: 1230,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    arrows: false,

                }
            }
        ],
        cssEase: 'cubic-bezier(0.50, 1, 0.5, 1)',
        prevArrow: '<button class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa-solid fa-angle-right"></i></button>'
    });

});

// header script end


// banner script start

$(document).ready(function () {
    var $slider = $('.banner-slider');
    var $currentSlide = $('.current-slide');
    var $totalSlides = $('.total-slides');

    $slider.on('init reInit afterChange', function (event, slick, currentSlide) {
        var slideIndex = (currentSlide ? currentSlide : 0) + 1;
        $currentSlide.text(slideIndex);
        $totalSlides.text(slick.slideCount);
    });

    $slider.slick({
        infinite: true,
        autoplaySpeed: 800,
        speed: 1000,
        autoplay: true,
        cssEase: 'cubic-bezier(0.25, 1, 0.5, 1)',
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    dots: true
                }
            }
        ],
        prevArrow: '<button class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa-solid fa-angle-right"></i></button>'
    });
});

// banner script end


// blog img sldier script start

$(document).ready(function () {
    $('.slick-blog').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        cssEase: 'cubic-bezier(0.50, 1, 0.5, 1)',
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false
    });
});

// blog img sldier script end

// marquee slide script start  //////////////

$(document).ready(function () {
    $('.marquee-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 8000,
        cssEase: 'cubic-bezier(0.50, 1, 0.5, 1)',
        cssEase: 'linear',
        infinite: true,
        arrows: false,
        pauseOnHover: false,
        swipe: false,
        variableWidth: true, /* Prevents overflow */
    });
});

// marquee slide script end  //////////////

// gallery_img sldier script start

$(document).ready(function () {
    $('.gallery_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        arrows: false,
        centerMode: true,
        dots: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});

// gallery_imgsldier script end

// footworld_imgslider start ///////////////////////////

$(document).ready(function () {
    $('.img_slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: 'cubic-bezier(0.50, 1, 0.5, 1)',
    });
});

// footworld_imgslider end ///////////////////////////

// pause_play script start ////////////////////////////

jQuery(function ($) {
    var slider = $('.pyimg_slider').slick({
        dots: false,
        infinite: true,
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 3
                }
            }
        ],
        prevArrow: '<button class="slick-prev slick-arrow"><i class="fa-solid fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next slick-arrow"><i class="fa-solid fa-angle-right"></i></button>'
    });

    var isPlaying = true;
    $('#playPauseBtn').click(function () {
        isPlaying ? slider.slick('slickPause') : slider.slick('slickPlay');
        $(this).html(isPlaying ? '▶' : '||');
        isPlaying = !isPlaying;
    });

    // Ensure custom arrows work by re-attaching events
    $(document).on('click', '.slick-prev', function () {
        slider.slick('slickPrev');
    });

    $(document).on('click', '.slick-next', function () {
        slider.slick('slickNext');
    });
});

// pause_play script end //////////////////////////////////


const customCursor = document.getElementById('media_abdrag');
const slider = document.querySelector('.inside_glly');

slider.addEventListener('mousemove', (e) => {
    customCursor.style.display = 'block';
    customCursor.style.left = `${e.pageX}px`;
    customCursor.style.top = `${e.pageY}px`;
});

slider.addEventListener('mouseleave', () => {
    customCursor.style.display = 'none';
});

slider.addEventListener('mousedown', () => {
    customCursor.style.transform = 'translate(-50%, -50%) scale(1.2)';
});

slider.addEventListener('mouseup', () => {
    customCursor.style.transform = 'translate(-50%, -50%) scale(1)';
});



// custom js start ////////////////////////////////////////////////////////////////


// video slider script start ///////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
    const videoContainers = document.querySelectorAll(".video-container");

    videoContainers.forEach(container => {
        const video = container.querySelector("video");
        const playButton = container.querySelector(".play_button");

        playButton.addEventListener("click", function () {
            console.log("Play button clicked"); // Debugging

            video.play().then(() => {
                playButton.style.display = "none"; // Hide play button
                video.setAttribute("controls", "true"); // Show controls
            }).catch(error => {
                console.error("Error playing video:", error);
            });
        });

        // Show play button again when the video ends
        video.addEventListener("ended", function () {
            playButton.style.display = "block";
            video.removeAttribute("controls");
        });
    });
});

// video slider script end ///////////////////////////////


// responsive toogle 767px script start ////////////////////////////////////////////////////////


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


// responsive 767px script end ////////////////


// submenus script //////////////////////////////////////////////////////////////////////

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







