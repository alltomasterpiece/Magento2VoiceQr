<?php 
namespace VolkerKuehn\VoicePlusQrCode\Model\ResourceModel\VoicePlusQrCodeResourceModel;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("VolkerKuehn\VoicePlusQrCode\Model\VoicePlusQrCodeModel","VolkerKuehn\VoicePlusQrCode\Model\ResourceModel\VoicePlusQrCodeResourceModel");
	}
}
 ?>


