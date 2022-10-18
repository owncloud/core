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

class TrawlerFetchReplyDataFetchStatsStateStats extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "endTrackingTimeUsec" => "EndTrackingTimeUsec",
        "startTrackingTimeUsec" => "StartTrackingTimeUsec",
        "waitCompressTimeUsec" => "WaitCompressTimeUsec",
        "waitContentCacheUsec" => "WaitContentCacheUsec",
        "waitCredentialTimeUsec" => "WaitCredentialTimeUsec",
        "waitDNSTimeUsec" => "WaitDNSTimeUsec",
        "waitFetchClientUsec" => "WaitFetchClientUsec",
        "waitForCachedContentStreamingUsec" => "WaitForCachedContentStreamingUsec",
        "waitForFetchUsec" => "WaitForFetchUsec",
        "waitHostIdTimeUsec" => "WaitHostIdTimeUsec",
        "waitNextFlowUsec" => "WaitNextFlowUsec",
        "waitRobotsCacheTimeUsec" => "WaitRobotsCacheTimeUsec",
        "waitRobotsFetchTimeUsec" => "WaitRobotsFetchTimeUsec",
        "waitRobotsTimeUsec" => "WaitRobotsTimeUsec",
        "waitScheduleTimeUsec" => "WaitScheduleTimeUsec",
  ];
  /**
   * @var string
   */
  public $endTrackingTimeUsec;
  /**
   * @var string
   */
  public $startTrackingTimeUsec;
  /**
   * @var int
   */
  public $waitCompressTimeUsec;
  /**
   * @var int
   */
  public $waitContentCacheUsec;
  /**
   * @var int
   */
  public $waitCredentialTimeUsec;
  /**
   * @var int
   */
  public $waitDNSTimeUsec;
  /**
   * @var int
   */
  public $waitFetchClientUsec;
  /**
   * @var int
   */
  public $waitForCachedContentStreamingUsec;
  /**
   * @var int
   */
  public $waitForFetchUsec;
  /**
   * @var int
   */
  public $waitHostIdTimeUsec;
  /**
   * @var int
   */
  public $waitNextFlowUsec;
  /**
   * @var int
   */
  public $waitRobotsCacheTimeUsec;
  /**
   * @var int
   */
  public $waitRobotsFetchTimeUsec;
  /**
   * @var int
   */
  public $waitRobotsTimeUsec;
  /**
   * @var int
   */
  public $waitScheduleTimeUsec;

  /**
   * @param string
   */
  public function setEndTrackingTimeUsec($endTrackingTimeUsec)
  {
    $this->endTrackingTimeUsec = $endTrackingTimeUsec;
  }
  /**
   * @return string
   */
  public function getEndTrackingTimeUsec()
  {
    return $this->endTrackingTimeUsec;
  }
  /**
   * @param string
   */
  public function setStartTrackingTimeUsec($startTrackingTimeUsec)
  {
    $this->startTrackingTimeUsec = $startTrackingTimeUsec;
  }
  /**
   * @return string
   */
  public function getStartTrackingTimeUsec()
  {
    return $this->startTrackingTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitCompressTimeUsec($waitCompressTimeUsec)
  {
    $this->waitCompressTimeUsec = $waitCompressTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitCompressTimeUsec()
  {
    return $this->waitCompressTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitContentCacheUsec($waitContentCacheUsec)
  {
    $this->waitContentCacheUsec = $waitContentCacheUsec;
  }
  /**
   * @return int
   */
  public function getWaitContentCacheUsec()
  {
    return $this->waitContentCacheUsec;
  }
  /**
   * @param int
   */
  public function setWaitCredentialTimeUsec($waitCredentialTimeUsec)
  {
    $this->waitCredentialTimeUsec = $waitCredentialTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitCredentialTimeUsec()
  {
    return $this->waitCredentialTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitDNSTimeUsec($waitDNSTimeUsec)
  {
    $this->waitDNSTimeUsec = $waitDNSTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitDNSTimeUsec()
  {
    return $this->waitDNSTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitFetchClientUsec($waitFetchClientUsec)
  {
    $this->waitFetchClientUsec = $waitFetchClientUsec;
  }
  /**
   * @return int
   */
  public function getWaitFetchClientUsec()
  {
    return $this->waitFetchClientUsec;
  }
  /**
   * @param int
   */
  public function setWaitForCachedContentStreamingUsec($waitForCachedContentStreamingUsec)
  {
    $this->waitForCachedContentStreamingUsec = $waitForCachedContentStreamingUsec;
  }
  /**
   * @return int
   */
  public function getWaitForCachedContentStreamingUsec()
  {
    return $this->waitForCachedContentStreamingUsec;
  }
  /**
   * @param int
   */
  public function setWaitForFetchUsec($waitForFetchUsec)
  {
    $this->waitForFetchUsec = $waitForFetchUsec;
  }
  /**
   * @return int
   */
  public function getWaitForFetchUsec()
  {
    return $this->waitForFetchUsec;
  }
  /**
   * @param int
   */
  public function setWaitHostIdTimeUsec($waitHostIdTimeUsec)
  {
    $this->waitHostIdTimeUsec = $waitHostIdTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitHostIdTimeUsec()
  {
    return $this->waitHostIdTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitNextFlowUsec($waitNextFlowUsec)
  {
    $this->waitNextFlowUsec = $waitNextFlowUsec;
  }
  /**
   * @return int
   */
  public function getWaitNextFlowUsec()
  {
    return $this->waitNextFlowUsec;
  }
  /**
   * @param int
   */
  public function setWaitRobotsCacheTimeUsec($waitRobotsCacheTimeUsec)
  {
    $this->waitRobotsCacheTimeUsec = $waitRobotsCacheTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitRobotsCacheTimeUsec()
  {
    return $this->waitRobotsCacheTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitRobotsFetchTimeUsec($waitRobotsFetchTimeUsec)
  {
    $this->waitRobotsFetchTimeUsec = $waitRobotsFetchTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitRobotsFetchTimeUsec()
  {
    return $this->waitRobotsFetchTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitRobotsTimeUsec($waitRobotsTimeUsec)
  {
    $this->waitRobotsTimeUsec = $waitRobotsTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitRobotsTimeUsec()
  {
    return $this->waitRobotsTimeUsec;
  }
  /**
   * @param int
   */
  public function setWaitScheduleTimeUsec($waitScheduleTimeUsec)
  {
    $this->waitScheduleTimeUsec = $waitScheduleTimeUsec;
  }
  /**
   * @return int
   */
  public function getWaitScheduleTimeUsec()
  {
    return $this->waitScheduleTimeUsec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyDataFetchStatsStateStats::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyDataFetchStatsStateStats');
