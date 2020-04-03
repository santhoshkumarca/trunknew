<?php

namespace Echidna\CustomFee\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $quoteTable = 'quote';
        $quoteAddressTable = 'quote_address';
        $orderTable = 'sales_order';
        $invoiceTable = 'sales_invoice';
        $creditmemoTable = 'sales_creditmemo';

        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quoteTable),
                'custom_fee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '20,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Fee'

                ]
            );
        //Quote address tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quoteAddressTable),
                'custom_fee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '20,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Fee'
                ]
            );
        //Order tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($orderTable),
                'custom_fee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '20,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Fee'

                ]
            );
        //Invoice tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($invoiceTable),
                'custom_fee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '20,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Fee'

                ]
            );
        //Credit memo tables
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($creditmemoTable),
                'custom_fee',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '20,4',
                    'default' => 0.00,
                    'nullable' => true,
                    'comment' =>'Fee'

                ]
            );
        $setup->endSetup();
    }
}
