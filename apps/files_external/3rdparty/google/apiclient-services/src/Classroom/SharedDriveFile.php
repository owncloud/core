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

namespace Google\Service\Classroom;

class SharedDriveFile extends \Google\Model
{
  protected $driveFileType = DriveFile::class;
  protected $driveFileDataType = '';
  /**
   * @var string
   */
  public $shareMode;

  /**
   * @param DriveFile
   */
  public function setDriveFile(DriveFile $driveFile)
  {
    $this->driveFile = $driveFile;
  }
  /**
   * @return DriveFile
   */
  public function getDriveFile()
  {
    return $this->driveFile;
  }
  /**
   * @param string
   */
  public function setShareMode($shareMode)
  {
    $this->shareMode = $shareMode;
  }
  /**
   * @return string
   */
  public function getShareMode()
  {
    return $this->shareMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SharedDriveFile::class, 'Google_Service_Classroom_SharedDriveFile');
