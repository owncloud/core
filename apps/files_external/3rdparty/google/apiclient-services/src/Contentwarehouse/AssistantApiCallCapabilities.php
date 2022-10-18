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

class AssistantApiCallCapabilities extends \Google\Collection
{
  protected $collection_key = 'supportedRecipientTypes';
  /**
   * @var string[]
   */
  public $callFormats;
  /**
   * @var string[]
   */
  public $callMediums;
  /**
   * @var string[]
   */
  public $callOptions;
  /**
   * @var bool
   */
  public $fallbackToTetheredDeviceAppCapabilities;
  /**
   * @var string[]
   */
  public $supportedRecipientTypes;
  /**
   * @var bool
   */
  public $supportsDuoEmailEndpoint;

  /**
   * @param string[]
   */
  public function setCallFormats($callFormats)
  {
    $this->callFormats = $callFormats;
  }
  /**
   * @return string[]
   */
  public function getCallFormats()
  {
    return $this->callFormats;
  }
  /**
   * @param string[]
   */
  public function setCallMediums($callMediums)
  {
    $this->callMediums = $callMediums;
  }
  /**
   * @return string[]
   */
  public function getCallMediums()
  {
    return $this->callMediums;
  }
  /**
   * @param string[]
   */
  public function setCallOptions($callOptions)
  {
    $this->callOptions = $callOptions;
  }
  /**
   * @return string[]
   */
  public function getCallOptions()
  {
    return $this->callOptions;
  }
  /**
   * @param bool
   */
  public function setFallbackToTetheredDeviceAppCapabilities($fallbackToTetheredDeviceAppCapabilities)
  {
    $this->fallbackToTetheredDeviceAppCapabilities = $fallbackToTetheredDeviceAppCapabilities;
  }
  /**
   * @return bool
   */
  public function getFallbackToTetheredDeviceAppCapabilities()
  {
    return $this->fallbackToTetheredDeviceAppCapabilities;
  }
  /**
   * @param string[]
   */
  public function setSupportedRecipientTypes($supportedRecipientTypes)
  {
    $this->supportedRecipientTypes = $supportedRecipientTypes;
  }
  /**
   * @return string[]
   */
  public function getSupportedRecipientTypes()
  {
    return $this->supportedRecipientTypes;
  }
  /**
   * @param bool
   */
  public function setSupportsDuoEmailEndpoint($supportsDuoEmailEndpoint)
  {
    $this->supportsDuoEmailEndpoint = $supportsDuoEmailEndpoint;
  }
  /**
   * @return bool
   */
  public function getSupportsDuoEmailEndpoint()
  {
    return $this->supportsDuoEmailEndpoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCallCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiCallCapabilities');
