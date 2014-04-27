<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 21.04.14
 * Time: 18:41
 */
class Komplizierte_AddCustomTaxes_Model_Sales_Quote_Address_Total_Residential extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    protected $_code = 'residential';

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        $this->_setAmount(0);
        $this->_setBaseAmount(0);

        $items = $this->_getAddressItems($address);
        if (!count($items)) {
            return $this; //this makes only address type shipping to come through
        }

        $quote = $address->getQuote();

        if ((Mage::getSingleton('customer/session')->getResidential() == 'true')&&
            (Mage::app()->getRequest()->getRequestString()!="/checkout/cart/")){

            $address->setResidential('40');
            $quote->setResidential('40');

            $address->setGrandTotal($address->getGrandTotal() + $address->getResidential());
            $address->setBaseGrandTotal($address->getBaseGrandTotal() + $address->getResidential());
        }
        else{
            $address->setResidential('0');
            $quote->setResidential('0');

            $address->setGrandTotal($address->getGrandTotal() + $address->getResidential());
            $address->setBaseGrandTotal($address->getBaseGrandTotal() + $address->getResidential());
        }

    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        //show only in checkout
        if (Mage::getSingleton('customer/session')->getResidential() == 'true' &&
            (Mage::app()->getRequest()->getRequestString()!="/checkout/cart/")) { //your business logic

        $amt = $address->getResidential();
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => Mage::helper('komplizierte_addcustomtaxes')->__('Residential'),
                'value' => $amt
            ));
        }
        return $this;
    }
}