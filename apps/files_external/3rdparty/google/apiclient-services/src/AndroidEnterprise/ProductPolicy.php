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

namespace Google\Service\AndroidEnterprise;

class ProductPolicy extends \Google\Collection
{
  protected $collection_key = 'tracks';
  protected $autoInstallPolicyType = AutoInstallPolicy::class;
  protected $autoInstallPolicyDataType = '';
  /**
   * @var string
   */
  public $autoUpdateMode;
  protected $enterpriseAuthenticationAppLinkConfigsType = EnterpriseAuthenticationAppLinkConfig::class;
  protected $enterpriseAuthenticationAppLinkConfigsDataType = 'array';
  protected $managedConfigurationType = ManagedConfiguration::class;
  protected $managedConfigurationDataType = '';
  /**
   * @var string
   */
  public $productId;
  /**
   * @var string[]
   */
  public $trackIds;
  /**
   * @var string[]
   */
  public $tracks;

  /**
   * @param AutoInstallPolicy
   */
  public function setAutoInstallPolicy(AutoInstallPolicy $autoInstallPolicy)
  {
    $this->autoInstallPolicy = $autoInstallPolicy;
  }
  /**
   * @return AutoInstallPolicy
   */
  public function getAutoInstallPolicy()
  {
    return $this->autoInstallPolicy;
  }
  /**
   * @param string
   */
  public function setAutoUpdateMode($autoUpdateMode)
  {
    $this->autoUpdateMode = $autoUpdateMode;
  }
  /**
   * @return string
   */
  public function getAutoUpdateMode()
  {
    return $this->autoUpdateMode;
  }
  /**
   * @param EnterpriseAuthenticationAppLinkConfig[]
   */
  public function setEnterpriseAuthenticationAppLinkConfigs($enterpriseAuthenticationAppLinkConfigs)
  {
    $this->enterpriseAuthenticationAppLinkConfigs = $enterpriseAuthenticationAppLinkConfigs;
  }
  /**
   * @return EnterpriseAuthenticationAppLinkConfig[]
   */
  public function getEnterpriseAuthenticationAppLinkConfigs()
  {
    return $this->enterpriseAuthenticationAppLinkConfigs;
  }
  /**
   * @param ManagedConfiguration
   */
  public function setManagedConfiguration(ManagedConfiguration $managedConfiguration)
  {
    $this->managedConfiguration = $managedConfiguration;
  }
  /**
   * @return ManagedConfiguration
   */
  public function getManagedConfiguration()
  {
    return $this->managedConfiguration;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param string[]
   */
  public function setTrackIds($trackIds)
  {
    $this->trackIds = $trackIds;
  }
  /**
   * @return string[]
   */
  public function getTrackIds()
  {
    return $this->trackIds;
  }
  /**
   * @param string[]
   */
  public function setTracks($tracks)
  {
    $this->tracks = $tracks;
  }
  /**
   * @return string[]
   */
  public function getTracks()
  {
    return $this->tracks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductPolicy::class, 'Google_Service_AndroidEnterprise_ProductPolicy');
