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
  /**
   * @var string
   */
  public $backgroundImageLink;
  protected $capabilitiesType = DriveCapabilities::class;
  protected $capabilitiesDataType = '';
  /**
   * @var string
   */
  public $colorRgb;
  /**
   * @var string
   */
  public $createdTime;
  /**
   * @var bool
   */
  public $hidden;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $orgUnitId;
  protected $restrictionsType = DriveRestrictions::class;
  protected $restrictionsDataType = '';
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setBackgroundImageLink($backgroundImageLink)
  {
    $this->backgroundImageLink = $backgroundImageLink;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setColorRgb($colorRgb)
  {
    $this->colorRgb = $colorRgb;
  }
  /**
   * @return string
   */
  public function getColorRgb()
  {
    return $this->colorRgb;
  }
  /**
   * @param string
   */
  public function setCreatedTime($createdTime)
  {
    $this->createdTime = $createdTime;
  }
  /**
   * @return string
   */
  public function getCreatedTime()
  {
    return $this->createdTime;
  }
  /**
   * @param bool
   */
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  /**
   * @return bool
   */
  public function getHidden()
  {
    return $this->hidden;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
   * @param string
   */
  public function setOrgUnitId($orgUnitId)
  {
    $this->orgUnitId = $orgUnitId;
  }
  /**
   * @return string
   */
  public function getOrgUnitId()
  {
    return $this->orgUnitId;
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
  /**
   * @param string
   */
  public function setThemeId($themeId)
  {
    $this->themeId = $themeId;
  }
  /**
   * @return string
   */
  public function getThemeId()
  {
    return $this->themeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Drive::class, 'Google_Service_Drive_Drive');
