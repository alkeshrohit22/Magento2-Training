<?php

namespace Sigma\GraphQL\Model\Resolver;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class SpecialDealProduct implements ResolverInterface
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
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        return ['products_skus' => $this->getSpecialPriceProducts()];
    }

    /**
     * @return array
     */
    protected function getSpecialPriceProducts() : array {

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('special_price', null, 'notnull')
            ->create();

        $searchResults = $this->productRepository->getList($searchCriteria);
        $specialPriceProducts = [];

        foreach ($searchResults->getItems() as $product ) {
            $specialPriceProducts[] = $product->getSku();
        }

        return $specialPriceProducts;
    }
}
