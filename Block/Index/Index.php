<?php

namespace Bluethink\Test\Block\Index;

class Index extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}
	public function getFormAction()
    {
        return $this->getUrl('test/index/submit', ['_secure' => true]);
    }
}