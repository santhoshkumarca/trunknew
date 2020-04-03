define(
    [
        'jquery',
        'Magento_Checkout/js/view/summary/abstract-total',
        'Magento_Checkout/js/model/quote',
        'Magento_Catalog/js/price-utils',
        'Magento_Checkout/js/model/totals'
    ],
    function ($, Component, quote, priceUtils, totals) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Echidna_Customfee/checkout/summary/handling-fee'
            },
            totals: quote.getTotals(),

            isDisplayedHandlingfeeTotal: function() {
                return this.isFullMode();
            },
            getHandlingfeeTotal: function() {
                var price = 0;
                if (this.totals()) {
                    price = totals.getSegment('custom_fee').value;
                }
                return priceUtils.formatPrice(price, quote.getBasePriceFormat());
            }
        });
    }
);
