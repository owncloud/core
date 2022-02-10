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

namespace Google\Service\Dataflow;

class MemInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $currentLimitBytes;
  /**
   * @var string
   */
  public $currentRssBytes;
  /**
   * @var string
   */
  public $timestamp;
  /**
   * @var string
   */
  public $totalGbMs;

  /**
   * @param string
   */
  public function setCurrentLimitBytes($currentLimitBytes)
  {
    $this->currentLimitBytes = $currentLimitBytes;
  }
  /**
   * @return string
   */
  public function getCurrentLimitBytes()
  {
    return $this->currentLimitBytes;
  }
  /**
   * @param string
   */
  public function setCurrentRssBytes($currentRssBytes)
  {
    $this->currentRssBytes = $currentRssBytes;
  }
  /**
   * @return string
   */
  public function getCurrentRssBytes()
  {
    return $this->currentRssBytes;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param string
   */
  public function setTotalGbMs($totalGbMs)
  {
    $this->totalGbMs = $totalGbMs;
  }
  /**
   * @return string
   */
  public function getTotalGbMs()
  {
    return $this->totalGbMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MemInfo::class, 'Google_Service_Dataflow_MemInfo');
