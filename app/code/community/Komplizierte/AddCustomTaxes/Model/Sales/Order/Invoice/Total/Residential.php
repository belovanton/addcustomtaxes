<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 21.04.14
 * Time: 18:41
 */
class Komplizierte_AddCustomTaxes_Model_Sales_Order_Invoice_Total_Residential  extends Mage_Sales_Model_Order_Invoice_Total_Abstract{

    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        parent::collect($invoice);

        $order = $invoice->getOrder();

        if($order->getResidential()>0){ //your business logic

            $invoice->setResidential('40');
            $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getResidential());
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getResidential());
        }
        else {
            $invoice->setResidential('0');
            $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getResidential());
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getResidential());
        }
    }

}