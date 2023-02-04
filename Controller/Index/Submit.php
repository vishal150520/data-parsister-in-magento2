<?php

namespace Bluethink\Test\Controller\Index;

use Magento\Framework\App\Action\Context;
use Bluethink\Test\Model\ExtensionFactory;
use Bluethink\Test\Model\ImageFactory;
use Bluethink\Test\Model\EmailFactory;
use Bluethink\Test\Model\MobileFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;
class Submit extends \Magento\Framework\App\Action\Action
{
    protected $_test;
    protected $_Mobile;
    protected $_image;
    protected $_Email;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    public function __construct(
        Context $context,
        ExtensionFactory $test,
        MobileFactory $image,
        ImageFactory $Mobile,
        EmailFactory $Email,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    ) {
        $this->_test = $test;
        $this->_image= $image;
        $this->_Mobile= $Mobile;
        $this->_Email= $Email;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        if ($data) {    
            $variable=$data['images'];
            $img= implode(",",$data['images']);
            $data['images']=$img;
         }
       
        
        $image = $this->_image->create();
        $image->setData($data);
        $image->save();

        $Email = $this->_Email->create();
        $Email->setData($data);
        $Email->save();

        $Mobile = $this->_Mobile->create();
        $Mobile->setData($data);
        $Mobile->save();

        $test = $this->_test->create();
        $test->setData($data);
        if($test->save()){
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('test');
        return $resultRedirect;
    }
}


