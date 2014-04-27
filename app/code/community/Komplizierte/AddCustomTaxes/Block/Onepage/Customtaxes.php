<?php
class Komplizierte_AddCustomTaxes_Block_Onepage_Customtaxes extends Mage_Checkout_Block_Onepage_Abstract
{
    public function __construct()
    {
        $this->setTemplate('komplizierte_addcustomtaxes/checkout/onepage/shipping_method/customtaxes.phtml');
    }
    public function getPostUrl()
    {
        return Mage::getUrl('deliverytime/index/ajax', array('_secure'=>true));
    }
    public function getEnablecustomtaxesPostUrl()
    {
        return Mage::getUrl('addcustomtaxes/index/enabletaxes', array('_secure'=>true));
    }
    public function getResidentialIsNull(){
        $value=Mage::getSingleton('customer/session')->getResidential();
        if (is_null($value)) return true;
    }
    public function getLiftgateneededIsNull(){
        $value=Mage::getSingleton('customer/session')->getResidential();
        if (is_null($value)) return true;

    }
    public function getResidentialIsChecked(){
        $value=Mage::getSingleton('customer/session')->getResidential();
        if (is_null($value) || $value=='true') return true;
        else return false;
    }
    public function getComercialIsChecked(){
        $value=Mage::getSingleton('customer/session')->getResidential();
        if ($value=='false') return true;
        else return false;
    }
    public function getLiftgateneededIsChecked(){
        $value=Mage::getSingleton('customer/session')->getLiftgateneeded();
        if (is_null($value) || $value=='true') return true;
        else return false;
    }
    public function getLiftgateNotneededIsChecked(){
        $value=Mage::getSingleton('customer/session')->getLiftgateneeded();
        if ($value=='false') return true;
        else return false;
    }
}