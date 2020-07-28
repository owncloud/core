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

class Google_Service_Drive_ContentRestriction extends Google_Model
{
  public $readOnly;
  public $reason;
  protected $restrictingUserType = 'Google_Service_Drive_User';
  protected $restrictingUserDataType = '';
  public $restrictionTime;
  public $type;

  public function setReadOnly($readOnly)
  {
    $this->readOnly = $readOnly;
  }
  public function getReadOnly()
  {
    return $this->readOnly;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param Google_Service_Drive_User
   */
  public function setRestrictingUser(Google_Service_Drive_User $restrictingUser)
  {
    $this->restrictingUser = $restrictingUser;
  }
  /**
   * @return Google_Service_Drive_User
   */
  public function getRestrictingUser()
  {
    return $this->restrictingUser;
  }
  public function setRestrictionTime($restrictionTime)
  {
    $this->restrictionTime = $restrictionTime;
  }
  public function getRestrictionTime()
  {
    return $this->restrictionTime;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
