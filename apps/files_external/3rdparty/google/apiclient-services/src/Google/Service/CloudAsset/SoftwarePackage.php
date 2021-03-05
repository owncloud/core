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

class Google_Service_CloudAsset_SoftwarePackage extends Google_Model
{
  protected $aptPackageType = 'Google_Service_CloudAsset_VersionedPackage';
  protected $aptPackageDataType = '';
  protected $cosPackageType = 'Google_Service_CloudAsset_VersionedPackage';
  protected $cosPackageDataType = '';
  protected $googetPackageType = 'Google_Service_CloudAsset_VersionedPackage';
  protected $googetPackageDataType = '';
  protected $qfePackageType = 'Google_Service_CloudAsset_WindowsQuickFixEngineeringPackage';
  protected $qfePackageDataType = '';
  protected $wuaPackageType = 'Google_Service_CloudAsset_WindowsUpdatePackage';
  protected $wuaPackageDataType = '';
  protected $yumPackageType = 'Google_Service_CloudAsset_VersionedPackage';
  protected $yumPackageDataType = '';
  protected $zypperPackageType = 'Google_Service_CloudAsset_VersionedPackage';
  protected $zypperPackageDataType = '';
  protected $zypperPatchType = 'Google_Service_CloudAsset_ZypperPatch';
  protected $zypperPatchDataType = '';

  /**
   * @param Google_Service_CloudAsset_VersionedPackage
   */
  public function setAptPackage(Google_Service_CloudAsset_VersionedPackage $aptPackage)
  {
    $this->aptPackage = $aptPackage;
  }
  /**
   * @return Google_Service_CloudAsset_VersionedPackage
   */
  public function getAptPackage()
  {
    return $this->aptPackage;
  }
  /**
   * @param Google_Service_CloudAsset_VersionedPackage
   */
  public function setCosPackage(Google_Service_CloudAsset_VersionedPackage $cosPackage)
  {
    $this->cosPackage = $cosPackage;
  }
  /**
   * @return Google_Service_CloudAsset_VersionedPackage
   */
  public function getCosPackage()
  {
    return $this->cosPackage;
  }
  /**
   * @param Google_Service_CloudAsset_VersionedPackage
   */
  public function setGoogetPackage(Google_Service_CloudAsset_VersionedPackage $googetPackage)
  {
    $this->googetPackage = $googetPackage;
  }
  /**
   * @return Google_Service_CloudAsset_VersionedPackage
   */
  public function getGoogetPackage()
  {
    return $this->googetPackage;
  }
  /**
   * @param Google_Service_CloudAsset_WindowsQuickFixEngineeringPackage
   */
  public function setQfePackage(Google_Service_CloudAsset_WindowsQuickFixEngineeringPackage $qfePackage)
  {
    $this->qfePackage = $qfePackage;
  }
  /**
   * @return Google_Service_CloudAsset_WindowsQuickFixEngineeringPackage
   */
  public function getQfePackage()
  {
    return $this->qfePackage;
  }
  /**
   * @param Google_Service_CloudAsset_WindowsUpdatePackage
   */
  public function setWuaPackage(Google_Service_CloudAsset_WindowsUpdatePackage $wuaPackage)
  {
    $this->wuaPackage = $wuaPackage;
  }
  /**
   * @return Google_Service_CloudAsset_WindowsUpdatePackage
   */
  public function getWuaPackage()
  {
    return $this->wuaPackage;
  }
  /**
   * @param Google_Service_CloudAsset_VersionedPackage
   */
  public function setYumPackage(Google_Service_CloudAsset_VersionedPackage $yumPackage)
  {
    $this->yumPackage = $yumPackage;
  }
  /**
   * @return Google_Service_CloudAsset_VersionedPackage
   */
  public function getYumPackage()
  {
    return $this->yumPackage;
  }
  /**
   * @param Google_Service_CloudAsset_VersionedPackage
   */
  public function setZypperPackage(Google_Service_CloudAsset_VersionedPackage $zypperPackage)
  {
    $this->zypperPackage = $zypperPackage;
  }
  /**
   * @return Google_Service_CloudAsset_VersionedPackage
   */
  public function getZypperPackage()
  {
    return $this->zypperPackage;
  }
  /**
   * @param Google_Service_CloudAsset_ZypperPatch
   */
  public function setZypperPatch(Google_Service_CloudAsset_ZypperPatch $zypperPatch)
  {
    $this->zypperPatch = $zypperPatch;
  }
  /**
   * @return Google_Service_CloudAsset_ZypperPatch
   */
  public function getZypperPatch()
  {
    return $this->zypperPatch;
  }
}
