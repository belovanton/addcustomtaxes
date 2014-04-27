<?php
class Komplizierte_AddCustomTaxes_Block_Adminhtml_Totalsoptions extends Mage_Adminhtml_Block_Sales_Order_Create_Abstract
{
    public function __construct()
    {
        $this->setTemplate('komplizierte_addcustomtaxes/totals.phtml');
    }
    public function getPostUrl()
    {
       return Mage::getUrl('adminhtml/setcustomtaxes/index', array());
    }
    public function getResidentialIsChecked(){
        $value=Mage::getSingleton('customer/session')->getResidential();
        if (is_null($value))
        {
            if(Mage::getSingleton('adminhtml/session_quote')->getOrder()->getResidential()>0){
                Mage::getSingleton('customer/session')->setResidential('true');
                return true;
            }
        }
        if($value=='true') return true;
        else return false;
    }
    public function getComercialIsChecked(){
        $value=Mage::getSingleton('customer/session')->getResidential();
        if (is_null($value))
        {
            if(Mage::getSingleton('adminhtml/session_quote')->getOrder()->getResidential()==0){
                Mage::getSingleton('customer/session')->setResidential('false');
                return true;
            }
        }
        if ($value=='false') return true;
        else return false;
    }
    public function getLiftgateneededIsChecked(){
        $value=Mage::getSingleton('customer/session')->getLiftgateneeded();
        if (is_null($value))
        {
            if(Mage::getSingleton('adminhtml/session_quote')->getOrder()->getLiftgateneeded()>0){
                Mage::getSingleton('customer/session')->setLiftgateneeded('true');
                return true;
            }
        }

        if ($value=='true') return true;
        else return false;
    }
    public function getLiftgateNotneededIsChecked(){
        $value=Mage::getSingleton('customer/session')->getLiftgateneeded();
        if (is_null($value))
        {
            if(Mage::getSingleton('adminhtml/session_quote')->getOrder()->getLiftgateneeded()==0){
                Mage::getSingleton('customer/session')->setLiftgateneeded('false');
                return true;
            }
        }
        if ($value=='false') return true;
        else return false;
    }
}