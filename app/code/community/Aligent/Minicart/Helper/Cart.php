<?php

class Aligent_Minicart_Helper_Cart extends Mage_Checkout_Helper_Cart {

    /**
     * Rewrite getCartUrl to return a protocol relative URL.
     *
     * @return string|unknown
     */
    public function getCartUrl() {
        $vCartUrl = parent::getCartUrl();
        if (substr($vCartUrl, 0, 5) == 'http:') {
            return substr($vCartUrl, 5);
        } elseif (substr($vCartUrl, 0, 6) == 'https:') {
            return substr($vCartUrl, 6);
        } else {
            return $vCartUrl;
        }
    }
}