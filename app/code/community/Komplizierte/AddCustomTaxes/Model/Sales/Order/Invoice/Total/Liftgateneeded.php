<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 21.04.14
 * Time: 18:41
 */
class Komplizierte_AddCustomTaxes_Model_Sales_Order_Invoice_Total_Liftgateneeded  extends Mage_Sales_Model_Order_Invoice_Total_Abstract{

    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        parent::collect($invoice);

        $order = $invoice->getOrder();

        if($order->getLiftgateneeded()>0){ //your business logic

            $invoice->setLiftgateneeded('40');
            $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getLiftgateneeded());
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getLiftgateneeded());
        }
        else {
            $invoice->setLiftgateneeded('0');
            $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getLiftgateneeded());
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getLiftgateneeded());
        }
    }

}