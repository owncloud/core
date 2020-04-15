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

class Google_Service_DriveActivity_Owner extends Google_Model
{
  protected $domainType = 'Google_Service_DriveActivity_Domain';
  protected $domainDataType = '';
  protected $driveType = 'Google_Service_DriveActivity_DriveReference';
  protected $driveDataType = '';
  protected $teamDriveType = 'Google_Service_DriveActivity_TeamDriveReference';
  protected $teamDriveDataType = '';
  protected $userType = 'Google_Service_DriveActivity_User';
  protected $userDataType = '';

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
   * @param Google_Service_DriveActivity_DriveReference
   */
  public function setDrive(Google_Service_DriveActivity_DriveReference $drive)
  {
    $this->drive = $drive;
  }
  /**
   * @return Google_Service_DriveActivity_DriveReference
   */
  public function getDrive()
  {
    return $this->drive;
  }
  /**
   * @param Google_Service_DriveActivity_TeamDriveReference
   */
  public function setTeamDrive(Google_Service_DriveActivity_TeamDriveReference $teamDrive)
  {
    $this->teamDrive = $teamDrive;
  }
  /**
   * @return Google_Service_DriveActivity_TeamDriveReference
   */
  public function getTeamDrive()
  {
    return $this->teamDrive;
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
