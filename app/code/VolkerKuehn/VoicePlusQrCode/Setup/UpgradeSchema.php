<?php 
namespace VolkerKuehn\VoicePlusQrCode\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface{
 
	public function upgrade(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        if (version_compare($context->getVersion(), '0.1.0', '<')) {
            $this->addStatus($setup);
        }
        $setup->endSetup();
	}
	
    /**
     * @param SchemaSetupInterface $setup
     * @return void
     */
    private function addStatus(SchemaSetupInterface $setup)
    {
       
        $tableName = $setup->getTable('voice_qrcode_table');

        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'record_url',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Record Url'
                )
                ->addColumn(
                    'product_id',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Product Id'
                )
                ->addColumn(
                    'quote_id',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Quote Id'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Created At'
                )
                ->setComment('VoiceQr - Module');
            $setup->getConnection()->createTable($table);
        }

       
    

 }
}
?>