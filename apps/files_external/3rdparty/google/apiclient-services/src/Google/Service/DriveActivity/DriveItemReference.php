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

class Google_Service_DriveActivity_DriveItemReference extends Google_Model
{
  protected $driveFileType = 'Google_Service_DriveActivity_DriveFile';
  protected $driveFileDataType = '';
  protected $driveFolderType = 'Google_Service_DriveActivity_DriveFolder';
  protected $driveFolderDataType = '';
  protected $fileType = 'Google_Service_DriveActivity_DriveactivityFile';
  protected $fileDataType = '';
  protected $folderType = 'Google_Service_DriveActivity_Folder';
  protected $folderDataType = '';
  public $name;
  public $title;

  /**
   * @param Google_Service_DriveActivity_DriveFile
   */
  public function setDriveFile(Google_Service_DriveActivity_DriveFile $driveFile)
  {
    $this->driveFile = $driveFile;
  }
  /**
   * @return Google_Service_DriveActivity_DriveFile
   */
  public function getDriveFile()
  {
    return $this->driveFile;
  }
  /**
   * @param Google_Service_DriveActivity_DriveFolder
   */
  public function setDriveFolder(Google_Service_DriveActivity_DriveFolder $driveFolder)
  {
    $this->driveFolder = $driveFolder;
  }
  /**
   * @return Google_Service_DriveActivity_DriveFolder
   */
  public function getDriveFolder()
  {
    return $this->driveFolder;
  }
  /**
   * @param Google_Service_DriveActivity_DriveactivityFile
   */
  public function setFile(Google_Service_DriveActivity_DriveactivityFile $file)
  {
    $this->file = $file;
  }
  /**
   * @return Google_Service_DriveActivity_DriveactivityFile
   */
  public function getFile()
  {
    return $this->file;
  }
  /**
   * @param Google_Service_DriveActivity_Folder
   */
  public function setFolder(Google_Service_DriveActivity_Folder $folder)
  {
    $this->folder = $folder;
  }
  /**
   * @return Google_Service_DriveActivity_Folder
   */
  public function getFolder()
  {
    return $this->folder;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
