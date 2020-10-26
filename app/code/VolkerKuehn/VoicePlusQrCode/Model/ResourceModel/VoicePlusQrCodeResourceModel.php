<?php

namespace VolkerKuehn\VoicePlusQrCode\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    /**
     * Post Abstract Resource Constructor
     * @return void
     */
    public function _construct()
    {
        $this->_init('voice_qrcode_table', 'id');
    }
}

