<?php

namespace Sigma\CrudAssignment\Controller\Response;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    public function __construct(
        Context $context,
        private PageFactory $pageFactory
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
