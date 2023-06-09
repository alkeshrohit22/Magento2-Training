<?php

namespace Sigma\GraphQL\Model\Resolver;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class GetProductList implements ResolverInterface
{
    /**
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        protected ProductRepositoryInterface $productRepository,
        protected SearchCriteriaBuilder $searchCriteriaBuilder,
        protected CategoryRepositoryInterface $categoryRepository
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
     * @throws NoSuchEntityException
     */
    public function resolve(
        Field $field, $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        $disableProducts = $this->getDisableProductList();
        return [$disableProducts];
    }

    /**
     *
     * getting all disable products
     * @return array
     * @throws NoSuchEntityException
     */
    protected function getDisableProductList(): array {

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('status', Status::STATUS_DISABLED)
            ->create();

        $searchResults = $this->productRepository->getList($searchCriteria);

        $disableProductList = [];

        foreach ($searchResults->getItems() as $product) {
            $disableProductList = [
                'entityId' => $product->getId(),
                'proName' => $product->getName(),
                'sku' => $product->getSku(),
                'category' => $this->getProductCategory($product),
                'weight' => $product->getWeight()
            ];
        }

        return $disableProductList;
    }

    /**
     * @param $item
     * @return string
     * @throws NoSuchEntityException
     */
    protected function getProductCategory($item): string {
        $categoryIds = $item->getCategoryIds();

        $categories = [];

        foreach ($categoryIds as $categoryId) {
            $category = $this->categoryRepository->get($categoryId);
            $categoryName = $category->getName();

            $categories[] = $categoryName;
        }

        return implode(', ', $categories);
    }

}
