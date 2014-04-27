<?php
class Komplizierte_AddCustomTaxes_IndexController extends Mage_Core_Controller_Front_Action
{

    public function EnabletaxesAction()
    {
        $value = $this->getRequest()->getPost('shipping_method');
        $result = 'true';
        $table=Mage::getStoreConfig('komplizierte_addcustomtaxes/main/method');
        if (!strstr($value, $table))
        {
            $result = 'false';
            Mage::getSingleton('customer/session')->setLiftgateneeded(null);
            Mage::getSingleton('customer/session')->setResidential(null);
        }
        else{
            $value = $this->getRequest()->getPost('residential');
            if ($value == 'true' || $value == 'false')
                Mage::getSingleton('customer/session')->setResidential($value);
            $value = $this->getRequest()->getPost('liftgateneeded');
            if ($value == 'true' || $value == 'false')
                Mage::getSingleton('customer/session')->setLiftgateneeded($value);
        }
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode(array('result' => $result)));
    }
}