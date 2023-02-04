<?php
namespace Bluethink\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Email extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('email_test','id');
    }
}