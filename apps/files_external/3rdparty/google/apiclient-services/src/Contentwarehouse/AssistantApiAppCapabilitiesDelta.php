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

class AssistantApiAppCapabilitiesDelta extends \Google\Model
{
  protected $appIntegrationsSettingsType = AssistantApiAppIntegrationsSettings::class;
  protected $appIntegrationsSettingsDataType = '';
  protected $providerDeltaType = AssistantApiCoreTypesProviderDelta::class;
  protected $providerDeltaDataType = '';

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
   * @param AssistantApiCoreTypesProviderDelta
   */
  public function setProviderDelta(AssistantApiCoreTypesProviderDelta $providerDelta)
  {
    $this->providerDelta = $providerDelta;
  }
  /**
   * @return AssistantApiCoreTypesProviderDelta
   */
  public function getProviderDelta()
  {
    return $this->providerDelta;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiAppCapabilitiesDelta::class, 'Google_Service_Contentwarehouse_AssistantApiAppCapabilitiesDelta');
