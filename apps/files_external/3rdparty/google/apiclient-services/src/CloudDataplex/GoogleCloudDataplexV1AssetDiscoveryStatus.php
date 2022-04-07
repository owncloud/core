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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1AssetDiscoveryStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $lastRunDuration;
  /**
   * @var string
   */
  public $lastRunTime;
  /**
   * @var string
   */
  public $message;
  /**
   * @var string
   */
  public $state;
  protected $statsType = GoogleCloudDataplexV1AssetDiscoveryStatusStats::class;
  protected $statsDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setLastRunDuration($lastRunDuration)
  {
    $this->lastRunDuration = $lastRunDuration;
  }
  /**
   * @return string
   */
  public function getLastRunDuration()
  {
    return $this->lastRunDuration;
  }
  /**
   * @param string
   */
  public function setLastRunTime($lastRunTime)
  {
    $this->lastRunTime = $lastRunTime;
  }
  /**
   * @return string
   */
  public function getLastRunTime()
  {
    return $this->lastRunTime;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GoogleCloudDataplexV1AssetDiscoveryStatusStats
   */
  public function setStats(GoogleCloudDataplexV1AssetDiscoveryStatusStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return GoogleCloudDataplexV1AssetDiscoveryStatusStats
   */
  public function getStats()
  {
    return $this->stats;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1AssetDiscoveryStatus::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1AssetDiscoveryStatus');
