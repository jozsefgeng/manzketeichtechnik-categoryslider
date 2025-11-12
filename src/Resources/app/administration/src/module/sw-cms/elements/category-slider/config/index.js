import template from './sw-cms-el-config-category-slider.html.twig';

Shopware.Component.register('sw-cms-el-config-category-slider', {
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
    }
});