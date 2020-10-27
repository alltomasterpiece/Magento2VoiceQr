<?php 
namespace Volker\VoiceQr\Model\ResourceModel;
class VoiceQrModel extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
 public function _construct(){
 $this->_init("voice_qr","id");
 }
}
 ?>