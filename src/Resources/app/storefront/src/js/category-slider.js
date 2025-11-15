import Plugin from 'src/plugin-system/plugin.class';
import Swiper from 'swiper';

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
        const swiper = new Swiper('.swiper', {
            slidesPerView: 2,
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
        });
    }

}