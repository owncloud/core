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
  protected $chinaPolicyComplianceType = 'Google_Service_RealTimeBidding_PolicyCompliance';
  protected $chinaPolicyComplianceDataType = '';
  protected $dealsPolicyComplianceType = 'Google_Service_RealTimeBidding_PolicyCompliance';
  protected $dealsPolicyComplianceDataType = '';
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
  protected $networkPolicyComplianceType = 'Google_Service_RealTimeBidding_PolicyCompliance';
  protected $networkPolicyComplianceDataType = '';
  protected $platformPolicyComplianceType = 'Google_Service_RealTimeBidding_PolicyCompliance';
  protected $platformPolicyComplianceDataType = '';
  protected $russiaPolicyComplianceType = 'Google_Service_RealTimeBidding_PolicyCompliance';
  protected $russiaPolicyComplianceDataType = '';

  /**
   * @param Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function setChinaPolicyCompliance(Google_Service_RealTimeBidding_PolicyCompliance $chinaPolicyCompliance)
  {
    $this->chinaPolicyCompliance = $chinaPolicyCompliance;
  }
  /**
   * @return Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function getChinaPolicyCompliance()
  {
    return $this->chinaPolicyCompliance;
  }
  /**
   * @param Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function setDealsPolicyCompliance(Google_Service_RealTimeBidding_PolicyCompliance $dealsPolicyCompliance)
  {
    $this->dealsPolicyCompliance = $dealsPolicyCompliance;
  }
  /**
   * @return Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function getDealsPolicyCompliance()
  {
    return $this->dealsPolicyCompliance;
  }
  /**
   * @param Google_Service_RealTimeBidding_AdvertiserAndBrand[]
   */
  public function setDetectedAdvertisers($detectedAdvertisers)
  {
    $this->detectedAdvertisers = $detectedAdvertisers;
  }
  /**
   * @return Google_Service_RealTimeBidding_AdvertiserAndBrand[]
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
   * @param Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function setNetworkPolicyCompliance(Google_Service_RealTimeBidding_PolicyCompliance $networkPolicyCompliance)
  {
    $this->networkPolicyCompliance = $networkPolicyCompliance;
  }
  /**
   * @return Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function getNetworkPolicyCompliance()
  {
    return $this->networkPolicyCompliance;
  }
  /**
   * @param Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function setPlatformPolicyCompliance(Google_Service_RealTimeBidding_PolicyCompliance $platformPolicyCompliance)
  {
    $this->platformPolicyCompliance = $platformPolicyCompliance;
  }
  /**
   * @return Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function getPlatformPolicyCompliance()
  {
    return $this->platformPolicyCompliance;
  }
  /**
   * @param Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function setRussiaPolicyCompliance(Google_Service_RealTimeBidding_PolicyCompliance $russiaPolicyCompliance)
  {
    $this->russiaPolicyCompliance = $russiaPolicyCompliance;
  }
  /**
   * @return Google_Service_RealTimeBidding_PolicyCompliance
   */
  public function getRussiaPolicyCompliance()
  {
    return $this->russiaPolicyCompliance;
  }
}
