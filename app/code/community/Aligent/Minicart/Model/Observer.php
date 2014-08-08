<?php

class Aligent_Minicart_Model_Observer extends Mage_Core_Model_Abstract
{
    /**
     * Binds to the controller_action_predispatch_checkout_cart_index Event and renders the current cart contents as JSON
     *
     * @param Varien_Event_Observer $observer
     * @return void
     */
    public function renderAjaxCart($oObserver){
        $oRequest = Mage::app()->getRequest();
        if ($oRequest->isAjax()) {
            $aParams = $oRequest->getParams();

            if(isset($aParams['current_url'])) {
                $vCurrentUrl = $aParams['current_url'];
            } else {
                $vCurrentUrl = Mage::getUrl('checkout/cart');
            }

            Mage::app()->getFrontController()->getAction()->loadLayout();
            $vHtml = Mage::app()->getLayout()->getBlock('minicart')->assign('currentUrl', $vCurrentUrl)->toHtml();
            $vJsonData = Zend_Json::encode(array('minicart' => $vHtml));
            Mage::app()->getResponse()->setBody($vJsonData);
            $vActionName = $oRequest->getActionName();
            Mage::app()->getFrontController()->getAction()->setFlag($vActionName, Mage_Core_Controller_Varien_Action::FLAG_NO_DISPATCH, true);
        }
    }

}