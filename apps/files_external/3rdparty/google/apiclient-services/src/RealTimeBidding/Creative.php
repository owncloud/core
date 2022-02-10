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

namespace Google\Service\RealTimeBidding;

class Creative extends \Google\Collection
{
  protected $collection_key = 'restrictedCategories';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $adChoicesDestinationUrl;
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
   * @var string
   */
  public $creativeFormat;
  /**
   * @var string
   */
  public $creativeId;
  protected $creativeServingDecisionType = CreativeServingDecision::class;
  protected $creativeServingDecisionDataType = '';
  /**
   * @var string[]
   */
  public $dealIds;
  /**
   * @var string[]
   */
  public $declaredAttributes;
  /**
   * @var string[]
   */
  public $declaredClickThroughUrls;
  /**
   * @var string[]
   */
  public $declaredRestrictedCategories;
  /**
   * @var int[]
   */
  public $declaredVendorIds;
  protected $htmlType = HtmlContent::class;
  protected $htmlDataType = '';
  /**
   * @var string[]
   */
  public $impressionTrackingUrls;
  /**
   * @var string
   */
  public $name;
  protected $nativeType = NativeContent::class;
  protected $nativeDataType = '';
  /**
   * @var string[]
   */
  public $restrictedCategories;
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
   * @param string
   */
  public function setCreativeFormat($creativeFormat)
  {
    $this->creativeFormat = $creativeFormat;
  }
  /**
   * @return string
   */
  public function getCreativeFormat()
  {
    return $this->creativeFormat;
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
   * @param CreativeServingDecision
   */
  public function setCreativeServingDecision(CreativeServingDecision $creativeServingDecision)
  {
    $this->creativeServingDecision = $creativeServingDecision;
  }
  /**
   * @return CreativeServingDecision
   */
  public function getCreativeServingDecision()
  {
    return $this->creativeServingDecision;
  }
  /**
   * @param string[]
   */
  public function setDealIds($dealIds)
  {
    $this->dealIds = $dealIds;
  }
  /**
   * @return string[]
   */
  public function getDealIds()
  {
    return $this->dealIds;
  }
  /**
   * @param string[]
   */
  public function setDeclaredAttributes($declaredAttributes)
  {
    $this->declaredAttributes = $declaredAttributes;
  }
  /**
   * @return string[]
   */
  public function getDeclaredAttributes()
  {
    return $this->declaredAttributes;
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
  public function setDeclaredRestrictedCategories($declaredRestrictedCategories)
  {
    $this->declaredRestrictedCategories = $declaredRestrictedCategories;
  }
  /**
   * @return string[]
   */
  public function getDeclaredRestrictedCategories()
  {
    return $this->declaredRestrictedCategories;
  }
  /**
   * @param int[]
   */
  public function setDeclaredVendorIds($declaredVendorIds)
  {
    $this->declaredVendorIds = $declaredVendorIds;
  }
  /**
   * @return int[]
   */
  public function getDeclaredVendorIds()
  {
    return $this->declaredVendorIds;
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
class_alias(Creative::class, 'Google_Service_RealTimeBidding_Creative');
