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

class Profile extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var bool
   */
  public $botFilteringEnabled;
  protected $childLinkType = ProfileChildLink::class;
  protected $childLinkDataType = '';
  /**
   * @var string
   */
  public $created;
  /**
   * @var string
   */
  public $currency;
  /**
   * @var string
   */
  public $defaultPage;
  /**
   * @var bool
   */
  public $eCommerceTracking;
  /**
   * @var bool
   */
  public $enhancedECommerceTracking;
  /**
   * @var string
   */
  public $excludeQueryParameters;
  /**
   * @var string
   */
  public $id;
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
  public $name;
  protected $parentLinkType = ProfileParentLink::class;
  protected $parentLinkDataType = '';
  protected $permissionsType = ProfilePermissions::class;
  protected $permissionsDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $siteSearchCategoryParameters;
  /**
   * @var string
   */
  public $siteSearchQueryParameters;
  /**
   * @var bool
   */
  public $starred;
  /**
   * @var bool
   */
  public $stripSiteSearchCategoryParameters;
  /**
   * @var bool
   */
  public $stripSiteSearchQueryParameters;
  /**
   * @var string
   */
  public $timezone;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $webPropertyId;
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
   * @param bool
   */
  public function setBotFilteringEnabled($botFilteringEnabled)
  {
    $this->botFilteringEnabled = $botFilteringEnabled;
  }
  /**
   * @return bool
   */
  public function getBotFilteringEnabled()
  {
    return $this->botFilteringEnabled;
  }
  /**
   * @param ProfileChildLink
   */
  public function setChildLink(ProfileChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  /**
   * @return ProfileChildLink
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
   * @param string
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  /**
   * @return string
   */
  public function getCurrency()
  {
    return $this->currency;
  }
  /**
   * @param string
   */
  public function setDefaultPage($defaultPage)
  {
    $this->defaultPage = $defaultPage;
  }
  /**
   * @return string
   */
  public function getDefaultPage()
  {
    return $this->defaultPage;
  }
  /**
   * @param bool
   */
  public function setECommerceTracking($eCommerceTracking)
  {
    $this->eCommerceTracking = $eCommerceTracking;
  }
  /**
   * @return bool
   */
  public function getECommerceTracking()
  {
    return $this->eCommerceTracking;
  }
  /**
   * @param bool
   */
  public function setEnhancedECommerceTracking($enhancedECommerceTracking)
  {
    $this->enhancedECommerceTracking = $enhancedECommerceTracking;
  }
  /**
   * @return bool
   */
  public function getEnhancedECommerceTracking()
  {
    return $this->enhancedECommerceTracking;
  }
  /**
   * @param string
   */
  public function setExcludeQueryParameters($excludeQueryParameters)
  {
    $this->excludeQueryParameters = $excludeQueryParameters;
  }
  /**
   * @return string
   */
  public function getExcludeQueryParameters()
  {
    return $this->excludeQueryParameters;
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
   * @param ProfileParentLink
   */
  public function setParentLink(ProfileParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  /**
   * @return ProfileParentLink
   */
  public function getParentLink()
  {
    return $this->parentLink;
  }
  /**
   * @param ProfilePermissions
   */
  public function setPermissions(ProfilePermissions $permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return ProfilePermissions
   */
  public function getPermissions()
  {
    return $this->permissions;
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
   * @param string
   */
  public function setSiteSearchCategoryParameters($siteSearchCategoryParameters)
  {
    $this->siteSearchCategoryParameters = $siteSearchCategoryParameters;
  }
  /**
   * @return string
   */
  public function getSiteSearchCategoryParameters()
  {
    return $this->siteSearchCategoryParameters;
  }
  /**
   * @param string
   */
  public function setSiteSearchQueryParameters($siteSearchQueryParameters)
  {
    $this->siteSearchQueryParameters = $siteSearchQueryParameters;
  }
  /**
   * @return string
   */
  public function getSiteSearchQueryParameters()
  {
    return $this->siteSearchQueryParameters;
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
   * @param bool
   */
  public function setStripSiteSearchCategoryParameters($stripSiteSearchCategoryParameters)
  {
    $this->stripSiteSearchCategoryParameters = $stripSiteSearchCategoryParameters;
  }
  /**
   * @return bool
   */
  public function getStripSiteSearchCategoryParameters()
  {
    return $this->stripSiteSearchCategoryParameters;
  }
  /**
   * @param bool
   */
  public function setStripSiteSearchQueryParameters($stripSiteSearchQueryParameters)
  {
    $this->stripSiteSearchQueryParameters = $stripSiteSearchQueryParameters;
  }
  /**
   * @return bool
   */
  public function getStripSiteSearchQueryParameters()
  {
    return $this->stripSiteSearchQueryParameters;
  }
  /**
   * @param string
   */
  public function setTimezone($timezone)
  {
    $this->timezone = $timezone;
  }
  /**
   * @return string
   */
  public function getTimezone()
  {
    return $this->timezone;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
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
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  /**
   * @return string
   */
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
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
class_alias(Profile::class, 'Google_Service_Analytics_Profile');
