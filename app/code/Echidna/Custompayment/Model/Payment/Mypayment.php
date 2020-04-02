<?php


namespace Echidna\Custompayment\Model\Payment;

class Mypayment extends \Magento\Payment\Model\Method\AbstractMethod
{

    protected $_code = "mypayment";
    protected $_isOffline = true;

    public function isAvailable(
        \Magento\Quote\Api\Data\CartInterface $quote = null
    ) {
        return parent::isAvailable($quote);
    }
}
