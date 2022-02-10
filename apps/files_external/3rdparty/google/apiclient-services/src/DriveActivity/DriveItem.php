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

class DriveItem extends \Google\Model
{
  protected $driveFileType = DriveFile::class;
  protected $driveFileDataType = '';
  protected $driveFolderType = DriveFolder::class;
  protected $driveFolderDataType = '';
  protected $fileType = DriveactivityFile::class;
  protected $fileDataType = '';
  protected $folderType = Folder::class;
  protected $folderDataType = '';
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $name;
  protected $ownerType = Owner::class;
  protected $ownerDataType = '';
  /**
   * @var string
   */
  public $title;

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
   * @param DriveFolder
   */
  public function setDriveFolder(DriveFolder $driveFolder)
  {
    $this->driveFolder = $driveFolder;
  }
  /**
   * @return DriveFolder
   */
  public function getDriveFolder()
  {
    return $this->driveFolder;
  }
  /**
   * @param DriveactivityFile
   */
  public function setFile(DriveactivityFile $file)
  {
    $this->file = $file;
  }
  /**
   * @return DriveactivityFile
   */
  public function getFile()
  {
    return $this->file;
  }
  /**
   * @param Folder
   */
  public function setFolder(Folder $folder)
  {
    $this->folder = $folder;
  }
  /**
   * @return Folder
   */
  public function getFolder()
  {
    return $this->folder;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Owner
   */
  public function setOwner(Owner $owner)
  {
    $this->owner = $owner;
  }
  /**
   * @return Owner
   */
  public function getOwner()
  {
    return $this->owner;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveItem::class, 'Google_Service_DriveActivity_DriveItem');
