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

namespace Google\Service\AndroidEnterprise;

class Product extends \Google\Collection
{
  protected $collection_key = 'screenshotUrls';
  protected $appTracksType = TrackInfo::class;
  protected $appTracksDataType = 'array';
  protected $appVersionType = AppVersion::class;
  protected $appVersionDataType = 'array';
  /**
   * @var string
   */
  public $authorName;
  /**
   * @var string[]
   */
  public $availableCountries;
  /**
   * @var string[]
   */
  public $availableTracks;
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
  public $detailsUrl;
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
  public $iconUrl;
  /**
   * @var string
   */
  public $lastUpdatedTimestampMillis;
  /**
   * @var int
   */
  public $minAndroidSdkVersion;
  protected $permissionsType = ProductPermission::class;
  protected $permissionsDataType = 'array';
  /**
   * @var string
   */
  public $productId;
  /**
   * @var string
   */
  public $productPricing;
  /**
   * @var string
   */
  public $recentChanges;
  /**
   * @var bool
   */
  public $requiresContainerApp;
  /**
   * @var string[]
   */
  public $screenshotUrls;
  protected $signingCertificateType = ProductSigningCertificate::class;
  protected $signingCertificateDataType = '';
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
  public $workDetailsUrl;

  /**
   * @param TrackInfo[]
   */
  public function setAppTracks($appTracks)
  {
    $this->appTracks = $appTracks;
  }
  /**
   * @return TrackInfo[]
   */
  public function getAppTracks()
  {
    return $this->appTracks;
  }
  /**
   * @param AppVersion[]
   */
  public function setAppVersion($appVersion)
  {
    $this->appVersion = $appVersion;
  }
  /**
   * @return AppVersion[]
   */
  public function getAppVersion()
  {
    return $this->appVersion;
  }
  /**
   * @param string
   */
  public function setAuthorName($authorName)
  {
    $this->authorName = $authorName;
  }
  /**
   * @return string
   */
  public function getAuthorName()
  {
    return $this->authorName;
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
   * @param string[]
   */
  public function setAvailableTracks($availableTracks)
  {
    $this->availableTracks = $availableTracks;
  }
  /**
   * @return string[]
   */
  public function getAvailableTracks()
  {
    return $this->availableTracks;
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
  public function setDetailsUrl($detailsUrl)
  {
    $this->detailsUrl = $detailsUrl;
  }
  /**
   * @return string
   */
  public function getDetailsUrl()
  {
    return $this->detailsUrl;
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
   * @param string
   */
  public function setLastUpdatedTimestampMillis($lastUpdatedTimestampMillis)
  {
    $this->lastUpdatedTimestampMillis = $lastUpdatedTimestampMillis;
  }
  /**
   * @return string
   */
  public function getLastUpdatedTimestampMillis()
  {
    return $this->lastUpdatedTimestampMillis;
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
   * @param ProductPermission[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return ProductPermission[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param string
   */
  public function setProductPricing($productPricing)
  {
    $this->productPricing = $productPricing;
  }
  /**
   * @return string
   */
  public function getProductPricing()
  {
    return $this->productPricing;
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
   * @param bool
   */
  public function setRequiresContainerApp($requiresContainerApp)
  {
    $this->requiresContainerApp = $requiresContainerApp;
  }
  /**
   * @return bool
   */
  public function getRequiresContainerApp()
  {
    return $this->requiresContainerApp;
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
   * @param ProductSigningCertificate
   */
  public function setSigningCertificate(ProductSigningCertificate $signingCertificate)
  {
    $this->signingCertificate = $signingCertificate;
  }
  /**
   * @return ProductSigningCertificate
   */
  public function getSigningCertificate()
  {
    return $this->signingCertificate;
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
  public function setWorkDetailsUrl($workDetailsUrl)
  {
    $this->workDetailsUrl = $workDetailsUrl;
  }
  /**
   * @return string
   */
  public function getWorkDetailsUrl()
  {
    return $this->workDetailsUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Product::class, 'Google_Service_AndroidEnterprise_Product');
