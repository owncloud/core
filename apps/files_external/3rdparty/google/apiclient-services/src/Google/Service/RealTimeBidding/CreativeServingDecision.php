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

class Google_Service_RealTimeBidding_CreativeServingDecision extends Google_Collection
{
  protected $collection_key = 'detectedVendorIds';
  protected $adTechnologyProvidersType = 'Google_Service_RealTimeBidding_AdTechnologyProviders';
  protected $adTechnologyProvidersDataType = '';
  protected $chinaServingStatusType = 'Google_Service_RealTimeBidding_ServingStatus';
  protected $chinaServingStatusDataType = '';
  protected $dealsServingStatusType = 'Google_Service_RealTimeBidding_ServingStatus';
  protected $dealsServingStatusDataType = '';
  protected $detectedAdvertisersType = 'Google_Service_RealTimeBidding_AdvertiserAndBrand';
  protected $detectedAdvertisersDataType = 'array';
  public $detectedAttributes;
  public $detectedClickThroughUrls;
  public $detectedDomains;
  public $detectedLanguages;
  public $detectedProductCategories;
  public $detectedSensitiveCategories;
  public $detectedVendorIds;
  public $lastStatusUpdate;
  protected $openAuctionServingStatusType = 'Google_Service_RealTimeBidding_ServingStatus';
  protected $openAuctionServingStatusDataType = '';
  protected $russiaServingStatusType = 'Google_Service_RealTimeBidding_ServingStatus';
  protected $russiaServingStatusDataType = '';

  /**
   * @param Google_Service_RealTimeBidding_AdTechnologyProviders
   */
  public function setAdTechnologyProviders(Google_Service_RealTimeBidding_AdTechnologyProviders $adTechnologyProviders)
  {
    $this->adTechnologyProviders = $adTechnologyProviders;
  }
  /**
   * @return Google_Service_RealTimeBidding_AdTechnologyProviders
   */
  public function getAdTechnologyProviders()
  {
    return $this->adTechnologyProviders;
  }
  /**
   * @param Google_Service_RealTimeBidding_ServingStatus
   */
  public function setChinaServingStatus(Google_Service_RealTimeBidding_ServingStatus $chinaServingStatus)
  {
    $this->chinaServingStatus = $chinaServingStatus;
  }
  /**
   * @return Google_Service_RealTimeBidding_ServingStatus
   */
  public function getChinaServingStatus()
  {
    return $this->chinaServingStatus;
  }
  /**
   * @param Google_Service_RealTimeBidding_ServingStatus
   */
  public function setDealsServingStatus(Google_Service_RealTimeBidding_ServingStatus $dealsServingStatus)
  {
    $this->dealsServingStatus = $dealsServingStatus;
  }
  /**
   * @return Google_Service_RealTimeBidding_ServingStatus
   */
  public function getDealsServingStatus()
  {
    return $this->dealsServingStatus;
  }
  /**
   * @param Google_Service_RealTimeBidding_AdvertiserAndBrand
   */
  public function setDetectedAdvertisers($detectedAdvertisers)
  {
    $this->detectedAdvertisers = $detectedAdvertisers;
  }
  /**
   * @return Google_Service_RealTimeBidding_AdvertiserAndBrand
   */
  public function getDetectedAdvertisers()
  {
    return $this->detectedAdvertisers;
  }
  public function setDetectedAttributes($detectedAttributes)
  {
    $this->detectedAttributes = $detectedAttributes;
  }
  public function getDetectedAttributes()
  {
    return $this->detectedAttributes;
  }
  public function setDetectedClickThroughUrls($detectedClickThroughUrls)
  {
    $this->detectedClickThroughUrls = $detectedClickThroughUrls;
  }
  public function getDetectedClickThroughUrls()
  {
    return $this->detectedClickThroughUrls;
  }
  public function setDetectedDomains($detectedDomains)
  {
    $this->detectedDomains = $detectedDomains;
  }
  public function getDetectedDomains()
  {
    return $this->detectedDomains;
  }
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  public function setDetectedProductCategories($detectedProductCategories)
  {
    $this->detectedProductCategories = $detectedProductCategories;
  }
  public function getDetectedProductCategories()
  {
    return $this->detectedProductCategories;
  }
  public function setDetectedSensitiveCategories($detectedSensitiveCategories)
  {
    $this->detectedSensitiveCategories = $detectedSensitiveCategories;
  }
  public function getDetectedSensitiveCategories()
  {
    return $this->detectedSensitiveCategories;
  }
  public function setDetectedVendorIds($detectedVendorIds)
  {
    $this->detectedVendorIds = $detectedVendorIds;
  }
  public function getDetectedVendorIds()
  {
    return $this->detectedVendorIds;
  }
  public function setLastStatusUpdate($lastStatusUpdate)
  {
    $this->lastStatusUpdate = $lastStatusUpdate;
  }
  public function getLastStatusUpdate()
  {
    return $this->lastStatusUpdate;
  }
  /**
   * @param Google_Service_RealTimeBidding_ServingStatus
   */
  public function setOpenAuctionServingStatus(Google_Service_RealTimeBidding_ServingStatus $openAuctionServingStatus)
  {
    $this->openAuctionServingStatus = $openAuctionServingStatus;
  }
  /**
   * @return Google_Service_RealTimeBidding_ServingStatus
   */
  public function getOpenAuctionServingStatus()
  {
    return $this->openAuctionServingStatus;
  }
  /**
   * @param Google_Service_RealTimeBidding_ServingStatus
   */
  public function setRussiaServingStatus(Google_Service_RealTimeBidding_ServingStatus $russiaServingStatus)
  {
    $this->russiaServingStatus = $russiaServingStatus;
  }
  /**
   * @return Google_Service_RealTimeBidding_ServingStatus
   */
  public function getRussiaServingStatus()
  {
    return $this->russiaServingStatus;
  }
}
