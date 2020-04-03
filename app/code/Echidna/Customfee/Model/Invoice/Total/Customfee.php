<?php

namespace Echidna\Customfee\Model\Invoice\Total;

use Magento\Sales\Model\Order\Invoice\Total\AbstractTotal;

class Fee extends AbstractTotal
{
    /**
     * @param \Magento\Sales\Model\Order\Invoice $invoice
     * @return $this
     */
    public function collect(\Magento\Sales\Model\Order\Invoice $invoice)
    {
        $invoice->setCustomfee(0);

        $amount = $invoice->getOrder()->setCustomfee();
        $invoice->setFee($amount);

        $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->setCustomfee());
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->setCustomfee());

        return $this;
    }
}
