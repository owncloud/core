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

namespace Google\Service\TrafficDirectorService;

class UpdateFailureState extends \Google\Model
{
  /**
   * @var string
   */
  public $details;
  /**
   * @var array[]
   */
  public $failedConfiguration;
  /**
   * @var string
   */
  public $lastUpdateAttempt;

  /**
   * @param string
   */
  public function setDetails($details)
  {
    $this->details = $details;
  }
  /**
   * @return string
   */
  public function getDetails()
  {
    return $this->details;
  }
  /**
   * @param array[]
   */
  public function setFailedConfiguration($failedConfiguration)
  {
    $this->failedConfiguration = $failedConfiguration;
  }
  /**
   * @return array[]
   */
  public function getFailedConfiguration()
  {
    return $this->failedConfiguration;
  }
  /**
   * @param string
   */
  public function setLastUpdateAttempt($lastUpdateAttempt)
  {
    $this->lastUpdateAttempt = $lastUpdateAttempt;
  }
  /**
   * @return string
   */
  public function getLastUpdateAttempt()
  {
    return $this->lastUpdateAttempt;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateFailureState::class, 'Google_Service_TrafficDirectorService_UpdateFailureState');
