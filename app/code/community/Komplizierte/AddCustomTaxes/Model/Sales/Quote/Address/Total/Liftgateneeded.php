<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 21.04.14
 * Time: 18:41
 */
class Komplizierte_AddCustomTaxes_Model_Sales_Quote_Address_Total_Liftgateneeded  extends Mage_Sales_Model_Quote_Address_Total_Abstract{
    protected $_code = 'liftgateneeded';
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

        if(Mage::getSingleton('customer/session')->getLiftgateneeded()!='false' &&
            (Mage::app()->getRequest()->getRequestString()!="/checkout/cart/")){ //your business logic

            $address->setLiftgateneeded('40');
            $quote->setLiftgateneeded('40');

            $address->setGrandTotal($address->getGrandTotal() + $address->getLiftgateneeded());
            $address->setBaseGrandTotal($address->getBaseGrandTotal() + $address->getLiftgateneeded());
        }
        else {
            $address->setLiftgateneeded('0');
            $quote->setLiftgateneeded('0');

            $address->setGrandTotal($address->getGrandTotal() + $address->getLiftgateneeded());
            $address->setBaseGrandTotal($address->getBaseGrandTotal() + $address->getLiftgateneeded());
        }
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        //show only in checkout
       if(Mage::getSingleton('customer/session')->getLiftgateneeded()=='true' &&
           (Mage::app()->getRequest()->getRequestString()!="/checkout/cart/")){
        $amt = $address->getLiftgateneeded();
        $address->addTotal(array(
            'code'=>$this->getCode(),
            'title'=>Mage::helper('komplizierte_addcustomtaxes')->__('Liftgate Needed'),
            'value'=> $amt
        ));
       }
        return $this;
    }
}