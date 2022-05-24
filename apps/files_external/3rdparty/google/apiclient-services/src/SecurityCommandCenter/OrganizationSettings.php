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

namespace Google\Service\SecurityCommandCenter;

class OrganizationSettings extends \Google\Model
{
  protected $assetDiscoveryConfigType = AssetDiscoveryConfig::class;
  protected $assetDiscoveryConfigDataType = '';
  /**
   * @var bool
   */
  public $enableAssetDiscovery;
  /**
   * @var string
   */
  public $name;

  /**
   * @param AssetDiscoveryConfig
   */
  public function setAssetDiscoveryConfig(AssetDiscoveryConfig $assetDiscoveryConfig)
  {
    $this->assetDiscoveryConfig = $assetDiscoveryConfig;
  }
  /**
   * @return AssetDiscoveryConfig
   */
  public function getAssetDiscoveryConfig()
  {
    return $this->assetDiscoveryConfig;
  }
  /**
   * @param bool
   */
  public function setEnableAssetDiscovery($enableAssetDiscovery)
  {
    $this->enableAssetDiscovery = $enableAssetDiscovery;
  }
  /**
   * @return bool
   */
  public function getEnableAssetDiscovery()
  {
    return $this->enableAssetDiscovery;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationSettings::class, 'Google_Service_SecurityCommandCenter_OrganizationSettings');
