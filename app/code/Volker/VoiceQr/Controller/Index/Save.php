<?php

namespace Volker\VoiceQr\Controller\Index;

use Magento\Framework\App\Action\Context;
use Volker\VoiceQr\Model\VoiceQrModelFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;
class Save extends \Magento\Framework\App\Action\Action
{
    protected $_voiceqr;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;
    protected $resultRedirect;

    public function __construct(
        Context $context,
        VoiceQrModelFactory $voiceqr,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem,
        ResultFactory $resultFactory
    ) {
        $this->_voiceqr = $voiceqr;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        $this->resultRedirect=$resultFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        $data = $this->getRequest()->getParams();
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            try{
                $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'image']);
                $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->adapterFactory->create();
                $uploaderFactory->addValidateCallback('custom_image_upload',$imageAdapter,'validateUploadFile');
                // $uploaderFactory->setAllowRenameFiles(true);
                // $uploaderFactory->setFilesDispersion(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $destinationPath = $mediaDirectory->getAbsolutePath('UpleadedVoice');
                $result = $uploaderFactory->save($destinationPath);
                if (!$result) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                $imagePath = $destinationPath."/".$result['file'];
                $data['image'] = $imagePath;
                
            } catch (\Exception $e) {
            }
        }
        $voiceqr = $this->_voiceqr->create();
        $voiceqr->addData(["url"=>$imagePath,
        "product_id" => '1234567890',
		"quote_id" => '1234567899']);
        if($voiceqr->save()){
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }

        // $model = $this->_voiceQrModel->create();
		// $model->addData([
		// 	"url" => 'testurl',
		// 	"product_id" => '1234567890',
		// 	"quote_id" => '1234567899'
			
		// 	]);
        // $saveData = $model->save();
        // if($saveData){
        //     $this->messageManager->addSuccess( __('Insert Record Successfully !') );
        // }


        // $resultRedirect = $this->resultRedirectFactory->create();
        // $resultRedirect->setPath('voiceqr');
        return $resultRedirect;
    }
}