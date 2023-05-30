<?php

namespace Sigma\ProductMaterial\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Material extends AbstractSource
{

    public function getAllOptions()
    {
        if(!$this->_options) {
            $this->_options = [
                ['label' => __('Cotton'), 'value' => 'cotton'],
                ['label' => __('Leather'), 'value' => 'leather'],
                ['label' => __('Nylon'), 'value' => 'nylon'],
                ['label' => __('Muslin'), 'value' => 'muslin'],
                ['label' => __('Silk'), 'value' => 'silk'],
                ['label' => __('Denim'), 'value' => 'denium'],
                ['label' => __('Fur'), 'value' => 'fur'],
                ['label' => __('Wool'), 'value' => 'wool']
            ];
        }

        return $this->_options;
    }
}
