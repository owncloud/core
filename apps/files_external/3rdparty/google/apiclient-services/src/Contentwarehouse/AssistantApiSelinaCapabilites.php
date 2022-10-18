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

class AssistantApiSelinaCapabilites extends \Google\Model
{
  protected $gestureCapabilitiesType = AssistantApiGestureCapabilities::class;
  protected $gestureCapabilitiesDataType = '';
  /**
   * @var bool
   */
  public $selinaSupported;
  /**
   * @var bool
   */
  public $sleepSensingSupported;

  /**
   * @param AssistantApiGestureCapabilities
   */
  public function setGestureCapabilities(AssistantApiGestureCapabilities $gestureCapabilities)
  {
    $this->gestureCapabilities = $gestureCapabilities;
  }
  /**
   * @return AssistantApiGestureCapabilities
   */
  public function getGestureCapabilities()
  {
    return $this->gestureCapabilities;
  }
  /**
   * @param bool
   */
  public function setSelinaSupported($selinaSupported)
  {
    $this->selinaSupported = $selinaSupported;
  }
  /**
   * @return bool
   */
  public function getSelinaSupported()
  {
    return $this->selinaSupported;
  }
  /**
   * @param bool
   */
  public function setSleepSensingSupported($sleepSensingSupported)
  {
    $this->sleepSensingSupported = $sleepSensingSupported;
  }
  /**
   * @return bool
   */
  public function getSleepSensingSupported()
  {
    return $this->sleepSensingSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSelinaCapabilites::class, 'Google_Service_Contentwarehouse_AssistantApiSelinaCapabilites');
