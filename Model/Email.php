<?php
namespace Bluethink\Test\Model;
 
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Email extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Bluethink\Test\Model\ResourceModel\Email');
    }
}