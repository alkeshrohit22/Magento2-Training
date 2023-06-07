<?php

namespace Sigma\GraphQL\Model\Resolver;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class GetProductList implements ResolverInterface
{

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        protected ProductRepositoryInterface $productRepository,
        protected SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
    }

    /**
     * @param Field $field
     * @param $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array[]
     */
    public function resolve(
        Field $field, $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        $disableProducts = $this->getdisableProductList();
        return [$disableProducts];
    }

    /**
     * Getting all the disable products
     * @return array
     */
    protected function getdisableProductList() {
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter(ProductInterface::STATUS, 2)
            ->create();

        $products = $this->productRepository->getList($searchCriteria);

        /** @var array $disableProductList */
        $disableProductList = [];

        foreach ($products as $product) {
            $disableProductList[] = [
                'entityId' => $product->getId(),
                'proName' => $product->getName(),
                'sku' => $product->getSku(),
                'category' => $product->getCategoryIds(),
                'weight' => $product->getWeight()
            ];
        }

        return $disableProductList;
    }
}
