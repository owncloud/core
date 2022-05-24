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

namespace Google\Service\CloudRun;

class GoogleCloudRunV2Condition extends \Google\Model
{
  /**
   * @var string
   */
  public $executionReason;
  /**
   * @var string
   */
  public $lastTransitionTime;
  /**
   * @var string
   */
  public $message;
  /**
   * @var string
   */
  public $reason;
  /**
   * @var string
   */
  public $revisionReason;
  /**
   * @var string
   */
  public $severity;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setExecutionReason($executionReason)
  {
    $this->executionReason = $executionReason;
  }
  /**
   * @return string
   */
  public function getExecutionReason()
  {
    return $this->executionReason;
  }
  /**
   * @param string
   */
  public function setLastTransitionTime($lastTransitionTime)
  {
    $this->lastTransitionTime = $lastTransitionTime;
  }
  /**
   * @return string
   */
  public function getLastTransitionTime()
  {
    return $this->lastTransitionTime;
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
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param string
   */
  public function setRevisionReason($revisionReason)
  {
    $this->revisionReason = $revisionReason;
  }
  /**
   * @return string
   */
  public function getRevisionReason()
  {
    return $this->revisionReason;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
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
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2Condition::class, 'Google_Service_CloudRun_GoogleCloudRunV2Condition');
