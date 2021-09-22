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

namespace Google\Service\CloudScheduler;

class RetryConfig extends \Google\Model
{
  public $maxBackoffDuration;
  public $maxDoublings;
  public $maxRetryDuration;
  public $minBackoffDuration;
  public $retryCount;

  public function setMaxBackoffDuration($maxBackoffDuration)
  {
    $this->maxBackoffDuration = $maxBackoffDuration;
  }
  public function getMaxBackoffDuration()
  {
    return $this->maxBackoffDuration;
  }
  public function setMaxDoublings($maxDoublings)
  {
    $this->maxDoublings = $maxDoublings;
  }
  public function getMaxDoublings()
  {
    return $this->maxDoublings;
  }
  public function setMaxRetryDuration($maxRetryDuration)
  {
    $this->maxRetryDuration = $maxRetryDuration;
  }
  public function getMaxRetryDuration()
  {
    return $this->maxRetryDuration;
  }
  public function setMinBackoffDuration($minBackoffDuration)
  {
    $this->minBackoffDuration = $minBackoffDuration;
  }
  public function getMinBackoffDuration()
  {
    return $this->minBackoffDuration;
  }
  public function setRetryCount($retryCount)
  {
    $this->retryCount = $retryCount;
  }
  public function getRetryCount()
  {
    return $this->retryCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RetryConfig::class, 'Google_Service_CloudScheduler_RetryConfig');
