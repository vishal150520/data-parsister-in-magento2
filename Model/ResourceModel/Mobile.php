<?php
namespace Bluethink\Test\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Mobile extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('province','province_id');
    }
}