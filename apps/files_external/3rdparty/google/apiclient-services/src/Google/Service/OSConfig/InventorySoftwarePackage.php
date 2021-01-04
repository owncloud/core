<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_OSConfig_InventorySoftwarePackage extends Google_Model
{
  protected $aptPackageType = 'Google_Service_OSConfig_InventoryVersionedPackage';
  protected $aptPackageDataType = '';
  protected $cosPackageType = 'Google_Service_OSConfig_InventoryVersionedPackage';
  protected $cosPackageDataType = '';
  protected $googetPackageType = 'Google_Service_OSConfig_InventoryVersionedPackage';
  protected $googetPackageDataType = '';
  protected $qfePackageType = 'Google_Service_OSConfig_InventoryWindowsQuickFixEngineeringPackage';
  protected $qfePackageDataType = '';
  protected $wuaPackageType = 'Google_Service_OSConfig_InventoryWindowsUpdatePackage';
  protected $wuaPackageDataType = '';
  protected $yumPackageType = 'Google_Service_OSConfig_InventoryVersionedPackage';
  protected $yumPackageDataType = '';
  protected $zypperPackageType = 'Google_Service_OSConfig_InventoryVersionedPackage';
  protected $zypperPackageDataType = '';
  protected $zypperPatchType = 'Google_Service_OSConfig_InventoryZypperPatch';
  protected $zypperPatchDataType = '';

  /**
   * @param Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function setAptPackage(Google_Service_OSConfig_InventoryVersionedPackage $aptPackage)
  {
    $this->aptPackage = $aptPackage;
  }
  /**
   * @return Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function getAptPackage()
  {
    return $this->aptPackage;
  }
  /**
   * @param Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function setCosPackage(Google_Service_OSConfig_InventoryVersionedPackage $cosPackage)
  {
    $this->cosPackage = $cosPackage;
  }
  /**
   * @return Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function getCosPackage()
  {
    return $this->cosPackage;
  }
  /**
   * @param Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function setGoogetPackage(Google_Service_OSConfig_InventoryVersionedPackage $googetPackage)
  {
    $this->googetPackage = $googetPackage;
  }
  /**
   * @return Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function getGoogetPackage()
  {
    return $this->googetPackage;
  }
  /**
   * @param Google_Service_OSConfig_InventoryWindowsQuickFixEngineeringPackage
   */
  public function setQfePackage(Google_Service_OSConfig_InventoryWindowsQuickFixEngineeringPackage $qfePackage)
  {
    $this->qfePackage = $qfePackage;
  }
  /**
   * @return Google_Service_OSConfig_InventoryWindowsQuickFixEngineeringPackage
   */
  public function getQfePackage()
  {
    return $this->qfePackage;
  }
  /**
   * @param Google_Service_OSConfig_InventoryWindowsUpdatePackage
   */
  public function setWuaPackage(Google_Service_OSConfig_InventoryWindowsUpdatePackage $wuaPackage)
  {
    $this->wuaPackage = $wuaPackage;
  }
  /**
   * @return Google_Service_OSConfig_InventoryWindowsUpdatePackage
   */
  public function getWuaPackage()
  {
    return $this->wuaPackage;
  }
  /**
   * @param Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function setYumPackage(Google_Service_OSConfig_InventoryVersionedPackage $yumPackage)
  {
    $this->yumPackage = $yumPackage;
  }
  /**
   * @return Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function getYumPackage()
  {
    return $this->yumPackage;
  }
  /**
   * @param Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function setZypperPackage(Google_Service_OSConfig_InventoryVersionedPackage $zypperPackage)
  {
    $this->zypperPackage = $zypperPackage;
  }
  /**
   * @return Google_Service_OSConfig_InventoryVersionedPackage
   */
  public function getZypperPackage()
  {
    return $this->zypperPackage;
  }
  /**
   * @param Google_Service_OSConfig_InventoryZypperPatch
   */
  public function setZypperPatch(Google_Service_OSConfig_InventoryZypperPatch $zypperPatch)
  {
    $this->zypperPatch = $zypperPatch;
  }
  /**
   * @return Google_Service_OSConfig_InventoryZypperPatch
   */
  public function getZypperPatch()
  {
    return $this->zypperPatch;
  }
}
