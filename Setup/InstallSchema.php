<?php
namespace AHT\CommentOrder\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'delivery_comment',
            [
                'type' => 'text',
                'nullable' => 'true',
                'length' => '255',
                'comment' => 'delivery comment'
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            'delivery_comment',
            [
                'type' => 'text',
                'nullable' => 'true',
                'length' => '255',
                'comment' => 'delivery comment'
            ]
        );

        $setup->endSetup();
    }
}