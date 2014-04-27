<?php
$installer = $this;
$installer->startSetup();

$installer->run("
    ALTER TABLE  `".$this->getTable('sales/quote_address')."` ADD  `residential` DECIMAL( 10, 2 ) NOT NULL;
        ALTER TABLE  `".$this->getTable('sales/quote_address')."` ADD  `liftgateneeded` DECIMAL( 10, 2 ) NOT NULL;
");

$installer->endSetup();