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

class AssistantLogsMediaFocusInfoLog extends \Google\Model
{
  /**
   * @var string
   */
  public $currentFocusDurationSec;
  /**
   * @var bool
   */
  public $dialogTriggered;
  protected $focusDeviceType = AssistantLogsDeviceInfoLog::class;
  protected $focusDeviceDataType = '';
  /**
   * @var string
   */
  public $mediaFocusState;
  /**
   * @var string
   */
  public $sourceDeviceId;

  /**
   * @param string
   */
  public function setCurrentFocusDurationSec($currentFocusDurationSec)
  {
    $this->currentFocusDurationSec = $currentFocusDurationSec;
  }
  /**
   * @return string
   */
  public function getCurrentFocusDurationSec()
  {
    return $this->currentFocusDurationSec;
  }
  /**
   * @param bool
   */
  public function setDialogTriggered($dialogTriggered)
  {
    $this->dialogTriggered = $dialogTriggered;
  }
  /**
   * @return bool
   */
  public function getDialogTriggered()
  {
    return $this->dialogTriggered;
  }
  /**
   * @param AssistantLogsDeviceInfoLog
   */
  public function setFocusDevice(AssistantLogsDeviceInfoLog $focusDevice)
  {
    $this->focusDevice = $focusDevice;
  }
  /**
   * @return AssistantLogsDeviceInfoLog
   */
  public function getFocusDevice()
  {
    return $this->focusDevice;
  }
  /**
   * @param string
   */
  public function setMediaFocusState($mediaFocusState)
  {
    $this->mediaFocusState = $mediaFocusState;
  }
  /**
   * @return string
   */
  public function getMediaFocusState()
  {
    return $this->mediaFocusState;
  }
  /**
   * @param string
   */
  public function setSourceDeviceId($sourceDeviceId)
  {
    $this->sourceDeviceId = $sourceDeviceId;
  }
  /**
   * @return string
   */
  public function getSourceDeviceId()
  {
    return $this->sourceDeviceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantLogsMediaFocusInfoLog::class, 'Google_Service_Contentwarehouse_AssistantLogsMediaFocusInfoLog');
