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

class Drive extends \Google\Model
{
  protected $backgroundImageFileType = DriveBackgroundImageFile::class;
  protected $backgroundImageFileDataType = '';
  public $backgroundImageLink;
  protected $capabilitiesType = DriveCapabilities::class;
  protected $capabilitiesDataType = '';
  public $colorRgb;
  public $createdTime;
  public $hidden;
  public $id;
  public $kind;
  public $name;
  protected $restrictionsType = DriveRestrictions::class;
  protected $restrictionsDataType = '';
  public $themeId;

  /**
   * @param DriveBackgroundImageFile
   */
  public function setBackgroundImageFile(DriveBackgroundImageFile $backgroundImageFile)
  {
    $this->backgroundImageFile = $backgroundImageFile;
  }
  /**
   * @return DriveBackgroundImageFile
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
   * @param DriveCapabilities
   */
  public function setCapabilities(DriveCapabilities $capabilities)
  {
    $this->capabilities = $capabilities;
  }
  /**
   * @return DriveCapabilities
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
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  public function getHidden()
  {
    return $this->hidden;
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
   * @param DriveRestrictions
   */
  public function setRestrictions(DriveRestrictions $restrictions)
  {
    $this->restrictions = $restrictions;
  }
  /**
   * @return DriveRestrictions
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
class_alias(Drive::class, 'Google_Service_Drive_Drive');
