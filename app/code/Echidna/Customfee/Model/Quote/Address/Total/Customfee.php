<?php
namespace Echidna\Customfee\Model\Quote\Address\Total;
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
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
    ) {
        $this->_priceCurrency = $priceCurrency;
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);

        if (!count($shippingAssignment->getItems())) {
            return $this;
        }
        foreach ($shippingAssignment->getItems() as $item) {
            $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
            $logger = new \Zend\Log\Logger();
            $logger->addWriter($writer);
            $logger->info($item->getItemId());
        }

            $customFee = $this->getValue();
            //Try to test with sample value
            $total->setCustomFee($customFee);
            $total->setTotalAmount('handlingfee', $customFee);
            $total->setBaseTotalAmount('handlingfee', $customFee);
//            $quote->setCustomFee($customFee);
//            $total->setGrandTotal($total->getGrandTotal() + $customFee);
//            $total->setBaseGrandTotal($total->getBaseGrandTotal() + $customFee);


//            $handlingFee = $this->getValue();
//            $total->setCustomFee($handlingFee);
//            $total->addTotalAmount('handlingfee', $handlingFee);
//            $total->addBaseTotalAmount('handlingfee', $handlingFee);
//            $quote->setCustomFee($handlingFee);
        return $this;
    }

    public function fetch(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        return [
            'code' => 'Handling_Fee',
            'title' => $this->getLabel(),
            'value' => $this->getValue()
        ];
    }

    /**
     * get label
     * @return string
     */
    public function getLabel() {
        return __('Custom Fee');
    }
    public function getValue(){
        return 15;
    }
}
