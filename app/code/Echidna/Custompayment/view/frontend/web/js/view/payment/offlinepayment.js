define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'offlinepayment',
                component: 'Echidna_Custompayment/js/view/payment/method-renderer/offlinepayment-method'
            }
        );
        return Component.extend({});
    }
);