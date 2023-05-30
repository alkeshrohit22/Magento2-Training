<?php

namespace Sigma\ProductMaterial\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function __construct(
        private \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    )
    {
    }

    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $eavSetup = $this->eavSetupFactory->create();

        $eavSetup->addAttribute(
            Product::ENTITY,
            'clothing_material',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Clothing Material',
                'input' => 'select',
                'source' => 'Sigma\ProductMaterial\Model\Attribute\Source\Material',
                'frontend' => 'Sigma\ProductMaterial\Model\Attribute\Frontend\Material',
                'backend' => 'Sigma\ProductMaterial\Model\Attribute\Backend\Material',
                'required' => false,
                'sort_order' => 50,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true,
                'filterable' => true,
                'filterable_in_search' => true
            ]
        );
    }
}
