<?php
/**
* Copyright © Magento, Inc. All rights reserved.
* See COPYING.txt for license details.
*/

namespace Bluethink\Test\ViewModel;

use Bluethink\Test\Helper\Data;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
* Provides the user data to fill the form.
*/
class UserDataProvider implements ArgumentInterface
{

    /**
     * @var Data
     */
    private $helper;

    /**
     * UserDataProvider constructor.
     * @param Data $helper
     */
     public function __construct(
         Data $helper
     ) {
        $this->helper = $helper;
     }

     /**
      * Get user name
      *
      * @return string
      */
      public function getUserName()
      {
          return $this->helper->getPostValue('name');
      }

      /**
       * Get user email
       *
       * @return string
       */
       public function getUserEmail()
       {
          return $this->helper->getPostValue('email');
       }

          /**
       * Get user email
       *
       * @return string
       */
      public function getUserTelephone()
      {
         return $this->helper->getPostValue('telephone');
      }

      /**
       * Get user comment
       *
       * @return string
       */
       public function getUserPost()
       {
          return $this->helper->getPostValue('post');
       }
}