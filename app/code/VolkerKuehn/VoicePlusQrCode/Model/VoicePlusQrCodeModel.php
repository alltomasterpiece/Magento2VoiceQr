<?php

namespace VolkerKuehn\VoicePlusQrCode\Model;

// use \Magento\Framework\Model\AbstractModel;
// use \Magento\Framework\DataObject\IdentityInterface;
// use \Toptal\Blog\Api\Data\VoicePlusQrCodeInterface;

/**
 * Class File
 * @package VolkerKuehn\VoicePlusQrCode\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class VoicePlusQrCodeModel extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Cache tag
     */
    // const CACHE_TAG = 'volkerkuehn_voiceplusqrcodemodel';

    /**
     * Post Initialization
     * @return void
     */
    public function _construct()
    {
        $this->_init('VolkerKuehn\VoicePlusQrCode\Model\ResourceModel\VoicePlusQrCodeResourceModel');
    }


    
    // public function getRecordId()
    // {
    //     return $this->getData(self::RECORD_ID);
    // }

    
    // public function getRecordUrl()
    // {
    //     return $this->getData(self::RECORD_URL);
    // }

    // public function getProductId()
    // {
    //     return $this->getData(self::PRODUCT_ID);
    // }

    // public function getQuoteId()
    // {
    //     return $this->getData(self::QUOTE_ID);
    // }
    // /**
    //  * Get Created At
    //  *
    //  * @return string|null
    //  */
    // public function getCreatedAt()
    // {
    //     return $this->getData(self::CREATED_AT);
    // }

    
    // public function getIdentities()
    // {
    //     return [self::CACHE_TAG . '_' . $this->getRecordId()];
    // }

   
    // public function setRecordUrl($recordUrl)
    // {
    //     return $this->setData(self::RECORD_URL, $recordUrl);
    // }

    
    // public function setProductId($productId)
    // {
    //     return $this->setData(self::PRODUCT_ID, $productId);
    // }

    // public function setQuoteId($quoteId)
    // {
    //     return $this->setData(self::QUOTE_ID, $quoteId);
    // }

    // public function setCreatedAt($createdAt)
    // {
    //     return $this->setData(self::CREATED_AT, $createdAt);
    // }

    // /**
    //  * Set ID
    //  *
    //  * @param int $id
    //  * @return $this
    //  */
    // public function setRecordId($recordId)
    // {
    //     return $this->setData(self::RECORD_ID, $recordId);
    // }
}