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
  public $accountId;
  public $adChoicesDestinationUrl;
  public $advertiserName;
  public $agencyId;
  public $apiUpdateTime;
  public $creativeFormat;
  public $creativeId;
  protected $creativeServingDecisionType = CreativeServingDecision::class;
  protected $creativeServingDecisionDataType = '';
  public $dealIds;
  public $declaredAttributes;
  public $declaredClickThroughUrls;
  public $declaredRestrictedCategories;
  public $declaredVendorIds;
  protected $htmlType = HtmlContent::class;
  protected $htmlDataType = '';
  public $impressionTrackingUrls;
  public $name;
  protected $nativeType = NativeContent::class;
  protected $nativeDataType = '';
  public $restrictedCategories;
  public $version;
  protected $videoType = VideoContent::class;
  protected $videoDataType = '';

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdChoicesDestinationUrl($adChoicesDestinationUrl)
  {
    $this->adChoicesDestinationUrl = $adChoicesDestinationUrl;
  }
  public function getAdChoicesDestinationUrl()
  {
    return $this->adChoicesDestinationUrl;
  }
  public function setAdvertiserName($advertiserName)
  {
    $this->advertiserName = $advertiserName;
  }
  public function getAdvertiserName()
  {
    return $this->advertiserName;
  }
  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  public function setApiUpdateTime($apiUpdateTime)
  {
    $this->apiUpdateTime = $apiUpdateTime;
  }
  public function getApiUpdateTime()
  {
    return $this->apiUpdateTime;
  }
  public function setCreativeFormat($creativeFormat)
  {
    $this->creativeFormat = $creativeFormat;
  }
  public function getCreativeFormat()
  {
    return $this->creativeFormat;
  }
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
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
  public function setDealIds($dealIds)
  {
    $this->dealIds = $dealIds;
  }
  public function getDealIds()
  {
    return $this->dealIds;
  }
  public function setDeclaredAttributes($declaredAttributes)
  {
    $this->declaredAttributes = $declaredAttributes;
  }
  public function getDeclaredAttributes()
  {
    return $this->declaredAttributes;
  }
  public function setDeclaredClickThroughUrls($declaredClickThroughUrls)
  {
    $this->declaredClickThroughUrls = $declaredClickThroughUrls;
  }
  public function getDeclaredClickThroughUrls()
  {
    return $this->declaredClickThroughUrls;
  }
  public function setDeclaredRestrictedCategories($declaredRestrictedCategories)
  {
    $this->declaredRestrictedCategories = $declaredRestrictedCategories;
  }
  public function getDeclaredRestrictedCategories()
  {
    return $this->declaredRestrictedCategories;
  }
  public function setDeclaredVendorIds($declaredVendorIds)
  {
    $this->declaredVendorIds = $declaredVendorIds;
  }
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
  public function setImpressionTrackingUrls($impressionTrackingUrls)
  {
    $this->impressionTrackingUrls = $impressionTrackingUrls;
  }
  public function getImpressionTrackingUrls()
  {
    return $this->impressionTrackingUrls;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setRestrictedCategories($restrictedCategories)
  {
    $this->restrictedCategories = $restrictedCategories;
  }
  public function getRestrictedCategories()
  {
    return $this->restrictedCategories;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
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
