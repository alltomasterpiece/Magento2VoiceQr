<?php 
namespace Volker\VoiceQr\Controller\Index;
use Volker\VoiceQr\Model\VoiceQrModelFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
class Index extends \Magento\Framework\App\Action\Action{
    protected $_voiceQrModel;
    protected $resultRedirect;
    public function __construct(\Magento\Framework\App\Action\Context $context,
        \Volker\VoiceQr\Model\VoiceQrModelFactory  $voiceQrModel,
    \Magento\Framework\Controller\ResultFactory $result){
        parent::__construct($context);
        $this->_voiceQrModel = $voiceQrModel;
        $this->resultRedirect = $result;
    }
	public function execute(){
        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
		$model = $this->_voiceQrModel->create();
		$model->addData([
			"url" => 'testurl',
			"product_id" => '1234567890',
			"quote_id" => '1234567899'
			
			]);
        $saveData = $model->save();
        if($saveData){
            $this->messageManager->addSuccess( __('Insert Record Successfully !') );
        }
		return $resultRedirect;
	}
}
 ?>