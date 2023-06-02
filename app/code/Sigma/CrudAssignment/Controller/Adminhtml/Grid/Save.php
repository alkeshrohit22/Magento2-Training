<?php

namespace Sigma\CrudAssignment\Controller\Adminhtml\Grid;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Sigma\CrudAssignment\Model\CrudAssignment;
use Sigma\CrudAssignment\Model\CrudAssignmentFactory;

class Save extends Action
{

    public function __construct(
        Context $context,
        private CrudAssignmentFactory $crudAssignmentFactory
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $data = (array) $this->getRequest()->getPost();

        if(!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }

        try {
            $rowData = $this->crudAssignmentFactory->create();
            $rowData->setData($data)->save();
            if(isset($data['id'])) {
                $rowData->setId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccessMessage(__('Data Added Successfully.'));
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage("We can\'t submit your request, please try again.");
        }

        $this->_redirect('grid/grid/index');
    }
}
