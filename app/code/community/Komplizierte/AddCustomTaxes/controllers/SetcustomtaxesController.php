<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 30.01.14
 * Time: 21:40
 */

class Komplizierte_AddCustomTaxes_SetcustomtaxesController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $name = $this->getRequest()->getPost('element_name');
        $value = $this->getRequest()->getPost('element_code');
        if ($name=='residential') {
            if ($value=='true' || $value=='false')
                Mage::getSingleton('customer/session')->setResidential($value);
        }
        if ($name=='liftgateneeded') {
            if ($value=='true' || $value=='false')
                Mage::getSingleton('customer/session')->setLiftgateneeded($value);
        }
    }
}