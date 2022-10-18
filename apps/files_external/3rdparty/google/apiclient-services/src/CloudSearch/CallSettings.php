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

namespace Google\Service\CloudSearch;

class CallSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $accessLock;
  /**
   * @var bool
   */
  public $attendanceReportEnabled;
  /**
   * @var bool
   */
  public $audioLock;
  /**
   * @var bool
   */
  public $chatLock;
  /**
   * @var bool
   */
  public $cseEnabled;
  /**
   * @var bool
   */
  public $moderationEnabled;
  /**
   * @var bool
   */
  public $presentLock;
  /**
   * @var bool
   */
  public $reactionsLock;
  /**
   * @var bool
   */
  public $videoLock;

  /**
   * @param bool
   */
  public function setAccessLock($accessLock)
  {
    $this->accessLock = $accessLock;
  }
  /**
   * @return bool
   */
  public function getAccessLock()
  {
    return $this->accessLock;
  }
  /**
   * @param bool
   */
  public function setAttendanceReportEnabled($attendanceReportEnabled)
  {
    $this->attendanceReportEnabled = $attendanceReportEnabled;
  }
  /**
   * @return bool
   */
  public function getAttendanceReportEnabled()
  {
    return $this->attendanceReportEnabled;
  }
  /**
   * @param bool
   */
  public function setAudioLock($audioLock)
  {
    $this->audioLock = $audioLock;
  }
  /**
   * @return bool
   */
  public function getAudioLock()
  {
    return $this->audioLock;
  }
  /**
   * @param bool
   */
  public function setChatLock($chatLock)
  {
    $this->chatLock = $chatLock;
  }
  /**
   * @return bool
   */
  public function getChatLock()
  {
    return $this->chatLock;
  }
  /**
   * @param bool
   */
  public function setCseEnabled($cseEnabled)
  {
    $this->cseEnabled = $cseEnabled;
  }
  /**
   * @return bool
   */
  public function getCseEnabled()
  {
    return $this->cseEnabled;
  }
  /**
   * @param bool
   */
  public function setModerationEnabled($moderationEnabled)
  {
    $this->moderationEnabled = $moderationEnabled;
  }
  /**
   * @return bool
   */
  public function getModerationEnabled()
  {
    return $this->moderationEnabled;
  }
  /**
   * @param bool
   */
  public function setPresentLock($presentLock)
  {
    $this->presentLock = $presentLock;
  }
  /**
   * @return bool
   */
  public function getPresentLock()
  {
    return $this->presentLock;
  }
  /**
   * @param bool
   */
  public function setReactionsLock($reactionsLock)
  {
    $this->reactionsLock = $reactionsLock;
  }
  /**
   * @return bool
   */
  public function getReactionsLock()
  {
    return $this->reactionsLock;
  }
  /**
   * @param bool
   */
  public function setVideoLock($videoLock)
  {
    $this->videoLock = $videoLock;
  }
  /**
   * @return bool
   */
  public function getVideoLock()
  {
    return $this->videoLock;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CallSettings::class, 'Google_Service_CloudSearch_CallSettings');
