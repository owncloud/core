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

namespace Google\Service\Dfareporting;

class Site extends \Google\Collection
{
  protected $collection_key = 'siteContacts';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var bool
   */
  public $approved;
  /**
   * @var string
   */
  public $directorySiteId;
  protected $directorySiteIdDimensionValueType = DimensionValue::class;
  protected $directorySiteIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  /**
   * @var string
   */
  public $keyName;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $siteContactsType = SiteContact::class;
  protected $siteContactsDataType = 'array';
  protected $siteSettingsType = SiteSettings::class;
  protected $siteSettingsDataType = '';
  /**
   * @var string
   */
  public $subaccountId;
  protected $videoSettingsType = SiteVideoSettings::class;
  protected $videoSettingsDataType = '';

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param bool
   */
  public function setApproved($approved)
  {
    $this->approved = $approved;
  }
  /**
   * @return bool
   */
  public function getApproved()
  {
    return $this->approved;
  }
  /**
   * @param string
   */
  public function setDirectorySiteId($directorySiteId)
  {
    $this->directorySiteId = $directorySiteId;
  }
  /**
   * @return string
   */
  public function getDirectorySiteId()
  {
    return $this->directorySiteId;
  }
  /**
   * @param DimensionValue
   */
  public function setDirectorySiteIdDimensionValue(DimensionValue $directorySiteIdDimensionValue)
  {
    $this->directorySiteIdDimensionValue = $directorySiteIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getDirectorySiteIdDimensionValue()
  {
    return $this->directorySiteIdDimensionValue;
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
   * @param DimensionValue
   */
  public function setIdDimensionValue(DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
  }
  /**
   * @param string
   */
  public function setKeyName($keyName)
  {
    $this->keyName = $keyName;
  }
  /**
   * @return string
   */
  public function getKeyName()
  {
    return $this->keyName;
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
   * @param SiteContact[]
   */
  public function setSiteContacts($siteContacts)
  {
    $this->siteContacts = $siteContacts;
  }
  /**
   * @return SiteContact[]
   */
  public function getSiteContacts()
  {
    return $this->siteContacts;
  }
  /**
   * @param SiteSettings
   */
  public function setSiteSettings(SiteSettings $siteSettings)
  {
    $this->siteSettings = $siteSettings;
  }
  /**
   * @return SiteSettings
   */
  public function getSiteSettings()
  {
    return $this->siteSettings;
  }
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param SiteVideoSettings
   */
  public function setVideoSettings(SiteVideoSettings $videoSettings)
  {
    $this->videoSettings = $videoSettings;
  }
  /**
   * @return SiteVideoSettings
   */
  public function getVideoSettings()
  {
    return $this->videoSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Site::class, 'Google_Service_Dfareporting_Site');
