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

class AssistantDevicesPlatformProtoInlinedActionCapability extends \Google\Model
{
  protected $alarmType = AssistantDevicesPlatformProtoAlarmCapability::class;
  protected $alarmDataType = '';
  protected $responseLimitsType = AssistantDevicesPlatformProtoResponseLimits::class;
  protected $responseLimitsDataType = '';
  /**
   * @var bool
   */
  public $supportSdkExecute;
  protected $supportedDeviceOpsType = AssistantDevicesPlatformProtoSupportedDeviceOps::class;
  protected $supportedDeviceOpsDataType = '';
  /**
   * @var bool
   */
  public $supportsMultiResponse;
  protected $timerType = AssistantDevicesPlatformProtoTimerCapability::class;
  protected $timerDataType = '';

  /**
   * @param AssistantDevicesPlatformProtoAlarmCapability
   */
  public function setAlarm(AssistantDevicesPlatformProtoAlarmCapability $alarm)
  {
    $this->alarm = $alarm;
  }
  /**
   * @return AssistantDevicesPlatformProtoAlarmCapability
   */
  public function getAlarm()
  {
    return $this->alarm;
  }
  /**
   * @param AssistantDevicesPlatformProtoResponseLimits
   */
  public function setResponseLimits(AssistantDevicesPlatformProtoResponseLimits $responseLimits)
  {
    $this->responseLimits = $responseLimits;
  }
  /**
   * @return AssistantDevicesPlatformProtoResponseLimits
   */
  public function getResponseLimits()
  {
    return $this->responseLimits;
  }
  /**
   * @param bool
   */
  public function setSupportSdkExecute($supportSdkExecute)
  {
    $this->supportSdkExecute = $supportSdkExecute;
  }
  /**
   * @return bool
   */
  public function getSupportSdkExecute()
  {
    return $this->supportSdkExecute;
  }
  /**
   * @param AssistantDevicesPlatformProtoSupportedDeviceOps
   */
  public function setSupportedDeviceOps(AssistantDevicesPlatformProtoSupportedDeviceOps $supportedDeviceOps)
  {
    $this->supportedDeviceOps = $supportedDeviceOps;
  }
  /**
   * @return AssistantDevicesPlatformProtoSupportedDeviceOps
   */
  public function getSupportedDeviceOps()
  {
    return $this->supportedDeviceOps;
  }
  /**
   * @param bool
   */
  public function setSupportsMultiResponse($supportsMultiResponse)
  {
    $this->supportsMultiResponse = $supportsMultiResponse;
  }
  /**
   * @return bool
   */
  public function getSupportsMultiResponse()
  {
    return $this->supportsMultiResponse;
  }
  /**
   * @param AssistantDevicesPlatformProtoTimerCapability
   */
  public function setTimer(AssistantDevicesPlatformProtoTimerCapability $timer)
  {
    $this->timer = $timer;
  }
  /**
   * @return AssistantDevicesPlatformProtoTimerCapability
   */
  public function getTimer()
  {
    return $this->timer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoInlinedActionCapability::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoInlinedActionCapability');
