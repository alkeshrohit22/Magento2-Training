<?php

namespace Sigma\ProductMaterial\Model\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class Material extends AbstractBackend
{

    /**
     * @param $object
     * @return true
     * @throws LocalizedException
     */
    public function validate($object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());

        if ( ($object->getAttributeSetId() == 10) && ($value == 'wool')) {
            throw new LocalizedException(
                __('Bottom can not be wool.')
            );
        }
        return true;
    }
}
