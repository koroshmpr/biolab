require('./bootstrap');
import $ from "jquery";
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
import 'swiper/css';
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
        $(window).scroll(function () { // check if scroll event happened
            if ($(document).scrollTop() > 130) { // check if user scrolled more than 50 from top of the browser window
                $('.sticky-post__detail').removeClass('d-none');
            } else if ($(document).scrollTop() < 30) {
                $('.sticky-post__detail').addClass('d-none');
            }
        })
    }
);
// When the user scrolls the page, execute myFunction
window.onscroll = function () {
    myFunction();
};

function myFunction() {
    if (document.body.classList.contains('single-post')) {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
}


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#myTab a').forEach(function (everyitem) {

        var tabTrigger = new bootstrap.Tab(everyitem)
        everyitem.addEventListener('mouseenter', function () {
            tabTrigger.show();
            let tabContent = document.querySelectorAll('.tab-content');
            let tabPane = document.querySelectorAll('.tab-pane');
            let thisIndex = document.getElementById(this.href.split('#')[1])
            tabContent.forEach((el) => {
                if (!(el.hasAttribute('id') == thisIndex)) {
                    tabPane.removeClass('active')
                }
            })
        });

    });
    const search = new Search();
    AOS.init();
    let backToTop = document.getElementById("backToTop");
    backToTop.addEventListener('click', backtoTopHandler)

    function backtoTopHandler() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
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
    window.addEventListener('scroll', toggleScrollClass() );
    const swiper = new Swiper('.product_image_swiper', {
        loop: false,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 0,
        centeredSlides: false,
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
    // if ($('body').hasClass('home')) {
    //     // hero slide
    //     const swiper1 = new Swiper('.hero_swiper', {
    //         // Optional parameters
    //         loop: false,
    //         effect: 'slide',
    //         speed: 500,
    //         slidesPerView: 1,
    //         spaceBetween: 50,
    //         direction: 'horizontal',
    //         // If we need pagination
    //         pagination: {
    //             el: '.hero-pagination',
    //             bulletActiveClass: 'active',
    //             clickable: true,
    //         },
    //         navigation: {
    //             nextEl: '.swiper-button-next',
    //             prevEl: '.swiper-button-prev',
    //         },
    //         autoplay: {
    //             delay: 10000,
    //         },
    //         disableOnInteraction: false,
    //     });
    //     // change background of section based on slide image
    //     const heroSection = document.querySelector('#hero-section');
    //     const firstSlideImage = document.querySelector('.swiper-slide:first-child').dataset.image;
    //     heroSection.style.backgroundImage = `url(${firstSlideImage})`;
    //     swiper1.on('slideChange', function () {
    //         const activeSlide = this.slides[this.activeIndex];
    //         const imageUrl = activeSlide.getAttribute('data-image');
    //         heroSection.style.backgroundImage = `url(${imageUrl})`;
    //     });
    //     const swiper6 = new Swiper('.portfolio-main', {
    //         // Optional parameters
    //         loop: true,
    //         effect: 'coverflow',
    //         speed: 500,
    //         slidesPerView: 1,
    //         spaceBetween: 30,
    //         direction: 'horizontal',
    //         // If we need pagination
    //         pagination: {
    //             el: '.portfolio-pagination',
    //             bulletActiveClass: 'active',
    //             clickable: true,
    //         },
    //         navigation: {
    //             nextEl: '.portfolio-button-next',
    //             prevEl: '.portfolio-button-prev',
    //         },
    //         breakpoints: {
    //             768: {
    //                 slidesPerView: 3,
    //             },
    //         },
    //         autoplay: {
    //             delay: 10000,
    //         },
    //         disableOnInteraction: false,
    //     })
    // }
    // if ($('body').hasClass('home') || $('body').hasClass('blog')) {
    //     const swiper5 = new Swiper('.post_swiper', {
    //         // Optional parameters
    //         loop: true,
    //         effect: 'slide',
    //         speed: 500,
    //         slidesPerView: 1,
    //         spaceBetween: 30,
    //         direction: 'horizontal',
    //         // If we need pagination
    //         pagination: {
    //             el: '.swiper-pagination',
    //             bulletActiveClass: ''
    //         },
    //         navigation: {
    //             nextEl: '.swiper-button-next',
    //             prevEl: '.swiper-button-prev',
    //         },
    //         breakpoints: {
    //             768: {
    //                 slidesPerView: 3,
    //             },
    //         },
    //         autoplay: {
    //             delay: 10000,
    //         },
    //         disableOnInteraction: false,
    //     })
    // }
    // if ($('body').hasClass('single-services')) {
    //     const swiper7 = new Swiper('.services-main', {
    //         // Optional parameters
    //         loop: true,
    //         effect: 'cube',
    //         speed: 500,
    //         slidesPerView: 1,
    //         grabCursor: true,
    //         direction: 'horizontal',
    //         // If we need pagination
    //         pagination: {
    //             el: '.swiper-pagination',
    //             bulletActiveClass: 'active',
    //             clickable: true,
    //         },
    //         navigation: {
    //             nextEl: '.swiper-button-next',
    //             prevEl: '.swiper-button-prev',
    //         },
    //         autoplay: {
    //             delay: 3000,
    //         },
    //         disableOnInteraction: false,
    //     })
    // }
})