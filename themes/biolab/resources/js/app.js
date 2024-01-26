require('./bootstrap');
import $ from "jquery";
import AOS from 'aos';
import 'aos/dist/aos.css';
// import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import Search from "./search";

$(document).ready(function () {
    $(".nav-pills > button").hover(function () {
        let megaMenu = $(this).children("button")
        if (!megaMenu.hasClass('active')) {
            megaMenu.addClass("active")
        }
    })
});
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#myTab a').forEach(function (everyitem) {

        var tabTrigger = new bootstrap.Tab(everyitem)
        everyitem.addEventListener('mouseenter', function () {
            tabTrigger.show();
            let tabContent = document.querySelectorAll('.tab-content');
            let tabPane = document.querySelectorAll('.tab-pane');
            let thisIndex = document.getElementById(this.href.split('#')[1])
            tabPane.forEach((el) => {
                if (!(el.hasAttribute('id') == thisIndex.hasAttribute('id'))) {
                    el.removeClass('active')
                }
            })
        });

    });
    // const search = new Search();
    AOS.init();
    let backToTop = document.getElementById("backToTop");
    if (backToTop) {
        backToTop.addEventListener('click', backtoTopHandler)

        function backtoTopHandler() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    }
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    //toggle header on time
    const toggleScrollClass = function () {
        if (window.scrollY > 24) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    }
    //check scroll to take actions on it
    window.addEventListener('scroll', toggleScrollClass());
    const swiper = new Swiper('.product_image_swiper', {
        loop: false,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        grabCursor: true,
        centeredSlides: true,
        direction: 'horizontal',
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
    const swiper1 = new Swiper('.testimonial', {
        loop: false,
        effect: 'fade',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        grabCursor: true,
        centeredSlides: true,
        direction: 'horizontal',
        navigation: {
            nextEl: '.testimonial-button-next',
            prevEl: '.testimonial-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
    const swiper2 = new Swiper('.onsale-slider', {
        loop: false,
        speed: 500,
        slidesPerView: 1.1,
        spaceBetween: 10,
        grabCursor: true,
        direction: 'horizontal',
        breakpoints: {
            992: {
                slidesPerView: 5,
            }
        },
        navigation: {
            nextEl: '.onsale-button-next',
            prevEl: '.onsale-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
    const swiper3 = new Swiper('.category-slider', {
        loop: true,
        speed: 500,
        slidesPerView: 2,
        spaceBetween: 10,
        grabCursor: true,
        direction: 'horizontal',

        breakpoints: {
            992: {
                slidesPerView: 4,
            },
            1400: {
                slidesPerView: 6,
            }
        },
        navigation: {
            nextEl: '.category-button-next',
            prevEl: '.category-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
})
