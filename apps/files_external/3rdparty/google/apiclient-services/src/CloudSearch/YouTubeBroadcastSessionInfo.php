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

class YouTubeBroadcastSessionInfo extends \Google\Model
{
  protected $broadcastStatsType = YouTubeBroadcastStats::class;
  protected $broadcastStatsDataType = '';
  protected $sessionStateInfoType = SessionStateInfo::class;
  protected $sessionStateInfoDataType = '';
  /**
   * @var string
   */
  public $youTubeBroadcastSessionId;
  protected $youTubeLiveBroadcastEventType = YouTubeLiveBroadcastEvent::class;
  protected $youTubeLiveBroadcastEventDataType = '';

  /**
   * @param YouTubeBroadcastStats
   */
  public function setBroadcastStats(YouTubeBroadcastStats $broadcastStats)
  {
    $this->broadcastStats = $broadcastStats;
  }
  /**
   * @return YouTubeBroadcastStats
   */
  public function getBroadcastStats()
  {
    return $this->broadcastStats;
  }
  /**
   * @param SessionStateInfo
   */
  public function setSessionStateInfo(SessionStateInfo $sessionStateInfo)
  {
    $this->sessionStateInfo = $sessionStateInfo;
  }
  /**
   * @return SessionStateInfo
   */
  public function getSessionStateInfo()
  {
    return $this->sessionStateInfo;
  }
  /**
   * @param string
   */
  public function setYouTubeBroadcastSessionId($youTubeBroadcastSessionId)
  {
    $this->youTubeBroadcastSessionId = $youTubeBroadcastSessionId;
  }
  /**
   * @return string
   */
  public function getYouTubeBroadcastSessionId()
  {
    return $this->youTubeBroadcastSessionId;
  }
  /**
   * @param YouTubeLiveBroadcastEvent
   */
  public function setYouTubeLiveBroadcastEvent(YouTubeLiveBroadcastEvent $youTubeLiveBroadcastEvent)
  {
    $this->youTubeLiveBroadcastEvent = $youTubeLiveBroadcastEvent;
  }
  /**
   * @return YouTubeLiveBroadcastEvent
   */
  public function getYouTubeLiveBroadcastEvent()
  {
    return $this->youTubeLiveBroadcastEvent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YouTubeBroadcastSessionInfo::class, 'Google_Service_CloudSearch_YouTubeBroadcastSessionInfo');
