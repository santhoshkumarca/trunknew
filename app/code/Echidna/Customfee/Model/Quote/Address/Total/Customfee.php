<?php
namespace Echidna\Customfee\Model\Quote\Address\Total;
use Magento\Checkout\Model\Session;

class Customfee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
    /**
     * @var \Magento\Framework\Pricing\PriceCurrencyInterface
     */
    protected $_priceCurrency;

    /**
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        Session $session
    ) {
        $this->_priceCurrency = $priceCurrency;
        $this->_session = $session;
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);

//        if (!count($shippingAssignment->getItems())) {
//            return $this;
//        }
        $customFee = 0;
        foreach ($shippingAssignment->getItems() as $item){
            if($item->getWeight() > 100 && !empty($item->getWeight())){
                $customFee = 15 + $customFee;
            }
        }
            $total->setCustomFee($customFee);
            $total->setTotalAmount('custom_fee', $customFee);
            $total->setBaseTotalAmount('custom_fee', $customFee);
            $total->setCustomFee($customFee);
            $quote->setCustomFee($customFee);
        return $this;
    }

    public function fetch(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        $customFee = 0;
        foreach ($quote->getItems() as $item){
            if($item->getWeight() > 100 && !empty($item->getWeight())){
                $customFee = 15 + $customFee;
            }
        }

        return [
            'code' => 'custom_fee',
            'title' => $this->getLabel(),
            'value' => $customFee
        ];
    }

    /**
     * get label
     * @return string
     */
    public function getLabel() {
        return __('Custom Fee');
    }

}
