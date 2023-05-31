<?php

namespace Sigma\OrderComment\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Sigma\OrderComment\Block\OrderConfiguration;

class AdditionalConfigVars implements ConfigProviderInterface
{
    public function __construct(
        private OrderConfiguration $orderConfiguration
    )
    {
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('Yeah, I am in this file!');

        $commentTitle = $this->orderConfiguration->getCustomerCommentTitle();
        $commentDescription = $this->orderConfiguration->getCustomerCommentDescription();

        $logger->info('Comment title : '. $commentTitle);
        $logger->info("Comment Desc : " . $commentDescription);

        $additionalVariables['commentTitle'] = $commentTitle;
        $additionalVariables['commentDescription'] = $commentDescription;

        return $additionalVariables;
    }
}
