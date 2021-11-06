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

class About extends \Google\Collection
{
  protected $collection_key = 'teamDriveThemes';
  public $appInstalled;
  public $canCreateDrives;
  public $canCreateTeamDrives;
  protected $driveThemesType = AboutDriveThemes::class;
  protected $driveThemesDataType = 'array';
  public $exportFormats;
  public $folderColorPalette;
  public $importFormats;
  public $kind;
  public $maxImportSizes;
  public $maxUploadSize;
  protected $storageQuotaType = AboutStorageQuota::class;
  protected $storageQuotaDataType = '';
  protected $teamDriveThemesType = AboutTeamDriveThemes::class;
  protected $teamDriveThemesDataType = 'array';
  protected $userType = User::class;
  protected $userDataType = '';

  public function setAppInstalled($appInstalled)
  {
    $this->appInstalled = $appInstalled;
  }
  public function getAppInstalled()
  {
    return $this->appInstalled;
  }
  public function setCanCreateDrives($canCreateDrives)
  {
    $this->canCreateDrives = $canCreateDrives;
  }
  public function getCanCreateDrives()
  {
    return $this->canCreateDrives;
  }
  public function setCanCreateTeamDrives($canCreateTeamDrives)
  {
    $this->canCreateTeamDrives = $canCreateTeamDrives;
  }
  public function getCanCreateTeamDrives()
  {
    return $this->canCreateTeamDrives;
  }
  /**
   * @param AboutDriveThemes[]
   */
  public function setDriveThemes($driveThemes)
  {
    $this->driveThemes = $driveThemes;
  }
  /**
   * @return AboutDriveThemes[]
   */
  public function getDriveThemes()
  {
    return $this->driveThemes;
  }
  public function setExportFormats($exportFormats)
  {
    $this->exportFormats = $exportFormats;
  }
  public function getExportFormats()
  {
    return $this->exportFormats;
  }
  public function setFolderColorPalette($folderColorPalette)
  {
    $this->folderColorPalette = $folderColorPalette;
  }
  public function getFolderColorPalette()
  {
    return $this->folderColorPalette;
  }
  public function setImportFormats($importFormats)
  {
    $this->importFormats = $importFormats;
  }
  public function getImportFormats()
  {
    return $this->importFormats;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxImportSizes($maxImportSizes)
  {
    $this->maxImportSizes = $maxImportSizes;
  }
  public function getMaxImportSizes()
  {
    return $this->maxImportSizes;
  }
  public function setMaxUploadSize($maxUploadSize)
  {
    $this->maxUploadSize = $maxUploadSize;
  }
  public function getMaxUploadSize()
  {
    return $this->maxUploadSize;
  }
  /**
   * @param AboutStorageQuota
   */
  public function setStorageQuota(AboutStorageQuota $storageQuota)
  {
    $this->storageQuota = $storageQuota;
  }
  /**
   * @return AboutStorageQuota
   */
  public function getStorageQuota()
  {
    return $this->storageQuota;
  }
  /**
   * @param AboutTeamDriveThemes[]
   */
  public function setTeamDriveThemes($teamDriveThemes)
  {
    $this->teamDriveThemes = $teamDriveThemes;
  }
  /**
   * @return AboutTeamDriveThemes[]
   */
  public function getTeamDriveThemes()
  {
    return $this->teamDriveThemes;
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
class_alias(About::class, 'Google_Service_Drive_About');
