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

class Target extends \Google\Model
{
  protected $driveType = Drive::class;
  protected $driveDataType = '';
  protected $driveItemType = DriveItem::class;
  protected $driveItemDataType = '';
  protected $fileCommentType = FileComment::class;
  protected $fileCommentDataType = '';
  protected $teamDriveType = TeamDrive::class;
  protected $teamDriveDataType = '';

  /**
   * @param Drive
   */
  public function setDrive(Drive $drive)
  {
    $this->drive = $drive;
  }
  /**
   * @return Drive
   */
  public function getDrive()
  {
    return $this->drive;
  }
  /**
   * @param DriveItem
   */
  public function setDriveItem(DriveItem $driveItem)
  {
    $this->driveItem = $driveItem;
  }
  /**
   * @return DriveItem
   */
  public function getDriveItem()
  {
    return $this->driveItem;
  }
  /**
   * @param FileComment
   */
  public function setFileComment(FileComment $fileComment)
  {
    $this->fileComment = $fileComment;
  }
  /**
   * @return FileComment
   */
  public function getFileComment()
  {
    return $this->fileComment;
  }
  /**
   * @param TeamDrive
   */
  public function setTeamDrive(TeamDrive $teamDrive)
  {
    $this->teamDrive = $teamDrive;
  }
  /**
   * @return TeamDrive
   */
  public function getTeamDrive()
  {
    return $this->teamDrive;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Target::class, 'Google_Service_DriveActivity_Target');
