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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaFailurePolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $intervalTime;
  /**
   * @var int
   */
  public $maxRetries;
  /**
   * @var string
   */
  public $retryStrategy;

  /**
   * @param string
   */
  public function setIntervalTime($intervalTime)
  {
    $this->intervalTime = $intervalTime;
  }
  /**
   * @return string
   */
  public function getIntervalTime()
  {
    return $this->intervalTime;
  }
  /**
   * @param int
   */
  public function setMaxRetries($maxRetries)
  {
    $this->maxRetries = $maxRetries;
  }
  /**
   * @return int
   */
  public function getMaxRetries()
  {
    return $this->maxRetries;
  }
  /**
   * @param string
   */
  public function setRetryStrategy($retryStrategy)
  {
    $this->retryStrategy = $retryStrategy;
  }
  /**
   * @return string
   */
  public function getRetryStrategy()
  {
    return $this->retryStrategy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaFailurePolicy::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaFailurePolicy');
