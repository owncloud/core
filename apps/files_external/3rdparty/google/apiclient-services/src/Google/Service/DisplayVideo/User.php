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

class Google_Service_DisplayVideo_User extends Google_Collection
{
  protected $collection_key = 'assignedUserRoles';
  protected $assignedUserRolesType = 'Google_Service_DisplayVideo_AssignedUserRole';
  protected $assignedUserRolesDataType = 'array';
  public $displayName;
  public $email;
  public $name;
  public $userId;

  /**
   * @param Google_Service_DisplayVideo_AssignedUserRole
   */
  public function setAssignedUserRoles($assignedUserRoles)
  {
    $this->assignedUserRoles = $assignedUserRoles;
  }
  /**
   * @return Google_Service_DisplayVideo_AssignedUserRole
   */
  public function getAssignedUserRoles()
  {
    return $this->assignedUserRoles;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
