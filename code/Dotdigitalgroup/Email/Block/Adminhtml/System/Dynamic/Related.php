<?php

class Dotdigitalgroup_Email_Block_Adminhtml_System_Dynamic_Related extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
	    //passcode to append for url
	    $passcode = Mage::helper('connector')->getPasscode();
	    //last order id witch information will be generated
	    $lastOrderId = Mage::helper('connector')->getLastOrderId();

	    if(!strlen($passcode))
		    $passcode = '[PLEASE SET UP A PASSCODE]';
	    if(!$lastOrderId)
		    $lastOrderId = '[PLEASE MAP THE LAST ORDER ID]';

	    //generate the base url and display for default store id
	    $baseUrl = Mage::helper('connector')->generateDynamicUrl();

	    //display the full url
        $text = sprintf('%sconnector/products/related/code/%s/order_id/@%s@', $baseUrl, $passcode, $lastOrderId);
        $element->setData('value', $text);

        return parent::_getElementHtml($element);
    }
}