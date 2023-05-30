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
     * @throws \Zend_Log_Exception
     */
    public function validate($object)
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('test');

        $value = $object->getData($this->getAttribute()->getAttributeCode());

        $logger->info(print_r($value));

        if ( ($object->getAttributeSetId() == 10) && ($value == 'wool')) {
            throw new LocalizedException(
                __('Bottom can not be wool.')
            );
        }
        return true;
    }
}
