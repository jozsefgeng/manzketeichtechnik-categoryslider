import Plugin from 'src/plugin-system/plugin.class';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

Swiper.use([Navigation, Pagination]);

export default class CategorySlider extends Plugin {

    init() {
        this._init();
    }

     /**
     * Creates the category slider
     * 
     * @private
     */
    _init() {
        const swiper = new Swiper('.swiper-category-slider', {
            slidesPerView: 2,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
                1258: {
                    slidesPerView: 5,
                },
                1536: {
                    slidesPerView: 6,
                }
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }

}