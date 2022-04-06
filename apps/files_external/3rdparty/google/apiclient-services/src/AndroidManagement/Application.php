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

namespace Google\Service\AndroidManagement;

class Application extends \Google\Collection
{
  protected $collection_key = 'screenshotUrls';
  /**
   * @var string
   */
  public $appPricing;
  protected $appTracksType = AppTrackInfo::class;
  protected $appTracksDataType = 'array';
  protected $appVersionsType = AppVersion::class;
  protected $appVersionsDataType = 'array';
  /**
   * @var string
   */
  public $author;
  /**
   * @var string[]
   */
  public $availableCountries;
  /**
   * @var string
   */
  public $category;
  /**
   * @var string
   */
  public $contentRating;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $distributionChannel;
  /**
   * @var string[]
   */
  public $features;
  /**
   * @var string
   */
  public $fullDescription;
  /**
   * @var string
   */
  public $iconUrl;
  protected $managedPropertiesType = ManagedProperty::class;
  protected $managedPropertiesDataType = 'array';
  /**
   * @var int
   */
  public $minAndroidSdkVersion;
  /**
   * @var string
   */
  public $name;
  protected $permissionsType = ApplicationPermission::class;
  protected $permissionsDataType = 'array';
  /**
   * @var string
   */
  public $playStoreUrl;
  /**
   * @var string
   */
  public $recentChanges;
  /**
   * @var string[]
   */
  public $screenshotUrls;
  /**
   * @var string
   */
  public $smallIconUrl;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAppPricing($appPricing)
  {
    $this->appPricing = $appPricing;
  }
  /**
   * @return string
   */
  public function getAppPricing()
  {
    return $this->appPricing;
  }
  /**
   * @param AppTrackInfo[]
   */
  public function setAppTracks($appTracks)
  {
    $this->appTracks = $appTracks;
  }
  /**
   * @return AppTrackInfo[]
   */
  public function getAppTracks()
  {
    return $this->appTracks;
  }
  /**
   * @param AppVersion[]
   */
  public function setAppVersions($appVersions)
  {
    $this->appVersions = $appVersions;
  }
  /**
   * @return AppVersion[]
   */
  public function getAppVersions()
  {
    return $this->appVersions;
  }
  /**
   * @param string
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return string
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param string[]
   */
  public function setAvailableCountries($availableCountries)
  {
    $this->availableCountries = $availableCountries;
  }
  /**
   * @return string[]
   */
  public function getAvailableCountries()
  {
    return $this->availableCountries;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param string
   */
  public function setContentRating($contentRating)
  {
    $this->contentRating = $contentRating;
  }
  /**
   * @return string
   */
  public function getContentRating()
  {
    return $this->contentRating;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDistributionChannel($distributionChannel)
  {
    $this->distributionChannel = $distributionChannel;
  }
  /**
   * @return string
   */
  public function getDistributionChannel()
  {
    return $this->distributionChannel;
  }
  /**
   * @param string[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return string[]
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param string
   */
  public function setFullDescription($fullDescription)
  {
    $this->fullDescription = $fullDescription;
  }
  /**
   * @return string
   */
  public function getFullDescription()
  {
    return $this->fullDescription;
  }
  /**
   * @param string
   */
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  /**
   * @return string
   */
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  /**
   * @param ManagedProperty[]
   */
  public function setManagedProperties($managedProperties)
  {
    $this->managedProperties = $managedProperties;
  }
  /**
   * @return ManagedProperty[]
   */
  public function getManagedProperties()
  {
    return $this->managedProperties;
  }
  /**
   * @param int
   */
  public function setMinAndroidSdkVersion($minAndroidSdkVersion)
  {
    $this->minAndroidSdkVersion = $minAndroidSdkVersion;
  }
  /**
   * @return int
   */
  public function getMinAndroidSdkVersion()
  {
    return $this->minAndroidSdkVersion;
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
   * @param ApplicationPermission[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return ApplicationPermission[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param string
   */
  public function setPlayStoreUrl($playStoreUrl)
  {
    $this->playStoreUrl = $playStoreUrl;
  }
  /**
   * @return string
   */
  public function getPlayStoreUrl()
  {
    return $this->playStoreUrl;
  }
  /**
   * @param string
   */
  public function setRecentChanges($recentChanges)
  {
    $this->recentChanges = $recentChanges;
  }
  /**
   * @return string
   */
  public function getRecentChanges()
  {
    return $this->recentChanges;
  }
  /**
   * @param string[]
   */
  public function setScreenshotUrls($screenshotUrls)
  {
    $this->screenshotUrls = $screenshotUrls;
  }
  /**
   * @return string[]
   */
  public function getScreenshotUrls()
  {
    return $this->screenshotUrls;
  }
  /**
   * @param string
   */
  public function setSmallIconUrl($smallIconUrl)
  {
    $this->smallIconUrl = $smallIconUrl;
  }
  /**
   * @return string
   */
  public function getSmallIconUrl()
  {
    return $this->smallIconUrl;
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
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Application::class, 'Google_Service_AndroidManagement_Application');
