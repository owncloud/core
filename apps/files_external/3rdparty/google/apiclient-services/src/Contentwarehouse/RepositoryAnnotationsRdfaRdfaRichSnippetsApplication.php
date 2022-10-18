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

namespace Google\Service\Contentwarehouse;

class RepositoryAnnotationsRdfaRdfaRichSnippetsApplication extends \Google\Collection
{
  protected $collection_key = 'subcategory';
  /**
   * @var string
   */
  public $applicationUrl;
  protected $breadcrumbsType = RepositoryAnnotationsRdfaBreadcrumbs::class;
  protected $breadcrumbsDataType = '';
  /**
   * @var string[]
   */
  public $category;
  /**
   * @var string[]
   */
  public $countriesSupported;
  protected $countryPricesType = RepositoryAnnotationsRdfaRdfaRichSnippetsApplicationCountryPrice::class;
  protected $countryPricesDataType = 'array';
  /**
   * @var string
   */
  public $currency;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $devConsoleId;
  /**
   * @var int
   */
  public $extractedIconColor;
  /**
   * @var int[]
   */
  public $extractedIconColors;
  /**
   * @var string[]
   */
  public $filteringTag;
  /**
   * @var string[]
   */
  public $genre;
  /**
   * @var bool
   */
  public $hasEditorsChoiceBadge;
  /**
   * @var string
   */
  public $iconUrlHref;
  /**
   * @var string
   */
  public $iconUrlThumbnail;
  /**
   * @var bool
   */
  public $inAppPurchase;
  /**
   * @var bool
   */
  public $isDefaultLangLocale;
  /**
   * @var string
   */
  public $langLocale;
  /**
   * @var string
   */
  public $lastUpdated;
  /**
   * @var string
   */
  public $marketplace;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $numDownloads;
  /**
   * @var string[]
   */
  public $operatingSystems;
  /**
   * @var bool
   */
  public $optionalResult;
  /**
   * @var string
   */
  public $originalRating;
  /**
   * @var string[]
   */
  public $physicalDeviceTags;
  /**
   * @var string[]
   */
  public $platformTags;
  /**
   * @var float
   */
  public $popularScore;
  /**
   * @var string
   */
  public $price;
  /**
   * @var string
   */
  public $rating;
  /**
   * @var string
   */
  public $ratingCount;
  /**
   * @var string
   */
  public $releaseDate;
  /**
   * @var string
   */
  public $reviewAuthor;
  /**
   * @var string
   */
  public $reviewCount;
  /**
   * @var string[]
   */
  public $screenUrlHref;
  /**
   * @var string[]
   */
  public $screenUrlThumbnail;
  /**
   * @var string
   */
  public $size;
  /**
   * @var string[]
   */
  public $subcategory;
  /**
   * @var bool
   */
  public $supportsAndroidTv;
  /**
   * @var bool
   */
  public $supportsChromecast;
  /**
   * @var float
   */
  public $totalRating;
  /**
   * @var int
   */
  public $totalRatingCount;
  protected $trustedGenomeDataType = VendingConsumerProtoTrustedGenomeAnnotation::class;
  protected $trustedGenomeDataDataType = 'map';
  /**
   * @var string
   */
  public $vendor;
  /**
   * @var string
   */
  public $vendorCanonicalUrl;
  /**
   * @var string
   */
  public $vendorUrl;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setApplicationUrl($applicationUrl)
  {
    $this->applicationUrl = $applicationUrl;
  }
  /**
   * @return string
   */
  public function getApplicationUrl()
  {
    return $this->applicationUrl;
  }
  /**
   * @param RepositoryAnnotationsRdfaBreadcrumbs
   */
  public function setBreadcrumbs(RepositoryAnnotationsRdfaBreadcrumbs $breadcrumbs)
  {
    $this->breadcrumbs = $breadcrumbs;
  }
  /**
   * @return RepositoryAnnotationsRdfaBreadcrumbs
   */
  public function getBreadcrumbs()
  {
    return $this->breadcrumbs;
  }
  /**
   * @param string[]
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string[]
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param string[]
   */
  public function setCountriesSupported($countriesSupported)
  {
    $this->countriesSupported = $countriesSupported;
  }
  /**
   * @return string[]
   */
  public function getCountriesSupported()
  {
    return $this->countriesSupported;
  }
  /**
   * @param RepositoryAnnotationsRdfaRdfaRichSnippetsApplicationCountryPrice[]
   */
  public function setCountryPrices($countryPrices)
  {
    $this->countryPrices = $countryPrices;
  }
  /**
   * @return RepositoryAnnotationsRdfaRdfaRichSnippetsApplicationCountryPrice[]
   */
  public function getCountryPrices()
  {
    return $this->countryPrices;
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
  public function setDevConsoleId($devConsoleId)
  {
    $this->devConsoleId = $devConsoleId;
  }
  /**
   * @return string
   */
  public function getDevConsoleId()
  {
    return $this->devConsoleId;
  }
  /**
   * @param int
   */
  public function setExtractedIconColor($extractedIconColor)
  {
    $this->extractedIconColor = $extractedIconColor;
  }
  /**
   * @return int
   */
  public function getExtractedIconColor()
  {
    return $this->extractedIconColor;
  }
  /**
   * @param int[]
   */
  public function setExtractedIconColors($extractedIconColors)
  {
    $this->extractedIconColors = $extractedIconColors;
  }
  /**
   * @return int[]
   */
  public function getExtractedIconColors()
  {
    return $this->extractedIconColors;
  }
  /**
   * @param string[]
   */
  public function setFilteringTag($filteringTag)
  {
    $this->filteringTag = $filteringTag;
  }
  /**
   * @return string[]
   */
  public function getFilteringTag()
  {
    return $this->filteringTag;
  }
  /**
   * @param string[]
   */
  public function setGenre($genre)
  {
    $this->genre = $genre;
  }
  /**
   * @return string[]
   */
  public function getGenre()
  {
    return $this->genre;
  }
  /**
   * @param bool
   */
  public function setHasEditorsChoiceBadge($hasEditorsChoiceBadge)
  {
    $this->hasEditorsChoiceBadge = $hasEditorsChoiceBadge;
  }
  /**
   * @return bool
   */
  public function getHasEditorsChoiceBadge()
  {
    return $this->hasEditorsChoiceBadge;
  }
  /**
   * @param string
   */
  public function setIconUrlHref($iconUrlHref)
  {
    $this->iconUrlHref = $iconUrlHref;
  }
  /**
   * @return string
   */
  public function getIconUrlHref()
  {
    return $this->iconUrlHref;
  }
  /**
   * @param string
   */
  public function setIconUrlThumbnail($iconUrlThumbnail)
  {
    $this->iconUrlThumbnail = $iconUrlThumbnail;
  }
  /**
   * @return string
   */
  public function getIconUrlThumbnail()
  {
    return $this->iconUrlThumbnail;
  }
  /**
   * @param bool
   */
  public function setInAppPurchase($inAppPurchase)
  {
    $this->inAppPurchase = $inAppPurchase;
  }
  /**
   * @return bool
   */
  public function getInAppPurchase()
  {
    return $this->inAppPurchase;
  }
  /**
   * @param bool
   */
  public function setIsDefaultLangLocale($isDefaultLangLocale)
  {
    $this->isDefaultLangLocale = $isDefaultLangLocale;
  }
  /**
   * @return bool
   */
  public function getIsDefaultLangLocale()
  {
    return $this->isDefaultLangLocale;
  }
  /**
   * @param string
   */
  public function setLangLocale($langLocale)
  {
    $this->langLocale = $langLocale;
  }
  /**
   * @return string
   */
  public function getLangLocale()
  {
    return $this->langLocale;
  }
  /**
   * @param string
   */
  public function setLastUpdated($lastUpdated)
  {
    $this->lastUpdated = $lastUpdated;
  }
  /**
   * @return string
   */
  public function getLastUpdated()
  {
    return $this->lastUpdated;
  }
  /**
   * @param string
   */
  public function setMarketplace($marketplace)
  {
    $this->marketplace = $marketplace;
  }
  /**
   * @return string
   */
  public function getMarketplace()
  {
    return $this->marketplace;
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
  public function setNumDownloads($numDownloads)
  {
    $this->numDownloads = $numDownloads;
  }
  /**
   * @return string
   */
  public function getNumDownloads()
  {
    return $this->numDownloads;
  }
  /**
   * @param string[]
   */
  public function setOperatingSystems($operatingSystems)
  {
    $this->operatingSystems = $operatingSystems;
  }
  /**
   * @return string[]
   */
  public function getOperatingSystems()
  {
    return $this->operatingSystems;
  }
  /**
   * @param bool
   */
  public function setOptionalResult($optionalResult)
  {
    $this->optionalResult = $optionalResult;
  }
  /**
   * @return bool
   */
  public function getOptionalResult()
  {
    return $this->optionalResult;
  }
  /**
   * @param string
   */
  public function setOriginalRating($originalRating)
  {
    $this->originalRating = $originalRating;
  }
  /**
   * @return string
   */
  public function getOriginalRating()
  {
    return $this->originalRating;
  }
  /**
   * @param string[]
   */
  public function setPhysicalDeviceTags($physicalDeviceTags)
  {
    $this->physicalDeviceTags = $physicalDeviceTags;
  }
  /**
   * @return string[]
   */
  public function getPhysicalDeviceTags()
  {
    return $this->physicalDeviceTags;
  }
  /**
   * @param string[]
   */
  public function setPlatformTags($platformTags)
  {
    $this->platformTags = $platformTags;
  }
  /**
   * @return string[]
   */
  public function getPlatformTags()
  {
    return $this->platformTags;
  }
  /**
   * @param float
   */
  public function setPopularScore($popularScore)
  {
    $this->popularScore = $popularScore;
  }
  /**
   * @return float
   */
  public function getPopularScore()
  {
    return $this->popularScore;
  }
  /**
   * @param string
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }
  /**
   * @return string
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string
   */
  public function setRating($rating)
  {
    $this->rating = $rating;
  }
  /**
   * @return string
   */
  public function getRating()
  {
    return $this->rating;
  }
  /**
   * @param string
   */
  public function setRatingCount($ratingCount)
  {
    $this->ratingCount = $ratingCount;
  }
  /**
   * @return string
   */
  public function getRatingCount()
  {
    return $this->ratingCount;
  }
  /**
   * @param string
   */
  public function setReleaseDate($releaseDate)
  {
    $this->releaseDate = $releaseDate;
  }
  /**
   * @return string
   */
  public function getReleaseDate()
  {
    return $this->releaseDate;
  }
  /**
   * @param string
   */
  public function setReviewAuthor($reviewAuthor)
  {
    $this->reviewAuthor = $reviewAuthor;
  }
  /**
   * @return string
   */
  public function getReviewAuthor()
  {
    return $this->reviewAuthor;
  }
  /**
   * @param string
   */
  public function setReviewCount($reviewCount)
  {
    $this->reviewCount = $reviewCount;
  }
  /**
   * @return string
   */
  public function getReviewCount()
  {
    return $this->reviewCount;
  }
  /**
   * @param string[]
   */
  public function setScreenUrlHref($screenUrlHref)
  {
    $this->screenUrlHref = $screenUrlHref;
  }
  /**
   * @return string[]
   */
  public function getScreenUrlHref()
  {
    return $this->screenUrlHref;
  }
  /**
   * @param string[]
   */
  public function setScreenUrlThumbnail($screenUrlThumbnail)
  {
    $this->screenUrlThumbnail = $screenUrlThumbnail;
  }
  /**
   * @return string[]
   */
  public function getScreenUrlThumbnail()
  {
    return $this->screenUrlThumbnail;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string[]
   */
  public function setSubcategory($subcategory)
  {
    $this->subcategory = $subcategory;
  }
  /**
   * @return string[]
   */
  public function getSubcategory()
  {
    return $this->subcategory;
  }
  /**
   * @param bool
   */
  public function setSupportsAndroidTv($supportsAndroidTv)
  {
    $this->supportsAndroidTv = $supportsAndroidTv;
  }
  /**
   * @return bool
   */
  public function getSupportsAndroidTv()
  {
    return $this->supportsAndroidTv;
  }
  /**
   * @param bool
   */
  public function setSupportsChromecast($supportsChromecast)
  {
    $this->supportsChromecast = $supportsChromecast;
  }
  /**
   * @return bool
   */
  public function getSupportsChromecast()
  {
    return $this->supportsChromecast;
  }
  /**
   * @param float
   */
  public function setTotalRating($totalRating)
  {
    $this->totalRating = $totalRating;
  }
  /**
   * @return float
   */
  public function getTotalRating()
  {
    return $this->totalRating;
  }
  /**
   * @param int
   */
  public function setTotalRatingCount($totalRatingCount)
  {
    $this->totalRatingCount = $totalRatingCount;
  }
  /**
   * @return int
   */
  public function getTotalRatingCount()
  {
    return $this->totalRatingCount;
  }
  /**
   * @param VendingConsumerProtoTrustedGenomeAnnotation[]
   */
  public function setTrustedGenomeData($trustedGenomeData)
  {
    $this->trustedGenomeData = $trustedGenomeData;
  }
  /**
   * @return VendingConsumerProtoTrustedGenomeAnnotation[]
   */
  public function getTrustedGenomeData()
  {
    return $this->trustedGenomeData;
  }
  /**
   * @param string
   */
  public function setVendor($vendor)
  {
    $this->vendor = $vendor;
  }
  /**
   * @return string
   */
  public function getVendor()
  {
    return $this->vendor;
  }
  /**
   * @param string
   */
  public function setVendorCanonicalUrl($vendorCanonicalUrl)
  {
    $this->vendorCanonicalUrl = $vendorCanonicalUrl;
  }
  /**
   * @return string
   */
  public function getVendorCanonicalUrl()
  {
    return $this->vendorCanonicalUrl;
  }
  /**
   * @param string
   */
  public function setVendorUrl($vendorUrl)
  {
    $this->vendorUrl = $vendorUrl;
  }
  /**
   * @return string
   */
  public function getVendorUrl()
  {
    return $this->vendorUrl;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryAnnotationsRdfaRdfaRichSnippetsApplication::class, 'Google_Service_Contentwarehouse_RepositoryAnnotationsRdfaRdfaRichSnippetsApplication');
