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

namespace Google\Service\OSConfig;

class PatchJobInstanceDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $attemptCount;
  /**
   * @var string
   */
  public $failureReason;
  /**
   * @var string
   */
  public $instanceSystemId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setAttemptCount($attemptCount)
  {
    $this->attemptCount = $attemptCount;
  }
  /**
   * @return string
   */
  public function getAttemptCount()
  {
    return $this->attemptCount;
  }
  /**
   * @param string
   */
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  /**
   * @return string
   */
  public function getFailureReason()
  {
    return $this->failureReason;
  }
  /**
   * @param string
   */
  public function setInstanceSystemId($instanceSystemId)
  {
    $this->instanceSystemId = $instanceSystemId;
  }
  /**
   * @return string
   */
  public function getInstanceSystemId()
  {
    return $this->instanceSystemId;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PatchJobInstanceDetails::class, 'Google_Service_OSConfig_PatchJobInstanceDetails');
