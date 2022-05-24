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

namespace Google\Service\Container;

class AutoprovisioningNodePoolDefaults extends \Google\Collection
{
  protected $collection_key = 'oauthScopes';
  /**
   * @var string
   */
  public $bootDiskKmsKey;
  /**
   * @var int
   */
  public $diskSizeGb;
  /**
   * @var string
   */
  public $diskType;
  /**
   * @var string
   */
  public $imageType;
  protected $managementType = NodeManagement::class;
  protected $managementDataType = '';
  /**
   * @var string
   */
  public $minCpuPlatform;
  /**
   * @var string[]
   */
  public $oauthScopes;
  /**
   * @var string
   */
  public $serviceAccount;
  protected $shieldedInstanceConfigType = ShieldedInstanceConfig::class;
  protected $shieldedInstanceConfigDataType = '';
  protected $upgradeSettingsType = UpgradeSettings::class;
  protected $upgradeSettingsDataType = '';

  /**
   * @param string
   */
  public function setBootDiskKmsKey($bootDiskKmsKey)
  {
    $this->bootDiskKmsKey = $bootDiskKmsKey;
  }
  /**
   * @return string
   */
  public function getBootDiskKmsKey()
  {
    return $this->bootDiskKmsKey;
  }
  /**
   * @param int
   */
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  /**
   * @return int
   */
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  /**
   * @param string
   */
  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }
  /**
   * @return string
   */
  public function getDiskType()
  {
    return $this->diskType;
  }
  /**
   * @param string
   */
  public function setImageType($imageType)
  {
    $this->imageType = $imageType;
  }
  /**
   * @return string
   */
  public function getImageType()
  {
    return $this->imageType;
  }
  /**
   * @param NodeManagement
   */
  public function setManagement(NodeManagement $management)
  {
    $this->management = $management;
  }
  /**
   * @return NodeManagement
   */
  public function getManagement()
  {
    return $this->management;
  }
  /**
   * @param string
   */
  public function setMinCpuPlatform($minCpuPlatform)
  {
    $this->minCpuPlatform = $minCpuPlatform;
  }
  /**
   * @return string
   */
  public function getMinCpuPlatform()
  {
    return $this->minCpuPlatform;
  }
  /**
   * @param string[]
   */
  public function setOauthScopes($oauthScopes)
  {
    $this->oauthScopes = $oauthScopes;
  }
  /**
   * @return string[]
   */
  public function getOauthScopes()
  {
    return $this->oauthScopes;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param ShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(ShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return ShieldedInstanceConfig
   */
  public function getShieldedInstanceConfig()
  {
    return $this->shieldedInstanceConfig;
  }
  /**
   * @param UpgradeSettings
   */
  public function setUpgradeSettings(UpgradeSettings $upgradeSettings)
  {
    $this->upgradeSettings = $upgradeSettings;
  }
  /**
   * @return UpgradeSettings
   */
  public function getUpgradeSettings()
  {
    return $this->upgradeSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoprovisioningNodePoolDefaults::class, 'Google_Service_Container_AutoprovisioningNodePoolDefaults');
