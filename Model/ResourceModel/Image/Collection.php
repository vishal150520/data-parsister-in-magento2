<?php
namespace Bluethink\Test\Model\ResourceModel\Image;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Bluethink\Test\Model\Image', 
        'Bluethink\Test\Model\ResourceModel\Image');
    }
}