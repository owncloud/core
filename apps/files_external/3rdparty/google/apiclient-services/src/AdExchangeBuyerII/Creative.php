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

namespace Google\Service\AdExchangeBuyerII;

class Creative extends \Google\Collection
{
  protected $collection_key = 'vendorIds';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $adChoicesDestinationUrl;
  protected $adTechnologyProvidersType = AdTechnologyProviders::class;
  protected $adTechnologyProvidersDataType = '';
  /**
   * @var string
   */
  public $advertiserName;
  /**
   * @var string
   */
  public $agencyId;
  /**
   * @var string
   */
  public $apiUpdateTime;
  /**
   * @var string[]
   */
  public $attributes;
  /**
   * @var string[]
   */
  public $clickThroughUrls;
  protected $correctionsType = Correction::class;
  protected $correctionsDataType = 'array';
  /**
   * @var string
   */
  public $creativeId;
  /**
   * @var string
   */
  public $dealsStatus;
  /**
   * @var string[]
   */
  public $declaredClickThroughUrls;
  /**
   * @var string[]
   */
  public $detectedAdvertiserIds;
  /**
   * @var string[]
   */
  public $detectedDomains;
  /**
   * @var string[]
   */
  public $detectedLanguages;
  /**
   * @var int[]
   */
  public $detectedProductCategories;
  /**
   * @var int[]
   */
  public $detectedSensitiveCategories;
  protected $htmlType = HtmlContent::class;
  protected $htmlDataType = '';
  /**
   * @var string[]
   */
  public $impressionTrackingUrls;
  protected $nativeType = NativeContent::class;
  protected $nativeDataType = '';
  /**
   * @var string
   */
  public $openAuctionStatus;
  /**
   * @var string[]
   */
  public $restrictedCategories;
  protected $servingRestrictionsType = ServingRestriction::class;
  protected $servingRestrictionsDataType = 'array';
  /**
   * @var int[]
   */
  public $vendorIds;
  /**
   * @var int
   */
  public $version;
  protected $videoType = VideoContent::class;
  protected $videoDataType = '';

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
   * @param string
   */
  public function setAdChoicesDestinationUrl($adChoicesDestinationUrl)
  {
    $this->adChoicesDestinationUrl = $adChoicesDestinationUrl;
  }
  /**
   * @return string
   */
  public function getAdChoicesDestinationUrl()
  {
    return $this->adChoicesDestinationUrl;
  }
  /**
   * @param AdTechnologyProviders
   */
  public function setAdTechnologyProviders(AdTechnologyProviders $adTechnologyProviders)
  {
    $this->adTechnologyProviders = $adTechnologyProviders;
  }
  /**
   * @return AdTechnologyProviders
   */
  public function getAdTechnologyProviders()
  {
    return $this->adTechnologyProviders;
  }
  /**
   * @param string
   */
  public function setAdvertiserName($advertiserName)
  {
    $this->advertiserName = $advertiserName;
  }
  /**
   * @return string
   */
  public function getAdvertiserName()
  {
    return $this->advertiserName;
  }
  /**
   * @param string
   */
  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  /**
   * @return string
   */
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  /**
   * @param string
   */
  public function setApiUpdateTime($apiUpdateTime)
  {
    $this->apiUpdateTime = $apiUpdateTime;
  }
  /**
   * @return string
   */
  public function getApiUpdateTime()
  {
    return $this->apiUpdateTime;
  }
  /**
   * @param string[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return string[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param string[]
   */
  public function setClickThroughUrls($clickThroughUrls)
  {
    $this->clickThroughUrls = $clickThroughUrls;
  }
  /**
   * @return string[]
   */
  public function getClickThroughUrls()
  {
    return $this->clickThroughUrls;
  }
  /**
   * @param Correction[]
   */
  public function setCorrections($corrections)
  {
    $this->corrections = $corrections;
  }
  /**
   * @return Correction[]
   */
  public function getCorrections()
  {
    return $this->corrections;
  }
  /**
   * @param string
   */
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  /**
   * @return string
   */
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  /**
   * @param string
   */
  public function setDealsStatus($dealsStatus)
  {
    $this->dealsStatus = $dealsStatus;
  }
  /**
   * @return string
   */
  public function getDealsStatus()
  {
    return $this->dealsStatus;
  }
  /**
   * @param string[]
   */
  public function setDeclaredClickThroughUrls($declaredClickThroughUrls)
  {
    $this->declaredClickThroughUrls = $declaredClickThroughUrls;
  }
  /**
   * @return string[]
   */
  public function getDeclaredClickThroughUrls()
  {
    return $this->declaredClickThroughUrls;
  }
  /**
   * @param string[]
   */
  public function setDetectedAdvertiserIds($detectedAdvertiserIds)
  {
    $this->detectedAdvertiserIds = $detectedAdvertiserIds;
  }
  /**
   * @return string[]
   */
  public function getDetectedAdvertiserIds()
  {
    return $this->detectedAdvertiserIds;
  }
  /**
   * @param string[]
   */
  public function setDetectedDomains($detectedDomains)
  {
    $this->detectedDomains = $detectedDomains;
  }
  /**
   * @return string[]
   */
  public function getDetectedDomains()
  {
    return $this->detectedDomains;
  }
  /**
   * @param string[]
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return string[]
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  /**
   * @param int[]
   */
  public function setDetectedProductCategories($detectedProductCategories)
  {
    $this->detectedProductCategories = $detectedProductCategories;
  }
  /**
   * @return int[]
   */
  public function getDetectedProductCategories()
  {
    return $this->detectedProductCategories;
  }
  /**
   * @param int[]
   */
  public function setDetectedSensitiveCategories($detectedSensitiveCategories)
  {
    $this->detectedSensitiveCategories = $detectedSensitiveCategories;
  }
  /**
   * @return int[]
   */
  public function getDetectedSensitiveCategories()
  {
    return $this->detectedSensitiveCategories;
  }
  /**
   * @param HtmlContent
   */
  public function setHtml(HtmlContent $html)
  {
    $this->html = $html;
  }
  /**
   * @return HtmlContent
   */
  public function getHtml()
  {
    return $this->html;
  }
  /**
   * @param string[]
   */
  public function setImpressionTrackingUrls($impressionTrackingUrls)
  {
    $this->impressionTrackingUrls = $impressionTrackingUrls;
  }
  /**
   * @return string[]
   */
  public function getImpressionTrackingUrls()
  {
    return $this->impressionTrackingUrls;
  }
  /**
   * @param NativeContent
   */
  public function setNative(NativeContent $native)
  {
    $this->native = $native;
  }
  /**
   * @return NativeContent
   */
  public function getNative()
  {
    return $this->native;
  }
  /**
   * @param string
   */
  public function setOpenAuctionStatus($openAuctionStatus)
  {
    $this->openAuctionStatus = $openAuctionStatus;
  }
  /**
   * @return string
   */
  public function getOpenAuctionStatus()
  {
    return $this->openAuctionStatus;
  }
  /**
   * @param string[]
   */
  public function setRestrictedCategories($restrictedCategories)
  {
    $this->restrictedCategories = $restrictedCategories;
  }
  /**
   * @return string[]
   */
  public function getRestrictedCategories()
  {
    return $this->restrictedCategories;
  }
  /**
   * @param ServingRestriction[]
   */
  public function setServingRestrictions($servingRestrictions)
  {
    $this->servingRestrictions = $servingRestrictions;
  }
  /**
   * @return ServingRestriction[]
   */
  public function getServingRestrictions()
  {
    return $this->servingRestrictions;
  }
  /**
   * @param int[]
   */
  public function setVendorIds($vendorIds)
  {
    $this->vendorIds = $vendorIds;
  }
  /**
   * @return int[]
   */
  public function getVendorIds()
  {
    return $this->vendorIds;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param VideoContent
   */
  public function setVideo(VideoContent $video)
  {
    $this->video = $video;
  }
  /**
   * @return VideoContent
   */
  public function getVideo()
  {
    return $this->video;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Creative::class, 'Google_Service_AdExchangeBuyerII_Creative');
