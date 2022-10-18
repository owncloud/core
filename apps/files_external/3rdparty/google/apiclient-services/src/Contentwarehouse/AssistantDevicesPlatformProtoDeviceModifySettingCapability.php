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

class AssistantDevicesPlatformProtoDeviceModifySettingCapability extends \Google\Model
{
  protected $clientOpPropertyType = AssistantApiClientOpPropertiesDeviceModifySettingClientOpProperty::class;
  protected $clientOpPropertyDataType = '';

  /**
   * @param AssistantApiClientOpPropertiesDeviceModifySettingClientOpProperty
   */
  public function setClientOpProperty(AssistantApiClientOpPropertiesDeviceModifySettingClientOpProperty $clientOpProperty)
  {
    $this->clientOpProperty = $clientOpProperty;
  }
  /**
   * @return AssistantApiClientOpPropertiesDeviceModifySettingClientOpProperty
   */
  public function getClientOpProperty()
  {
    return $this->clientOpProperty;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoDeviceModifySettingCapability::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoDeviceModifySettingCapability');
