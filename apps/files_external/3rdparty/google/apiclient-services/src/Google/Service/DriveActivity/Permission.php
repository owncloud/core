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

class Google_Service_DriveActivity_Permission extends Google_Model
{
  public $allowDiscovery;
  protected $anyoneType = 'Google_Service_DriveActivity_Anyone';
  protected $anyoneDataType = '';
  protected $domainType = 'Google_Service_DriveActivity_Domain';
  protected $domainDataType = '';
  protected $groupType = 'Google_Service_DriveActivity_Group';
  protected $groupDataType = '';
  public $role;
  protected $userType = 'Google_Service_DriveActivity_User';
  protected $userDataType = '';

  public function setAllowDiscovery($allowDiscovery)
  {
    $this->allowDiscovery = $allowDiscovery;
  }
  public function getAllowDiscovery()
  {
    return $this->allowDiscovery;
  }
  /**
   * @param Google_Service_DriveActivity_Anyone
   */
  public function setAnyone(Google_Service_DriveActivity_Anyone $anyone)
  {
    $this->anyone = $anyone;
  }
  /**
   * @return Google_Service_DriveActivity_Anyone
   */
  public function getAnyone()
  {
    return $this->anyone;
  }
  /**
   * @param Google_Service_DriveActivity_Domain
   */
  public function setDomain(Google_Service_DriveActivity_Domain $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return Google_Service_DriveActivity_Domain
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param Google_Service_DriveActivity_Group
   */
  public function setGroup(Google_Service_DriveActivity_Group $group)
  {
    $this->group = $group;
  }
  /**
   * @return Google_Service_DriveActivity_Group
   */
  public function getGroup()
  {
    return $this->group;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param Google_Service_DriveActivity_User
   */
  public function setUser(Google_Service_DriveActivity_User $user)
  {
    $this->user = $user;
  }
  /**
   * @return Google_Service_DriveActivity_User
   */
  public function getUser()
  {
    return $this->user;
  }
}
