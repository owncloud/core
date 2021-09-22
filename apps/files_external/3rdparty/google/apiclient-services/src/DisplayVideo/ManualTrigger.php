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
  public $activationDurationMinutes;
  public $advertiserId;
  public $displayName;
  public $latestActivationTime;
  public $name;
  public $state;
  public $triggerId;

  public function setActivationDurationMinutes($activationDurationMinutes)
  {
    $this->activationDurationMinutes = $activationDurationMinutes;
  }
  public function getActivationDurationMinutes()
  {
    return $this->activationDurationMinutes;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setLatestActivationTime($latestActivationTime)
  {
    $this->latestActivationTime = $latestActivationTime;
  }
  public function getLatestActivationTime()
  {
    return $this->latestActivationTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  public function getTriggerId()
  {
    return $this->triggerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManualTrigger::class, 'Google_Service_DisplayVideo_ManualTrigger');
