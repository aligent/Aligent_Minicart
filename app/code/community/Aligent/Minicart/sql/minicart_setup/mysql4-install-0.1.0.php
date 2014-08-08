<?php
$installer = $this;
$installer->startSetup();

$installer->setConfigData('checkout/sidebar/display', 1);
$installer->setConfigData('checkout/sidebar/count', 9999);

$installer->endSetup();