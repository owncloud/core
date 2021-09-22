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

class TeamDrive extends \Google\Model
{
  protected $backgroundImageFileType = TeamDriveBackgroundImageFile::class;
  protected $backgroundImageFileDataType = '';
  public $backgroundImageLink;
  protected $capabilitiesType = TeamDriveCapabilities::class;
  protected $capabilitiesDataType = '';
  public $colorRgb;
  public $createdTime;
  public $id;
  public $kind;
  public $name;
  protected $restrictionsType = TeamDriveRestrictions::class;
  protected $restrictionsDataType = '';
  public $themeId;

  /**
   * @param TeamDriveBackgroundImageFile
   */
  public function setBackgroundImageFile(TeamDriveBackgroundImageFile $backgroundImageFile)
  {
    $this->backgroundImageFile = $backgroundImageFile;
  }
  /**
   * @return TeamDriveBackgroundImageFile
   */
  public function getBackgroundImageFile()
  {
    return $this->backgroundImageFile;
  }
  public function setBackgroundImageLink($backgroundImageLink)
  {
    $this->backgroundImageLink = $backgroundImageLink;
  }
  public function getBackgroundImageLink()
  {
    return $this->backgroundImageLink;
  }
  /**
   * @param TeamDriveCapabilities
   */
  public function setCapabilities(TeamDriveCapabilities $capabilities)
  {
    $this->capabilities = $capabilities;
  }
  /**
   * @return TeamDriveCapabilities
   */
  public function getCapabilities()
  {
    return $this->capabilities;
  }
  public function setColorRgb($colorRgb)
  {
    $this->colorRgb = $colorRgb;
  }
  public function getColorRgb()
  {
    return $this->colorRgb;
  }
  public function setCreatedTime($createdTime)
  {
    $this->createdTime = $createdTime;
  }
  public function getCreatedTime()
  {
    return $this->createdTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param TeamDriveRestrictions
   */
  public function setRestrictions(TeamDriveRestrictions $restrictions)
  {
    $this->restrictions = $restrictions;
  }
  /**
   * @return TeamDriveRestrictions
   */
  public function getRestrictions()
  {
    return $this->restrictions;
  }
  public function setThemeId($themeId)
  {
    $this->themeId = $themeId;
  }
  public function getThemeId()
  {
    return $this->themeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TeamDrive::class, 'Google_Service_Drive_TeamDrive');
