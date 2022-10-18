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

class AssistantDevicesPlatformProtoTimerCapability extends \Google\Model
{
  protected $maxSupportedExtendedTimerDurationType = AssistantApiDuration::class;
  protected $maxSupportedExtendedTimerDurationDataType = '';
  protected $maxSupportedTimerDurationType = AssistantApiDuration::class;
  protected $maxSupportedTimerDurationDataType = '';
  /**
   * @var int
   */
  public $maxSupportedTimers;
  /**
   * @var bool
   */
  public $supportsMutateAction;

  /**
   * @param AssistantApiDuration
   */
  public function setMaxSupportedExtendedTimerDuration(AssistantApiDuration $maxSupportedExtendedTimerDuration)
  {
    $this->maxSupportedExtendedTimerDuration = $maxSupportedExtendedTimerDuration;
  }
  /**
   * @return AssistantApiDuration
   */
  public function getMaxSupportedExtendedTimerDuration()
  {
    return $this->maxSupportedExtendedTimerDuration;
  }
  /**
   * @param AssistantApiDuration
   */
  public function setMaxSupportedTimerDuration(AssistantApiDuration $maxSupportedTimerDuration)
  {
    $this->maxSupportedTimerDuration = $maxSupportedTimerDuration;
  }
  /**
   * @return AssistantApiDuration
   */
  public function getMaxSupportedTimerDuration()
  {
    return $this->maxSupportedTimerDuration;
  }
  /**
   * @param int
   */
  public function setMaxSupportedTimers($maxSupportedTimers)
  {
    $this->maxSupportedTimers = $maxSupportedTimers;
  }
  /**
   * @return int
   */
  public function getMaxSupportedTimers()
  {
    return $this->maxSupportedTimers;
  }
  /**
   * @param bool
   */
  public function setSupportsMutateAction($supportsMutateAction)
  {
    $this->supportsMutateAction = $supportsMutateAction;
  }
  /**
   * @return bool
   */
  public function getSupportsMutateAction()
  {
    return $this->supportsMutateAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoTimerCapability::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoTimerCapability');
