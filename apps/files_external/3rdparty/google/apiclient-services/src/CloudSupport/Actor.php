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

namespace Google\Service\CloudSupport;

class Actor extends \Google\Model
{
  public $displayName;
  public $email;
  public $googleSupport;
  public $principalId;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setGoogleSupport($googleSupport)
  {
    $this->googleSupport = $googleSupport;
  }
  public function getGoogleSupport()
  {
    return $this->googleSupport;
  }
  public function setPrincipalId($principalId)
  {
    $this->principalId = $principalId;
  }
  public function getPrincipalId()
  {
    return $this->principalId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Actor::class, 'Google_Service_CloudSupport_Actor');
