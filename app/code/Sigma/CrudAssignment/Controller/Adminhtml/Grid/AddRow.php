<?php

namespace Sigma\CrudAssignment\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;
use Sigma\CrudAssignment\Model\CrudAssignmentFactory;

class AddRow extends Action
{
    public function __construct(
        Context $context,
        private Registry $registry,
        private CrudAssignmentFactory $crudAssignmentFactory
    )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->crudAssignmentFactory->create();

        if($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();

            if(!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist'));
                $this->_redirect('grid/grid/rowdata');
                return;
            }
        }
        $this->registry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $title = $rowId ? __('Edit Row Data').$rowTitle : __('Add Row Data');

        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }
}
