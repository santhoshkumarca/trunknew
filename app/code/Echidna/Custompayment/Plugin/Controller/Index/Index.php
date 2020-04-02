<?php

namespace Echidna\Custompayment\Plugin\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Checkout\Model\Session as CartSession;


class Index
{
    /**
     * @var ResultFactory
     */
    private $resultFactory;
    /**
     * @var StoreManagerInterface
     */
    private $_storeManager;

    private $session;

    public function __construct(
        ResultFactory $resultFactory,
        StoreManagerInterface $storeManager,
        CartSession $session
    )
    {
        $this->resultFactory = $resultFactory;
        $this->_storeManager = $storeManager;
        $this->session = $session;
    }

    public function afterExecute(\Magento\Checkout\Controller\Index\Index $subject, $result) {
        $quote =  $this->session->getQuote();
        $quoteShippingAddress = $quote->getShippingAddress();
//        Redirect to custom page if there is no telephone
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $baseUrl = $this->_storeManager->getStore()->getBaseUrl();
        if(empty($quoteShippingAddress->getTelephone()) && empty($quoteShippingAddress->getEmail())) {
            $resultRedirect->setUrl($baseUrl . 'custompayment/index/index');
            return $resultRedirect;
        }else{
//            Other wise exits normally
            return $result;
        }
    }
}
