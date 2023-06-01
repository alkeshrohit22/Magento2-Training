<?php

namespace Sigma\ProductMaterial\Plugin\Catalog\Model;

class Product extends \Magento\Catalog\Model\Product
{
    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return mixed|string
     */
    public function afterGetName(
        \Magento\Catalog\Model\Product $subject,
        $result
    ) {
        $title = $result;

        $clothingMaterial = $subject->getAttributeText('clothing_material');

        if($clothingMaterial) {
            $result = $title . PHP_EOL . $clothingMaterial;
        }

        return $result;
    }
}
