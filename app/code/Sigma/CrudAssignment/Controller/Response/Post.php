<?php

namespace Sigma\CrudAssignment\Controller\Response;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Sigma\CrudAssignment\Model\CrudAssignmentFactory;


class Post extends Action
{

    public function __construct(
        Context $context,
        private PageFactory $pageFactory,
        private CrudAssignmentFactory $crudAssignmentFactory
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array) $this->getRequest()->getPost();

            if($data) {
             $model = $this->crudAssignmentFactory->create();
             $model->setData($data)->save();

             $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, please try again."));
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());

        return $resultRedirect;
    }
}
