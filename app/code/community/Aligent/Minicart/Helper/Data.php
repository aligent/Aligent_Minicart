<?php

class Aligent_Minicart_Helper_Data extends Mage_Core_Helper_Abstract {

    const EMPTY_CART_BLOCK_CONFIG = 'aligent_frontend/mini_cart/no_item_block';
    const PROMOTIONAL_MESSAGE_BLOCK_CONFIG = 'aligent_frontend/mini_cart/promotional_block	';

    public function getEmptyCartMessage() {
        $vBlockId = Mage::getStoreConfig(self::EMPTY_CART_BLOCK_CONFIG);
        if ($vBlockId) {
            return $this->getLayout()->createBlock('cms/block')->setBlockId($vBlockId)->toHtml();
        }
        // return default text
        return $this->__("You have no items in your shopping cart.");
    }

    public function getPromotionalMessage() {
        $vBlockId = Mage::getStoreConfig(self::PROMOTIONAL_MESSAGE_BLOCK_CONFIG);
        if ($vBlockId) {
            return $this->getLayout()->createBlock('cms/block')->setBlockId($vBlockId)->toHtml();
        }
        // return default text
        return "";
    }
}