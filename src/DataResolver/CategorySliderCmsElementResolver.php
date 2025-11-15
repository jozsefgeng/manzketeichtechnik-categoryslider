<?php

declare(strict_types=1);

namespace ManzkeTeichtechnik\CategorySlider\DataResolver;

use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Struct\ArrayStruct;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\Content\Category\CategoryCollection;
use Shopware\Core\Content\Category\CategoryEntity;
use Shopware\Core\Content\Category\SalesChannel\SalesChannelCategoryEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;

class CategorySliderCmsElementResolver extends AbstractCmsElementResolver
{
    /**
     * @var \Shopware\Core\Framework\Context
     */
    protected Context $context;

    /**
     * @var \Shopware\Core\Framework\DataAbstractionLayer\EntityRepository
     */
    private EntityRepository $categoryRepository;

    /**
    * Constructor
    */
    public function __construct(EntityRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'category-slider';
    }

    /**
     * @param \Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity $slot
     * @param \Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext $resolverContext
     *
     * @return \Shopware\Core\Content\Cms\DataResolver\CriteriaCollection
     */
    public function collect(
        CmsSlotEntity $slot,
        ResolverContext $resolverContext
    ): ?CriteriaCollection {
        $config = $slot->getFieldConfig();

        $criteriaCollection = new CriteriaCollection();

        return $criteriaCollection;
    }


    /**
     * @param \Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity $slot
     * @param \Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext $resolverContext
     * @param \Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection $result
     */
    public function enrich(
        CmsSlotEntity $slot,
        ResolverContext $resolverContext,
        ElementDataCollection $result
    ): void {

        $entity = $resolverContext->getEntity();

        if (
            $entity instanceof SalesChannelCategoryEntity
            || $entity instanceof CategoryEntity
        ) {
            $slot->setData(new ArrayStruct([
                'categorySlider' => [
                    'category' => $entity,
                    'children' => $this->getChildren($entity->getId(), $resolverContext)
                ]
            ]));
        }
    }

    /**
     * @param string $categoryId
     * @param \Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext $resolverContext
     *
     * @return \Shopware\Core\Content\Category\CategoryCollection
     */
    private function getChildren(
        string $categoryId,
        ResolverContext $resolverContext
    ): CategoryCollection {
        $context = $resolverContext->getSalesChannelContext()->getContext();
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('parentId', $categoryId));
        $criteria->addFilter(new EqualsFilter('active', true));

        $criteria->addAssociation('media');
        $criteria->addAssociation('translations');

        return $this->categoryRepository
            ->search($criteria, $context)
            ->getEntities();


    }
}
