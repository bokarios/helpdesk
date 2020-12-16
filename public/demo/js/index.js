$(document).ready(function () {
  

    //brands slider
    $('.brand').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        rtl: true,
        dots: false,
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });


    $('.welcome').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        rtl: true,
        dots: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // shrinking nav
    // $(window).scroll(function () {
    //     if ($(document).scrollTop() > 60) {
    //         $("nav").addClass("shrink");
    //     } else {
    //         $("nav").removeClass("shrink ");
    //     }
    // });
    //hamburger nav 
    $("#wrapper").click(function () {
        $(".menu").toggleClass("close");
    });
    $('.navbar-nav>li>a').on('click', function () {
        $('.navbar-collapse').collapse('hide'),
            $(".menu").removeClass("close");

    });

    //home page video
    $("#open-video").click(function () {
        $("#overlay").addClass("show");
        $("#video-popout").addClass("active");
    });

    $("#close-popout, #overlay").click(function () {
        $("#overlay").removeClass("show");
        $("#video-popout").removeClass("active");
    });


    //onboarding welcoming slide

    $("#view-welcome").click(function () {
        $("#onboarding").addClass("open");
        $("#onboarding-card").addClass("view");
    });

    $("#close-popout, #overlay").click(function () {
        $("#overlay").removeClass("show");
        $("#video-popout").removeClass("active");
    });


});

//profile page tabs
document.getElementById("defaultOpen").click();

function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
};




