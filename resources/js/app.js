import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

const swiper = new Swiper('.my-banner-slider', {
    modules: [Navigation, Pagination, Autoplay],
    
    loop: true, // Lặp lại
    autoplay: {
        delay: 5000, // Tự chạy sau 5s
    },

    // Nút bấm
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // Dấu chấm
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});