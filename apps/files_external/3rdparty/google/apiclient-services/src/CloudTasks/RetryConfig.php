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

namespace Google\Service\CloudTasks;

class RetryConfig extends \Google\Model
{
  /**
   * @var int
   */
  public $maxAttempts;
  /**
   * @var string
   */
  public $maxBackoff;
  /**
   * @var int
   */
  public $maxDoublings;
  /**
   * @var string
   */
  public $maxRetryDuration;
  /**
   * @var string
   */
  public $minBackoff;

  /**
   * @param int
   */
  public function setMaxAttempts($maxAttempts)
  {
    $this->maxAttempts = $maxAttempts;
  }
  /**
   * @return int
   */
  public function getMaxAttempts()
  {
    return $this->maxAttempts;
  }
  /**
   * @param string
   */
  public function setMaxBackoff($maxBackoff)
  {
    $this->maxBackoff = $maxBackoff;
  }
  /**
   * @return string
   */
  public function getMaxBackoff()
  {
    return $this->maxBackoff;
  }
  /**
   * @param int
   */
  public function setMaxDoublings($maxDoublings)
  {
    $this->maxDoublings = $maxDoublings;
  }
  /**
   * @return int
   */
  public function getMaxDoublings()
  {
    return $this->maxDoublings;
  }
  /**
   * @param string
   */
  public function setMaxRetryDuration($maxRetryDuration)
  {
    $this->maxRetryDuration = $maxRetryDuration;
  }
  /**
   * @return string
   */
  public function getMaxRetryDuration()
  {
    return $this->maxRetryDuration;
  }
  /**
   * @param string
   */
  public function setMinBackoff($minBackoff)
  {
    $this->minBackoff = $minBackoff;
  }
  /**
   * @return string
   */
  public function getMinBackoff()
  {
    return $this->minBackoff;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RetryConfig::class, 'Google_Service_CloudTasks_RetryConfig');
