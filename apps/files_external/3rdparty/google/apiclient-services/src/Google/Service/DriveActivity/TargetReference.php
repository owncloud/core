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

class Google_Service_DriveActivity_TargetReference extends Google_Model
{
  protected $driveType = 'Google_Service_DriveActivity_DriveReference';
  protected $driveDataType = '';
  protected $driveItemType = 'Google_Service_DriveActivity_DriveItemReference';
  protected $driveItemDataType = '';
  protected $teamDriveType = 'Google_Service_DriveActivity_TeamDriveReference';
  protected $teamDriveDataType = '';

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
   * @param Google_Service_DriveActivity_DriveItemReference
   */
  public function setDriveItem(Google_Service_DriveActivity_DriveItemReference $driveItem)
  {
    $this->driveItem = $driveItem;
  }
  /**
   * @return Google_Service_DriveActivity_DriveItemReference
   */
  public function getDriveItem()
  {
    return $this->driveItem;
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
}
