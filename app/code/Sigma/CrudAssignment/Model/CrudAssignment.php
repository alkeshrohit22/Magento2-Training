<?php
declare(strict_types=1);

namespace Sigma\CrudAssignment\Model;

use Magento\Framework\Model\AbstractModel;
use Sigma\CrudAssignment\Api\Data\CrudAssignmentInterface;

class CrudAssignment extends AbstractModel implements CrudAssignmentInterface
{

    const CACHE_TAG = 'sigma_crud_assignment_record';

    protected $_cacheTag = 'sigma_crud_assignment_record';

    protected $_eventPrefix = 'sigma_crud_assignment_record';

    protected function _construct()
    {
        $this->_init(\Sigma\CrudAssignment\Model\ResourceModel\CrudAssignment::class);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setID($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getContactNumber()
    {
        return $this->getData(self::CONTACT_NUMBER);
    }

    public function setContactNumber($contact)
    {
        return $this->setData(self::CONTACT_NUMBER, $contact);
    }

    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
