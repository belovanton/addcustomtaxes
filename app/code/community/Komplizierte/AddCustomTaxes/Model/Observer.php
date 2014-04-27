<?php
/**
* @author Amasty Team
* @copyright Copyright (c) Amasty (http://www.amasty.com)
* @package Amasty_Deliverydate
*/
class Komplizierte_AddCustomTaxes_Model_Observer
{

    public function onCoreBlockAbstractToHtmlAfter($observer)
    {
        $storeId = Mage::app()->getStore()->getId();
        //if (Mage::getStoreConfig('amdeliverydate/general/enabled', $storeId)) {
            $block = $observer->getBlock();
            $transport = $observer->getTransport();
            $html = $transport->getHtml();
            // Shipping Method step
            $blockClass = Mage::getConfig()->getBlockClassName('checkout/onepage_shipping_method_available');
            if ($blockClass == get_class($block)) {
                $method=Mage::getModel('checkout/cart')->getQuote()->getShippingAddress()->getCity();
                if (!$method || $method=='-'){
                    Mage::getSingleton('customer/session')->setLiftgateneeded(null);
                    Mage::getSingleton('customer/session')->setResidential(null);
                }
                $insert = Mage::app()->getLayout()->createBlock('komplizierte_addcustomtaxes/onepage_customtaxes')->toHtml();
                $html .= $insert;
            }
            $blockClass = 'Mage_Adminhtml_Block_Sales_Order_Create_Shipping_Address';
            if ($blockClass == get_class($block)) {
                $insert = Mage::app()->getLayout()->createBlock('komplizierte_addcustomtaxes/adminhtml_totalsoptions')->toHtml();;
                $html .= $insert;
            }
            $transport->setHtml($html);
       // }
    }
    public function salesOrderSaveAfter($observer){
        $order=$observer->getOrder();
        if(Mage::getSingleton('customer/session')->getResidential()=='false'){
            $order->setResidential('0');
        }
        if(Mage::getSingleton('customer/session')->getResidential()=='true'){
            $order->setResidential('40');
        }
        if(Mage::getSingleton('customer/session')->getLiftgateneeded()=='false'){
            $order->setLiftgateneeded('0');
        }
        if(Mage::getSingleton('customer/session')->getLiftgateneeded()=='true'){
            $order->setLiftgateneeded('40');
        }
        Mage::getSingleton('customer/session')->setLiftgateneeded(null);
        Mage::getSingleton('customer/session')->setResidential(null);
    }

}