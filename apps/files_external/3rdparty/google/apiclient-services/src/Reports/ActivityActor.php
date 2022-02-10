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

namespace Google\Service\Reports;

class ActivityActor extends \Google\Model
{
  /**
   * @var string
   */
  public $callerType;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $key;
  /**
   * @var string
   */
  public $profileId;

  /**
   * @param string
   */
  public function setCallerType($callerType)
  {
    $this->callerType = $callerType;
  }
  /**
   * @return string
   */
  public function getCallerType()
  {
    return $this->callerType;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param string
   */
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  /**
   * @return string
   */
  public function getProfileId()
  {
    return $this->profileId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ActivityActor::class, 'Google_Service_Reports_ActivityActor');
