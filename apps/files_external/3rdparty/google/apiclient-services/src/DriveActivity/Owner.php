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

namespace Google\Service\DriveActivity;

class Owner extends \Google\Model
{
  protected $domainType = Domain::class;
  protected $domainDataType = '';
  protected $driveType = DriveReference::class;
  protected $driveDataType = '';
  protected $teamDriveType = TeamDriveReference::class;
  protected $teamDriveDataType = '';
  protected $userType = User::class;
  protected $userDataType = '';

  /**
   * @param Domain
   */
  public function setDomain(Domain $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return Domain
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param DriveReference
   */
  public function setDrive(DriveReference $drive)
  {
    $this->drive = $drive;
  }
  /**
   * @return DriveReference
   */
  public function getDrive()
  {
    return $this->drive;
  }
  /**
   * @param TeamDriveReference
   */
  public function setTeamDrive(TeamDriveReference $teamDrive)
  {
    $this->teamDrive = $teamDrive;
  }
  /**
   * @return TeamDriveReference
   */
  public function getTeamDrive()
  {
    return $this->teamDrive;
  }
  /**
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Owner::class, 'Google_Service_DriveActivity_Owner');
