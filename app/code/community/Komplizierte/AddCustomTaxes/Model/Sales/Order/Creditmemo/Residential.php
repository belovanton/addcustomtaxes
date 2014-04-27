<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 21.04.14
 * Time: 18:41
 */
class Komplizierte_AddCustomTaxes_Model_Sales_Order_Creditmemo_Residential  extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract{

    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        parent::collect($creditmemo);

        $order = $creditmemo->getOrder();

        if($order->getResidential()>0){ //your business logic

            $creditmemo->setResidential('40');
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $creditmemo->getResidential());
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $creditmemo->getResidential());
        }
        else {
            $creditmemo->setResidential('0');
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $creditmemo->getResidential());
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $creditmemo->getResidential());
        }
    }

}