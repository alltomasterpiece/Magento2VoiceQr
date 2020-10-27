<?php 
namespace Volker\VoiceQr\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('voice_qr');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                            ->addColumn(
                                'id',
                                Table::TYPE_INTEGER,
                                null,
                     ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
                                )
                            ->addColumn(
                                'url',
                                Table::TYPE_TEXT,
                                255,
                                ['nullable'=>false,'default'=>'']
                                )
                            ->addColumn(
                                'product_id',
                                Table::TYPE_INTEGER,
                                '2M',
                                ['nullbale'=>false]
                                )
                            ->addColumn(
                                'quote_id',
                                Table::TYPE_INTEGER,
                                '2M',
                                ['nullbale'=>false]
                                )
                            ->addColumn(
                                'created_at',
                                Table::TYPE_TIMESTAMP,
                                null,
                                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT]
                                
                            )
                            ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        $setup->endSetup();
    }
}
 ?>