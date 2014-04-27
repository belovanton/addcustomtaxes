<?php

$installer = $this;

$installer->startSetup();

$installer->run("

		ALTER TABLE  `".$this->getTable('sales/order')."` ADD  `residential_refunded` DECIMAL( 10, 2 ) NOT NULL;
		ALTER TABLE  `".$this->getTable('sales/order')."` ADD  `liftgateneeded_refunded` DECIMAL( 10, 2 ) NOT NULL;

		ALTER TABLE  `".$this->getTable('sales/creditmemo')."` ADD  `residential` DECIMAL( 10, 2 ) NOT NULL;
		ALTER TABLE  `".$this->getTable('sales/creditmemo')."` ADD  `liftgateneeded` DECIMAL( 10, 2 ) NOT NULL;

		");

$installer->endSetup();