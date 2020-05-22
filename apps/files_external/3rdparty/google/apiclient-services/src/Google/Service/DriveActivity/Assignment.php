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

class Google_Service_DriveActivity_Assignment extends Google_Model
{
  protected $assignedUserType = 'Google_Service_DriveActivity_User';
  protected $assignedUserDataType = '';
  public $subtype;

  /**
   * @param Google_Service_DriveActivity_User
   */
  public function setAssignedUser(Google_Service_DriveActivity_User $assignedUser)
  {
    $this->assignedUser = $assignedUser;
  }
  /**
   * @return Google_Service_DriveActivity_User
   */
  public function getAssignedUser()
  {
    return $this->assignedUser;
  }
  public function setSubtype($subtype)
  {
    $this->subtype = $subtype;
  }
  public function getSubtype()
  {
    return $this->subtype;
  }
}
