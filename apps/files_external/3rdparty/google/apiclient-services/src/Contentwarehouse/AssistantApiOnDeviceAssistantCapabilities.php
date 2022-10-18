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

class AssistantApiOnDeviceAssistantCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $isLocalNetworkArbitrationSupported;
  /**
   * @var bool
   */
  public $isOnDeviceArbitrationSupported;
  /**
   * @var bool
   */
  public $isOnDeviceAssistantSupported;
  /**
   * @var bool
   */
  public $isOnDeviceUnderstandingSupported;

  /**
   * @param bool
   */
  public function setIsLocalNetworkArbitrationSupported($isLocalNetworkArbitrationSupported)
  {
    $this->isLocalNetworkArbitrationSupported = $isLocalNetworkArbitrationSupported;
  }
  /**
   * @return bool
   */
  public function getIsLocalNetworkArbitrationSupported()
  {
    return $this->isLocalNetworkArbitrationSupported;
  }
  /**
   * @param bool
   */
  public function setIsOnDeviceArbitrationSupported($isOnDeviceArbitrationSupported)
  {
    $this->isOnDeviceArbitrationSupported = $isOnDeviceArbitrationSupported;
  }
  /**
   * @return bool
   */
  public function getIsOnDeviceArbitrationSupported()
  {
    return $this->isOnDeviceArbitrationSupported;
  }
  /**
   * @param bool
   */
  public function setIsOnDeviceAssistantSupported($isOnDeviceAssistantSupported)
  {
    $this->isOnDeviceAssistantSupported = $isOnDeviceAssistantSupported;
  }
  /**
   * @return bool
   */
  public function getIsOnDeviceAssistantSupported()
  {
    return $this->isOnDeviceAssistantSupported;
  }
  /**
   * @param bool
   */
  public function setIsOnDeviceUnderstandingSupported($isOnDeviceUnderstandingSupported)
  {
    $this->isOnDeviceUnderstandingSupported = $isOnDeviceUnderstandingSupported;
  }
  /**
   * @return bool
   */
  public function getIsOnDeviceUnderstandingSupported()
  {
    return $this->isOnDeviceUnderstandingSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiOnDeviceAssistantCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiOnDeviceAssistantCapabilities');
