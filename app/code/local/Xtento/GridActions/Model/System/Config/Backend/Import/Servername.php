<?php

/**
 * Product:       Xtento_GridActions (1.7.8)
 * ID:            FLIeaaH2tLI8Ro1ExjlOKSJSRlAlc69iSGtu81EZQZs=
 * Packaged:      2014-12-17T03:54:17+00:00
 * Last Modified: 2011-12-28T17:12:07+01:00
 * File:          app/code/local/Xtento/GridActions/Model/System/Config/Backend/Import/Servername.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_GridActions_Model_System_Config_Backend_Import_Servername extends Mage_Core_Model_Config_Data
{
    const MODULE_MESSAGE = 'The Simplify Bulk Order Processing extension couldn\'t be enabled. Please make sure you are using a valid license key.';

    public function afterLoad()
    {
        $sName1 = Mage::getModel('gridactions/system_config_backend_import_server')->getFirstName();
        $sName2 = Mage::getModel('gridactions/system_config_backend_import_server')->getSecondName();
        if ($sName1 !== $sName2) {
            $this->setValue(sprintf('%s (Main: %s)', $sName1, $sName2));
        } else {
            $this->setValue(sprintf('%s', $sName1));
        }
    }
}
