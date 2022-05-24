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

namespace Google\Service\AlertCenter;

class OutOfDomainForwarding extends \Google\Model
{
  public $actorEmail;
  public $enableTime;
  public $forwardeeEmail;
  public $ipAddress;

  public function setActorEmail($actorEmail)
  {
    $this->actorEmail = $actorEmail;
  }
  public function getActorEmail()
  {
    return $this->actorEmail;
  }
  public function setEnableTime($enableTime)
  {
    $this->enableTime = $enableTime;
  }
  public function getEnableTime()
  {
    return $this->enableTime;
  }
  public function setForwardeeEmail($forwardeeEmail)
  {
    $this->forwardeeEmail = $forwardeeEmail;
  }
  public function getForwardeeEmail()
  {
    return $this->forwardeeEmail;
  }
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OutOfDomainForwarding::class, 'Google_Service_AlertCenter_OutOfDomainForwarding');
