<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 21.04.14
 * Time: 18:41
 */
class Komplizierte_AddCustomTaxes_Model_Sales_Quote_Address_Total_CustomTaxes  extends Mage_Sales_Model_Quote_Address_Total_Abstract{
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

        if(true){ //your business logic
            $exist_amount = $address->getTaxAmount();

            $address->setGrandTotal($address->getGrandTotal() + $exist_amount);
            $address->setBaseGrandTotal($address->getBaseGrandTotal() + $exist_amount);
        }

    }

}