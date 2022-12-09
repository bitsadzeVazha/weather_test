<?php

namespace Weath\Test\Controller\Index;
class Pdf extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_contactFactory;
     protected $helperInventory;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Weath\Test\Model\PostFactory $contactFactory,
          \Weath\Test\Helper\Inventory $helperInventory
     ){
          $this->_pageFactory = $pageFactory;
          $this->_contactFactory = $contactFactory;
          $this->helperInventory = $helperInventory;
          return parent::__construct($context);
     }
     public function getTown($mega){
          $town = $this->helperInventory->makeACurlRequest($mega);
          
          return $town;
      }

     public function execute()
     {
          if ($this->getRequest()->isPost()) {
               $input = $this->getRequest()->getPostValue();
               $postData = $this->_contactFactory->create();
               $postData->addData($input);
               $postData->save();
             
               
               
          }
          return $this->_redirect('weather/index/insert');
     }
}
