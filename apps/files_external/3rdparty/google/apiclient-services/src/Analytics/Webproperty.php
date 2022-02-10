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

namespace Google\Service\Analytics;

class Webproperty extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  protected $childLinkType = WebpropertyChildLink::class;
  protected $childLinkDataType = '';
  /**
   * @var string
   */
  public $created;
  /**
   * @var bool
   */
  public $dataRetentionResetOnNewActivity;
  /**
   * @var string
   */
  public $dataRetentionTtl;
  /**
   * @var string
   */
  public $defaultProfileId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $industryVertical;
  /**
   * @var string
   */
  public $internalWebPropertyId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $level;
  /**
   * @var string
   */
  public $name;
  protected $parentLinkType = WebpropertyParentLink::class;
  protected $parentLinkDataType = '';
  protected $permissionsType = WebpropertyPermissions::class;
  protected $permissionsDataType = '';
  /**
   * @var int
   */
  public $profileCount;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var bool
   */
  public $starred;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $websiteUrl;

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
   * @param WebpropertyChildLink
   */
  public function setChildLink(WebpropertyChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  /**
   * @return WebpropertyChildLink
   */
  public function getChildLink()
  {
    return $this->childLink;
  }
  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param bool
   */
  public function setDataRetentionResetOnNewActivity($dataRetentionResetOnNewActivity)
  {
    $this->dataRetentionResetOnNewActivity = $dataRetentionResetOnNewActivity;
  }
  /**
   * @return bool
   */
  public function getDataRetentionResetOnNewActivity()
  {
    return $this->dataRetentionResetOnNewActivity;
  }
  /**
   * @param string
   */
  public function setDataRetentionTtl($dataRetentionTtl)
  {
    $this->dataRetentionTtl = $dataRetentionTtl;
  }
  /**
   * @return string
   */
  public function getDataRetentionTtl()
  {
    return $this->dataRetentionTtl;
  }
  /**
   * @param string
   */
  public function setDefaultProfileId($defaultProfileId)
  {
    $this->defaultProfileId = $defaultProfileId;
  }
  /**
   * @return string
   */
  public function getDefaultProfileId()
  {
    return $this->defaultProfileId;
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
  public function setIndustryVertical($industryVertical)
  {
    $this->industryVertical = $industryVertical;
  }
  /**
   * @return string
   */
  public function getIndustryVertical()
  {
    return $this->industryVertical;
  }
  /**
   * @param string
   */
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  /**
   * @return string
   */
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
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
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return string
   */
  public function getLevel()
  {
    return $this->level;
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
   * @param WebpropertyParentLink
   */
  public function setParentLink(WebpropertyParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  /**
   * @return WebpropertyParentLink
   */
  public function getParentLink()
  {
    return $this->parentLink;
  }
  /**
   * @param WebpropertyPermissions
   */
  public function setPermissions(WebpropertyPermissions $permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return WebpropertyPermissions
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param int
   */
  public function setProfileCount($profileCount)
  {
    $this->profileCount = $profileCount;
  }
  /**
   * @return int
   */
  public function getProfileCount()
  {
    return $this->profileCount;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param bool
   */
  public function setStarred($starred)
  {
    $this->starred = $starred;
  }
  /**
   * @return bool
   */
  public function getStarred()
  {
    return $this->starred;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param string
   */
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  /**
   * @return string
   */
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Webproperty::class, 'Google_Service_Analytics_Webproperty');
