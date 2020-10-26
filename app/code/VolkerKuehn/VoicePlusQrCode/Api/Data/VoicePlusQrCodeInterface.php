<?php
namespace VolkerKuehn\VoicePlusQrCode\Api\Data;
interface VoicePlusQrCodeInterface
{
    const RECORD_ID  = 'record_id';
    const RECORD_URL = 'record_url';
    const PRODUCT_ID = 'product_id';
    const QUOTE_ID = 'quote_id';
    const CREATED_AT = 'created_at';  
    public function getRecordId();
    public function getRecordUrl();
    public function getProductId();
    public function getQuoteId();
    public function getCreatedAt();
    public function setRecordId($recordId);
    public function setRecordUrl($recordUrl);
    public function setProductId($productId);
    public function setQuoteId($quoteId);
    public function setCreatedAt($createdAt);
}