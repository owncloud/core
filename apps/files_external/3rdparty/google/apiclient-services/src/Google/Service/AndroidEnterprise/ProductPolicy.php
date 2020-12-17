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

class Google_Service_AndroidEnterprise_ProductPolicy extends Google_Collection
{
  protected $collection_key = 'tracks';
  protected $autoInstallPolicyType = 'Google_Service_AndroidEnterprise_AutoInstallPolicy';
  protected $autoInstallPolicyDataType = '';
  public $autoUpdateMode;
  protected $managedConfigurationType = 'Google_Service_AndroidEnterprise_ManagedConfiguration';
  protected $managedConfigurationDataType = '';
  public $productId;
  public $trackIds;
  public $tracks;

  /**
   * @param Google_Service_AndroidEnterprise_AutoInstallPolicy
   */
  public function setAutoInstallPolicy(Google_Service_AndroidEnterprise_AutoInstallPolicy $autoInstallPolicy)
  {
    $this->autoInstallPolicy = $autoInstallPolicy;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AutoInstallPolicy
   */
  public function getAutoInstallPolicy()
  {
    return $this->autoInstallPolicy;
  }
  public function setAutoUpdateMode($autoUpdateMode)
  {
    $this->autoUpdateMode = $autoUpdateMode;
  }
  public function getAutoUpdateMode()
  {
    return $this->autoUpdateMode;
  }
  /**
   * @param Google_Service_AndroidEnterprise_ManagedConfiguration
   */
  public function setManagedConfiguration(Google_Service_AndroidEnterprise_ManagedConfiguration $managedConfiguration)
  {
    $this->managedConfiguration = $managedConfiguration;
  }
  /**
   * @return Google_Service_AndroidEnterprise_ManagedConfiguration
   */
  public function getManagedConfiguration()
  {
    return $this->managedConfiguration;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setTrackIds($trackIds)
  {
    $this->trackIds = $trackIds;
  }
  public function getTrackIds()
  {
    return $this->trackIds;
  }
  public function setTracks($tracks)
  {
    $this->tracks = $tracks;
  }
  public function getTracks()
  {
    return $this->tracks;
  }
}
