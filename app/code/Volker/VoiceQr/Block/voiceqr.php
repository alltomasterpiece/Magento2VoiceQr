<?php

namespace Volker\VoiceQr\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Volker\VoiceQr\Model\ResourceModel\Collection as VoiceQrCollection;
use \Volker\VoiceQr\Model\ResourceModel\CollectionFactory as VoiceQrCollectionFactory;


class VoiceQr extends Template
{
    protected $_storeManager;
    protected $_urlInterface;

public function __construct(
    \Magento\Backend\Block\Template\Context $context,        
    \Magento\Store\Model\StoreManagerInterface $storeManager,
    \Magento\Framework\UrlInterface $urlInterface,    
    array $data = []
)
{        
    $this->_storeManager = $storeManager;
    $this->_urlInterface = $urlInterface;
    parent::__construct($context, $data);
}

public function _prepareLayout()
{
    return parent::_prepareLayout();
}

/**
 * Prining URLs using StoreManagerInterface
 */
public function getStoreManagerData()
{    
    echo $this->_storeManager->getStore()->getId() . '<br />';
    
    // by default: URL_TYPE_LINK is returned
    echo $this->_storeManager->getStore()->getBaseUrl() . '<br />';        
    
    echo $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB) . '<br />';
    echo $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_DIRECT_LINK) . '<br />';
    echo $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . '<br />';
    echo $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_STATIC) . '<br />';
    
    echo $this->_storeManager->getStore()->getUrl('product/33') . '<br />';
    
    echo $this->_storeManager->getStore()->getCurrentUrl(false) . '<br />';
        
    echo $this->_storeManager->getStore()->getBaseMediaDir() . '<br />';
        
    echo $this->_storeManager->getStore()->getBaseStaticDir() . '<br />';    
}

/**
 * Prining URLs using URLInterface
 */
public function getUrlInterfaceData()
{
    echo $this->_urlInterface->getCurrentUrl() . '<br />';
    
    echo $this->_urlInterface->getUrl() . '<br />';
    
    echo $this->_urlInterface->getUrl('helloworld/general/enabled') . '<br />';
    
    echo $this->_urlInterface->getBaseUrl() . '<br />';
} 
    
}