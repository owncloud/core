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

class Google_Service_DriveActivity_Target extends Google_Model
{
  protected $driveType = 'Google_Service_DriveActivity_Drive';
  protected $driveDataType = '';
  protected $driveItemType = 'Google_Service_DriveActivity_DriveItem';
  protected $driveItemDataType = '';
  protected $fileCommentType = 'Google_Service_DriveActivity_FileComment';
  protected $fileCommentDataType = '';
  protected $teamDriveType = 'Google_Service_DriveActivity_TeamDrive';
  protected $teamDriveDataType = '';

  /**
   * @param Google_Service_DriveActivity_Drive
   */
  public function setDrive(Google_Service_DriveActivity_Drive $drive)
  {
    $this->drive = $drive;
  }
  /**
   * @return Google_Service_DriveActivity_Drive
   */
  public function getDrive()
  {
    return $this->drive;
  }
  /**
   * @param Google_Service_DriveActivity_DriveItem
   */
  public function setDriveItem(Google_Service_DriveActivity_DriveItem $driveItem)
  {
    $this->driveItem = $driveItem;
  }
  /**
   * @return Google_Service_DriveActivity_DriveItem
   */
  public function getDriveItem()
  {
    return $this->driveItem;
  }
  /**
   * @param Google_Service_DriveActivity_FileComment
   */
  public function setFileComment(Google_Service_DriveActivity_FileComment $fileComment)
  {
    $this->fileComment = $fileComment;
  }
  /**
   * @return Google_Service_DriveActivity_FileComment
   */
  public function getFileComment()
  {
    return $this->fileComment;
  }
  /**
   * @param Google_Service_DriveActivity_TeamDrive
   */
  public function setTeamDrive(Google_Service_DriveActivity_TeamDrive $teamDrive)
  {
    $this->teamDrive = $teamDrive;
  }
  /**
   * @return Google_Service_DriveActivity_TeamDrive
   */
  public function getTeamDrive()
  {
    return $this->teamDrive;
  }
}
