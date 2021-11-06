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

namespace Google\Service\Drive;

class Change extends \Google\Model
{
  public $changeType;
  protected $driveType = Drive::class;
  protected $driveDataType = '';
  public $driveId;
  protected $fileType = DriveFile::class;
  protected $fileDataType = '';
  public $fileId;
  public $kind;
  public $removed;
  protected $teamDriveType = TeamDrive::class;
  protected $teamDriveDataType = '';
  public $teamDriveId;
  public $time;
  public $type;

  public function setChangeType($changeType)
  {
    $this->changeType = $changeType;
  }
  public function getChangeType()
  {
    return $this->changeType;
  }
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
  public function setDriveId($driveId)
  {
    $this->driveId = $driveId;
  }
  public function getDriveId()
  {
    return $this->driveId;
  }
  /**
   * @param DriveFile
   */
  public function setFile(DriveFile $file)
  {
    $this->file = $file;
  }
  /**
   * @return DriveFile
   */
  public function getFile()
  {
    return $this->file;
  }
  public function setFileId($fileId)
  {
    $this->fileId = $fileId;
  }
  public function getFileId()
  {
    return $this->fileId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setRemoved($removed)
  {
    $this->removed = $removed;
  }
  public function getRemoved()
  {
    return $this->removed;
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
  public function setTeamDriveId($teamDriveId)
  {
    $this->teamDriveId = $teamDriveId;
  }
  public function getTeamDriveId()
  {
    return $this->teamDriveId;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Change::class, 'Google_Service_Drive_Change');
