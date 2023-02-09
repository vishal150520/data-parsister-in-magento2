<?php

namespace Bluethink\Test\Controller\Index;

use Magento\Framework\App\Action\Context;
use Bluethink\Test\Model\ExtensionFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;

class Submit extends \Magento\Framework\App\Action\Action
{
    /**
    * @var ExtensionFactory
    */
    private $_test;
    
    /**
    * @var DataPersistorInterface
    */
    private $dataPersistor;


    public function __construct(
        Context $context,
        ExtensionFactory $test,
        DataPersistorInterface $dataPersistor
    ) {
        $this->_test = $test;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }

        try{
            $paramsData = $this->validatedParams();

            $model = $this->_test->create();
            $saveData = $model->setData($paramsData)->save();
            if($saveData) {
                $this->messageManager->addSuccessMessage(__('Thanks for submitting.'));
                $this->dataPersistor->clear('apply_here');
            }
        
        
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('apply_here', $this->getRequest()->getParams());
        
        } catch (\Exception $e) {
            
            $this->messageManager->addErrorMessage(__('An error occurred.'));
            $this->dataPersistor->set('apply_here', $this->getRequest()->getParams());
        }
        return $this->resultRedirectFactory->create()->setPath('test/index');
    }

        
    


    /**
    * Method to validated params.
    *
    * @return array
    * @throws \Exception
    */

    private function validatedParams()
    {
        $request = $this->getRequest();

        if (trim($request->getParam('name', '')) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }
        if (\strpos($request->getParam('email', ''), '@') === false) {
            throw new LocalizedException(__('email address invalid. pls try again.'));
        }
        if (trim($request->getParam('telephone', '')) === '') {
            throw new LocalizedException(__('Enter the Telephone and try again.'));
        }
        return $request->getParams();
    }
        
}


