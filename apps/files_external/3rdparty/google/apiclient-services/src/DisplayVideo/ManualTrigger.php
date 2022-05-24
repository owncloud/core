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

namespace Google\Service\DisplayVideo;

class ManualTrigger extends \Google\Model
{
  /**
   * @var string
   */
  public $activationDurationMinutes;
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $latestActivationTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $triggerId;

  /**
   * @param string
   */
  public function setActivationDurationMinutes($activationDurationMinutes)
  {
    $this->activationDurationMinutes = $activationDurationMinutes;
  }
  /**
   * @return string
   */
  public function getActivationDurationMinutes()
  {
    return $this->activationDurationMinutes;
  }
  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setLatestActivationTime($latestActivationTime)
  {
    $this->latestActivationTime = $latestActivationTime;
  }
  /**
   * @return string
   */
  public function getLatestActivationTime()
  {
    return $this->latestActivationTime;
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
  /**
   * @param string
   */
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  /**
   * @return string
   */
  public function getTriggerId()
  {
    return $this->triggerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManualTrigger::class, 'Google_Service_DisplayVideo_ManualTrigger');
