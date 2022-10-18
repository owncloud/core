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

class StreamingSessionInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $applicationType;
  protected $latestSessionEventType = SessionEvent::class;
  protected $latestSessionEventDataType = '';
  /**
   * @var string
   */
  public $ownerDisplayName;
  /**
   * @var string
   */
  public $sessionId;
  /**
   * @var string
   */
  public $status;
  /**
   * @var bool
   */
  public $trainingEnabled;
  /**
   * @var string
   */
  public $viewerAccessPolicy;
  protected $viewerStatsType = StreamViewerStats::class;
  protected $viewerStatsDataType = '';

  /**
   * @param string
   */
  public function setApplicationType($applicationType)
  {
    $this->applicationType = $applicationType;
  }
  /**
   * @return string
   */
  public function getApplicationType()
  {
    return $this->applicationType;
  }
  /**
   * @param SessionEvent
   */
  public function setLatestSessionEvent(SessionEvent $latestSessionEvent)
  {
    $this->latestSessionEvent = $latestSessionEvent;
  }
  /**
   * @return SessionEvent
   */
  public function getLatestSessionEvent()
  {
    return $this->latestSessionEvent;
  }
  /**
   * @param string
   */
  public function setOwnerDisplayName($ownerDisplayName)
  {
    $this->ownerDisplayName = $ownerDisplayName;
  }
  /**
   * @return string
   */
  public function getOwnerDisplayName()
  {
    return $this->ownerDisplayName;
  }
  /**
   * @param string
   */
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  /**
   * @return string
   */
  public function getSessionId()
  {
    return $this->sessionId;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param bool
   */
  public function setTrainingEnabled($trainingEnabled)
  {
    $this->trainingEnabled = $trainingEnabled;
  }
  /**
   * @return bool
   */
  public function getTrainingEnabled()
  {
    return $this->trainingEnabled;
  }
  /**
   * @param string
   */
  public function setViewerAccessPolicy($viewerAccessPolicy)
  {
    $this->viewerAccessPolicy = $viewerAccessPolicy;
  }
  /**
   * @return string
   */
  public function getViewerAccessPolicy()
  {
    return $this->viewerAccessPolicy;
  }
  /**
   * @param StreamViewerStats
   */
  public function setViewerStats(StreamViewerStats $viewerStats)
  {
    $this->viewerStats = $viewerStats;
  }
  /**
   * @return StreamViewerStats
   */
  public function getViewerStats()
  {
    return $this->viewerStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StreamingSessionInfo::class, 'Google_Service_CloudSearch_StreamingSessionInfo');
