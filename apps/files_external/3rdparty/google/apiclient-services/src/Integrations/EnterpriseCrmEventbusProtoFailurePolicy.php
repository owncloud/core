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

class EnterpriseCrmEventbusProtoFailurePolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $intervalInSeconds;
  /**
   * @var int
   */
  public $maxNumRetries;
  /**
   * @var string
   */
  public $retryStrategy;

  /**
   * @param string
   */
  public function setIntervalInSeconds($intervalInSeconds)
  {
    $this->intervalInSeconds = $intervalInSeconds;
  }
  /**
   * @return string
   */
  public function getIntervalInSeconds()
  {
    return $this->intervalInSeconds;
  }
  /**
   * @param int
   */
  public function setMaxNumRetries($maxNumRetries)
  {
    $this->maxNumRetries = $maxNumRetries;
  }
  /**
   * @return int
   */
  public function getMaxNumRetries()
  {
    return $this->maxNumRetries;
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
class_alias(EnterpriseCrmEventbusProtoFailurePolicy::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoFailurePolicy');
