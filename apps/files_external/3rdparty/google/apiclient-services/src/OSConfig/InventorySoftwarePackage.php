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

namespace Google\Service\OSConfig;

class InventorySoftwarePackage extends \Google\Model
{
  protected $aptPackageType = InventoryVersionedPackage::class;
  protected $aptPackageDataType = '';
  protected $cosPackageType = InventoryVersionedPackage::class;
  protected $cosPackageDataType = '';
  protected $googetPackageType = InventoryVersionedPackage::class;
  protected $googetPackageDataType = '';
  protected $qfePackageType = InventoryWindowsQuickFixEngineeringPackage::class;
  protected $qfePackageDataType = '';
  protected $windowsApplicationType = InventoryWindowsApplication::class;
  protected $windowsApplicationDataType = '';
  protected $wuaPackageType = InventoryWindowsUpdatePackage::class;
  protected $wuaPackageDataType = '';
  protected $yumPackageType = InventoryVersionedPackage::class;
  protected $yumPackageDataType = '';
  protected $zypperPackageType = InventoryVersionedPackage::class;
  protected $zypperPackageDataType = '';
  protected $zypperPatchType = InventoryZypperPatch::class;
  protected $zypperPatchDataType = '';

  /**
   * @param InventoryVersionedPackage
   */
  public function setAptPackage(InventoryVersionedPackage $aptPackage)
  {
    $this->aptPackage = $aptPackage;
  }
  /**
   * @return InventoryVersionedPackage
   */
  public function getAptPackage()
  {
    return $this->aptPackage;
  }
  /**
   * @param InventoryVersionedPackage
   */
  public function setCosPackage(InventoryVersionedPackage $cosPackage)
  {
    $this->cosPackage = $cosPackage;
  }
  /**
   * @return InventoryVersionedPackage
   */
  public function getCosPackage()
  {
    return $this->cosPackage;
  }
  /**
   * @param InventoryVersionedPackage
   */
  public function setGoogetPackage(InventoryVersionedPackage $googetPackage)
  {
    $this->googetPackage = $googetPackage;
  }
  /**
   * @return InventoryVersionedPackage
   */
  public function getGoogetPackage()
  {
    return $this->googetPackage;
  }
  /**
   * @param InventoryWindowsQuickFixEngineeringPackage
   */
  public function setQfePackage(InventoryWindowsQuickFixEngineeringPackage $qfePackage)
  {
    $this->qfePackage = $qfePackage;
  }
  /**
   * @return InventoryWindowsQuickFixEngineeringPackage
   */
  public function getQfePackage()
  {
    return $this->qfePackage;
  }
  /**
   * @param InventoryWindowsApplication
   */
  public function setWindowsApplication(InventoryWindowsApplication $windowsApplication)
  {
    $this->windowsApplication = $windowsApplication;
  }
  /**
   * @return InventoryWindowsApplication
   */
  public function getWindowsApplication()
  {
    return $this->windowsApplication;
  }
  /**
   * @param InventoryWindowsUpdatePackage
   */
  public function setWuaPackage(InventoryWindowsUpdatePackage $wuaPackage)
  {
    $this->wuaPackage = $wuaPackage;
  }
  /**
   * @return InventoryWindowsUpdatePackage
   */
  public function getWuaPackage()
  {
    return $this->wuaPackage;
  }
  /**
   * @param InventoryVersionedPackage
   */
  public function setYumPackage(InventoryVersionedPackage $yumPackage)
  {
    $this->yumPackage = $yumPackage;
  }
  /**
   * @return InventoryVersionedPackage
   */
  public function getYumPackage()
  {
    return $this->yumPackage;
  }
  /**
   * @param InventoryVersionedPackage
   */
  public function setZypperPackage(InventoryVersionedPackage $zypperPackage)
  {
    $this->zypperPackage = $zypperPackage;
  }
  /**
   * @return InventoryVersionedPackage
   */
  public function getZypperPackage()
  {
    return $this->zypperPackage;
  }
  /**
   * @param InventoryZypperPatch
   */
  public function setZypperPatch(InventoryZypperPatch $zypperPatch)
  {
    $this->zypperPatch = $zypperPatch;
  }
  /**
   * @return InventoryZypperPatch
   */
  public function getZypperPatch()
  {
    return $this->zypperPatch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySoftwarePackage::class, 'Google_Service_OSConfig_InventorySoftwarePackage');
