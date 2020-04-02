define(
    [
        'jquery',
        'Magento_Checkout/js/view/summary/abstract-total',
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/totals',
        'Magento_Catalog/js/price-utils'
    ],
    function ($,Component,quote,totals,priceUtils) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Echidna_Customfee/checkout/summary/handling-fee'
            },
            totals: quote.getTotals(),
            isDisplayedHandlingfeeTotal : function () {
                return true;
            },
            getHandlingfeeTotal : function () {
                var price = parseFloat(totals.totals()['custom_fee']);
                return this.getFormattedPrice(price);
            }
        });
    }
);
