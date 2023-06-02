<?php

namespace Sigma\CrudAssignment\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class ResponseForm extends Template
{
    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('response/response/post', ['_secure' => true]);
    }
}
