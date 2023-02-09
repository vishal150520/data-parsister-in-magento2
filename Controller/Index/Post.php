<?php
namespace Bluethink\Verify\Controller\Apply;

use \Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;

class Post extends Action
{
/**
* @var DataPersistorInterface
*/
private $dataPersistor;

/**
* @var Context
*/
private $context;

/**
* @var UploaderFactory
*/
protected $uploaderFactory;

/**
* @var AdapterFactory
*/
protected $adapterFactory;

/**
* @var Filesystem
*/
protected $filesystem;

/**
* @param Context $context
*/
public function __construct(
Context $context,
DataPersistorInterface $dataPersistor
) {
$this->dataPersistor = $dataPersistor;
$this->context = $context;
parent::__construct($context);
}

/**
* Prints the information
* @return Page
*/
public function execute()
{
if (!$this->getRequest()->isPost()) {
return $this->resultRedirectFactory->create()->setPath('*/*/');
}

try {
$data = $this->validatedParams();

$this->messageManager->addSuccessMessage(
__('Thanks for submitting your profile. We\'ll respond to you very soon.')
);
$this->dataPersistor->clear('apply_here');
} catch (LocalizedException $e) {
$this->messageManager->addErrorMessage($e->getMessage());
$this->dataPersistor->set('apply_here', $this->getRequest()->getParams());
} catch (\Exception $e) {
$this->logger->critical($e);
$this->messageManager->addErrorMessage(
__('An error occurred while processing your form. Please try again later.')
);
$this->dataPersistor->set('apply_here', $this->getRequest()->getParams());
}
return $this->resultRedirectFactory->create()->setPath('job/apply');
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
throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
}
if (trim($request->getParam('experience', '')) === '') {
throw new LocalizedException(__('Select the experience and try again.'));
}
if (trim($request->getParam('post', '')) === '') {
throw new LocalizedException(__('Select the post and try again.'));
}
if (trim($request->getParam('hideit', '')) !== '') {
// phpcs:ignore Magento2.Exceptions.DirectThrow
throw new \Exception();
}

return $request->getParams();
}
}