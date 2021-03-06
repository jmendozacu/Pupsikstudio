<?php

/**
 * Product:       Xtento_GridActions (1.7.8)
 * ID:            FLIeaaH2tLI8Ro1ExjlOKSJSRlAlc69iSGtu81EZQZs=
 * Packaged:      2014-12-17T03:54:17+00:00
 * Last Modified: 2011-12-26T17:20:52+01:00
 * File:          app/code/local/Xtento/GridActions/Model/System/Config/Backend/Import/Enabled.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_GridActions_Model_System_Config_Backend_Import_Enabled extends Mage_Core_Model_Config_Data
{
    protected function _beforeSave()
    {
        Mage::register('gridactions_modify_event', true, true);
        parent::_beforeSave();
    }

    public function has_value_for_configuration_changed($observer)
    {
        if (Mage::registry('gridactions_modify_event') == true) {
            Mage::unregister('gridactions_modify_event');
            Xtento_GridActions_Model_System_Config_Source_Order_Status::isEnabled();
        }
    }
}
