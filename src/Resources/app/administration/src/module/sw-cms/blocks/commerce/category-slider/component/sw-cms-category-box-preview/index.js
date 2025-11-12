import template from './sw-cms-category-box-preview.html.twig';

/**
 * @private
 */
export default {
    template,

    props: {},

    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
};
