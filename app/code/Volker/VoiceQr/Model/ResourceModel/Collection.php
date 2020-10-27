<?php 
namespace Volker\VoiceQr\Model\ResourceModel\VoiceQrModel;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("Volker\VoiceQr\Model\VoiceQrModel","Volker\VoiceQr\Model\ResourceModel\VoiceQrModel");
	}
}
 ?>