<?php


namespace Echidna\Custompayment\Model\Payment;

/**
 * Class Offlinepayment
 *
 * @package Echidna\Custompayment\Model\Payment
 */
class Offlinepayment extends \Magento\Payment\Model\Method\AbstractMethod
{

    protected $_code = "offlinepayment";
    protected $_isOffline = true;

    public function isAvailable(
        \Magento\Quote\Api\Data\CartInterface $quote = null
    ) {
        return parent::isAvailable($quote);
    }
}

