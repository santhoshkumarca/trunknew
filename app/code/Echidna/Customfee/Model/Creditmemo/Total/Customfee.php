<?php

namespace Echidna\Customfee\Model\Creditmemo\Total;

use Magento\Sales\Model\Order\Creditmemo\Total\AbstractTotal;

class Customfee extends AbstractTotal
{
    /**
     * @param \Magento\Sales\Model\Order\Creditmemo $creditmemo
     * @return $this
     */
    public function collect(\Magento\Sales\Model\Order\Creditmemo $creditmemo)
    {
        $creditmemo->setCustomFee(0);

        $amount = $creditmemo->getOrder()->getCustomFee();
        $creditmemo->setCustomFee($amount);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $creditmemo->getCustomFee());
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $creditmemo->getCustomFee());

        return $this;
    }
}
