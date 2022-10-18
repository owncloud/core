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

namespace Google\Service\Contentwarehouse;

class AssistantApiAppCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowlistedForMediaFulfillment;
  protected $appIntegrationsSettingsType = AssistantApiAppIntegrationsSettings::class;
  protected $appIntegrationsSettingsDataType = '';
  /**
   * @var bool
   */
  public $disabledSystemApp;
  protected $providerType = AssistantApiCoreTypesProvider::class;
  protected $providerDataType = '';
  /**
   * @var bool
   */
  public $routableToProviderCloud;
  /**
   * @var bool
   */
  public $searchableOnDevice;
  /**
   * @var bool
   */
  public $searchableOnServer;
  /**
   * @var bool
   */
  public $supportsScreenlessInitiation;
  /**
   * @var bool
   */
  public $whitelistedForAnnotation;

  /**
   * @param bool
   */
  public function setAllowlistedForMediaFulfillment($allowlistedForMediaFulfillment)
  {
    $this->allowlistedForMediaFulfillment = $allowlistedForMediaFulfillment;
  }
  /**
   * @return bool
   */
  public function getAllowlistedForMediaFulfillment()
  {
    return $this->allowlistedForMediaFulfillment;
  }
  /**
   * @param AssistantApiAppIntegrationsSettings
   */
  public function setAppIntegrationsSettings(AssistantApiAppIntegrationsSettings $appIntegrationsSettings)
  {
    $this->appIntegrationsSettings = $appIntegrationsSettings;
  }
  /**
   * @return AssistantApiAppIntegrationsSettings
   */
  public function getAppIntegrationsSettings()
  {
    return $this->appIntegrationsSettings;
  }
  /**
   * @param bool
   */
  public function setDisabledSystemApp($disabledSystemApp)
  {
    $this->disabledSystemApp = $disabledSystemApp;
  }
  /**
   * @return bool
   */
  public function getDisabledSystemApp()
  {
    return $this->disabledSystemApp;
  }
  /**
   * @param AssistantApiCoreTypesProvider
   */
  public function setProvider(AssistantApiCoreTypesProvider $provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return AssistantApiCoreTypesProvider
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param bool
   */
  public function setRoutableToProviderCloud($routableToProviderCloud)
  {
    $this->routableToProviderCloud = $routableToProviderCloud;
  }
  /**
   * @return bool
   */
  public function getRoutableToProviderCloud()
  {
    return $this->routableToProviderCloud;
  }
  /**
   * @param bool
   */
  public function setSearchableOnDevice($searchableOnDevice)
  {
    $this->searchableOnDevice = $searchableOnDevice;
  }
  /**
   * @return bool
   */
  public function getSearchableOnDevice()
  {
    return $this->searchableOnDevice;
  }
  /**
   * @param bool
   */
  public function setSearchableOnServer($searchableOnServer)
  {
    $this->searchableOnServer = $searchableOnServer;
  }
  /**
   * @return bool
   */
  public function getSearchableOnServer()
  {
    return $this->searchableOnServer;
  }
  /**
   * @param bool
   */
  public function setSupportsScreenlessInitiation($supportsScreenlessInitiation)
  {
    $this->supportsScreenlessInitiation = $supportsScreenlessInitiation;
  }
  /**
   * @return bool
   */
  public function getSupportsScreenlessInitiation()
  {
    return $this->supportsScreenlessInitiation;
  }
  /**
   * @param bool
   */
  public function setWhitelistedForAnnotation($whitelistedForAnnotation)
  {
    $this->whitelistedForAnnotation = $whitelistedForAnnotation;
  }
  /**
   * @return bool
   */
  public function getWhitelistedForAnnotation()
  {
    return $this->whitelistedForAnnotation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiAppCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiAppCapabilities');
