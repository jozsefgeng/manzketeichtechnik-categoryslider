import template from './sw-cms-el-category-slider.html.twig';
import './sw-cms-el-category-slider.scss';

Shopware.Component.register('sw-cms-el-category-slider', {
    template,

    mixins: [
        'cms-element'
    ],

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('category-slider');
        }
    },

     computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    }
});