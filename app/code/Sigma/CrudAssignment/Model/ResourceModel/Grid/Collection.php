<?php

namespace Sigma\CrudAssignment\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sigma\CrudAssignment\Model\CrudAssignment;

class Collection extends AbstractCollection
{
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            CrudAssignment::class,
            \Sigma\CrudAssignment\Model\ResourceModel\CrudAssignment::class
        );
        parent::_construct();
    }
}
