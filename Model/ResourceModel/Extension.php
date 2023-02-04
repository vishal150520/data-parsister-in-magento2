<?php
namespace Bluethink\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Extension extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('image_test','id');
    }
}