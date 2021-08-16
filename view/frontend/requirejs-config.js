var config = {
    "map": {
        "*": {
            'Magento_Checkout/js/model/shipping-save-processor/default': 'AHT_CommentOrder/js/model/shipping-save-processor/default'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'AHT_CommentOrder/js/mixin/shipping-mixin': true
            },
            'Amazon_Payment/js/view/shipping': {
                'SR_DeliveryDate/js/mixin/shipping-mixin': true
            }
        }
    }
};
