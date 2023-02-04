<?php
namespace Bluethink\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Image extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('image_upload','id');
    }
}