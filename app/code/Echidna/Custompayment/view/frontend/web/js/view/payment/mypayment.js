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
                type: 'mypayment',
                component: 'Echidna_Custompayment/js/view/payment/method-renderer/mypayment-method'
            }
        );
        return Component.extend({});
    }
);