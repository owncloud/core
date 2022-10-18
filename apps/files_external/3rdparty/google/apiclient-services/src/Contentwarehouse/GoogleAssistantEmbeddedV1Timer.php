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

namespace Google\Service\Contentwarehouse;

class GoogleAssistantEmbeddedV1Timer extends \Google\Model
{
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $originalDuration;
  /**
   * @var string
   */
  public $remainingDuration;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $timerId;

  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setOriginalDuration($originalDuration)
  {
    $this->originalDuration = $originalDuration;
  }
  /**
   * @return string
   */
  public function getOriginalDuration()
  {
    return $this->originalDuration;
  }
  /**
   * @param string
   */
  public function setRemainingDuration($remainingDuration)
  {
    $this->remainingDuration = $remainingDuration;
  }
  /**
   * @return string
   */
  public function getRemainingDuration()
  {
    return $this->remainingDuration;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTimerId($timerId)
  {
    $this->timerId = $timerId;
  }
  /**
   * @return string
   */
  public function getTimerId()
  {
    return $this->timerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantEmbeddedV1Timer::class, 'Google_Service_Contentwarehouse_GoogleAssistantEmbeddedV1Timer');
