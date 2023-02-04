<?php
namespace Bluethink\Test\Model\ResourceModel\Email;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Bluethink\Test\Model\Email', 
        'Bluethink\Test\Model\ResourceModel\Email');
    }
}