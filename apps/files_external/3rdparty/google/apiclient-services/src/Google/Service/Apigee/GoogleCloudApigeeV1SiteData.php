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

class Google_Service_Apigee_GoogleCloudApigeeV1SiteData extends Google_Collection
{
  protected $collection_key = 'teams';
  public $altLogoUrl;
  public $analyticsScript;
  public $analyticsTrackingId;
  public $anonAllowedByDefault;
  public $approvedEmails;
  public $created;
  public $currentDomain;
  public $currentURL;
  public $customDomain;
  public $customDomainEnabled;
  public $customerId;
  public $defaultDomain;
  public $defaultURL;
  public $description;
  public $direction;
  public $fileLimit;
  public $https;
  public $iconBg;
  public $iconUrl;
  public $id;
  public $idpEnabled;
  public $itSecretKey;
  public $language;
  public $lastLogin;
  public $lastModified;
  public $lastPublished;
  public $logoUrl;
  public $migrationDestSiteId;
  public $migrationSrcSiteId;
  public $name;
  public $orgName;
  public $portalVersion;
  public $showSettings;
  public $siteDomainSuffix;
  public $status;
  public $stylesheetDirty;
  public $teams;
  public $theme;
  public $themeVersion;
  public $timeZone;
  public $trashed;
  public $trashedBy;
  public $trashedOn;
  public $zoneId;

  public function setAltLogoUrl($altLogoUrl)
  {
    $this->altLogoUrl = $altLogoUrl;
  }
  public function getAltLogoUrl()
  {
    return $this->altLogoUrl;
  }
  public function setAnalyticsScript($analyticsScript)
  {
    $this->analyticsScript = $analyticsScript;
  }
  public function getAnalyticsScript()
  {
    return $this->analyticsScript;
  }
  public function setAnalyticsTrackingId($analyticsTrackingId)
  {
    $this->analyticsTrackingId = $analyticsTrackingId;
  }
  public function getAnalyticsTrackingId()
  {
    return $this->analyticsTrackingId;
  }
  public function setAnonAllowedByDefault($anonAllowedByDefault)
  {
    $this->anonAllowedByDefault = $anonAllowedByDefault;
  }
  public function getAnonAllowedByDefault()
  {
    return $this->anonAllowedByDefault;
  }
  public function setApprovedEmails($approvedEmails)
  {
    $this->approvedEmails = $approvedEmails;
  }
  public function getApprovedEmails()
  {
    return $this->approvedEmails;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setCurrentDomain($currentDomain)
  {
    $this->currentDomain = $currentDomain;
  }
  public function getCurrentDomain()
  {
    return $this->currentDomain;
  }
  public function setCurrentURL($currentURL)
  {
    $this->currentURL = $currentURL;
  }
  public function getCurrentURL()
  {
    return $this->currentURL;
  }
  public function setCustomDomain($customDomain)
  {
    $this->customDomain = $customDomain;
  }
  public function getCustomDomain()
  {
    return $this->customDomain;
  }
  public function setCustomDomainEnabled($customDomainEnabled)
  {
    $this->customDomainEnabled = $customDomainEnabled;
  }
  public function getCustomDomainEnabled()
  {
    return $this->customDomainEnabled;
  }
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  public function setDefaultDomain($defaultDomain)
  {
    $this->defaultDomain = $defaultDomain;
  }
  public function getDefaultDomain()
  {
    return $this->defaultDomain;
  }
  public function setDefaultURL($defaultURL)
  {
    $this->defaultURL = $defaultURL;
  }
  public function getDefaultURL()
  {
    return $this->defaultURL;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  public function getDirection()
  {
    return $this->direction;
  }
  public function setFileLimit($fileLimit)
  {
    $this->fileLimit = $fileLimit;
  }
  public function getFileLimit()
  {
    return $this->fileLimit;
  }
  public function setHttps($https)
  {
    $this->https = $https;
  }
  public function getHttps()
  {
    return $this->https;
  }
  public function setIconBg($iconBg)
  {
    $this->iconBg = $iconBg;
  }
  public function getIconBg()
  {
    return $this->iconBg;
  }
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIdpEnabled($idpEnabled)
  {
    $this->idpEnabled = $idpEnabled;
  }
  public function getIdpEnabled()
  {
    return $this->idpEnabled;
  }
  public function setItSecretKey($itSecretKey)
  {
    $this->itSecretKey = $itSecretKey;
  }
  public function getItSecretKey()
  {
    return $this->itSecretKey;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setLastLogin($lastLogin)
  {
    $this->lastLogin = $lastLogin;
  }
  public function getLastLogin()
  {
    return $this->lastLogin;
  }
  public function setLastModified($lastModified)
  {
    $this->lastModified = $lastModified;
  }
  public function getLastModified()
  {
    return $this->lastModified;
  }
  public function setLastPublished($lastPublished)
  {
    $this->lastPublished = $lastPublished;
  }
  public function getLastPublished()
  {
    return $this->lastPublished;
  }
  public function setLogoUrl($logoUrl)
  {
    $this->logoUrl = $logoUrl;
  }
  public function getLogoUrl()
  {
    return $this->logoUrl;
  }
  public function setMigrationDestSiteId($migrationDestSiteId)
  {
    $this->migrationDestSiteId = $migrationDestSiteId;
  }
  public function getMigrationDestSiteId()
  {
    return $this->migrationDestSiteId;
  }
  public function setMigrationSrcSiteId($migrationSrcSiteId)
  {
    $this->migrationSrcSiteId = $migrationSrcSiteId;
  }
  public function getMigrationSrcSiteId()
  {
    return $this->migrationSrcSiteId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrgName($orgName)
  {
    $this->orgName = $orgName;
  }
  public function getOrgName()
  {
    return $this->orgName;
  }
  public function setPortalVersion($portalVersion)
  {
    $this->portalVersion = $portalVersion;
  }
  public function getPortalVersion()
  {
    return $this->portalVersion;
  }
  public function setShowSettings($showSettings)
  {
    $this->showSettings = $showSettings;
  }
  public function getShowSettings()
  {
    return $this->showSettings;
  }
  public function setSiteDomainSuffix($siteDomainSuffix)
  {
    $this->siteDomainSuffix = $siteDomainSuffix;
  }
  public function getSiteDomainSuffix()
  {
    return $this->siteDomainSuffix;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStylesheetDirty($stylesheetDirty)
  {
    $this->stylesheetDirty = $stylesheetDirty;
  }
  public function getStylesheetDirty()
  {
    return $this->stylesheetDirty;
  }
  public function setTeams($teams)
  {
    $this->teams = $teams;
  }
  public function getTeams()
  {
    return $this->teams;
  }
  public function setTheme($theme)
  {
    $this->theme = $theme;
  }
  public function getTheme()
  {
    return $this->theme;
  }
  public function setThemeVersion($themeVersion)
  {
    $this->themeVersion = $themeVersion;
  }
  public function getThemeVersion()
  {
    return $this->themeVersion;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setTrashed($trashed)
  {
    $this->trashed = $trashed;
  }
  public function getTrashed()
  {
    return $this->trashed;
  }
  public function setTrashedBy($trashedBy)
  {
    $this->trashedBy = $trashedBy;
  }
  public function getTrashedBy()
  {
    return $this->trashedBy;
  }
  public function setTrashedOn($trashedOn)
  {
    $this->trashedOn = $trashedOn;
  }
  public function getTrashedOn()
  {
    return $this->trashedOn;
  }
  public function setZoneId($zoneId)
  {
    $this->zoneId = $zoneId;
  }
  public function getZoneId()
  {
    return $this->zoneId;
  }
}
