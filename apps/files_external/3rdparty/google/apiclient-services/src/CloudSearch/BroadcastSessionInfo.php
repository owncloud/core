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

class BroadcastSessionInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $broadcastSessionId;
  protected $broadcastStatsType = BroadcastStats::class;
  protected $broadcastStatsDataType = '';
  /**
   * @var string
   */
  public $ingestionId;
  protected $sessionStateInfoType = SessionStateInfo::class;
  protected $sessionStateInfoDataType = '';

  /**
   * @param string
   */
  public function setBroadcastSessionId($broadcastSessionId)
  {
    $this->broadcastSessionId = $broadcastSessionId;
  }
  /**
   * @return string
   */
  public function getBroadcastSessionId()
  {
    return $this->broadcastSessionId;
  }
  /**
   * @param BroadcastStats
   */
  public function setBroadcastStats(BroadcastStats $broadcastStats)
  {
    $this->broadcastStats = $broadcastStats;
  }
  /**
   * @return BroadcastStats
   */
  public function getBroadcastStats()
  {
    return $this->broadcastStats;
  }
  /**
   * @param string
   */
  public function setIngestionId($ingestionId)
  {
    $this->ingestionId = $ingestionId;
  }
  /**
   * @return string
   */
  public function getIngestionId()
  {
    return $this->ingestionId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BroadcastSessionInfo::class, 'Google_Service_CloudSearch_BroadcastSessionInfo');
