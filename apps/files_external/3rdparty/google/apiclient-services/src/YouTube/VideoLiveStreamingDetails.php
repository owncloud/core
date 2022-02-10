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

class VideoLiveStreamingDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $activeLiveChatId;
  /**
   * @var string
   */
  public $actualEndTime;
  /**
   * @var string
   */
  public $actualStartTime;
  /**
   * @var string
   */
  public $concurrentViewers;
  /**
   * @var string
   */
  public $scheduledEndTime;
  /**
   * @var string
   */
  public $scheduledStartTime;

  /**
   * @param string
   */
  public function setActiveLiveChatId($activeLiveChatId)
  {
    $this->activeLiveChatId = $activeLiveChatId;
  }
  /**
   * @return string
   */
  public function getActiveLiveChatId()
  {
    return $this->activeLiveChatId;
  }
  /**
   * @param string
   */
  public function setActualEndTime($actualEndTime)
  {
    $this->actualEndTime = $actualEndTime;
  }
  /**
   * @return string
   */
  public function getActualEndTime()
  {
    return $this->actualEndTime;
  }
  /**
   * @param string
   */
  public function setActualStartTime($actualStartTime)
  {
    $this->actualStartTime = $actualStartTime;
  }
  /**
   * @return string
   */
  public function getActualStartTime()
  {
    return $this->actualStartTime;
  }
  /**
   * @param string
   */
  public function setConcurrentViewers($concurrentViewers)
  {
    $this->concurrentViewers = $concurrentViewers;
  }
  /**
   * @return string
   */
  public function getConcurrentViewers()
  {
    return $this->concurrentViewers;
  }
  /**
   * @param string
   */
  public function setScheduledEndTime($scheduledEndTime)
  {
    $this->scheduledEndTime = $scheduledEndTime;
  }
  /**
   * @return string
   */
  public function getScheduledEndTime()
  {
    return $this->scheduledEndTime;
  }
  /**
   * @param string
   */
  public function setScheduledStartTime($scheduledStartTime)
  {
    $this->scheduledStartTime = $scheduledStartTime;
  }
  /**
   * @return string
   */
  public function getScheduledStartTime()
  {
    return $this->scheduledStartTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoLiveStreamingDetails::class, 'Google_Service_YouTube_VideoLiveStreamingDetails');
