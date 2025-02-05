import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
// import Swiper, { Navigation, Pagination } from "swiper";  // Import Swiper and necessary modules
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: true,
    pagination: {
        el: ".swiper-pagination",
        enabled: true,
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 4,
            spaceBetween: 50,
        },
        768: {
            slidesPerView: 6,
            spaceBetween: 50,
        },
        1024: {
            slidesPerView: 8,
            spaceBetween: 50,
        },
    },
});

const swiper2 = new Swiper(".mySwiper2", {
    modules: [Pagination], // Only register Pagination for the second swiper
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination-2", // Unique pagination class for the second swiper
        clickable: true,
    },
});
