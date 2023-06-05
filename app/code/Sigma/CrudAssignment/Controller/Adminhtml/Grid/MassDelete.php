<?php

namespace Sigma\CrudAssignment\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Sigma\CrudAssignment\Model\ResourceModel\Grid\CollectionFactory;
use Sigma\CrudAssignment\Model\CrudAssignmentFactory;

class MassDelete extends Action
{

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param CrudAssignmentFactory $gridFactory
     */
    public function __construct(
        Context $context,
        protected Filter $filter,
        protected CollectionFactory $collectionFactory,
        protected CrudAssignmentFactory $gridFactory
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $recordDeleted = 0;

            foreach ($collection->getItems() as $record) {
                $gridModel = $this->gridFactory->create();
                $gridModel->load($record->getId());
                $gridModel->delete();
                $recordDeleted++;
            }

            $this->messageManager->addSuccessMessage(__('A Total of %1 record(s) have been deleted.', $recordDeleted));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('An error occurred while deleting the records: %1', $e->getMessage()));
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
