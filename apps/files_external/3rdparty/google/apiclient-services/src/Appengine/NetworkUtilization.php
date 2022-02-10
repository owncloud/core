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

class NetworkUtilization extends \Google\Model
{
  /**
   * @var int
   */
  public $targetReceivedBytesPerSecond;
  /**
   * @var int
   */
  public $targetReceivedPacketsPerSecond;
  /**
   * @var int
   */
  public $targetSentBytesPerSecond;
  /**
   * @var int
   */
  public $targetSentPacketsPerSecond;

  /**
   * @param int
   */
  public function setTargetReceivedBytesPerSecond($targetReceivedBytesPerSecond)
  {
    $this->targetReceivedBytesPerSecond = $targetReceivedBytesPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetReceivedBytesPerSecond()
  {
    return $this->targetReceivedBytesPerSecond;
  }
  /**
   * @param int
   */
  public function setTargetReceivedPacketsPerSecond($targetReceivedPacketsPerSecond)
  {
    $this->targetReceivedPacketsPerSecond = $targetReceivedPacketsPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetReceivedPacketsPerSecond()
  {
    return $this->targetReceivedPacketsPerSecond;
  }
  /**
   * @param int
   */
  public function setTargetSentBytesPerSecond($targetSentBytesPerSecond)
  {
    $this->targetSentBytesPerSecond = $targetSentBytesPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetSentBytesPerSecond()
  {
    return $this->targetSentBytesPerSecond;
  }
  /**
   * @param int
   */
  public function setTargetSentPacketsPerSecond($targetSentPacketsPerSecond)
  {
    $this->targetSentPacketsPerSecond = $targetSentPacketsPerSecond;
  }
  /**
   * @return int
   */
  public function getTargetSentPacketsPerSecond()
  {
    return $this->targetSentPacketsPerSecond;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkUtilization::class, 'Google_Service_Appengine_NetworkUtilization');
