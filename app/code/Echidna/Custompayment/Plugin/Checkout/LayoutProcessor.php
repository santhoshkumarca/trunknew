<?php
namespace Echidna\Custompayment\Plugin\Checkout;

use Magento\Checkout\Model\Session as CartSession;


class LayoutProcessor
{
    private $session;

    public function __construct(
        CartSession $session
    )
    {
        $this->session = $session;
    }
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $quote =  $this->session->getQuote();
        $quoteShippingAddress = $quote->getShippingAddress();

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['telephone']['value'] = $quoteShippingAddress->getTelephone();
        return $jsLayout;
    }
}
