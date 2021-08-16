define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
 
    return Component.extend({
        defaults: {
            template: 'AHT_CommentOrder/comment-form'
        },
        initialize: function () {
            this.delivery_comment = ko.observable();
            this._super();
        },
        setShippingInformation: function () {
            var delivery_comment_value = $("#delivery_comment").val();
            if (quote.shippingAddress().extensionAttributes == undefined) {
                quote.shippingAddress().extensionAttributes = {};
            }
            quote.shippingAddress().extensionAttributes.delivery_comment = delivery_comment_value;
        }
    });

});