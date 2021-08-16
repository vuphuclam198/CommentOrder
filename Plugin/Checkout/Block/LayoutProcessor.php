<?php
namespace AHT\CommentOrder\Plugin\Checkout\Block;

use AHT\CommentOrder\Model\Config;

class LayoutProcessor
{
    /**
     * @var \AHT\CommentOrder\Model\Config
     */
    protected $config;

    /**
     * LayoutProcessor constructor.
     *
     * @param Config $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array $jsLayout
    ) {

        $requiredDeliveryComment =  $this->config->getRequiredDeliveryComment()?: false;
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shippingAdditional'] = [
            'component' => 'uiComponent',
            'displayArea' => 'shippingAdditional',
            'children' => [
                'form-fields' => [
                    'component' => 'uiComponent',
                    'children' => [
                        'delivery_comment' => [
                            'component' => 'Magento_Ui/js/form/element/textarea',
                            'config' => [
                                'template' => 'ui/form/field',
                                'elementTmpl' => 'ui/form/element/textarea',
                                'options' => [],
                                'id' => 'delivery_comment'
                            ],
                            'dataScope' => 'delivery_date.delivery_comment',
                            'label' => 'Order Comment',
                            'provider' => 'checkoutProvider',
                            'visible' => true,
                            'validation' => [],
                            'sortOrder' => 20,
                            'id' => 'delivery_comment'
                        ]
                    ],
                ],
            ]
        ];

        return $jsLayout;
    }
}