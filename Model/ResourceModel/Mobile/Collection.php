<?php
namespace Bluethink\Test\Model\ResourceModel\Mobile;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Bluethink\Test\Model\Mobile', 
        'Bluethink\Test\Model\ResourceModel\Mobile');
    }
}