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

namespace Google\Service\YouTube;

class LiveBroadcastStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $lifeCycleStatus;
  /**
   * @var string
   */
  public $liveBroadcastPriority;
  /**
   * @var bool
   */
  public $madeForKids;
  /**
   * @var string
   */
  public $privacyStatus;
  /**
   * @var string
   */
  public $recordingStatus;
  /**
   * @var bool
   */
  public $selfDeclaredMadeForKids;

  /**
   * @param string
   */
  public function setLifeCycleStatus($lifeCycleStatus)
  {
    $this->lifeCycleStatus = $lifeCycleStatus;
  }
  /**
   * @return string
   */
  public function getLifeCycleStatus()
  {
    return $this->lifeCycleStatus;
  }
  /**
   * @param string
   */
  public function setLiveBroadcastPriority($liveBroadcastPriority)
  {
    $this->liveBroadcastPriority = $liveBroadcastPriority;
  }
  /**
   * @return string
   */
  public function getLiveBroadcastPriority()
  {
    return $this->liveBroadcastPriority;
  }
  /**
   * @param bool
   */
  public function setMadeForKids($madeForKids)
  {
    $this->madeForKids = $madeForKids;
  }
  /**
   * @return bool
   */
  public function getMadeForKids()
  {
    return $this->madeForKids;
  }
  /**
   * @param string
   */
  public function setPrivacyStatus($privacyStatus)
  {
    $this->privacyStatus = $privacyStatus;
  }
  /**
   * @return string
   */
  public function getPrivacyStatus()
  {
    return $this->privacyStatus;
  }
  /**
   * @param string
   */
  public function setRecordingStatus($recordingStatus)
  {
    $this->recordingStatus = $recordingStatus;
  }
  /**
   * @return string
   */
  public function getRecordingStatus()
  {
    return $this->recordingStatus;
  }
  /**
   * @param bool
   */
  public function setSelfDeclaredMadeForKids($selfDeclaredMadeForKids)
  {
    $this->selfDeclaredMadeForKids = $selfDeclaredMadeForKids;
  }
  /**
   * @return bool
   */
  public function getSelfDeclaredMadeForKids()
  {
    return $this->selfDeclaredMadeForKids;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveBroadcastStatus::class, 'Google_Service_YouTube_LiveBroadcastStatus');
