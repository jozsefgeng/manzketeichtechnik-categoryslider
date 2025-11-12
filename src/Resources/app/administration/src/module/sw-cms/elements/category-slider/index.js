import './component';
import './config';
import './preview';
import './snippets/de-DE.json';

Shopware.Service('cmsService').registerCmsElement({
    name: 'category-slider',
    label: 'sw-cms.elements.categorySliderElement.label',
    component: 'sw-cms-el-category-slider',
    configComponent: 'sw-cms-el-config-category-slider',
    previewComponent: 'sw-cms-el-preview-category-slider',
    defaultConfig: {
        title: {
            source: 'static',
            value: '',
        },
        categoryIds: {
            source: 'static',
            value: [],
        },
        displayMode: {
            source: 'static',
            value: 'standard',
        },
        boxLayout: {
            source: 'static',
            value: 'standard',
        },
        navigation: {
            source: 'static',
            value: true,
        },
        rotate: {
            source: 'static',
            value: false,
        },
        border: {
            source: 'static',
            value: false,
        },
        elMinWidth: {
            source: 'static',
            value: '300px',
        },
        verticalAlign: {
            source: 'static',
            value: null,
        }
    },
    collect: Shopware.Service('cmsService').getCollectFunction
});