<?php

namespace Anees\MagentoDev\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action
{
    /**
     * Execute method
     */
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();


        if (!$post) {
            return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setUrl($this->_redirect->getRefererUrl());
        }

        try {
            // Handle the form submission and validation here
            // Example: $email = $post['email'];

            $this->messageManager->addSuccessMessage(__('Form submitted successfully.'));
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('An error occurred while submitting the form.'));
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setUrl($this->_redirect->getRefererUrl());
    }
}
