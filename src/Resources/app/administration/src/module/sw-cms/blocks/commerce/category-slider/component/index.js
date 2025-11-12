import template from './sw-cms-block-category-slider.html.twig';

Shopware.Component.register('sw-cms-block-category-slider', {
    template
});

Shopware.Component.register('sw-cms-category-box-preview', () => import('./sw-cms-category-box-preview'));