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

class Google_Service_DriveActivity_User extends Google_Model
{
  protected $deletedUserType = 'Google_Service_DriveActivity_DeletedUser';
  protected $deletedUserDataType = '';
  protected $knownUserType = 'Google_Service_DriveActivity_KnownUser';
  protected $knownUserDataType = '';
  protected $unknownUserType = 'Google_Service_DriveActivity_UnknownUser';
  protected $unknownUserDataType = '';

  /**
   * @param Google_Service_DriveActivity_DeletedUser
   */
  public function setDeletedUser(Google_Service_DriveActivity_DeletedUser $deletedUser)
  {
    $this->deletedUser = $deletedUser;
  }
  /**
   * @return Google_Service_DriveActivity_DeletedUser
   */
  public function getDeletedUser()
  {
    return $this->deletedUser;
  }
  /**
   * @param Google_Service_DriveActivity_KnownUser
   */
  public function setKnownUser(Google_Service_DriveActivity_KnownUser $knownUser)
  {
    $this->knownUser = $knownUser;
  }
  /**
   * @return Google_Service_DriveActivity_KnownUser
   */
  public function getKnownUser()
  {
    return $this->knownUser;
  }
  /**
   * @param Google_Service_DriveActivity_UnknownUser
   */
  public function setUnknownUser(Google_Service_DriveActivity_UnknownUser $unknownUser)
  {
    $this->unknownUser = $unknownUser;
  }
  /**
   * @return Google_Service_DriveActivity_UnknownUser
   */
  public function getUnknownUser()
  {
    return $this->unknownUser;
  }
}
