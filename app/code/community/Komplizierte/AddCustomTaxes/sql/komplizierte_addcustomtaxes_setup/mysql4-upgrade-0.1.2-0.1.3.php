<?php

$installer = $this;

$installer->startSetup();

$installer->run("

		ALTER TABLE  `".$this->getTable('sales/invoice')."` ADD  `residential` DECIMAL( 10, 2 ) NOT NULL;
		ALTER TABLE  `".$this->getTable('sales/invoice')."` ADD  `liftgateneeded` DECIMAL( 10, 2 ) NOT NULL;

		");

$installer->endSetup();