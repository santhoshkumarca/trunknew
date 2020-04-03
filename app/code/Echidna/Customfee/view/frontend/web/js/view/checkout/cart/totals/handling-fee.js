define(
    [   'jquery',
        'Echidna_Customfee/js/view/checkout/summary/handling-fee'
    ],
    function ($,Component) {
        'use strict';
        return Component.extend({
            isDisplayed: function () {
                return true;
            }
        });
    }
);
