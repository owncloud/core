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

class CreativeServingDecision extends \Google\Collection
{
  protected $collection_key = 'detectedVendorIds';
  protected $adTechnologyProvidersType = AdTechnologyProviders::class;
  protected $adTechnologyProvidersDataType = '';
  protected $chinaPolicyComplianceType = PolicyCompliance::class;
  protected $chinaPolicyComplianceDataType = '';
  protected $dealsPolicyComplianceType = PolicyCompliance::class;
  protected $dealsPolicyComplianceDataType = '';
  protected $detectedAdvertisersType = AdvertiserAndBrand::class;
  protected $detectedAdvertisersDataType = 'array';
  public $detectedAttributes;
  public $detectedClickThroughUrls;
  public $detectedDomains;
  public $detectedLanguages;
  public $detectedProductCategories;
  public $detectedSensitiveCategories;
  public $detectedVendorIds;
  public $lastStatusUpdate;
  protected $networkPolicyComplianceType = PolicyCompliance::class;
  protected $networkPolicyComplianceDataType = '';
  protected $platformPolicyComplianceType = PolicyCompliance::class;
  protected $platformPolicyComplianceDataType = '';
  protected $russiaPolicyComplianceType = PolicyCompliance::class;
  protected $russiaPolicyComplianceDataType = '';

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
   * @param PolicyCompliance
   */
  public function setChinaPolicyCompliance(PolicyCompliance $chinaPolicyCompliance)
  {
    $this->chinaPolicyCompliance = $chinaPolicyCompliance;
  }
  /**
   * @return PolicyCompliance
   */
  public function getChinaPolicyCompliance()
  {
    return $this->chinaPolicyCompliance;
  }
  /**
   * @param PolicyCompliance
   */
  public function setDealsPolicyCompliance(PolicyCompliance $dealsPolicyCompliance)
  {
    $this->dealsPolicyCompliance = $dealsPolicyCompliance;
  }
  /**
   * @return PolicyCompliance
   */
  public function getDealsPolicyCompliance()
  {
    return $this->dealsPolicyCompliance;
  }
  /**
   * @param AdvertiserAndBrand[]
   */
  public function setDetectedAdvertisers($detectedAdvertisers)
  {
    $this->detectedAdvertisers = $detectedAdvertisers;
  }
  /**
   * @return AdvertiserAndBrand[]
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
   * @param PolicyCompliance
   */
  public function setNetworkPolicyCompliance(PolicyCompliance $networkPolicyCompliance)
  {
    $this->networkPolicyCompliance = $networkPolicyCompliance;
  }
  /**
   * @return PolicyCompliance
   */
  public function getNetworkPolicyCompliance()
  {
    return $this->networkPolicyCompliance;
  }
  /**
   * @param PolicyCompliance
   */
  public function setPlatformPolicyCompliance(PolicyCompliance $platformPolicyCompliance)
  {
    $this->platformPolicyCompliance = $platformPolicyCompliance;
  }
  /**
   * @return PolicyCompliance
   */
  public function getPlatformPolicyCompliance()
  {
    return $this->platformPolicyCompliance;
  }
  /**
   * @param PolicyCompliance
   */
  public function setRussiaPolicyCompliance(PolicyCompliance $russiaPolicyCompliance)
  {
    $this->russiaPolicyCompliance = $russiaPolicyCompliance;
  }
  /**
   * @return PolicyCompliance
   */
  public function getRussiaPolicyCompliance()
  {
    return $this->russiaPolicyCompliance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeServingDecision::class, 'Google_Service_RealTimeBidding_CreativeServingDecision');
