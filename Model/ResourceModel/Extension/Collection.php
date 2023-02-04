<?php
namespace Bluethink\Test\Model\ResourceModel\Extension;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Bluethink\Test\Model\Extension', 
        'Bluethink\Test\Model\ResourceModel\Extension');
    }
}