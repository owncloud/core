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

class NlpSemanticParsingModelsDevice extends \Google\Model
{
  protected $deviceNameType = NlpSemanticParsingModelsDeviceName::class;
  protected $deviceNameDataType = '';
  /**
   * @var string
   */
  public $deviceType;

  /**
   * @param NlpSemanticParsingModelsDeviceName
   */
  public function setDeviceName(NlpSemanticParsingModelsDeviceName $deviceName)
  {
    $this->deviceName = $deviceName;
  }
  /**
   * @return NlpSemanticParsingModelsDeviceName
   */
  public function getDeviceName()
  {
    return $this->deviceName;
  }
  /**
   * @param string
   */
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  /**
   * @return string
   */
  public function getDeviceType()
  {
    return $this->deviceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsDevice::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsDevice');
