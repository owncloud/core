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

namespace Google\Service\Appengine;

class HealthCheck extends \Google\Model
{
  /**
   * @var string
   */
  public $checkInterval;
  /**
   * @var bool
   */
  public $disableHealthCheck;
  /**
   * @var string
   */
  public $healthyThreshold;
  /**
   * @var string
   */
  public $host;
  /**
   * @var string
   */
  public $restartThreshold;
  /**
   * @var string
   */
  public $timeout;
  /**
   * @var string
   */
  public $unhealthyThreshold;

  /**
   * @param string
   */
  public function setCheckInterval($checkInterval)
  {
    $this->checkInterval = $checkInterval;
  }
  /**
   * @return string
   */
  public function getCheckInterval()
  {
    return $this->checkInterval;
  }
  /**
   * @param bool
   */
  public function setDisableHealthCheck($disableHealthCheck)
  {
    $this->disableHealthCheck = $disableHealthCheck;
  }
  /**
   * @return bool
   */
  public function getDisableHealthCheck()
  {
    return $this->disableHealthCheck;
  }
  /**
   * @param string
   */
  public function setHealthyThreshold($healthyThreshold)
  {
    $this->healthyThreshold = $healthyThreshold;
  }
  /**
   * @return string
   */
  public function getHealthyThreshold()
  {
    return $this->healthyThreshold;
  }
  /**
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param string
   */
  public function setRestartThreshold($restartThreshold)
  {
    $this->restartThreshold = $restartThreshold;
  }
  /**
   * @return string
   */
  public function getRestartThreshold()
  {
    return $this->restartThreshold;
  }
  /**
   * @param string
   */
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return string
   */
  public function getTimeout()
  {
    return $this->timeout;
  }
  /**
   * @param string
   */
  public function setUnhealthyThreshold($unhealthyThreshold)
  {
    $this->unhealthyThreshold = $unhealthyThreshold;
  }
  /**
   * @return string
   */
  public function getUnhealthyThreshold()
  {
    return $this->unhealthyThreshold;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HealthCheck::class, 'Google_Service_Appengine_HealthCheck');
